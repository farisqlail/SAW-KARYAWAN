<?php

namespace App\Http\Controllers;

use App\BobotKriteria;
use App\Kriteria;
use Illuminate\Http\Request;

class PerhitunganController extends Controller
{
    public function index()
    {
        $kriteria = Kriteria::all();
        $bobotKriteria = BobotKriteria::all();
        $kode_krit = [];
        foreach ($kriteria as $krit)
        {
            $kode_krit[$krit->id] = [];
            foreach ($bobotKriteria as $bk)
            {
                foreach ($bk->crip as $crip)
                {
                        if ($crip->kriteria->id == $krit->id)
                        {
                            $kode_krit[$krit->id][] = $crip->nilai_crip;
                        }
                }
            }

            if ($krit->atribut == 'cost')
            {
                $kode_krit[$krit->id] = min($kode_krit[$krit->id]);
            } elseif ($krit->atribut == 'benefit')
            {
                $kode_krit[$krit->id] = max($kode_krit[$krit->id]);
            }
        };
//        return json_encode($kode_krit);
        return view('perhitungan.index',[
            'kriteria'      => $kriteria,
            'bobotKriteria' => $bobotKriteria,
            'kode_krit'     => $kode_krit
        ]);
    }
}
