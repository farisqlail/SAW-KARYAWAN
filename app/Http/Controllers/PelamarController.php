<?php

namespace App\Http\Controllers;

use App\BobotKriteria;
use App\HasilTes;
use App\JadwalTes;
use App\Kriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Snowfire\Beautymail\Beautymail;
use App\lowongan;
use App\Pelamar;
use Carbon\Carbon;
use App\NilaiAlternatif;


class PelamarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pelamar = Pelamar::all();

        return view('pelamar.index', ['pelamar' => $pelamar]);
    }

    public function riwayat()
    {

        $user = Auth::user()->id;
        $pelamar = Pelamar::where('id_user', $user)->get();
        // dd($pelamar);

        return view('pelamar.riwayat', ['pelamar' => $pelamar]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $lowongan = lowongan::find($id);
        $pelamar = Pelamar::all();
        $kriteria = Kriteria::where('id_lowongan', $id)->where('tampil_di_pelamar', 1)->get();
        $bobot_kriteria = BobotKriteria::all();


        return view('lowongan.create', ['lowongan' => $lowongan, 'kriteria' => $kriteria, 'bobot_kriteria' => $bobot_kriteria, 'pelamar' => $pelamar]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make(request()->all(), [
            'nama_pelamar' => 'required',
            'tanggal_lahir' => 'required',
            'no_telepon' => 'required',
            'jenis_kelamin' => 'required',
            'cv' => 'required|mimes:pdf|max:3024',
            'ijazah' => 'required|mimes:pdf|max:3024',
            'pas_foto' => 'required|mimes:jpeg,png,jpg|max:1024',
            'kriteria' => 'required',
            'kriteria.*' => 'required|numeric|min:0'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        } else {

            DB::beginTransaction();

            try {
                $pelamar = new Pelamar();
                $pelamar->id_lowongan = $request->get('id_lowongan');
                $pelamar->id_user = $request->get('id_user');
                // $pelamar->id = $request->get('id');
                $pelamar->alamat = $request->get('alamat');
                $pelamar->nama_pelamar = $request->get('nama_pelamar');
                $pelamar->tanggal_lahir = $request->get('tanggal_lahir');
                $pelamar->tempat_lahir = $request->get('tempat_lahir');
                $pelamar->agama = $request->get('agama');
                $pelamar->no_telepon = $request->get('no_telepon');
                $pelamar->jenis_kelamin = $request->get('jenis_kelamin');
                if ($request->hasFile('cv')) {
                    $file = $request->file('cv');
                    $filename = time() . '.' . $file->getClientOriginalExtension();
                    $pelamar->cv = $filename;
                    Storage::putFileAs("public/file/cv", $file, $filename);
                }
                if ($request->hasFile('ijazah')) {
                    $file = $request->file('ijazah');
                    $filename = time() . '.' . $file->getClientOriginalExtension();
                    $pelamar->ijazah = $filename;
                    Storage::putFileAs("public/file/ijazah", $file, $filename);
                }
                if ($request->hasFile('pas_foto')) {
                    $file = $request->file('pas_foto');
                    $filename = time() . '.' . $file->getClientOriginalExtension();
                    $pelamar->pas_foto = $filename;
                    Storage::putFileAs("public/images/pas_foto", $file, $filename);
                }
                
                $pelamar->save();

                $kriteria_id = $request->get('kriteria_id');

                $kriteria = $request->get('kriteria');

                foreach ($kriteria_id as $key => $k) {

                    $cek = BobotKriteria::where('id_kriteria', $k)->where('nilai_awal','<=', floatval($kriteria[$key]))->where('nilai_akhir','>=', floatval($kriteria[$key]))->first();

                    if(!$cek){
                        return redirect()->back()->withErrors('Data nilai tidak ditemukan')->withInput();
                    }

                    $nilai_alternatif = new NilaiAlternatif();
                    $nilai_alternatif->id_pelamar = $pelamar->id;
                    $nilai_alternatif->id_bobot_kriteria = $cek->id;
                    $nilai_alternatif->nilai = $kriteria[$key];
                    $nilai_alternatif->save();
                }

                DB::commit();

                Alert::success('Berhasil Melamar', 'Lamaran kamu sudah kami terima');

                return redirect()->route('lowongan.home');
            } catch (\Exception $th) {
                DB::rollBack();
                dd($th->getMessage());
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function statusDokumen(Request $request, $id)
    {

        if ($request->submit == 'Dokumen Valid') {

            Alert::success('Berhasil', 'Validasi dokumen pelamar berhasil!');

            $pelamar = Pelamar::find($id);
            $jadwalTes = JadwalTes::where('id', $pelamar->id)->first();
            $pelamar->status_dokumen = 'Dokumen Valid';

            $beautymail = app()->make(\Snowfire\Beautymail\Beautymail::class);
            $beautymail->send('email.dokumenValid', ['data' => $pelamar, 'jadwalTes' => $jadwalTes], function ($message) use ($pelamar) {
                $message
                    ->from('jayalandta@gmail.com')
                    ->to($pelamar->user->email, $pelamar->nama_pelamar)
                    ->subject('Balasan Lamaran Posisi ' . $pelamar->lowongan->posisi_lowongan);
            });
            // dd($jadwalTes);
            $pelamar->save();

            return redirect()->route('perhitungan.validasi', ['id' => $pelamar->id_lowongan]);
        } elseif ($request->status == 'Dokumen Tidak Valid') {

            Alert::success('Berhasil', 'Dokumen pelamar tidak valid!');

            $pelamar = Pelamar::findOrFail($id);
            $pelamar->status_dokumen = 'Dokumen Tidak Valid';
            $pelamar->catatan_seleksi_satu = $request->get('catatan');

            $beautymail = app()->make(\Snowfire\Beautymail\Beautymail::class);
            $beautymail->send('email.dokumenTidakValid', ['data' => $pelamar], function ($message) use ($pelamar) {
                $message
                    ->from('jayalandta@gmail.com')
                    ->to($pelamar->user->email, $pelamar->nama_pelamar)
                    ->subject('Balasan Lamaran Posisi ' . $pelamar->lowongan->posisi_lowongan);
            });

            $pelamar->save();

            return redirect()->route('perhitungan.validasi', ['id' => $pelamar->id_lowongan]);;
        }
    }

    public function update(Request $request, $id)
    {
        if ($request->submit == 'Terima') {

            Alert::success('Berhasil', 'Pelamar sudah diterima & akan mengirim email lanjut');

            $pelamar = Pelamar::find($id);
            $jadwalTes = JadwalTes::where('id', $pelamar->id)->first();
            $pelamar->seleksi_satu = 'Diterima';
            // dd($jadwalTes);

            $beautymail = app()->make(\Snowfire\Beautymail\Beautymail::class);
            $beautymail->send('email.lolos', ['data' => $pelamar, 'jadwalTes' => $jadwalTes], function ($message) use ($pelamar) {
                $message
                    ->from('jayalandta@gmail.com')
                    ->to($pelamar->user->email, $pelamar->nama_pelamar)
                    ->subject('Balasan Lamaran Posisi ' . $pelamar->lowongan->posisi_lowongan);
            });

            $pelamar->save();

            return redirect()->back();
        } elseif ($request->submit == 'Tolak') {

            Alert::success('Berhasil', 'Pelamar sudah ditolak & akan mengirim email lanjut');

            $pelamar = Pelamar::findOrFail($id);
            $pelamar->seleksi_satu = 'Ditolak';

            $beautymail = app()->make(\Snowfire\Beautymail\Beautymail::class);
            $beautymail->send('email.tolak', ['data' => $pelamar], function ($message) use ($pelamar) {
                $message
                    ->from('jayalandta@gmail.com')
                    ->to($pelamar->user->email, $pelamar->nama_pelamar)
                    ->subject('Balasan Lamaran Posisi ' . $pelamar->lowongan->posisi_lowongan);
            });

            $pelamar->save();

            return redirect()->back();
        }
    }

    public function tolakSatu(Request $request)
    {

        $nilai = $request->nilai;
        $sort = $request->sorting;
        $kode = $request->kode;
        $total = $request->total;
        $output = array_slice($kode, 0, $sort);
        $output2 = array_slice($kode, 0, $nilai);
        $pelamar = Pelamar::whereNull('seleksi_satu')->whereIn('id', $output)->whereIn('id', $output2)->get();
        $tolak = Pelamar::whereNull('seleksi_satu')->whereNotIn('id', $output)->whereNotIn('id', $output2)->get();

        foreach ($pelamar as $data) {
            Alert::success('Berhasil', 'Pelamar sudah disorting dan dikirim email');

            // $data->seleksi_satu = 'Ditolak';
            Pelamar::where('id', $data->id)->update(['seleksi_satu' => 'Diterima']);
            Lowongan::where('id', $data->id)->update(['status_lowongan' => 'Seleksi 2']);
            $jadwalTes = JadwalTes::where('id', $data->id)->first();

            $beautymail = app()->make(\Snowfire\Beautymail\Beautymail::class);
            $beautymail->send('email.lolos', ['data' => $data, 'jadwalTes' => $jadwalTes], function ($message) use ($data) {
                $message
                    ->from('jayalandta@gmail.com')
                    ->to($data->user->email, $data->nama_pelamar)
                    ->subject('Balasan Lamaran Posisi ' . $data->lowongan->posisi_lowongan);
            });
            // $data->save();
        }

        foreach ($tolak as $data) {
            Alert::success('Berhasil', 'Pelamar sudah disorting dan dikirim email');

            // $data->seleksi_satu = 'Ditolak';
            Pelamar::where('id', $data->id)->update(['seleksi_satu' => 'Ditolak']);

            $beautymail = app()->make(\Snowfire\Beautymail\Beautymail::class);
            $beautymail->send('email.tolak', ['data' => $data], function ($message) use ($data) {
                $message
                    ->from('jayalandta@gmail.com')
                    ->to($data->user->email, $data->nama_pelamar)
                    ->subject('Balasan Lamaran Posisi ' . $data->lowongan->posisi_lowongan);
            });
            // $data->save();
        }

        return redirect()->back();
    }

    public function seleksiDua(Request $request, $id)
    {
        if ($request->submit == 'Terima') {

            Alert::success('Berhasil', 'Pelamar sudah diterima & akan mengirim email lanjut');

            $lowongan  = lowongan::findOrFail($request->get('id_lowongan'));
            $lowongan->status_lowongan = "Seleksi 2";
            $lowongan->save();

            $data = Pelamar::findOrFail($id);
            // dd($pelamar->lowongan->posisi_lowongan);
            $data->seleksi_dua  = 'Diterima';
            $data->rangked      = $request->get('rangked');
            $data->nilai_akhir  = $request->get('nilai_akhir');

            $beautymail = app()->make(\Snowfire\Beautymail\Beautymail::class);
            $beautymail->send('email.lolos2', ['data' => $data], function ($message) use ($data) {
                $message
                    ->from('jayalandta@gmail.com')
                    ->to($data->user->email, $data->nama_pelamar)
                    ->subject('Balasan Lamaran Posisi ' . $data->lowongan->posisi_lowongan);
            });

            $data->save();

            return redirect()->back();
        } elseif ($request->submit == 'Tolak') {

            Alert::success('Berhasil', 'Pelamar sudah ditolak & akan mengirim email lanjut');

            $lowongan  = lowongan::findOrFail($request->get('id_lowongan'));
            $lowongan->status_lowongan = "Seleksi 2";
            $lowongan->save();

            $data = Pelamar::findOrFail($id);
            $data->seleksi_dua = 'Ditolak';

            $beautymail = app()->make(\Snowfire\Beautymail\Beautymail::class);
            $beautymail->send('email.tolak2', ['data' => $data], function ($message) use ($data) {
                $message
                    ->from('jayalandta@gmail.com')
                    ->to($data->user->email, $data->nama_pelamar)
                    ->subject('Balasan Lamaran Posisi ' . $data->lowongan->posisi_lowongan);
            });

            $data->save();

            return redirect()->back();
        }
    }

    public function wawancara($id)
    {
        $pelamar = Pelamar::select('pelamar.id', 'pelamar.id_lowongan', 'pelamar.nama_pelamar', 'pelamar.rangked', 'pelamar.nilai_akhir', 'lowongan.posisi_lowongan')
            ->join('lowongan', 'lowongan.id', '=', 'pelamar.id_lowongan')
            ->where('seleksi_dua', 'Diterima')
            ->where('lowongan.id', $id)
            ->groupBy('id', 'id_lowongan', 'nama_pelamar', 'rangked', 'nilai_akhir', 'posisi_lowongan')
            ->orderBy('rangked', 'asc')
            ->get();

        return view('perhitungan.wawancara', [
            'pelamar' => $pelamar
        ]);
    }

    public function hasilWawancara(Request $request, $id)
    {
        $pelamar = Pelamar::findOrFail($id);

        return view('perhitungan.hasil', [
            'pelamar' => $pelamar
        ]);
    }

    public function storeWawancara(Request $request, $id)
    {
        Alert::success('Berhasil', 'Hasil wawancara berhasil disimpan');
        $pelamar = Pelamar::findOrFail($id);

        $pelamar->hasil_wawancara = $request->wawancara;

        $pelamar->status_wawancara = $request->status;

        if ($pelamar->status_wawancara == 'Ditolak') {

            $beautymail = app()->make(\Snowfire\Beautymail\Beautymail::class);
            $beautymail->send('email.wawancaraTolak', ['pelamar' => $pelamar], function ($message) use ($pelamar) {
                $message
                    ->from('jayalandta@gmail.com')
                    ->to($pelamar->user->email, $pelamar->nama_pelamar)
                    ->subject('Balasan Lamaran Posisi ' . $pelamar->lowongan->posisi_lowongan);
            });
        } else {

            $beautymail = app()->make(\Snowfire\Beautymail\Beautymail::class);
            $beautymail->send('email.wawancaraTerima', ['pelamar' => $pelamar], function ($message) use ($pelamar) {
                $message
                    ->from('jayalandta@gmail.com')
                    ->to($pelamar->user->email, $pelamar->nama_pelamar)
                    ->subject('Balasan Lamaran Posisi ' . $pelamar->lowongan->posisi_lowongan);
            });
        }
        $pelamar->save();

        return redirect()->route('wawancara',[$pelamar->lowongan->id]);
    }

    public function tolakDua(Request $request)
    {
        $sort = $request->sorting;
        $kode = $request->id;
        $total = $request->total;
        $output = array_slice($kode, 0, $sort);
        $pelamar = Pelamar::whereNull('seleksi_dua')->whereIn('id', $output)->get();
        $tolak = Pelamar::whereNull('seleksi_dua')->whereNotIn('id', $output)->get();

        foreach ($pelamar as $data) {
            Alert::success('Berhasil', 'Pelamar sudah disorting dan dikirim email');

            // $data->seleksi_satu = 'Ditolak';
            Pelamar::where('id', $data->id)->update(['seleksi_dua' => 'Diterima']);
            Lowongan::where('id', $data->id)->update(['status_lowongan' => 'Seleksi Selesai']);
            $jadwalTes = JadwalTes::where('id', $data->id)->first();

            $beautymail = app()->make(\Snowfire\Beautymail\Beautymail::class);
            $beautymail->send('email.lolos2', ['data' => $data], function ($message) use ($data) {
                $message
                    ->from('jayalandta@gmail.com')
                    ->to($data->user->email, $data->nama_pelamar)
                    ->subject('Balasan Lamaran Posisi ' . $data->lowongan->posisi_lowongan);
            });
            // $data->save();
        }

        foreach ($tolak as $data) {
            Alert::success('Berhasil', 'Pelamar sudah disorting dan dikirim email');

            // $data->seleksi_satu = 'Ditolak';
            Pelamar::where('id', $data->id)->update(['seleksi_dua' => 'Ditolak']);

            $beautymail = app()->make(\Snowfire\Beautymail\Beautymail::class);
            $beautymail->send('email.tolak2', ['data' => $data], function ($message) use ($data) {
                $message
                    ->from('jayalandta@gmail.com')
                    ->to($data->user->email, $data->nama_pelamar)
                    ->subject('Balasan Lamaran Posisi ' . $data->lowongan->posisi_lowongan);
            });
            // $data->save();
        }

        return redirect()->back();
    }

    public function email($id)
    {

        $pelamar = Pelamar::find($id);

        return view('email.lolos', ['pelamar' => $pelamar]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pelamar = Pelamar::find($id);
        $pelamar->delete();
        return redirect(route('pelamar.index'));
    }
}
