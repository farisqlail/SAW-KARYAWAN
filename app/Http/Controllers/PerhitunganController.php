<?php

namespace App\Http\Controllers;

use App\BobotKriteria;
use App\Kriteria;
use App\NilaiAlternatif;
use Illuminate\Http\Request;

class PerhitunganController extends Controller
{
    public function index()
    {
        $nilaiAlternatif = NilaiAlternatif::all();
        $kriteria = Kriteria::all();
        $bobotKriteria = BobotKriteria::all();
        $kode_krit = [];
        foreach ($kriteria as $krit)
        {
            $kode_krit[$krit->id] = [];
            foreach ($bobotKriteria as $bk)
            {
                // dd($bk->jumlah_bobot);
                // foreach ($bk->jumlah_bobot as $bobot)
                // {
                    if ($bk->kriteria->id == $krit->id)
                    {
                        $kode_krit[$krit->id][] = $bk->jumlah_bobot;
                    }
                // }
            }

            if ($krit->atribut == 'cost')
            {
                $kode_krit[$krit->id] = min($kode_krit[$krit->id]);
            } elseif ($krit->atribut == 'benefit')
            {
                $kode_krit[$krit->id] = max($kode_krit[$krit->id]);
            }
        };

        // dd($bobotKriteria);
//        return json_encode($kode_krit);
        return view('perhitungan.index',[
            'kriteria'      => $kriteria,
            'bobotKriteria' => $bobotKriteria,
            'kode_krit'     => $kode_krit,
            'nilaiAlternatif' => $nilaiAlternatif
        ]);
    }
}
