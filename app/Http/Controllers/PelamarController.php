<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\lowongan;
use App\Pelamar;
use Illuminate\Support\Facades\Auth;

class PelamarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lowongan = lowongan::all();

        return view('pelamar.create', compact('lowongan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        // 'nama_pelamar',
        // 'tanggal_lahir',
        // 'no_telepon',
        // 'jenis_kelamin',
        // 'cv',
        // 'ijazah',
        // 'pas_foto',
        // 'status_lamaran',
        // 'id_user',
        // 'id_lowongan'

        $validator = Validator::make(request()->all(), [
            'nama_pelamar' => 'required',
            'tanggal_lahir' => 'required',
            'no_telepon' => 'required',
            'jenis_kelamin' => 'required',
            'cv' => 'required',
            'ijazah' => 'required',
            'pas_foto' => 'requires',
        ]);

        if ($validator->fails()) {
            dd($validator->errors());
            return back()->withErrors($validator->errors());
        } else {
            $pelamar = new Pelamar();

            $pelamar->id_lowongan = $request->get('id_lowongan');
            $pelamar->id_user = $request->get(Auth::id());
            $pelamar->nama_pelamar = $request->get('nama_pelamar');
            $pelamar->tanggal_lahir = $request->get('tanggal_lahor');
            $pelamar->no_telepon = $request->get('no_telepon');
            $pelamar->jenis_kelamin = $request->get('jenis_kelamin');
            $pelamar->cv = $request->get('cv');
            $pelamar->ijazah = $request->get('ijazah');
            $pelamar->pas_foto = $request->get('pas_foto');

            $pelamar->save();

            return redirect()->route('home');
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
        //
    }
}
