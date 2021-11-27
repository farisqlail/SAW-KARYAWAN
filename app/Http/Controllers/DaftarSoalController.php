<?php

namespace App\Http\Controllers;

use App\DaftarSoal;
use App\JadwalTes;
use App\lowongan;
use App\Pelamar;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class DaftarSoalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $jadwaltes=JadwalTes::find($id);
        $daftarsoal = DaftarSoal::where('id_jadwal_tes',$id)->get();
        return view('daftar_soal.index', ['daftarsoal' => $daftarsoal,'jadwaltes'=>$jadwaltes]);
    }

    public function home($id){

        $pelamar = Pelamar::find($id);
        $pelamarGet = Pelamar::where('id_lowongan', $id)->get(); 
        // dd($pelamarGet);
        $jadwaltes = JadwalTes::find($pelamarGet);
        $daftarSoal = DaftarSoal::where('id_jadwal_tes', $pelamarGet)->get();

        dd($jadwaltes);

        return view('daftar_soal.home', ['daftarSoal' => $daftarSoal,'pelamar'=>$pelamar, 'pelamarGet' => $pelamarGet, 'jadwal_tes' => $jadwaltes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $jadwaltes=JadwalTes::find($id);
        return view('daftar_soal.tambah',['jadwaltes'=>$jadwaltes]);
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
            'soal' => 'required',
            'bobot' => "required",
            'file_soal' => "required",
        ]);

        if ($validator->fails()) {
            dd($validator->errors());
            return back()->withErrors($validator->errors());
        } else {
            $daftar_soal = new DaftarSoal();
            $daftar_soal->id_jadwal_tes = $request->get('id_jadwal_tes');
            $daftar_soal->soal = $request->get('soal');
            $daftar_soal->bobot_soal = $request->get('bobot');
            if($request->file('file_soal')){
                $file = $request->file('file_soal');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $daftar_soal->file_soal  = $filename;
                $tujuan_upload = 'upload';
                $file->move($tujuan_upload, $filename);
            }
            }
            $daftar_soal->save();
            return redirect()->route('daftar_soal.index',['id' => $daftar_soal->id_jadwal_tes]);
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
        $daftar_soal = DaftarSoal::find($id);
        return view('daftar_soal.edit',['daftar_soal' => $daftar_soal]);
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
            'soal' => 'required',
            'bobot' => "required",
            
        ]);

        if ($validator->fails()) {
            dd($validator->errors());
            return back()->withErrors($validator->errors());
        } else {
            $daftar_soal = DaftarSoal::find($id);
            $daftar_soal->soal = $request->get('soal');
            $daftar_soal->bobot_soal = $request->get('bobot');
            if($request->file('file_soal')){
                $file = $request->file('file_soal');
                $tujuan_upload='upload';
                File::delete('upload/'.$daftar_soal->file_soal);
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $daftar_soal->file_soal  = $filename;
                $file->move($tujuan_upload, $filename);
            }
            }
            $daftar_soal->save();
            return redirect()->route('daftar_soal.index',['id' => $daftar_soal->id_jadwal_tes]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $daftar_soal = DaftarSoal::find($id);
        $daftar_soal->delete();
        File::delete('upload/'.$daftar_soal->file_soal);
        return redirect()->route('daftar_soal.index',['id' => $daftar_soal->id_jadwal_tes]);
    }
}
