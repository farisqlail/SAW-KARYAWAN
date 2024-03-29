<?php

namespace App\Http\Controllers;

use App\BobotKriteria;
use App\DaftarSoal;
use App\HasilTes;
use App\JadwalTes;
use App\Kriteria;
use App\NilaiAlternatif;
use App\lowongan;
use App\Pelamar;
use App\Perhitungan;
use Barryvdh\DomPDF\Facade as PDF;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PerhitunganController extends Controller
{
    public function index($id)
    {
        if (Auth::user()->role == 'admin') {
            $lowongan = lowongan::all();
            $lowonganGet = $id;
            // dd($lowonganGet);
            $low = lowongan::find($id);
            $kriteria = Kriteria::where('id_lowongan', $id)->get();
            $alternatif = Pelamar::where('id_lowongan', $id)->where('status_dokumen', 'Dokumen Valid')->get();
            // dd($alternatif);
            $kode_krit = [];
            foreach ($kriteria as $krit) {
                $kode_krit[$krit->id] = [];
                foreach ($alternatif as $al) {
                    foreach ($al->bobot as $bobot) {
                        if ($bobot->kriteria->id == $krit->id) {
                            $kode_krit[$krit->id][] = $bobot->jumlah_bobot;
                        }
                    }
                }

                if ($krit->atribut_kriteria == 'cost' && !empty($kode_krit[$krit->id])) {

                    $kode_krit[$krit->id] = min($kode_krit[$krit->id]);
                } elseif ($krit->atribut_kriteria == 'benefit' && !empty($kode_krit[$krit->id])) {

                    $kode_krit[$krit->id] = max($kode_krit[$krit->id]);
                }
                // else {
                //     Alert::error('Maaf', 'Data belum ada');

                //     $kode_krit[$krit->id] = 1;

                //     return redirect()->back();
                // }
            }
            //        return json_encode($kode_krit);
            return view('perhitungan.index', [
                'kriteria'      => $kriteria,
                'alternatif'    => $alternatif,
                'kode_krit'     => $kode_krit,
                'lowonganGet'   => $lowonganGet,
                'low'   => $low
            ]);
        } else if (Auth::user()->role == 'direksi') {
            $lowongan = lowongan::all();
            $lowonganGet = $id;
            // dd($lowonganGet);
            $low = lowongan::find($id);
            $kriteria = Kriteria::where('id_lowongan', $id)->get();
            $alternatif = Pelamar::where('id_lowongan', $id)->where('status_dokumen', 'Dokumen Valid')->get();
            // dd($alternatif);
            $kode_krit = [];
            foreach ($kriteria as $krit) {
                $kode_krit[$krit->id] = [];
                foreach ($alternatif as $al) {
                    foreach ($al->bobot as $bobot) {
                        if ($bobot->kriteria->id == $krit->id) {
                            $kode_krit[$krit->id][] = $bobot->jumlah_bobot;
                        }
                    }
                }

                if ($krit->atribut_kriteria == 'cost' && !empty($kode_krit[$krit->id])) {

                    $kode_krit[$krit->id] = min($kode_krit[$krit->id]);
                } elseif ($krit->atribut_kriteria == 'benefit' && !empty($kode_krit[$krit->id])) {

                    $kode_krit[$krit->id] = max($kode_krit[$krit->id]);
                }
                // else {
                //     Alert::error('Maaf', 'Data belum ada');

                //     $kode_krit[$krit->id] = 1;

                //     return redirect()->back();
                // }
            }
            //        return json_encode($kode_krit);
            return view('perhitungan.index', [
                'kriteria'      => $kriteria,
                'alternatif'    => $alternatif,
                'kode_krit'     => $kode_krit,
                'lowonganGet'   => $lowonganGet,
                'low'   => $low
            ]);
        } else if (Auth::user()->role == 'hrd') {
            $lowongan = lowongan::all();
            $lowonganGet = $id;
            // dd($lowonganGet);
            $low = lowongan::find($id);
            $kriteria = Kriteria::where('id_lowongan', $id)->get();
            $alternatif = Pelamar::where('id_lowongan', $id)->where('status_dokumen', 'Dokumen Valid')->get();
            // dd($alternatif);
            $kode_krit = [];
            foreach ($kriteria as $krit) {
                $kode_krit[$krit->id] = [];
                foreach ($alternatif as $al) {
                    foreach ($al->bobot as $bobot) {
                        if ($bobot->kriteria->id == $krit->id) {
                            $kode_krit[$krit->id][] = $bobot->jumlah_bobot;
                        }
                    }
                }

                if ($krit->atribut_kriteria == 'cost' && !empty($kode_krit[$krit->id])) {

                    $kode_krit[$krit->id] = min($kode_krit[$krit->id]);
                } elseif ($krit->atribut_kriteria == 'benefit' && !empty($kode_krit[$krit->id])) {

                    $kode_krit[$krit->id] = max($kode_krit[$krit->id]);
                }
                // else {
                //     Alert::error('Maaf', 'Data belum ada');

                //     $kode_krit[$krit->id] = 1;

                //     return redirect()->back();
                // }
            }
            //        return json_encode($kode_krit);
            return view('perhitungan.index', [
                'kriteria'      => $kriteria,
                'alternatif'    => $alternatif,
                'kode_krit'     => $kode_krit,
                'lowonganGet'   => $lowonganGet,
                'low'   => $low
            ]);
        } else {
            abort(404);
        }
    }

    public function validation($id)
    {

        if (Auth::user()->role == 'admin') {
            $lowonganGet = $id;

            $low = lowongan::find($id);

            $kriteria = Kriteria::where('id_lowongan', $id)->get();

            $alternatif = Pelamar::where('id_lowongan', $id)->get();

            $kode_krit = [];

            $perhitungan =  Perhitungan::get_perhitungan($lowonganGet);

            $perangkingan = Perhitungan::perangkingan($perhitungan);

            // lowongan::where('id', $lowonganGet)->update(['status_lowongan' => 'Seleksi 1']);

            return view('perhitungan.validasi', [
                'kriteria'      => $kriteria,
                'alternatif'    => $alternatif,
                'kode_krit'     => $kode_krit,
                'lowonganGet'   => $lowonganGet,
                'low'           => $low,
                'perangkingan' => $perangkingan
            ]);
        } else if (Auth::user()->role == 'direksi') {
            $lowonganGet = $id;

            $low = lowongan::find($id);

            $kriteria = Kriteria::where('id_lowongan', $id)->get();

            $alternatif = Pelamar::where('id_lowongan', $id)->get();

            $kode_krit = [];

            $perhitungan =  Perhitungan::get_perhitungan($lowonganGet);

            $perangkingan = Perhitungan::perangkingan($perhitungan);

            lowongan::where('id', $lowonganGet)->update(['status_lowongan' => 'Seleksi 1']);

            return view('perhitungan.validasi', [
                'kriteria'      => $kriteria,
                'alternatif'    => $alternatif,
                'kode_krit'     => $kode_krit,
                'lowonganGet'   => $lowonganGet,
                'low'           => $low,
                'perangkingan' => $perangkingan
            ]);
        } else if (Auth::user()->role == 'hrd') {
            $lowonganGet = $id;

            $low = lowongan::find($id);

            $kriteria = Kriteria::where('id_lowongan', $id)->get();

            $alternatif = Pelamar::where('id_lowongan', $id)->get();

            $kode_krit = [];

            $perhitungan =  Perhitungan::get_perhitungan($lowonganGet);

            $perangkingan = Perhitungan::perangkingan($perhitungan);

            lowongan::where('id', $lowonganGet)->update(['status_lowongan' => 'Seleksi 1']);

            return view('perhitungan.validasi', [
                'kriteria'      => $kriteria,
                'alternatif'    => $alternatif,
                'kode_krit'     => $kode_krit,
                'lowonganGet'   => $lowonganGet,
                'low'           => $low,
                'perangkingan' => $perangkingan
            ]);
        } else {
            abort(404);
        }
    }

    public function pdf($id)
    {

        $pelamar = Pelamar::findOrFail($id);
        // dd($pelamar->cv);
        return view('perhitungan.pdfCV', [
            'pelamar' => $pelamar
        ]);
    }

    public function pdfIjazah($id)
    {

        $pelamar = Pelamar::findOrFail($id);
        return view('perhitungan.pdfIjazah', [
            'pelamar' => $pelamar
        ]);
    }

    public function pasFoto($id)
    {

        $pelamar = Pelamar::findOrFail($id);
        return view('perhitungan.pasFoto', [
            'pelamar' => $pelamar
        ]);
    }

    public function perhitungan2($id)
    {
        if (Auth::user()->role == 'admin') {
            $tes = HasilTes::all();

            $low = lowongan::find($id);

            $kriteria = Kriteria::where('id_lowongan', $id)->get();

            $alternatif = Pelamar::where('id_lowongan', $id)->get();

            $perhitungan =  Perhitungan::get_perhitungan($id);

            $perangkingan = Perhitungan::perangkingan($perhitungan);

            if (HasilTes::where('id_lowongan', $id)->count() == 0) {

                Alert::error('Maaf', 'Data belum ada');

                return redirect()->back();
            } else {
                return view('perhitungan.seleksi2', [
                    'kriteria'      => $kriteria,
                    'alternatif'    => $alternatif,
                    'perhitungan'   => $perhitungan,
                    'perangkingan'  => $perangkingan,
                    'low'           => $low
                ]);
            }
        } else if (Auth::user()->role == 'direksi') {
            $tes = HasilTes::all();

            $low = lowongan::find($id);

            $kriteria = Kriteria::where('id_lowongan', $id)->get();

            $alternatif = Pelamar::where('id_lowongan', $id)->get();

            $perhitungan =  Perhitungan::get_perhitungan($id);

            $perangkingan = Perhitungan::perangkingan($perhitungan);

            if (HasilTes::where('id_lowongan', $id)->count() == 0) {

                Alert::error('Maaf', 'Data belum ada');

                return redirect()->back();
            } else {
                return view('perhitungan.seleksi2', [
                    'kriteria'      => $kriteria,
                    'alternatif'    => $alternatif,
                    'perhitungan' => $perhitungan,
                    'perangkingan' => $perangkingan,
                    'low'   => $low
                ]);
            }
        } else if (Auth::user()->role == 'hrd') {

            $tes = HasilTes::all();

            $low = lowongan::find($id);

            $kriteria = Kriteria::where('id_lowongan', $id)->get();

            $alternatif = Pelamar::where('id_lowongan', $id)->get();

            $perhitungan =  Perhitungan::get_perhitungan($id);

            $perangkingan = Perhitungan::perangkingan($perhitungan);

            if (HasilTes::where('id_lowongan', $id)->count() == 0) {

                Alert::error('Maaf', 'Data belum ada');

                return redirect()->back();
            } else {
                return view('perhitungan.seleksi2', [
                    'kriteria'      => $kriteria,
                    'alternatif'    => $alternatif,
                    'perhitungan' => $perhitungan,
                    'perangkingan' => $perangkingan,
                    'low'   => $low
                ]);
            }
        } else {
            abort(404);
        }
    }

    public function lowongan()
    {
        $jadwalTes = JadwalTes::join('lowongan', 'lowongan.id', '=', 'jadwal_tes.id_lowongan')->get();

        $jadwalTes = tap($jadwalTes)->transform(function ($data) {

            $seleksi2 = HasilTes::where('id_lowongan', $data->id_lowongan)->count();

            $data->seleksi2 = $seleksi2 > 0 ? true : false;

            return $data;
        });

        return view('perhitungan.lowongan', ['jadwalTes' => $jadwalTes]);
    }

    public function detail($id)
    {
        if (Auth::user()->role == 'admin') {
            $pelamar = Pelamar::find($id);
            $kriteria = Kriteria::where('id', $pelamar->id)->get();
            $bobot_kriteria = BobotKriteria::where('id_pelamar', $id)->join('hasil_tes', 'hasil_tes.id_bobot_kriteria', 'bobot_kriteria.id')->join('kriteria', 'kriteria.id', 'bobot_kriteria.id_kriteria')->get();

            $pel = NilaiAlternatif::join('bobot_kriteria', 'bobot_kriteria.id', '=', 'nilai_alternatif.id')
                ->join('kriteria', 'kriteria.id', '=', 'bobot_kriteria.id')
                ->where('nilai_alternatif.id', $id)
                ->get(['nama_bobot', 'nama_kriteria']);
            return view('perhitungan.detail', ['bobot_kriteria' => $bobot_kriteria, 'pelamar' => $pelamar, 'kriteria' => $kriteria, 'alternatif' => $pel]);
        } else if (Auth::user()->role == 'direksi') {
            $pelamar = Pelamar::find($id);
            $kriteria = Kriteria::where('id', $pelamar->id)->get();
            $bobot_kriteria = BobotKriteria::where('id_pelamar', $id)->join('hasil_tes', 'hasil_tes.id_bobot_kriteria', 'bobot_kriteria.id')->join('kriteria', 'kriteria.id', 'bobot_kriteria.id_kriteria')->get();

            $pel = NilaiAlternatif::join('bobot_kriteria', 'bobot_kriteria.id', '=', 'nilai_alternatif.id')
                ->join('kriteria', 'kriteria.id', '=', 'bobot_kriteria.id')
                ->where('nilai_alternatif.id', $id)
                ->get(['nama_bobot', 'nama_kriteria']);
            return view('perhitungan.detail', ['bobot_kriteria' => $bobot_kriteria, 'pelamar' => $pelamar, 'kriteria' => $kriteria, 'alternatif' => $pel]);
        } else if (Auth::user()->role == 'hrd') {
            $pelamar = Pelamar::find($id);
            $kriteria = Kriteria::where('id_lowongan', $pelamar->id_lowongan)->get();
            $bobot_kriteria = BobotKriteria::where('id_pelamar', $id)->join('hasil_tes', 'hasil_tes.id_bobot_kriteria', 'bobot_kriteria.id')->join('kriteria', 'kriteria.id', 'bobot_kriteria.id_kriteria')->get();

            $pel = NilaiAlternatif::join('bobot_kriteria', 'bobot_kriteria.id', '=', 'nilai_alternatif.id')
                ->join('kriteria', 'kriteria.id', '=', 'bobot_kriteria.id')
                ->where('nilai_alternatif.id', $id)
                ->get(['nama_bobot', 'nama_kriteria']);
            return view('perhitungan.detail', ['bobot_kriteria' => $bobot_kriteria, 'pelamar' => $pelamar, 'kriteria' => $kriteria, 'alternatif' => $pel]);
        } else {
            abort(404);
        }
    }

    public function laporan1($id)
    {

        $lowongan = lowongan::all();
        $lowonganGet = $id;
        // dd($lowonganGet);
        $namalowongan = lowongan::where('id', $id)->first();
        $kriteria = Kriteria::where('id', $id)->get();
        $alternatif = Pelamar::where('id', $id)->get();
        $kode_krit = [];
        foreach ($kriteria as $krit) {
            $kode_krit[$krit->id] = [];
            foreach ($alternatif as $al) {
                foreach ($al->bobot as $bobot) {
                    if ($bobot->kriteria->id == $krit->id) {
                        $kode_krit[$krit->id][] = $bobot->jumlah_bobot;
                    }
                }
            }

            if ($krit->atribut_kriteria == 'cost' && !empty($kode_krit[$krit->id])) {

                $kode_krit[$krit->id] = min($kode_krit[$krit->id]);
            } elseif ($krit->atribut_kriteria == 'benefit' && !empty($kode_krit[$krit->id])) {

                $kode_krit[$krit->id] = max($kode_krit[$krit->id]);
            } else {
                $kode_krit[$krit->id] = 1;
            }
        }

        //    return json_encode($kode_krit);
        // echo $kode_krit;
        // return view('laporan.seleksi1', [
        //     'kriteria'      => $kriteria,
        //     'alternatif'    => $alternatif,
        //     'kode_krit'     => $kode_krit,
        // ]);

        // dd($tes);
        $pdf = PDF::loadView('laporan.seleksi1', [
            'namalowongan'      => $namalowongan,
            'kriteria'      => $kriteria,
            'alternatif'    => $alternatif,
            'kode_krit'     => $kode_krit
        ]);

        return $pdf->download('Seleksi-tahap-satu.pdf');
    }

    public function laporan2($id)
    {
        $lowongan = lowongan::find($id);
        $daftarSoal = DaftarSoal::all();
        $daftarSoalGet = $daftarSoal[0]->id;
        $tes = HasilTes::all();

        foreach ($tes as $hasilTes) {
            if (HasilTes::all()->count() == null) {

                Alert::error('Maaf', 'Data belum ada');
                return redirect()->back();
            } else {
                // $hasilTes = HasilTes::select('id', 'bobot_soal', DB::raw('sum(nilai) as nilai'))
                //     ->join('daftar_soal', 'daftar_soal.id', '=', 'hasil_tes.id')
                //     ->where('hasil_tes.id', '=', $id)
                //     // ->where('hasil_tes.id', '=', $daftarSoalGet)
                //     ->groupBy('id', 'bobot_soal')
                //     ->get();

                // dd($lowonganGet);
                $kriteria = Kriteria::where('id', $id)->get();
                $alternatif = Pelamar::where('id', $id)->get();
                $kode_krit = [];
                foreach ($kriteria as $krit) {
                    $kode_krit[$krit->id] = [];
                    foreach ($alternatif as $al) {
                        foreach ($al->bobot as $bobot) {
                            if ($bobot->kriteria->id == $krit->id) {
                                $kode_krit[$krit->id][] = $bobot->jumlah_bobot;
                            }
                        }
                    }

                    if ($krit->atribut_kriteria == 'cost' && !empty($kode_krit[$krit->id])) {

                        $kode_krit[$krit->id] = min($kode_krit[$krit->id]);
                    } elseif ($krit->atribut_kriteria == 'benefit' && !empty($kode_krit[$krit->id])) {

                        $kode_krit[$krit->id] = max($kode_krit[$krit->id]);
                    } else {
                        $kode_krit[$krit->id] = 1;
                    }
                }

                $ar = [];
                $pelamar = Pelamar::all();
                foreach ($pelamar as $data) {
                    $nilai = HasilTes::select('id_soal_tes', DB::raw('sum(nilai * bobot_soal) as hasil'))
                        ->where('id_soal_tes', $data->id)
                        ->join('daftar_soal', 'daftar_soal.id', '=', 'hasil_tes.id_soal_tes')
                        ->where('hasil_tes.id_soal_tes', '=', $id)
                        ->groupBy('id_soal_tes')
                        ->get();


                    if ($nilai->isNotEmpty()) {
                        $nilai = $nilai->toArray();
                        $nilai = array_sum(array_column($nilai, 'hasil'));
                        $nilai = $nilai / 100;

                        $x['nama_pelamar'] = $data->nama_pelamar;
                        $x['alamat'] = $data->alamat;
                        $x['telepon'] = $data->no_telepon;
                        $x['status'] = $data->seleksi_dua;
                        $x['id'] = $data->id;
                        $x['berlaku_sampai'] = $data->berlaku_sampai;
                        $x['status_dokumen'] = $data->status_dokumen;

                        $x['nilaiAkhir'] = $nilai;
                        array_push($ar, $x);
                    }
                }
                if (empty($ar)) {
                    Alert::error('Maaf', 'Data belum ada');

                    return redirect()->back();
                }
                array_multisort(array_column($ar, 'nilaiAkhir'), SORT_DESC, $ar);

                $pdf = PDF::loadView('laporan.seleksi2', [

                    'daftarSoal'    => $daftarSoal,
                    'hasilTes'      => $ar,
                    'lowongan'      => $lowongan,
                    'kriteria'      => $kriteria,
                    'alternatif'    => $alternatif,
                    'kode_krit'     => $kode_krit
                ]);

                return $pdf->download('Laporan-Seleksi-dan-Rekrutmen.pdf');
            }
        }
        // dd($hasilTes);

        // $pdf = PDF::loadView('laporan.seleksi2', [
        //     'daftarSoal'    => $daftarSoal,
        //     'hasilTes'      => $hasilTes,
        //     'lowongan'      => $lowongan
        // ]);

    }
}
