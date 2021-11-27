<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pelamar;

class FrontendController extends Controller
{
    public function index(){
        
        $pelamar = Pelamar::all();
        // dd($pelamar[0]->status_lamaran == 'Ditolak');

        return view('welcome2', ['pelamar' => $pelamar]);
    }
}
