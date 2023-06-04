<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pelamar;
use App\lowongan;
use Illuminate\Support\Facades\Auth;
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

        $arr = [];

        for ($i = date('Y'); $i <= date('Y') + 1; $i++) {
            $arr[] = $i;
        }


        if (Auth::user()->role == 'admin') {
            $pelamarv = Pelamar::whereNull('status_dokumen')->count();
            $pelamar = Pelamar::where('status_dokumen', 'Dokumen Valid')->whereNull('seleksi_satu')->count();
            $pelamars2 = Pelamar::where('seleksi_satu', 'Diterima')->wherenull('seleksi_dua')->count();
            $lowonganBerlaku = Lowongan::where('berlaku_sampai', '>=', \Carbon\Carbon::now())->count();
            $lowonganBerakhir = Lowongan::where('berlaku_sampai', '<', \Carbon\Carbon::now())->count();

            $riwayat = lowongan::withCount('pelamar')
                ->orderBy('created_at', 'asc')
                ->orderBy('posisi_lowongan')
                ->get();

            $a = [];
            foreach ($riwayat as $data) {
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
                'pelamarv'          => $pelamarv,
                'pelamar'           => $pelamar,
                'pelamars2'         => $pelamars2,
                'lowonganBerlaku'   => $lowonganBerlaku,
                'lowonganBerakhir'  => $lowonganBerakhir,
                'riwayat'           => $riwayat,
                'jumlah'            => $jumlah,
                'a'                 => $a,
                'tahun' => $arr
            ]);
        } else if (Auth::user()->role == 'direksi') {
            $pelamarv = Pelamar::whereNull('status_dokumen')->count();
            $pelamar = Pelamar::where('status_dokumen', 'Dokumen Valid')->whereNull('seleksi_satu')->count();
            $pelamars2 = Pelamar::where('seleksi_satu', 'Diterima')->wherenull('seleksi_dua')->count();
            $lowonganBerlaku = Lowongan::where('berlaku_sampai', '>=', \Carbon\Carbon::now())->count();
            $lowonganBerakhir = Lowongan::where('berlaku_sampai', '<', \Carbon\Carbon::now())->count();

            $riwayat = lowongan::withCount('pelamar')
                ->orderBy('created_at', 'asc')
                ->orderBy('posisi_lowongan')
                ->get();

            $a = [];
            foreach ($riwayat as $data) {
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
                'pelamarv'          => $pelamarv,
                'pelamar'           => $pelamar,
                'pelamars2'         => $pelamars2,
                'lowonganBerlaku'   => $lowonganBerlaku,
                'lowonganBerakhir'  => $lowonganBerakhir,
                'riwayat'           => $riwayat,
                'jumlah'            => $jumlah,
                'a'                 => $a,
                'tahun' => $arr
            ]);
        } else if (Auth::user()->role == 'hrd') {
            $pelamarv = Pelamar::whereNull('status_dokumen')->count();
            $pelamar = Pelamar::where('status_dokumen', 'Dokumen Valid')->whereNull('seleksi_satu')->count();
            $pelamars2 = Pelamar::where('seleksi_satu', 'Diterima')->wherenull('seleksi_dua')->count();
            $lowonganBerlaku = Lowongan::where('berlaku_sampai', '>=', \Carbon\Carbon::now())->count();
            $lowonganBerakhir = Lowongan::where('berlaku_sampai', '<', \Carbon\Carbon::now())->count();

            $riwayat = lowongan::withCount('pelamar')
                ->orderBy('created_at', 'asc')
                ->orderBy('posisi_lowongan')
                ->get();

            $a = [];
            foreach ($riwayat as $data) {
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
                'pelamarv'          => $pelamarv,
                'pelamar'           => $pelamar,
                'pelamars2'         => $pelamars2,
                'lowonganBerlaku'   => $lowonganBerlaku,
                'lowonganBerakhir'  => $lowonganBerakhir,
                'riwayat'           => $riwayat,
                'jumlah'            => $jumlah,
                'a'                 => $a,
                'tahun' => $arr
            ]);
        } else if (Auth::user()->role == 'divisi') {
            $pelamarv = Pelamar::whereNull('status_dokumen')->count();
            $pelamar = Pelamar::where('status_dokumen', 'Dokumen Valid')->whereNull('seleksi_satu')->count();
            $pelamars2 = Pelamar::where('seleksi_satu', 'Diterima')->wherenull('seleksi_dua')->count();
            $lowonganBerlaku = Lowongan::where('berlaku_sampai', '>=', \Carbon\Carbon::now())->count();
            $lowonganBerakhir = Lowongan::where('berlaku_sampai', '<', \Carbon\Carbon::now())->count();

            $riwayat = lowongan::withCount('pelamar')
                ->orderBy('created_at', 'asc')
                ->orderBy('posisi_lowongan')
                ->get();

            $a = [];
            foreach ($riwayat as $data) {
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
                'pelamarv'          => $pelamarv,
                'pelamar'           => $pelamar,
                'pelamars2'         => $pelamars2,
                'lowonganBerlaku'   => $lowonganBerlaku,
                'lowonganBerakhir'  => $lowonganBerakhir,
                'riwayat'           => $riwayat,
                'jumlah'            => $jumlah,
                'a'                 => $a,
                'tahun' => $arr
            ]);
        } else {
            abort(404);
        }
    }


    public function chartPelamar(Request $request)
    {
        if ($request->ajax()) {

            $periode_awal = $request->get('periode_awal');

            $periode_akhir = $request->get('periode_akhir');

            $pelamar = Pelamar::selectRaw('year(created_at) name, count(*) y')
                ->whereYear('created_at','>=', $periode_awal)
                ->whereYear('created_at','<=', $periode_akhir)
                ->groupBy('name')
                ->orderBy('name', 'desc')
                ->get();

            return response()->json(['status' => true, 'data' => $pelamar]);
        }
    }
}
