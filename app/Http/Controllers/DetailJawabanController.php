<?php

namespace App\Http\Controllers;

use App\DetailJawaban;
use App\DaftarSoal;
use App\Pertanyaan;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DetailJawabanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        if (Auth::user()->role == 'admin') {
            $daftarsoal = DaftarSoal::where('id', $id)->first();
            $detailJawaban = DetailJawaban::where('id_daftar_soal', $id)->get();
            $pertanyaan = Pertanyaan::all();

            return view('detail_jawaban.index', ['detailJawaban' => $detailJawaban, 'daftarsoal' => $daftarsoal, 'pertanyaan' => $pertanyaan]);
        } else if (Auth::user()->role == 'direksi') {
            $daftarsoal = DaftarSoal::where('id', $id)->first();
            $detailJawaban = DetailJawaban::where('id_daftar_soal', $id)->get();
            $detailJawaban = DetailJawaban::all();

            return view('daftar_soal.index', ['detailJawaban' => $detailJawaban, 'daftarsoal' => $daftarsoal]);
        } else if (Auth::user()->role == 'hrd') {
            $daftarsoal = DaftarSoal::where('id', $id)->first();
            $detailJawaban = DetailJawaban::where('id_daftar_soal', $id)->get();

            return view('daftar_soal.index', ['detailJawaban' => $detailJawaban, 'daftarsoal' => $daftarsoal]);
        } else if (Auth::user()->role == 'divisi') {
            $daftarsoal = DaftarSoal::where('id', $id)->first();
            $detailJawaban = DetailJawaban::where('id_daftar_soal', $id)->get();

            return view('daftar_soal.index', ['detailJawaban' => $detailJawaban, 'daftarsoal' => $daftarsoal]);
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
            $daftarsoal = DaftarSoal::where('id', $id)->first();
            $pertanyaan = Pertanyaan::all();

            return view('detail_jawaban.tambah', ['daftarsoal' => $daftarsoal, 'pertanyaan' => $pertanyaan]);
        } else if (Auth::user()->role == 'direksi') {
            $daftarsoal = DaftarSoal::where('id', $id)->first();
            $pertanyaan = Pertanyaan::all();

            return view('detail_jawaban.tambah', ['daftarsoal' => $daftarsoal, 'pertanyaan' => $pertanyaan]);
        } else if (Auth::user()->role == 'hrd') {
            $daftarsoal = DaftarSoal::where('id', $id)->first();
            $pertanyaan = Pertanyaan::all();

            return view('detail_jawaban.tambah', ['daftarsoal' => $daftarsoal, 'pertanyaan' => $pertanyaan]);
        } else if (Auth::user()->role == 'divisi') {
            $daftarsoal = DaftarSoal::where('id', $id)->first();
            $pertanyaan = Pertanyaan::all();

            return view('detail_jawaban.tambah', ['daftarsoal' => $daftarsoal, 'pertanyaan' => $pertanyaan]);
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
            'jawaban_a' => 'required',
            'jawaban_b' => 'required',
            'jawaban_c' => 'required',
            'jawaban_d' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors());
        } else {
            Alert::success('Berhasil', 'Berhasil menambah jawaban');

            $detailJawaban = new DetailJawaban();
            $detailJawaban->id_daftar_soal = $request->get('id_daftar_soal');
            $detailJawaban->jawaban_a = $request->get('jawaban_a');
            $detailJawaban->jawaban_b = $request->get('jawaban_b');
            $detailJawaban->jawaban_c = $request->get('jawaban_c');
            $detailJawaban->jawaban_d = $request->get('jawaban_d');

            $detailJawaban->save();
        }
        return redirect()->route('detail_jawaban.index', ['id' => $detailJawaban->id_daftar_soal]);
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
            $daftarsoal = DaftarSoal::where('id', $id)->first();
            $pertanyaan = Pertanyaan::all();
            $detailjawaban = DetailJawaban::where('id_daftar_soal', $id)->get();

            return view('detail_jawaban.edit', ['daftarsoal' => $daftarsoal, 'pertanyaan' => $pertanyaan, 'detailjawaban' => $detailjawaban]);
        } else if (Auth::user()->role == 'direksi') {
            $daftarsoal = DaftarSoal::where('id', $id)->first();
            $pertanyaan = Pertanyaan::all();
            $detailjawaban = DetailJawaban::where('id_daftar_soal', $id)->get();

            return view('detail_jawaban.edit', ['daftarsoal' => $daftarsoal, 'pertanyaan' => $pertanyaan, 'detailjawaban' => $detailjawaban]);
        } else if (Auth::user()->role == 'hrd') {
            $daftarsoal = DaftarSoal::where('id', $id)->first();
            $pertanyaan = Pertanyaan::all();
            $detailjawaban = DetailJawaban::where('id_daftar_soal', $id)->get();

            return view('detail_jawaban.edit', ['daftarsoal' => $daftarsoal, 'pertanyaan' => $pertanyaan, 'detailjawaban' => $detailjawaban]);
        } else if (Auth::user()->role == 'divisi') {

            $daftarsoal = DaftarSoal::where('id', $id)->first();
            $pertanyaan = Pertanyaan::all();
            $detailjawaban = DetailJawaban::where('id_daftar_soal', $id)->get();

            return view('detail_jawaban.edit', ['daftarsoal' => $daftarsoal, 'pertanyaan' => $pertanyaan, 'detailjawaban' => $detailjawaban]);

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
            'jawaban_a' => 'required',
            'jawaban_b' => 'required',
            'jawaban_c' => 'required',
            'jawaban_d' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors());
        } else {
            Alert::success('Berhasil', 'Berhasil mengubah jawaban');

            $detailJawaban = DetailJawaban::find($id);
            $detailJawaban->id_daftar_soal = $request->get('id_daftar_soal');
            $detailJawaban->jawaban_a = $request->get('jawaban_a');
            $detailJawaban->jawaban_b = $request->get('jawaban_b');
            $detailJawaban->jawaban_c = $request->get('jawaban_c');
            $detailJawaban->jawaban_d = $request->get('jawaban_d');

            $detailJawaban->save();
        }
        return redirect()->route('detail_jawaban.index', ['id' => $detailJawaban->id_daftar_soal]);
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
