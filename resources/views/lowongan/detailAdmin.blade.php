@extends('admin.app')

@section('content')

    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h3>{{ $lowongan->posisi_lowongan }}</h3>
                <span class="badge badge-success">{{ $lowongan->berlaku_sampai }}</span><br><br>

                <span>Deskripsi pekerjaan :</span>
                <br>
                <p>
                    {!! $lowongan->deskripsi_pekerjaan !!}
                </p><br>

                <span>Deskripsi persyaratan :</span>
                <br>
                <p>
                    {!! $lowongan->deskripsi_persyaratan !!}
                </p>
            </div>
        </div>
    </div>

@endsection