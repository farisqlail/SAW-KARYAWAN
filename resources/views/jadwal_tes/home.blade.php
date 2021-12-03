@extends('layouts.user')

@section('content')

    <div class="container" style="margin-top: 10rem;">
        <div class="card mt-5" style="width: 40rem;">
            <div class="card-body">
                <h6 class="text-success">Posisi Lowongan</h6>
                <h5><b>{{ $jadwal_tes[0]->posisi_lowongan }}</b></h5>
                <br>
                <span>
                    Waktu Pengerjaan :
                    <i class="text-danger">
                        {{ $jadwal_tes[0]->tanggal }} - {{ $jadwal_tes[0]->durasi_tes }}
                    </i>
                </span>
                <br><br>

                <div class="button-mulai" align="right">
                    <a href="{{ route('daftar_soal.home', ['id' => $jadwal_tes[0]->id_jadwal_tes]) }}"
                        class="btn btn-success">Mulai Tes</a>
                </div>
            </div>
        </div>
    </div>

@endsection