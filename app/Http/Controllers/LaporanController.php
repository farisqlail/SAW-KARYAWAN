<?php

namespace App\Http\Controllers;

use App\lowongan;
use App\Pelamar;
use Illuminate\Http\Request;
use PDF;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $periode_awal = $request->get('periode_awal');

        $periode_akhir = $request->get('periode_akhir');

        $lowongan = $request->get('lowongan');

        $kategori = $request->get('kategori');

        $status = $request->get('status');

        $pelamar = [];

        if ($periode_akhir && $periode_awal && $lowongan && $kategori) {

            $pelamar = Pelamar::query();

            if ($kategori == 'seleksi 1') {
                $pelamar->where('status_dokumen', 'Dokumen Valid');
            } elseif ($kategori == 'seleksi 2') {
                $pelamar->where('seleksi_dua', 'Diterima');
            } else {
                $pelamar->where('status_wawancara', 'Diterima');
            }

            $pelamar = $pelamar->where('id_lowongan', $lowongan)->whereHas('lowongan', function ($q) use ($periode_awal, $periode_akhir) {
                return $q->whereDate('berlaku_sampai', '>=', $periode_awal)->whereDate('berlaku_sampai', '<=', $periode_akhir);
            })->get();
        }


        if ($status == 'cetak') {

            $lowongan = lowongan::findOrFail($lowongan);

            $pdf = PDF::loadview('laporan.pdf', [
                'pelamar' => $pelamar,
                'periode_awal' => $periode_awal,
                'periode_akhir' => $periode_akhir,
                'kategori' => $kategori,
                'lowongan' => $lowongan->posisi_lowongan
            ]);
            
            return $pdf->stream('laporan-pelamar-pdf');
        }

        $lowongan = lowongan::all();

        return view('laporan.index', ['lowongan' => $lowongan, 'pelamar' => $pelamar]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
}
