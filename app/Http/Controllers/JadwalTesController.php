<?php

namespace App\Http\Controllers;

use App\DaftarSoal;
use App\HasilTes;
use App\JadwalTes;
use App\lowongan;
use App\Pelamar;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Null_;

class JadwalTesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role == 'admin') {
            $jadwal_tes = DB::table('jadwal_tes')
                ->join('lowongan', 'lowongan.id', '=', 'jadwal_tes.id')->get();
            return view('jadwal_tes.index', ['jadwal_tes' => $jadwal_tes]);
        } else if (Auth::user()->role == 'direksi') {
            $jadwal_tes = DB::table('jadwal_tes')
                ->join('lowongan', 'lowongan.id', '=', 'jadwal_tes.id')->get();
            return view('jadwal_tes.index', ['jadwal_tes' => $jadwal_tes]);
        } else if (Auth::user()->role == 'hrd') {
            $jadwal_tes = DB::table('jadwal_tes')
                ->join('lowongan', 'lowongan.id', '=', 'jadwal_tes.id')->get();
            return view('jadwal_tes.index', ['jadwal_tes' => $jadwal_tes]);
        } else if (Auth::user()->role == 'divisi') {
            $jadwal_tes = DB::table('jadwal_tes')
                ->join('lowongan', 'lowongan.id', '=', 'jadwal_tes.id')->get();
            return view('jadwal_tes.index', ['jadwal_tes' => $jadwal_tes]);
        } else {
            abort(404);
        }
    }

    public function home()
    {

        $user       = Auth::user()->id;
        $pelamar    = Pelamar::where('id_user', $user)->first();

        
        if ($pelamar) {
            $jadwal_tes = JadwalTes::join('lowongan', 'lowongan.id', '=', 'jadwal_tes.id',)
                ->where('lowongan.id', $pelamar->id_lowongan)
                ->get();

            if ($jadwal_tes->count() > 0) {
                if ($pelamar->status_dokumen == "Dokumen Valid") {
                    return view('jadwal_tes.home', ['jadwal_tes' => $jadwal_tes, 'pelamar' => $pelamar]);
                } else if ($pelamar->seleksi_satu == "Ditolak") {
                    return view('jadwal_tes.gagal');
                } else if (Pelamar::whereNull('seleksi_satu')->get()) {
                    return view('jadwal_tes.gagal');
                }
            } else {
                return view('jadwal_tes.gagal');
            }
        } else {
            return view('jadwal_tes.gagal');
        }
    }

    public function notif($id)
    {

        $jadwal_tes = JadwalTes::find($id);
        $lowongan   = Lowongan::where('id', $jadwal_tes->id)->first();
        $pelamar    = Pelamar::where('id', $lowongan->id)->where('seleksi_satu', 'Diterima')->get();

        foreach ($pelamar as $item) {
            $beautymail = app()->make(\Snowfire\Beautymail\Beautymail::class);
            $beautymail->send('email.notif', ['data' => $item, 'jadwal_tes' => $jadwal_tes], function ($message) use ($item) {
                $message
                    ->from('jayalandta@gmail.com')
                    ->to($item->user->email, $item->nama_pelamar)
                    ->subject('Notifikasi ' . $item->lowongan->posisi_lowongan);
            });
        }

        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->role == 'admin') {
            $daftarsoal = DaftarSoal::all();
            $lowongan = lowongan::all();

            $daftarsoaltes = HasilTes::all();
            return view('jadwal_tes.tambah', ['lowongan' => $lowongan, 'daftarsoal' => $daftarsoal, 'daftarsoaltes' => $daftarsoaltes]);
        } else if (Auth::user()->role == 'direksi') {
            $daftarsoal = DaftarSoal::all();
            $lowongan = lowongan::all();

            $daftarsoaltes = HasilTes::all();
            return view('jadwal_tes.tambah', ['lowongan' => $lowongan, 'daftarsoal' => $daftarsoal, 'daftarsoaltes' => $daftarsoaltes]);
        } else if (Auth::user()->role == 'hrd') {
            $daftarsoal = DaftarSoal::all();
            $lowongan = lowongan::all();

            $daftarsoaltes = HasilTes::all();
            return view('jadwal_tes.tambah', ['lowongan' => $lowongan, 'daftarsoal' => $daftarsoal, 'daftarsoaltes' => $daftarsoaltes]);
        } else if (Auth::user()->role == 'divisi') {
            $daftarsoal = DaftarSoal::all();
            $lowongan = lowongan::all();

            $daftarsoaltes = HasilTes::all();
            return view('jadwal_tes.tambah', ['lowongan' => $lowongan, 'daftarsoal' => $daftarsoal, 'daftarsoaltes' => $daftarsoaltes]);
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
            'id' => 'required',
            'tanggal' => "required",
            'batas' => "required",

        ]);

        if ($validator->fails()) {
            dd($validator->errors());
            return back()->withErrors($validator->errors());
        } else {
            Alert::success('Berhasil', 'Jadwal tes berhasil ditambahkan');

            $jadwal_tes = new JadwalTes();
            $jadwal_tes->id_lowongan = $request->get('id');
            $jadwal_tes->tanggal_notif = $request->get('tanggal_notif');
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
        if (Auth::user()->role == 'admin') {
            $jadwal_tes = DB::table('jadwal_tes')
                ->join('lowongan', 'lowongan.id', '=', 'jadwal_tes.id_lowongan')
                ->where('id_lowongan', $id)
                ->first();
            $lowongan = lowongan::all();
            return view('jadwal_tes.edit', ['jadwal_tes' => $jadwal_tes, 'lowongan' => $lowongan]);
        } else if (Auth::user()->role == 'direksi') {
            $jadwal_tes = DB::table('jadwal_tes')
                ->join('lowongan', 'lowongan.id', '=', 'jadwal_tes.id_lowongan')
                ->where('id_lowongan', $id)
                ->first();
            $lowongan = lowongan::all();
            return view('jadwal_tes.edit', ['jadwal_tes' => $jadwal_tes, 'lowongan' => $lowongan]);
        } else if (Auth::user()->role == 'hrd') {
            $jadwal_tes = DB::table('jadwal_tes')
                ->join('lowongan', 'lowongan.id', '=', 'jadwal_tes.id_lowongan')
                ->where('id_lowongan', $id)
                ->first();
            $lowongan = lowongan::all();
            return view('jadwal_tes.edit', ['jadwal_tes' => $jadwal_tes, 'lowongan' => $lowongan]);
        } else if (Auth::user()->role == 'divisi') {
            $jadwal_tes = DB::table('jadwal_tes')
                ->join('lowongan', 'lowongan.id', '=', 'jadwal_tes.id_lowongan')
                ->where('id_lowongan', $id)
                ->first();
            $lowongan = lowongan::all();
            return view('jadwal_tes.edit', ['jadwal_tes' => $jadwal_tes, 'lowongan' => $lowongan]);
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
            'tanggal' => "required",
            'batas' => "required",

        ]);

        if ($validator->fails()) {
            dd($validator->errors());
            return back()->withErrors($validator->errors());
        } else {
            Alert::success('Berhasil', 'Jadwal tes berhasil diubah');

            $jadwal_tes = JadwalTes::find($id);
            $jadwal_tes->id_lowongan = $request->get('id');
            $jadwal_tes->tanggal_notif = $request->get('tanggal_notif');
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

        return redirect()->route('jadwal_tes.index');
    }
}
