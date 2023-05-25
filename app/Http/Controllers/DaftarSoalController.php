<?php

namespace App\Http\Controllers;

use App\DaftarSoal;
use App\HasilTes;
use App\JadwalTes;
use App\Kriteria;
use App\lowongan;
use App\Pelamar;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DaftarSoalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        if (Auth::user()->role == 'admin') {
            $jadwaltes = JadwalTes::find($id);
            $daftarsoal = DaftarSoal::where('id_lowongan', $jadwaltes->id_lowongan)->get();
            $lowongan = DB::table('jadwal_tes')
                ->join('lowongan', 'lowongan.id', '=', 'jadwal_tes.id')
                ->where('jadwal_tes.id', $id)
                ->first();
            return view('daftar_soal.index', ['daftarsoal' => $daftarsoal, 'jadwaltes' => $jadwaltes, 'lowongan' => $lowongan]);
        } else if (Auth::user()->role == 'direksi') {
            $jadwaltes = JadwalTes::find($id);
            $daftarsoal = DaftarSoal::where('id_lowongan', $jadwaltes->id_lowongan)->get();
            $lowongan = DB::table('jadwal_tes')
                ->join('lowongan', 'lowongan.id', '=', 'jadwal_tes.id')
                ->where('jadwal_tes.id', $id)
                ->first();
            return view('daftar_soal.index', ['daftarsoal' => $daftarsoal, 'jadwaltes' => $jadwaltes, 'lowongan' => $lowongan]);
        } else if (Auth::user()->role == 'hrd') {
            $jadwaltes = JadwalTes::find($id);
            $daftarsoal = DaftarSoal::where('id_lowongan', $jadwaltes->id_lowongan)->get();
            $lowongan = DB::table('jadwal_tes')
                ->join('lowongan', 'lowongan.id', '=', 'jadwal_tes.id')
                ->where('jadwal_tes.id', $id)
                ->first();
            return view('daftar_soal.index', ['daftarsoal' => $daftarsoal, 'jadwaltes' => $jadwaltes, 'lowongan' => $lowongan]);
        } else if (Auth::user()->role == 'divisi') {
            $jadwaltes = JadwalTes::find($id);
            $daftarsoal = DaftarSoal::where('id_lowongan', $jadwaltes->id_lowongan)->get();
            $lowongan = DB::table('jadwal_tes')
                ->join('lowongan', 'lowongan.id', '=', 'jadwal_tes.id')
                ->where('jadwal_tes.id', $id)
                ->first();
            return view('daftar_soal.index', ['daftarsoal' => $daftarsoal, 'jadwaltes' => $jadwaltes, 'lowongan' => $lowongan]);
        } else {
            abort(404);
        }
    }

    public function home($id)
    {

        $user       = Auth::user()->id;
        $pelamar    = Pelamar::with('user', 'hasil_tes')->where('id_user', $user)->firstOrFail();
        $pelamarGet = $pelamar->id;
        $jadwaltes  = JadwalTes::find($id);

        $daftarsoal = DaftarSoal::where('id_jadwal_tes', $id)->withCount(['hasil_tes' => function ($q) use ($pelamarGet) {
            return $q->where('id_pelamar', $pelamarGet);
        }])->get();

        if ($daftarsoal->isEmpty()) {
            $daftarsoal = $daftarsoal = DaftarSoal::where('id_jadwal_tes', $id)->withCount(['hasil_tes' => function ($q) use ($pelamarGet) {
                $q->where('id_pelamar', $pelamarGet);
            }])->whereHas('hasil_tes', function ($q) use ($pelamarGet) {
                $q->where('id_pelamar', $pelamarGet);
            })->with(['hasil_tes' => function ($q) use ($pelamarGet) {
                $q->where('id_pelamar', $pelamarGet);
            }])->get();
        }

        $daftarsoal = tap($daftarsoal)->transform(function ($data) use ($pelamarGet) {
            $hasiltes = $data->hasil_tes()->where('id_pelamar', $pelamarGet)->first();
            $data->hasil_tes = $hasiltes ? $hasiltes : 0 ;
            return $data;
        });

        $hasilTes = HasilTes::where('id_soal_tes', $id)->get();

        return view('daftar_soal.home', ['daftarsoal' => $daftarsoal, 'jadwaltes' => $jadwaltes, 'pelamarGet' => $pelamarGet, 'pelamar' => $pelamar, 'hasil_tes' => $hasilTes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        if (Auth::user()->role == 'admin') {
            $jadwaltes = JadwalTes::find($id);
            $kriteria = Kriteria::where('id_lowongan', $jadwaltes->id_lowongan)->where('tampil_di_pelamar', 0)->get();
            $lowongan = Lowongan::where('id', $jadwaltes->id_lowongan)->firstOrFail();
            return view('daftar_soal.tambah', ['jadwaltes' => $jadwaltes,  'lowongan' => $lowongan, 'kriteria' => $kriteria]);
        } else if (Auth::user()->role == 'direksi') {
            $jadwaltes = JadwalTes::find($id);
            return view('daftar_soal.tambah', ['jadwaltes' => $jadwaltes]);
        } else if (Auth::user()->role == 'hrd') {
            $jadwaltes = JadwalTes::find($id);
            $kriteria = Kriteria::where('id_lowongan', $jadwaltes->id_lowongan)->where('tampil_di_pelamar', 0)->get();
            $lowongan = Lowongan::where('id', $jadwaltes->id_lowongan)->firstOrFail();

            return view('daftar_soal.tambah', ['jadwaltes' => $jadwaltes, 'lowongan' => $lowongan, 'kriteria' => $kriteria]);
        } else if (Auth::user()->role == 'divisi') {
            $jadwaltes = JadwalTes::find($id);
            $kriteria = Kriteria::where('id_lowongan', $jadwaltes->id_lowongan)->where('tampil_di_pelamar', 1)->get();
            $lowongan = Lowongan::where('id', $jadwaltes->id_lowongan)->firstOrFail();
            // dd($kriteria);
            return view('daftar_soal.tambah', ['jadwaltes' => $jadwaltes, 'lowongan' => $lowongan, 'kriteria' => $kriteria]);
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
            'kriteria' => 'required',
            'soal' => 'required',
            'bobot' => "required",
            'file_soal' => "required",
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors());
        } else {
            Alert::success('Berhasil', 'Berhasil menambah soal');

            $daftar_soal = new DaftarSoal();
            $daftar_soal->id_jadwal_tes = $request->get('id');
            $daftar_soal->id_lowongan = $request->get('id_lowongan');
            $daftar_soal->id_kriteria = $request->get('kriteria');
            $daftar_soal->soal = $request->get('soal');
            $daftar_soal->bobot_soal = $request->get('bobot');
            if ($request->file('file_soal')) {
                $file = $request->file('file_soal');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $daftar_soal->file_soal  = $filename;
                $tujuan_upload = 'upload';
                $file->move($tujuan_upload, $filename);
            }
        }
        $daftar_soal->save();
        return redirect()->route('daftar_soal.index', ['id' => $daftar_soal->id_jadwal_tes]);
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
            $daftar_soal = DaftarSoal::find($id);
            $jadwaltes = JadwalTes::find($daftar_soal->id_jadwal_tes);
            $kriteria = Kriteria::where('id_lowongan', $daftar_soal->id_lowongan)->where('tampil_di_pelamar', 0)->get();
            return view('daftar_soal.edit', ['daftar_soal' => $daftar_soal, 'jadwaltes' => $jadwaltes, 'kriteria' => $kriteria]);
        } else if (Auth::user()->role == 'direksi') {
            $daftar_soal = DaftarSoal::find($id);
            $jadwaltes = JadwalTes::find($daftar_soal->id_jadwal_tes);
            $kriteria = Kriteria::where('id_lowongan', $daftar_soal->id_lowongan)->where('tampil_di_pelamar', 0)->get();
            return view('daftar_soal.edit', ['daftar_soal' => $daftar_soal, 'jadwaltes' => $jadwaltes, 'kriteria' => $kriteria]);
        } else if (Auth::user()->role == 'hrd') {
            $daftar_soal = DaftarSoal::find($id);
            $jadwaltes = JadwalTes::find($daftar_soal->id_jadwal_tes);
            $kriteria = Kriteria::where('id_lowongan', $daftar_soal->id_lowongan)->where('tampil_di_pelamar', 0)->get();
            $lowongan = Lowongan::where('id', $jadwaltes->id_lowongan)->get();

            return view('daftar_soal.edit', ['daftar_soal' => $daftar_soal, 'jadwaltes' => $jadwaltes, 'lowongan' => $lowongan, 'kriteria' => $kriteria]);
        } else if (Auth::user()->role == 'divisi') {
            $daftar_soal = DaftarSoal::find($id);
            $jadwaltes = JadwalTes::find($daftar_soal->id_jadwal_tes);
            $kriteria = Kriteria::where('id_lowongan', $daftar_soal->id_lowongan)->where('tampil_di_pelamar', 1)->get();
            $lowongan = Lowongan::where('id', $jadwaltes->id_lowongan)->get();

            return view('daftar_soal.edit', ['daftar_soal' => $daftar_soal, 'jadwaltes' => $jadwaltes, 'lowongan' => $lowongan, 'kriteria' => $kriteria]);
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
            'kriteria' => 'required',
            'soal' => 'required',
            'bobot' => "required"
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors());
        } else {
            Alert::success('Berhasil', 'Berhasil mengubah soal');

            $daftar_soal = DaftarSoal::find($id);
            $daftar_soal->id_jadwal_tes = $request->get('id');
            $daftar_soal->id_lowongan = $request->get('id_lowongan');
            $daftar_soal->soal = $request->get('soal');
            $daftar_soal->bobot_soal = $request->get('bobot');
            if ($request->file('file_soal')) {
                $file = $request->file('file_soal');
                $tujuan_upload = 'upload';
                File::delete('upload/' . $daftar_soal->file_soal);
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $daftar_soal->file_soal  = $filename;
                $file->move($tujuan_upload, $filename);
            }
        }
        $daftar_soal->save();
        return redirect()->route('daftar_soal.index', ['id' => $daftar_soal->id_jadwal_tes]);
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
        $id_jadwal_tes = $daftar_soal->id_jadwal_tes;
        $daftar_soal->delete();
        File::delete('upload/' . $daftar_soal->file_soal);
        return redirect()->route('daftar_soal.index', ['id' => $id_jadwal_tes]);
    }
}
