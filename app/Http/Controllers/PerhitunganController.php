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
        $lowongan = lowongan::find($id);
        $pelamar = Pelamar::where('id_lowongan', $id)->get();
        $pelamarAll = Pelamar::all();
        // dd($pelamarAll);
        $nilaiAlternatif = NilaiAlternatif::all();
        $kriteria = Kriteria::all();
        $bobotKriteria = BobotKriteria::all();
        
        $kode_krit = [];

        foreach ($kriteria as $krit)
        {
            $kode_krit[$krit->id_kriteria] = [];
            foreach ($pelamar as $plm)
            {
                foreach ($plm->bobot_kriteria as $bobot)
                {
                    if ($bobot->id_kriteria == $krit->id_kriteria)
                    {
                        // dd($bk->kriteria->atribut_kriteria);
                        $kode_krit[$krit->id_kriteria][] = $bobot->jumlah_bobot;
                    }
                }
            }
            
            if ($krit->atribut_kriteria == 'cost' && !empty($kode_krit[$krit->id_kriteria])){
                
                $kode_krit[$krit->id_kriteria] = min($kode_krit[$krit->id_kriteria]);
            } elseif ($krit->atribut_kriteria == 'benefit' && !empty($kode_krit[$krit->id_kriteria])){  

                $kode_krit[$krit->id_kriteria] = max($kode_krit[$krit->id_kriteria]);
            } else {

                $kode_krit[$krit->id_kriteria] = 1;
            }
        };
        
        // dd($kode_krit);
//        return json_encode($kode_krit);
        return view('perhitungan.index',[
            'kriteria'      => $kriteria,
            'bobotKriteria' => $bobotKriteria,
            'kode_krit'     => $kode_krit,
            'pelamar'       => $pelamar,
            'pelamarAll'    => $pelamarAll,
            'nilaiAlternatif' => $nilaiAlternatif
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
