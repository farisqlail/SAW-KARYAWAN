<?php

namespace App\Http\Controllers;

use App\BobotKriteria;
use App\Kriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\lowongan;
use App\Pelamar;
use App\NilaiAlternatif;


class PelamarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pelamar = Pelamar::all();

        return view('pelamar.index', ['pelamar' => $pelamar]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $lowongan = lowongan::find($id);
        $kriteria = DB::table('kriteria')
        ->where('id_lowongan', '=', $id)
        ->get();
        $bobot_kriteria= BobotKriteria::all();

        return view('pelamar.create', ['lowongan' => $lowongan, 'kriteria' => $kriteria,'bobot_kriteria'=>$bobot_kriteria]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Alert::success('Berhasil Melamar', 'Tunggu informasi berikutnya!');
        
        $validator = Validator::make(request()->all(), [
            'nama_pelamar' => 'required',
            'tanggal_lahir' => 'required',
            'no_telepon' => 'required',
            'jenis_kelamin' => 'required',
            'cv' => 'required|mimes:pdf|max:3024',
            'ijazah' => 'required|mimes:pdf|max:3024',
            'pas_foto' => 'required|mimes:jpeg,png,jpg|max:1024',
        ]);

        if ($validator->fails()) {
            dd($validator->errors());
            return back()->withErrors($validator->errors());
        } else {

            $pelamar = new Pelamar();

            $pelamar->id_lowongan = $request->get('id_lowongan');
            $pelamar->id_user = $request->get('id_user');
            $pelamar->id_bobot_kriteria = $request->get('id_bobot_kriteria');
            // $pelamar->id_bobot_kriteria = $request->get('id_bobot_kriteria');
            $pelamar->nama_pelamar = $request->get('nama_pelamar');
            $pelamar->tanggal_lahir = $request->get('tanggal_lahir');
            $pelamar->no_telepon = $request->get('no_telepon');
            $pelamar->jenis_kelamin = $request->get('jenis_kelamin');
            if ($request->hasFile('cv')) {
                $file = $request->file('cv');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $pelamar->cv = $filename;
                Storage::putFileAs("public/file/cv", $file, $filename);
            }
            if ($request->hasFile('ijazah')) {
                $file = $request->file('ijazah');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $pelamar->ijazah = $filename;
                Storage::putFileAs("public/file/ijazah", $file, $filename);
            }
            if ($request->hasFile('pas_foto')) {
                $file = $request->file('pas_foto');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $pelamar->pas_foto = $filename;
                Storage::putFileAs("public/images/pas_foto", $file, $filename);
            }
            
            $pelamar->save();

            $bobot_kriteria= BobotKriteria::all();
            
            $kriteria = DB::table('kriteria')
            ->where('id_lowongan', '=', $request->get('id_lowongan'))
            ->get();
            foreach($kriteria as $kriteria){
                $nilai_alternatif = new NilaiAlternatif();
                $nilai_alternatif->id_pelamar=$pelamar->id_pelamar;
                $nilai_alternatif->id_bobot_kriteria=$request->get($kriteria->id_kriteria);
                $nilai_alternatif->save();
            }

            return redirect()->route('lowongan.home');
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
        $pelamar = Pelamar::find($id);
        $pelamar->delete();
        return redirect(route('pelamar.index'));
    }
}