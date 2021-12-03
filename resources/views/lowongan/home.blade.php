@extends('layouts.user')

@section('content')

    <main id="main">
        <div class="container mt-5 mb-5">
            <h1 style="margin-top: 100px;" align="center">Daftar Lowongan Pekerjaan</h1>

            <div class="row" style="margin-top: 50px">
                @foreach ($lowongan as $data)
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h4>{{ $data->posisi_lowongan }}</h4>
                                <span class="text-muted">Kuota {{ $data->kuota }} - <i
                                        class="text-danger">{{ $data->berlaku_sampai }}</i></span>
                                <p class="mt-3">
                                    {!! \Illuminate\Support\Str::limit($data->deskripsi_pekerjaan, 200) !!}
                                </p>
                                <p class="mt-1">
                                    {!! $data->deskripsi_persyaratan !!}
                                </p>
                                @if (Auth::guest())
                                    <div class="button-group" align="right">
                                        <a href="{{ route('login') }}" class="btn-get-started">Lamar</a>
                                    </div>
                                @else
                                    <div class="button-group" align="right">
                                        <a href="{{ route('lowongan.detail', $data->id_lowongan) }}"
                                            class="btn btn-outline-primary">Lihat Detail</a>
                                        <a href="{{ route('pelamar.tambah', $data->id_lowongan) }}"
                                            class="btn-get-started">Lamar</a>
                                    </div>
                                @endif

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
    </main>



@endsection
