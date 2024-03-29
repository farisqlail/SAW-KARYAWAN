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
use App\DetailJawaban;
use App\JawabanPelamar;
use App\Kriteria;
use App\NilaiAlternatif;

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
        $kriteria = Kriteria::where('id_lowongan', $id)
            ->where('tampil_di_pelamar', 0)
            ->where('nama_kriteria', 'PSIKOTES')
            ->get();
        // dd($kriteria);

        return view('jawaban.index', [
            'pelamar' => $pelamar,
            'lowongan' => $lowongan,
            'kriteria' => $kriteria
        ]);
    }

    public function detail($id)
    {
        $hasilTes = HasilTes::select('hasil_tes.id', 'hasil_tes.jawaban', 'hasil_tes.nilai')->where('hasil_tes.id_pelamar', $id)->first();

        $jawaban_pelamar = JawabanPelamar::where('id_pelamar', $id)->get();
        $pelamar = Pelamar::where('id', $id)->first();
        $kriteria = Kriteria::where('id_lowongan', $pelamar->id_lowongan)
            ->where('nama_kriteria', 'PSIKOTES')
            ->first();
        $nilaialternatif = NilaiAlternatif::join('pelamar','pelamar.id','nilai_alternatif.id_pelamar')
        ->where('id_lowongan',$pelamar->id_lowongan)->where('id_pelamar', $id)->get();

        $nilaialternatif = tap($nilaialternatif)->transform(function($data){
            if($data->bobot_kriteria->kriteria->tampil_di_pelamar == 0){
                return $data;
            }
        });

        $nilaialternatif = $nilaialternatif->filter();


        $pelamar = Pelamar::where('id', $id)->first();
        return view('jawaban.detail', [
            'hasilTes' => $hasilTes,
            'jawaban_pelamar' => $jawaban_pelamar,
            'pelamar' => $pelamar,
            'kriteria' => $kriteria,
            'nilaialternatif' => $nilaialternatif
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
            'jawaban' => 'nullable',
        ]);

        if ($validator->fails()) {

            return back()->withErrors($validator->errors());
        } else {

            DB::beginTransaction();
            try {
                $daftarsoal = DaftarSoal::where('id_lowongan', $request->get('id_lowongan'))->get();

                $jawaban = [];

                $nilai = 0;

                $jawaban_benar = 0;

                $arr = [];

                $check = [];

                foreach ($daftarsoal as $key => $value) {
                    $get_jawaban = $request->get('jawaban_' . $value->id);


                    $detail_jawaban = DetailJawaban::find($get_jawaban);

                    if ($detail_jawaban) {


                        if (isset($check[$key])) {

                            if (!in_array($detail_jawaban->daftarSoal->id_kriteria, $check)) {

                                if ($detail_jawaban->isTrue == 1) {
                                    array_push($arr, $detail_jawaban->daftarSoal->id_kriteria);
                                }
                                array_push($check, $detail_jawaban->daftarSoal->id_kriteria);
                            } else {
                                if ($detail_jawaban->isTrue == 1) {
                                    array_push($arr, $detail_jawaban->daftarSoal->id_kriteria);
                                }
                            }
                        } else {

                            if ($detail_jawaban->isTrue == 1) {
                                // $jawaban_benar = $jawaban_benar + 1;

                                array_push($arr, $detail_jawaban->daftarSoal->id_kriteria);
                            }


                            array_push($check, $detail_jawaban->daftarSoal->id_kriteria);
                        }
                    }


                    array_push($jawaban, $get_jawaban);
                }

                $remove_arr = array_unique($arr);

                if (count($daftarsoal) !== count($jawaban)) {
                    return redirect()->back()->withErrors(['Semua jawaban soal wajib diisi']);
                }

                $pelamar = Pelamar::where('id_lowongan', $request->get('id_lowongan'))->where('id_user', auth()->user()->id)->firstOrFail();


                foreach ($remove_arr as $key => $value) {
                    $daftarsoalKrit = DaftarSoal::where('id_lowongan', $request->get('id_lowongan'))->where('id_kriteria', $value)->count();
                    $kriteria       = Kriteria::where('id_lowongan', $request->get('id_lowongan'))->where('id', $value)->first();

                    $total_nilai    = ($this->hitungJawabanBenar($arr, $value) / $daftarsoalKrit) * 100;
                    $cek            = BobotKriteria::where('id_kriteria', $kriteria->id)->where('nilai_akhir', '>=', $total_nilai)->first();
                    
                    Pelamar::where('id_user', auth()->user()->id)->update(['nilai_tes' => number_format($total_nilai)]);

                    $nilaialternatif                    = new NilaiAlternatif();
                    $nilaialternatif->id_pelamar        = $pelamar->id;
                    $nilaialternatif->id_bobot_kriteria = $cek->id;
                    $nilaialternatif->nilai             = $total_nilai;
                    $nilaialternatif->save();
                }

                Alert::success('Berhasil Upload', 'Jawaban berhasil di submit');

                $hasilTes = new HasilTes();
                $hasilTes->id_pelamar           = $pelamar->id;
                $hasilTes->id_lowongan          = $request->get('id_lowongan');
                $hasilTes->id_bobot_kriteria    = $cek->id;
                $hasilTes->jawaban              = '';
                $hasilTes->nilai                = $total_nilai;
                $hasilTes->save();


                foreach ($daftarsoal as $key => $value) {
                    $get_jawaban = $request->get('jawaban_' . $value->id);
                    $jawaban_pelamar = new JawabanPelamar();
                    $jawaban_pelamar->id_pelamar = $pelamar->id;
                    $jawaban_pelamar->id_detail_jawaban = $get_jawaban;
                    $jawaban_pelamar->id_hasil_tes = $hasilTes->id;
                    $jawaban_pelamar->save();
                }


                DB::commit();
                return redirect()->back();
            } catch (\Exception $th) {
                DB::rollBack();
                dd($th);
            }
        }
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

        $status = $request->get('status');

        $nilai = $request->get('nilai');

        if ($status == 'semua') {

            $validator = Validator::make(request()->all(), [
                'nilai' => 'required|integer|min:0|max:100',
            ]);

            $id_pelamar = $id;

            $pelamar = Pelamar::findOrFail($id_pelamar);

            $id_lowongan = $pelamar->id_lowongan;

            $bobot_kriteria = BobotKriteria::whereHas('kriteria', function ($query) use ($id_lowongan) {
                return $query->where('id_lowongan', $id_lowongan)->where('tampil_di_pelamar', 0);
            })->get();


            $daftarsoal = DaftarSoal::where('id_lowongan', $id_lowongan)->get();

            foreach ($daftarsoal as $key => $value) {

                foreach ($bobot_kriteria as $key => $row) {
                    $cek = BobotKriteria::where('id_kriteria', $row->id_kriteria)->where('nilai_awal', '<=', floatval($nilai))->where('nilai_akhir', '>=', floatval($nilai))->first();

                    if ($cek) {

                        $hasilTes = HasilTes::where('id_soal_tes', $value->id)->where('id_bobot_kriteria', $row->id)->where('id_pelamar', $id_pelamar)->first();

                        if ($hasilTes) {
                            $hasilTes->nilai = $nilai;
                            $hasilTes->bobot = $row->jumlah_bobot;
                            $hasilTes->id_bobot_kriteria =  $row->id;
                            $hasilTes->save();
                        } else {
                            HasilTes::where('id_soal_tes', $value->id)->where('id_pelamar', $id_pelamar)->update([
                                'nilai' => $nilai,
                                'bobot' => $row->jumlah_bobot,
                                'id_bobot_kriteria' => $row->id
                            ]);
                        }
                    } else {
                        return redirect()->back()->withErrors(['data nilai tidak valid']);
                    }
                }
            }

            Alert::success('Berhasil', 'Jawaban berhasil dinilai');

            return redirect()->back();
        } else {
            $validator = Validator::make(request()->all(), [
                // 'bobot' => 'required',
                'nilai' => 'required|integer|min:0|max:100'
            ]);

            if ($validator->fails()) {
                return back()->withErrors($validator->errors());
            } else {
                Alert::success('Berhasil', 'Jawaban berhasil dinilai');

                $hasilTes = HasilTes::findOrFail($id);

                $cek = BobotKriteria::where('id_kriteria', $hasilTes->daftar_soal->id_kriteria)->where('nilai_awal', '<=', floatval($nilai))->where('nilai_akhir', '>=', floatval($nilai))->first();

                if ($cek) {

                    $hasilTes->bobot = $cek->jumlah_bobot;

                    $hasilTes->nilai = $nilai;

                    $hasilTes->id_bobot_kriteria = $cek->id;

                    $hasilTes->save();

                    return redirect()->back();
                } else {
                    return redirect()->back()->withErrors(['data nilai tidak valid']);
                }
            }
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

    public function getNumber($string, $nilai)
    {
        preg_match_all('/\d+/', $string, $matches);
        $numbers = isset($matches[0]) ? $matches[0] : null;

        if ($numbers) {
            if (isset($numbers[0]) && isset($numbers[1])) {

                if ($nilai >= $numbers[0] && $nilai <= $numbers[1]) {
                    return ['status' =>  true, 'data' => $numbers];
                } else {
                    return false;
                }
            }
        } else {
            return false;
        }
    }

    public function psikotesStore(Request $request, $id)
    {
        $cek = BobotKriteria::where('id_kriteria', $request->get('id_kriteria'))
            ->where('nilai_awal', '<=', floatval($request->get('nilai')))
            ->where('nilai_akhir', '>=', floatval($request->get('nilai')))
            ->first();
        // dd($id);

        $nilaialternatif                    = new NilaiAlternatif();
        $nilaialternatif->id_pelamar        = $id;
        $nilaialternatif->id_bobot_kriteria = $cek->id;
        $nilaialternatif->nilai             = $request->get('nilai');
        $nilaialternatif->save();

        Pelamar::where('id', $id)->update(['keterangan_psikotes' => $request->get('keterangan')]);
        Alert::success('Berhasil Upload', 'Berhasil input nilai psikotes');

        return redirect()->back();
    }

    public function hitungJawabanBenar($arr, $jawaban)
    {
        $jawaban_benar = 0;
        foreach ($arr as $key => $value) {
            if ($value == $jawaban) {
                $jawaban_benar = $jawaban_benar + 1;
            }
        }

        return $jawaban_benar;
    }
}
