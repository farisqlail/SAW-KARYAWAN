<?php

namespace App\Http\Controllers;

use App\BobotKriteria;
use App\Kriteria;
use App\NilaiAlternatif;
use App\Lowongan;
use App\Pelamar;
use Illuminate\Http\Request;

class PerhitunganController extends Controller
{
    public function index()
    {
        $nilaiAlternatif = NilaiAlternatif::all();
        $kriteria = Kriteria::all();
        $bobotKriteria = BobotKriteria::all();
        $pelamar = Pelamar::all();
        $kode_krit = [];
        foreach ($kriteria as $krit)
        {
            $kode_krit[$krit->id_kriteria] = [];
            foreach ($bobotKriteria as $bk)
            {
                // dd($bk->jumlah_bobot);
                // foreach ($bk->jumlah_bobot as $bobot)
                // {
                    if ($bk->kriteria->id_kriteria == $krit->id_kriteria)
                    {
                        $kode_krit[$krit->id_kriteria][] = $bk->jumlah_bobot;
                    }
                // }

                // foreach ($pelamar as $plm)
                // {
                //     // dd($bk->jumlah_bobot);
                //     foreach ($plm->jumlah_bobot as $bobot)
                //     {
                //         if ($bobot->kriteria->id_kriteria == $krit->id_kriteria)
                //         {
                //             $kode_krit[$krit->id_kriteria][] = $bobot->jumlah_bobot;
                //         }
                //     }
                // }
            }

            if ($krit->atribut_kriteria == 'cost')
            {
                $kode_krit[$krit->id_kriteria] = min($kode_krit[$krit->id_kriteria]);
            } elseif ($krit->atribut_kriteria == 'benefit')
            {
                $kode_krit[$krit->id_kriteria] = max($kode_krit[$krit->id_kriteria]);
            }
        };

        // dd($bobotKriteria);
//        return json_encode($kode_krit);
        return view('perhitungan.index',[
            'kriteria'      => $kriteria,
            'bobotKriteria' => $bobotKriteria,
            'kode_krit'     => $kode_krit,
            'pelamar'       => $pelamar,
            'nilaiAlternatif' => $nilaiAlternatif
        ]);
    }

    public function lowongan(){

        $lowongan = lowongan::all();
        return view('perhitungan.lowongan', ['lowongan' => $lowongan]);
    }
}
