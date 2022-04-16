@extends('layouts.user')

@section('content')
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">

        <div class="container">
            <div class="row">
                <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
                    <h1>CV.Lintas Nusa</h1>
                    <h2>Aplikasi Rekrutmen dan Seleksi Karyawan dengan menggunakan metode SAW</h2>
                    <div class="d-flex">
                        <a href="{{ route('lowongan.home') }}" class="btn-get-started scrollto">Cari Lowongan!</a>
                        {{-- <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="glightbox btn-watch-video"><i
                                class="bi bi-play-circle"></i><span>Watch Video</span></a> --}}
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img">
                    <img src="{{ asset('user-template/assets/img/hero-img.png') }}" class="img-fluid animated" alt="">
                </div>
            </div>
        </div>

    </section><!-- End Hero -->

    <div class="container mt-5">
        <h1 style="margin-top: 100px;" align="center">Daftar Lowongan Pekerjaan</h1>

        <div class="row mt-5">
            @foreach ($lowongan as $data)
                <div class="col-md-4">
                    <div class="card card-lowongan shadow rounded">
                        <div class="card-body">
                            <h4><b>{{ $data->posisi_lowongan }}</b></h4>
                            <br>
                            <i class="text-danger">
                                @php
                                    $date = \Carbon\Carbon::parse($data->berlaku_sampai);
                                @endphp
                                @if ($date > \Carbon\Carbon::now())
                                    Pendaftaran berlaku sampai {{ $data->berlaku_sampai }}
                                @else
                                    Pendaftaran ditutup
                                @endif
                            </i></span>
                            {{-- <p class="mt-3">
                            <h4>Persyaratan</h4>
                            {!! $data->deskripsi_persyaratan !!}
                            <h4>Deskripsi Pekerjaan</h4>
                            {!! \Illuminate\Support\Str::limit($data->deskripsi_pekerjaan, 200) !!}
                            </p> --}}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
