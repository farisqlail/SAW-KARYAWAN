<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pelamar;
use App\lowongan;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pelamar = Pelamar::whereNull('seleksi_satu')->count();
        $pelamars2 = Pelamar::where('seleksi_satu','Diterima')->wherenull('seleksi_dua')->count();
        $lowongan = Lowongan::all();

        if ($lowongan[0]->berlaku_sampai = \Carbon\Carbon::now()) {
            // dd($lowongan);
            $count = $lowongan->count();
            (int)$lowonganBerlaku = $count;
            (int)$lowonganBerakhir = 0;

        } elseif($lowongan[0]->berlaku_sampai >= \Carbon\Carbon::now()) {

            $count = $lowongan->count();
            dd($lowongan);
            (int)$lowonganBerlaku = $count - $count;
            (int)$lowonganBerakhir = $lowonganBerlaku + 1;

        } else {
            (int)$lowonganBerlaku = 0;
            (int)$lowonganBerakhir = 0;
        }
        
        // $lowonganBerakhir = Lowongan::where('berlaku_sampai', '>=', \Carbon\Carbon::now())->count();

        $riwayat = lowongan::withCount('pelamar')
            ->orderBy('posisi_lowongan')
            ->get();
           
            $a = [];
            foreach($riwayat as $data){
                $x['date'] = $data->berlaku_sampai;
                $x['name'] = $data->posisi_lowongan;
                $x['y'] = $data->pelamar_count;
                

                array_push($a, $x);
            }
            // dd($a);
        $jumlah = lowongan::withCount('pelamar')
            ->orderBy('posisi_lowongan')
            ->pluck('pelamar_count');
        // dd($riwayat);


        return view('home', [
            'pelamar'           => $pelamar,
            'pelamars2'         => $pelamars2,
            'lowonganBerlaku'   => $lowonganBerlaku,
            'lowonganBerakhir'  => $lowonganBerakhir,
            'riwayat'           => $riwayat,
            'jumlah'            => $jumlah,
            'a'                 => $a
        ]);
    }
}
