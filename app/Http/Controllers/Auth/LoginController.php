<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/home';

    public function authenticated()
    {
        if (Auth::user()->role == 'admin') {
            // dd(Auth::user()->role);
            // return view('admin.dashboard');
            Alert::success('Selamat Datang Kembali', 'Selamat datang lagi admin');
            return redirect()->route('home');

        } else if (Auth::user()->role == 'divisi') {
            // dd(Auth::user()->role);
            // return view('admin.dashboard');
            Alert::success('Selamat Datang Kembali', 'Selamat datang lagi '.Auth::user()->name);
            return redirect()->route('home');

        } else if (Auth::user()->role == 'hrd') {
            // dd(Auth::user()->role);
            // return view('admin.dashboard');
            Alert::success('Selamat Datang Kembali', 'Selamat datang lagi '.Auth::user()->name);
            return redirect()->route('home');

        } else if (Auth::user()->role == 'direksi') {
            // dd(Auth::user()->role);
            // return view('admin.dashboard');
            Alert::success('Selamat Datang Kembali', 'Selamat datang lagi '.Auth::user()->name);
            return redirect()->route('home');

        } else {
            // dd(Auth::user()->role);
            // return view('hrd.dashboard');
            Alert::success('Selamat Datang', 'Selamat Datang ' . Auth::user()->name);
            return redirect()->route('lowongan.home');
        }

        return redirect()->route('login');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
