<?php

namespace App\Http\Controllers;

use App\lowongan;
use App\Pelamar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;

class LowonganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role == 'admin') {
            $lowongan = Lowongan::whereNull('periode')->get();
            return view('lowongan.index', ['lowongan' => $lowongan]);
        } else if (Auth::user()->role == 'direksi') {
            $lowongan = Lowongan::whereNull('periode')->get();
            return view('lowongan.index', ['lowongan' => $lowongan]);
        } else if (Auth::user()->role == 'hrd') {
            $lowongan = Lowongan::whereNull('periode')->get();
            return view('lowongan.index', ['lowongan' => $lowongan]);
        } else if (Auth::user()->role == 'divisi') {
            $divisi = auth()->user()->division_name;
            $lowongan = lowongan::where('divisi', $divisi)->get();
            return view('lowongan.index', ['lowongan' => $lowongan]);
        } else {
            abort(404);
        }
    }

    public function periodeIndex()
    {
        $lowongan = Lowongan::whereNotNull('periode')->get();

        return view('lowongan.periode-index', ['lowongan' => $lowongan]);
    }

    public function search(Request $request)
    {
        // menangkap data pencarian
        $search = $request->search;

        // mengambil data dari table pegawai sesuai pencarian data
        $lowongan = DB::table('lowongan')
            ->where('posisi_lowongan', 'like', "%" . $search . "%")
            ->paginate();

        // mengirim data pegawai ke view index
        return view('lowongan.search', ['lowongan' => $lowongan]);
    }

    public function home()
    {
        $lowongan = lowongan::where('status_approve', 'selesai')->where('periode', '!==', 'tutup')->orderBy('id', 'desc')->get();
        $pelamar = Pelamar::all();

        return view('lowongan.home', compact('lowongan', 'pelamar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->role == 'admin') {
            return view('lowongan.tambah');
        } else if (Auth::user()->role == 'direksi') {
            return view('lowongan.tambah');
        } else if (Auth::user()->role == 'hrd') {
            return view('lowongan.tambah');
        } else if (Auth::user()->role == 'divisi') {
            return view('lowongan.tambah');
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
            'posisi' => 'required',
            'berlaku' => "required",
            'deskripsi_pekerjaan' => "required",
            'deskripsi_persyaratan' => "required",
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors());
        } else {
            Alert::success('Berhasil', 'Data lowongan berhasil ditambahkan menunggu approve dari hrd');

            $lowongan = new lowongan();
            $lowongan->posisi_lowongan = $request->get('posisi');
            $lowongan->berlaku_sampai = $request->get('berlaku');
            $lowongan->deskripsi_pekerjaan = $request->get('deskripsi_pekerjaan');
            $lowongan->deskripsi_persyaratan = $request->get('deskripsi_persyaratan');
            $lowongan->status_approve = 'hrd';
            $lowongan->id_user = auth()->user()->id;

            if (auth()->user()->role == 'divisi') {
                $lowongan->divisi = auth()->user()->division_name;
            }

            $lowongan->save();

            return redirect()->route('lowongan.index');
        }
    }

    public function approveHrd(Request $request, $id)
    {

        Alert::success('Berhasil', 'Data lowongan berhasil approve dari hrd menunggu approvement dari direksi');

        $lowongan = lowongan::findOrFail($id);
        $lowongan->status_approve = 'direksi';

        $lowongan->save();

        return redirect()->route('lowongan.index');
    }

    public function approveDireksi(Request $request, $id)
    {

        Alert::success('Berhasil', 'Data lowongan berhasil approve');

        $lowongan = lowongan::findOrFail($id);
        $lowongan->status_approve = 'selesai';

        $lowongan->save();

        return redirect()->route('lowongan.index');
    }

    public function tolakDireksi(Request $request, $id)
    {

        Alert::success('Berhasil', 'Data lowongan ditolak');

        $lowongan = lowongan::findOrFail($id);
        $lowongan->status_approve = 'tolak direksi';

        $lowongan->save();

        return redirect()->route('lowongan.index');
    }

    public function tolakHrd(Request $request, $id)
    {

        Alert::success('Berhasil', 'Data lowongan ditolak');

        $lowongan = lowongan::findOrFail($id);
        $lowongan->status_approve = 'tolak hrd';

        $lowongan->save();

        return redirect()->route('lowongan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lowongan = lowongan::find($id);
        $pelamar = Pelamar::all();

        return view('lowongan.detail', ['lowongan' => $lowongan, 'pelamar' => $pelamar]);
    }

    public function detailAdmin($id)
    {
        $lowongan = lowongan::find($id);
        $pelamar = Pelamar::all();

        return view('lowongan.detailAdmin', ['lowongan' => $lowongan, 'pelamar' => $pelamar]);
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
            $lowongan = lowongan::find($id);
            return view('lowongan.edit', ['lowongan' => $lowongan]);
        } else if (Auth::user()->role == 'direksi') {
            $lowongan = lowongan::find($id);
            return view('lowongan.edit', ['lowongan' => $lowongan]);
        } else if (Auth::user()->role == 'hrd') {
            $lowongan = lowongan::find($id);
            return view('lowongan.edit', ['lowongan' => $lowongan]);
        } else if (Auth::user()->role == 'divisi') {
            $lowongan = lowongan::find($id);
            return view('lowongan.edit', ['lowongan' => $lowongan]);
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
            'posisi' => 'required',
            'berlaku' => "required",
            'deskripsi_pekerjaan' => "required",
            'deskripsi_persyaratan' => "required",
        ]);

        if ($validator->fails()) {
            dd($validator->errors());
            return back()->withErrors($validator->errors());
        } else {
            Alert::success('Berhasil', 'Data lowongan berhasil diubah');

            $lowongan = lowongan::find($id);
            $lowongan->posisi_lowongan = $request->get('posisi');
            $lowongan->berlaku_sampai = $request->get('berlaku');
            $lowongan->deskripsi_pekerjaan = $request->get('deskripsi_pekerjaan');
            $lowongan->deskripsi_persyaratan = $request->get('deskripsi_persyaratan');
            $lowongan->status_approve = 'hrd';

            $lowongan->save();

            return redirect()->route('lowongan.index');
        }
    }

    public function periode()
    {
        $lowonganIds = Lowongan::whereNull('periode')->pluck('id')->toArray();
        $lowongan = Lowongan::whereNotNull('periode')->latest()->first();
        // $lastRecord = $lowongan->last();

        $text = $lowongan->periode;
        $parts = explode(" ", $text); // Memisahkan string menjadi array
        $number = end($parts); // Mengambil elemen terakhir dari array
        $loop = (int) $number + 1;
        
        for ($i = $loop; $i < 1000; $i++) {
            $periode = "Periode " . $i;
            Lowongan::whereIn('id', $lowonganIds)->update(['periode' => $periode]);

            Alert::success('Berhasil', 'Data lowongan berhasil ditutup periodenya');
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

        $lowongan = Lowongan::findOrFail($id);
        $lowongan->delete();

        return redirect()->route('lowongan.index');
    }
}
