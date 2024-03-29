<?php

namespace App\Http\Controllers;

use App\BobotKriteria;
use App\Kriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class BobotKriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        if (Auth::user()->role == 'admin') {
            $kriteria = Kriteria::find($id);
            $datakriteria = Kriteria::where('id', $id)->first();
            $data = BobotKriteria::where('id_kriteria', $id)->get();
            // dd($data);
            return view('bobot_kriteria.index', ['bobot_kriteria' => $data, 'kriteria' => $kriteria, 'datakriteria' => $datakriteria]);
        } else if (Auth::user()->role == 'direksi') {
            $kriteria = Kriteria::find($id);
            $datakriteria = Kriteria::where('id', $id)->first();
            $data = BobotKriteria::where('id_kriteria', $id)->get();
            // dd($data);
            return view('bobot_kriteria.index', ['bobot_kriteria' => $data, 'kriteria' => $kriteria, 'datakriteria' => $datakriteria]);
        } else if (Auth::user()->role == 'hrd') {
            $kriteria = Kriteria::find($id);
            $datakriteria = Kriteria::where('id', $id)->first();
            $data = BobotKriteria::where('id_kriteria', $id)->get();
            // dd($data);
            return view('bobot_kriteria.index', ['bobot_kriteria' => $data, 'kriteria' => $kriteria, 'datakriteria' => $datakriteria]);
        } else if (Auth::user()->role == 'divisi') {
            $kriteria = Kriteria::find($id);
            $datakriteria = Kriteria::where('id', $id)->first();
            $data = BobotKriteria::where('id_kriteria', $id)->get();
            // dd($data);
            return view('bobot_kriteria.index', ['bobot_kriteria' => $data, 'kriteria' => $kriteria, 'datakriteria' => $datakriteria]);
        } else {
            abort(404);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        if (Auth::user()->role == 'admin') {
            $kriteria = Kriteria::find($id);
            return view('bobot_kriteria.tambah', ['kriteria' => $kriteria]);
        } else if (Auth::user()->role == 'direksi') {
            $kriteria = Kriteria::find($id);
            return view('bobot_kriteria.tambah', ['kriteria' => $kriteria]);
        } else if (Auth::user()->role == 'hrd') {
            $kriteria = Kriteria::find($id);
            return view('bobot_kriteria.tambah', ['kriteria' => $kriteria]);
        } else if (Auth::user()->role == 'divisi') {
            $kriteria = Kriteria::find($id);
            return view('bobot_kriteria.tambah', ['kriteria' => $kriteria]);
        } else {
            abort(404);
        }
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
            'keterangan_bobot' => "required",
            'jumlah_bobot' => "required|integer",
            'nilai_awal' => "required|min:0|numeric",
            'nilai_akhir' => "required|gt:nilai_awal|numeric",
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors());
        } else {
            Alert::success('Berhasil', 'Data bobot kriteria berhasil ditambahkan');

            $bobot_kriteria = new BobotKriteria();
            $bobot_kriteria->id_kriteria = $request->get('id_kriteria');
            $bobot_kriteria->nama_bobot = $request->get('keterangan_bobot');
            $bobot_kriteria->jumlah_bobot = $request->get('jumlah_bobot');
            $bobot_kriteria->nilai_awal = $request->get('nilai_awal');
            $bobot_kriteria->nilai_akhir = $request->get('nilai_akhir');
            $bobot_kriteria->save();
            return redirect()->route('bobot_kriteria.index', ['id' => $bobot_kriteria->id_kriteria]);
        }
        return redirect()->route('bobot_kriteria');
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
        if (Auth::user()->role == 'admin') {
            $bobot_kriteria = BobotKriteria::find($id);
            return view('bobot_kriteria.edit', ['data' => $bobot_kriteria]);
        } else if (Auth::user()->role == 'direksi') {
            $bobot_kriteria = BobotKriteria::find($id);
            return view('bobot_kriteria.edit', ['data' => $bobot_kriteria]);
        } else if (Auth::user()->role == 'hrd') {
            $bobot_kriteria = BobotKriteria::find($id);
            return view('bobot_kriteria.edit', ['data' => $bobot_kriteria]);
        } else if (Auth::user()->role == 'divisi') {
            $bobot_kriteria = BobotKriteria::find($id);
            return view('bobot_kriteria.edit', ['data' => $bobot_kriteria]);
        } else {
            abort(404);
        }
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
            'keterangan_bobot' => "required",
            'jumlah_bobot' => "required|integer",
            'nilai_awal' => "required|min:0|numeric",
            'nilai_akhir' => "required|gt:nilai_awal|numeric",
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors());
        } else {
            Alert::success('Berhasil', 'Data bobot kriteria berhasil diubah');

            $bobot_kriteria = BobotKriteria::find($id);
            $bobot_kriteria->id_kriteria = $request->get('id_kriteria');
            $bobot_kriteria->nama_bobot = $request->get('keterangan_bobot');
            $bobot_kriteria->jumlah_bobot = $request->get('jumlah_bobot');
            $bobot_kriteria->nilai_awal = $request->get('nilai_awal');
            $bobot_kriteria->nilai_akhir = $request->get('nilai_akhir');
            $bobot_kriteria->save();
            return redirect()->route('bobot_kriteria.index', ['id' => $bobot_kriteria->id_kriteria]);
        }
        return redirect()->route('bobot_kriteria');
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
        return redirect()->route('bobot_kriteria.index', ['id' => $bobot_kriteria->id_kriteria]);
    }
}
