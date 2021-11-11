<?php

namespace App\Http\Controllers;

use App\DaftarSoal;
use App\HasilTes;
use App\JadwalTes;
use App\lowongan;
use App\SoalTes;
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
    public function pilihsoal($id)
    {
        $jadwal_tes = JadwalTes::find($id);
        $daftarsoal = DB::table('daftar_soal')
            ->get();
        $soaltes = DB::table('soal_tes')
            ->join('daftar_soal', 'soal_tes.id_soal', '=', 'daftar_soal.id_soal')
            ->get();
        return view('jadwal_tes.pilihsoal', ['jadwaltes' => $jadwal_tes, 'daftarsoal' => $daftarsoal, 'soaltes' => $soaltes]);
    }
    public function simpansoal(Request $request, $id)
    {
        $daftarsoaltes = new SoalTes();
        $daftarsoaltes->id_jadwal_tes = $request->get('id_jadwal_tes');
        $daftarsoaltes->id_soal = $request->get('id_soal');
        $daftarsoaltes->save();

        $jadwal_tes = JadwalTes::find($id);
        $daftarsoal = DB::table('daftar_soal')
            ->leftJoin('soal_tes', 'daftar_soal.id_soal', '=', 'soal_tes.id_soal')
            ->get();
        $soaltes = DB::table('soal_tes')
            ->join('daftar_soal', 'soal_tes.id_soal', '=', 'daftar_soal.id_soal')
            ->get();
            return redirect()->route('jadwal_tes.pilihsoal', ['jadwaltes' => $jadwal_tes, 'daftarsoal' => $daftarsoal, 'soaltes' => $soaltes]);
    }

    public function hapussoal(Request $request,$id)
    {
        $soal_teshapus = DB::table('soal_tes')
        ->where('id_soal_tes', '=', $request->get('id_soal_tes'))
        ->delete();
        
        $jadwal_tes = JadwalTes::find($id);
        $daftarsoal = DB::table('daftar_soal')
            ->leftJoin('soal_tes', 'daftar_soal.id_soal', '=', 'soal_tes.id_soal')
            ->get();
        $soaltes = DB::table('soal_tes')
            ->join('daftar_soal', 'soal_tes.id_soal', '=', 'daftar_soal.id_soal')
            ->get();
            return redirect()->route('jadwal_tes.pilihsoal', ['jadwaltes' => $jadwal_tes, 'daftarsoal' => $daftarsoal, 'soaltes' => $soaltes]);
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
