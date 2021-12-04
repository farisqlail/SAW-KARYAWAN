<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\BobotKriteria;
use App\Kriteria;


class BobotKriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $kriteria = Kriteria::find($id);
        $datakriteria=Kriteria::where('id_kriteria',$id)->first();
        $data = BobotKriteria::where('id_kriteria',$id)->get();
        
        return view('bobot_kriteria.index',['bobot_kriteria' => $data,'kriteria'=>$kriteria,'datakriteria'=>$datakriteria]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $kriteria = Kriteria::find($id);

        return view('bobot_kriteria.tambah',['kriteria' => $kriteria]);
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
            'id_kriteria' => 'required',
            'keterangan_bobot' => "required",
            'nilai_bobot' => "required",
            
        ]);

        if ($validator->fails()) {
            
            dd($validator->errors());
            return back()->withErrors($validator->errors());
        } else {

            Alert::success('Berhasil', 'Berhasil menambah bobot kriteria');

            $bobot_kriteria = new BobotKriteria();
            $bobot_kriteria->id_kriteria = $request->get('id_kriteria');
            $bobot_kriteria->nama_bobot = $request->get('keterangan_bobot');
            $bobot_kriteria->jumlah_bobot = $request->get('nilai_bobot');
            $bobot_kriteria->save();
            return redirect()->route('bobot_kriteria.index',['id' => $bobot_kriteria->id_kriteria]);
        }
        // return redirect(route('bobot_kriteria'));
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
        $bobot = BobotKriteria::find($id);

        return view('bobot_kriteria.edit',['bobot' => $bobot]);
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
            'id_kriteria' => 'required',
            'keterangan_bobot' => "required",
            'nilai_bobot' => "required",
            
        ]);

        if ($validator->fails()) {
            dd($validator->errors());
            return back()->withErrors($validator->errors());
        } else {
            Alert::success('Berhasil', 'Berhasil mengubah bobot kriteria');

            $bobot_kriteria = BobotKriteria::find($id);

            $bobot_kriteria->id_kriteria = $request->get('id_kriteria');
            $bobot_kriteria->nama_bobot = $request->get('keterangan_bobot');
            $bobot_kriteria->jumlah_bobot = $request->get('nilai_bobot');

            $bobot_kriteria->save();

            return redirect()->route('bobot_kriteria.index',['id' => $bobot_kriteria->id_kriteria]);
        }
        // return redirect(route('bobot_kriteria'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bobot_kriteria = BobotKriteria::find($id);
        $bobot_kriteria->delete();
        return redirect()->route('bobot_kriteria.index',['id' => $bobot_kriteria->id_kriteria]);
    }
}
