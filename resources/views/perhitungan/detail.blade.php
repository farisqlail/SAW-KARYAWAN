@extends('admin.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 card-deck">
            <div class="card">
                <div class="card-header">
                    <h3 class="float-left">Hasil Analisa</h3>
                </div>

                <div class="card-body">
                    Nama : {{ $pelamar->nama_pelamar }}

                </div>
            </div>
        </div>
    </div>
</div>

@endsection