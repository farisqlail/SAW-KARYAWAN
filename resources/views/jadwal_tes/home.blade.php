@extends('layouts.user')

@section('content')

    <div class="container" style="margin-top: 10rem;">
        @foreach ($jadwal_tes as $item)
            <div class="card mt-5" style="width: 40rem;">
                <div class="card-body">
                    <h6 class="text-success">Posisi Lowongan</h6>
                    <h5><b>{{ $item->posisi_lowongan }}</b></h5>
                    <br>
                    <span>
                        Waktu Pengerjaan :
                        <i class="text-danger">
                            {{ $item->tanggal }} - {{ $item->durasi_tes }}
                        </i>
                    </span>
                    <br><br>

                    <div class="button-mulai" align="right">
                        <a href="{{ route('daftar_soal.home', ['id' => $item->id_jadwal_tes]) }}"
                            class="btn btn-success">Mulai Tes</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection
