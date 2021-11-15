<?php

namespace App\Http\Controllers;

use App\lowongan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LowonganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lowongan = lowongan::all();
        return view('lowongan.index', ['lowongan' => $lowongan]);
    }

    public function home(){

        $lowongan = lowongan::all();

        return view('lowongan.home', compact('lowongan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lowongan.tambah');
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
            'posisi' => 'required',
            'kuota' => "required",
            'berlaku' => "required",
            
        ]);

        if ($validator->fails()) {
            dd($validator->errors());
            return back()->withErrors($validator->errors());
        } else {
            $lowongan = new lowongan();
            $lowongan->posisi_lowongan = $request->get('posisi');
            $lowongan->kuota = $request->get('kuota');
            $lowongan->berlaku_sampai = $request->get('berlaku');
            $lowongan->keterangan= $request->get('deskripsi');
            $lowongan->save();
            return redirect()->route('lowongan.index');
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
        $lowongan = lowongan::find($id);
        return view('lowongan.edit',['lowongan' => $lowongan]);
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
            'posisi' => 'required',
            'kuota' => "required",
            'berlaku' => "required",
            'deskripsi' => "required",
            
        ]);

        if ($validator->fails()) {
            dd($validator->errors());
            return back()->withErrors($validator->errors());
        } else {
            $lowongan = lowongan::find($id);
            $lowongan->posisi_lowongan = $request->get('posisi');
            $lowongan->kuota = $request->get('kuota');
            $lowongan->berlaku_sampai = $request->get('berlaku');
            $lowongan->keterangan= $request->get('deskripsi');
            $lowongan->save();
            return redirect()->route('lowongan.index');
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
        $lowongan = Lowongan::find($id);
        $lowongan->delete();
        return redirect(route('lowongan.index'));
    }
}
