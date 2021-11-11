@extends('admin.app')

@section('content')

@if(Auth()->user()->role == "customer")

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="row">
                <div class="col-lg text-center">
                    <h2>Selamat Datang di Pencarian Franchise</h2>
                    <p>Sistem Pendukung Keputusan ini akan membantu anda dalam memilih bisnis franchise yang sesuai dengan kriteria yang diinputkan
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm text-center">
                 
                    <img src="{{asset('assets/img/franchise.png')}}" alt="logo" class="homeimg">
                        <p class="promo-caption">Referensi Franchise</p>
                        <p class="light center">Silakan lihat referensi dari berbagai franchise dengan detail informasi yang telah kami sediakan</p>
                    
                </div>
                <div class="col-sm text-center">
                    <img src="{{asset('assets/img/alternatif.png')}}" alt="logo" class="homeimg">
                        <p class="promo-caption">Pengisian Alternatif</p>
                        <p class="light center">Silakan isi alternatif franchise yang anda pilih sesuai dengan kriteria masing-masing franchise</p>
                    
                </div>
                <div class="col-sm text-center">
                    <img src="{{asset('assets/img/rekom.png')}}" alt="logo" class="homeimg">
                        <p class="promo-caption">Hitung & Rekomendai</p>
                        <p class="light center">Sistem akan melakukan perhitungan dan menampilkan rekomendasi franchise sesuai perhitungan</p>

                </div>
            </div>
        </div>
    </div>
</div>

@else
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        You are logged in!
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

@endsection

