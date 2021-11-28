<?php

namespace App\Http\Controllers;

use App\DaftarSoal;
use App\HasilTes;
use App\JadwalTes;
use App\lowongan;
use App\Pelamar;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JadwalTesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jadwal_tes = DB::table('jadwal_tes')
            ->join('lowongan', 'lowongan.id_lowongan', '=', 'jadwal_tes.id_lowongan')->get();
        return view('jadwal_tes.index', ['jadwal_tes' => $jadwal_tes]);
    }

    public function home(){

        $pelamar = Pelamar::all();
        $jadwal_tes = DB::table('jadwal_tes')
        ->join('lowongan', 'lowongan.id_lowongan', '=', 'jadwal_tes.id_lowongan')->get();

        return view('jadwal_tes.home', ['jadwal_tes' => $jadwal_tes, 'pelamar' => $pelamar]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $daftarsoal = DaftarSoal::all();
        $lowongan = lowongan::all();

        $daftarsoaltes = HasilTes::all();
        return view('jadwal_tes.tambah', ['lowongan' => $lowongan, 'daftarsoal' => $daftarsoal, 'daftarsoaltes' => $daftarsoaltes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            'id_lowongan' => 'required',
            'tanggal' => "required",
            'batas' => "required",

        ]);

        if ($validator->fails()) {
            dd($validator->errors());
            return back()->withErrors($validator->errors());
        } else {
            $jadwal_tes = new JadwalTes();
            $jadwal_tes->id_lowongan = $request->get('id_lowongan');
            $jadwal_tes->tanggal = $request->get('tanggal');
            $jadwal_tes->durasi_tes = $request->get('batas');
            $jadwal_tes->save();
            return redirect()->route('jadwal_tes.index');
        }
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
        $jadwal_tes = DB::table('jadwal_tes')
            ->join('lowongan', 'lowongan.id_lowongan', '=', 'jadwal_tes.id_lowongan')
            ->where('id_jadwal_tes', $id)
            ->first();
        $lowongan = lowongan::all();
        return view('jadwal_tes.edit', ['jadwal_tes' => $jadwal_tes, 'lowongan' => $lowongan]);
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
        $validator = Validator::make(request()->all(), [
            'id_lowongan' => 'required',
            'tanggal' => "required",
            'batas' => "required",

        ]);

        if ($validator->fails()) {
            dd($validator->errors());
            return back()->withErrors($validator->errors());
        } else {
            $jadwal_tes = JadwalTes::find($id);
            $jadwal_tes->id_lowongan = $request->get('id_lowongan');
            $jadwal_tes->tanggal = $request->get('tanggal');
            $jadwal_tes->durasi_tes = $request->get('batas');
            $jadwal_tes->save();
            return redirect()->route('jadwal_tes.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jadwal_tes = JadwalTes::find($id);
        $jadwal_tes->delete();
        return redirect(route('jadwal_tes.index'));
    }
}
