@extends('layouts.user')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-center">

            <div class="card" style="margin-top: 100px; width: 50rem; border: none;">
                <div class="card-body">
                    <h4>{{ $lowongan->posisi_lowongan }}</h4>
                    <span class="text-muted">Kuota {{ $lowongan->kuota }} - <i
                            class="text-danger">{{ $lowongan->berlaku_sampai }}</i></span>
                    <p class="mt-3">
                        {!! $lowongan->deskripsi_pekerjaan !!}
                    </p>
                    <p class="mt-1">
                        {!! $lowongan->deskripsi_persyaratan !!}
                    </p>

                    <div class="button-group" align="right">
                        <a href="{{ route('pelamar.tambah', $lowongan->id_lowongan) }}"
                            class="btn-get-started">Lamar</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
