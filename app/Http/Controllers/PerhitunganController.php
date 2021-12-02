<?php

namespace App\Http\Controllers;

use App\BobotKriteria;
use App\Kriteria;
use App\NilaiAlternatif;
use App\Lowongan;
use App\Pelamar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PerhitunganController extends Controller
{
    public function index($id)
    {
        $kriteria = Kriteria::all();
        $alternatif = Pelamar::all();
        $kode_krit = [];
        foreach ($kriteria as $krit)
        {
            $kode_krit[$krit->id_kriteria] = [];
            foreach ($alternatif as $al)
            {
                foreach ($al->bobot as $bobot)
                {
                        if ($bobot->kriteria->id_kriteria == $krit->id_kriteria)
                        {
                            $kode_krit[$krit->id_kriteria][] = $bobot->jumlah_bobot;
                        }
                }
            }

            if ($krit->atribut_kriteria == 'cost')
            {
                $kode_krit[$krit->id_kriteria] = min($kode_krit[$krit->id_kriteria]);
           
            } elseif ($krit->atribut_kriteria == 'benefit')
            {
                $kode_krit[$krit->id_kriteria] = max($kode_krit[$krit->id_kriteria]);
               
            }
        };
//        return json_encode($kode_krit);
        return view('perhitungan.index',[
            'kriteria'      => $kriteria,
            'alternatif'    => $alternatif,
            'kode_krit'     => $kode_krit
        ]);
    }

    public function lowongan(){

        $lowongan = lowongan::all();
        return view('perhitungan.lowongan', ['lowongan' => $lowongan]);
    }

    public function detail($id){

        $pelamar = Pelamar::find($id);

        return view('perhitungan.detail', ['pelamar' => $pelamar]);
    }
}
