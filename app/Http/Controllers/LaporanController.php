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

        $periode = $request->get('periode');

        $status = $request->get('status');

        if ($periode) {
            $pelamar = Pelamar::join('lowongan', 'pelamar.id_lowongan', '=', 'lowongan.id')
                      ->where('lowongan.periode', $periode)
                      ->where('pelamar.seleksi_dua', 'Diterima')
                      ->orderBy('pelamar.rangked', 'asc')
                      ->get();

            if ($status == 'cetak') {
    
                // $lowongan = lowongan::findOrFail($lowongan);
    
                $pdf = PDF::loadview('laporan.pdf', [
                    'pelamar' => $pelamar,
                    'periode' => $periode
                ]);
    
                return $pdf->stream('laporan-pelamar-pdf');
            }
    
            $lowongan = lowongan::all();
    
            return view('laporan.index', ['lowongan' => $lowongan, 'pelamar' => $pelamar, 'periode' => $periode]);
        }

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
