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
        $lowongan = Lowongan::where('berlaku_sampai', '>=', \Carbon\Carbon::now())->count();
        $pelamarDua = Pelamar::whereNotNull('seleksi_satu')->whereNotNull('seleksi_dua')->count();

        $riwayat = Pelamar::all()->groupBy('id_lowongan');
        // dd($riwayat);
        foreach ($riwayat as $data) {
            // dd($data->lowongan->posisi_lowongan);
            dd($data[0]->count());
        }

        return view('home', [
            'pelamar'       => $pelamar,
            'lowongan'      => $lowongan,
            'pelamarDua'    => $pelamarDua
        ]);
    }
}
