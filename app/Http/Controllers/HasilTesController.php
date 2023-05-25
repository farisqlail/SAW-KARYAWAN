<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\HasilTes;
use App\Pelamar;
use App\DaftarSoal;
use App\JadwalTes;
use App\lowongan;
use App\BobotKriteria;

class HasilTesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $pelamar = Pelamar::select('pelamar.id', 'pelamar.nama_pelamar', 'lowongan.posisi_lowongan')
            ->join('hasil_tes', 'hasil_tes.id_pelamar', '=', 'pelamar.id')
            ->join('lowongan', 'lowongan.id', '=', 'pelamar.id_lowongan')
            ->where('lowongan.id', $id)
            ->groupBy('pelamar.id', 'nama_pelamar', 'posisi_lowongan')
            ->get();
        $lowongan = lowongan::where('id', $id)->first();

        return view('jawaban.index', [
            'pelamar' => $pelamar,
            'lowongan' => $lowongan
        ]);
    }

    public function detail($id)
    {
        $hasilTes = HasilTes::select('hasil_tes.id', 'hasil_tes.jawaban', 'hasil_tes.nilai', 'daftar_soal.soal','id_soal_tes')->join('daftar_soal', 'daftar_soal.id', '=', 'hasil_tes.id_soal_tes')->where('hasil_tes.id_pelamar', $id)->get();

        $pelamar = Pelamar::where('id', $id)->first();
        return view('jawaban.detail', [
            'hasilTes' => $hasilTes,
            'pelamar' => $pelamar
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $user = Auth::user()->id;
        $pelamar = Pelamar::with('user')->where('id_user', $user)->get();

        $pelamarGet = $pelamar[0]->id;

        $jadwaltes = JadwalTes::find($id);
        $daftarsoal = DaftarSoal::join('hasil_tes', 'hasil_tes.id', '=', 'daftar_soal.id')
            ->where('id', $id)
            ->where('hasil_tes.id', $pelamarGet)
            ->get();

        return view('jawaban.jawaban', ['pelamarGet' => $pelamarGet, 'daftarsoal' => $daftarsoal, 'jadwaltes' => $jadwaltes, 'pelamar' => $pelamar]);
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
            'jawaban' => 'required',
        ]);

        if ($validator->fails()) {
            dd($validator->errors());
            return back()->withErrors($validator->errors());
        } else {

            Alert::success('Berhasil Upload', 'Jawaban diperiksa terlebih dahulu');

            $pelamar = Pelamar::where('id_lowongan', $request->get('id_lowongan'))->where('id_user', auth()->user()->id)->firstOrFail();

            $hasilTes = new HasilTes();
            $hasilTes->id_soal_tes = $request->get('id_soal_tes');
            $hasilTes->id_pelamar = $pelamar->id;
            $hasilTes->id_lowongan = $request->get('id_lowongan');
            if ($request->hasFile('jawaban')) {
                $file = $request->file('jawaban');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $hasilTes->jawaban = $filename;
                Storage::putFileAs("public/file/jawaban", $file, $filename);
            }

            $hasilTes->save();
        }

        return redirect()->back();
    }

    public function editJawaban($id)
    {

        $hasilTes = HasilTes::find($id);
        // dd($hasilTes);
        return view('jawaban.edit', ['hasilTes' => $hasilTes]);
    }

    public function updateJawaban(Request $request, $id)
    {

        $validator = Validator::make(request()->all(), [
            'jawaban' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors());
        } else {

            Alert::success('Berhasil Ubah Jawaban', 'Jawaban diperiksa terlebih dahulu');

            $pelamar = Pelamar::where('id_lowongan', $request->get('id_lowongan'))->where('id_user', auth()->user()->id)->firstOrFail();
            $hasilTes = HasilTes::findOrFail($id);

            $hasilTes->id_soal_tes = $request->get('id_soal_tes');
            $hasilTes->id_pelamar = $pelamar->id;
            $hasilTes->id_lowongan = $request->get('id_lowongan');
            if ($request->hasFile('jawaban')) {
                $file = $request->file('jawaban');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $hasilTes->jawaban = $filename;
                Storage::putFileAs("public/file/jawaban", $file, $filename);
            }

            $hasilTes->save();
        }

        return redirect()->back();
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
        $hasilTes = HasilTes::join('pelamar', 'pelamar.id', '=', 'hasil_tes.id_pelamar')->join('daftar_soal', 'daftar_soal.id', '=', 'hasil_tes.id_soal_tes')->where('hasil_tes.id_pelamar', $id)->get();
        // dd($hasilTes);
        $pelamar = Pelamar::where('id', $id)->first();
        // dd($hasilTes);
        return view('jawaban.nilai', ['hasilTes' => $hasilTes, 'pelamar' => $pelamar]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateNilai(Request $request, $id)
    {
        $validator = Validator::make(request()->all(), [
            'bobot' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors());
        } else {
            Alert::success('Berhasil', 'Jawaban berhasil dinilai');

            $bobot_kriteria = BobotKriteria::findOrFail($request->get('bobot'));

            $hasilTes = HasilTes::findOrFail($id);

            $hasilTes->nilai = $bobot_kriteria->jumlah_bobot;

            $hasilTes->id_bobot_kriteria = $bobot_kriteria->id;

            $hasilTes->save();

            // $NA = HasilTes::select('id_soal_tes', DB::raw('sum(nilai * bobot_soal) as hasil'))
            //     ->where('id_soal_tes', $hasilTes->id_soal_tes)
            //     ->join('daftar_soal', 'daftar_soal.id', '=', 'hasil_tes.id_soal_tes')
            //     ->where('hasil_tes.id', '=', $hasilTes->id)
            //     ->groupBy('id_soal_tes')
            //     ->get();
            // $nilai      = $NA->toArray();
            // $sum_nilai  = array_sum(array_column($nilai, 'hasil'));
            // $total      = $sum_nilai / 100;

            // Pelamar::where('id', $hasilTes->id_pelamar)->update(['nilai_tes' => $total]);
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getBobotKriteria(Request $request)
    {
        if ($request->ajax()) {

            $id = $request->get('id_soal_tes');

            $id_pelamar = $request->get('id_pelamar');

            $daftarsoal = DaftarSoal::findOrFail($id);

            $bobot_kriteria = BobotKriteria::where('id_kriteria', $daftarsoal->id_kriteria)->get();

            $hasil_tes = HasilTes::where('id_pelamar', $id_pelamar)->where('id_soal_tes', $id)->first();


            return response()->json(['data' => $bobot_kriteria, 'hasil_tes' => $hasil_tes, 'status' => true]);
        }
    }
}
