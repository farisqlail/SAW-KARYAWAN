@extends('admin.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header card-header-icon card-header-primary">
                        <div class="card-icon">
                            <i class="material-icons">group</i>
                        </div>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">Pelamar yang menunggu seleksi</h4>
                       <h3>{{ $pelamar }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header card-header-icon card-header-success">
                        <div class="card-icon">
                            <i class="material-icons">schedule</i>
                        </div>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">Rekruitmen Berlangsung</h4>
                        <h3>{{ $lowongan }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header card-header-icon card-header-rose">
                        <div class="card-icon">
                            <i class="material-icons">check</i>
                        </div>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">Rekruitmen Selesai</h4>
                      <h3>{{ $pelamarDua }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
