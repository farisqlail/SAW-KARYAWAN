@extends('admin.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 card-deck">
                <div class="card">
                    <div class="card-header">
                        <h3 class="float-left">Data Pelamar</h3>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-3">
                                        Nama
                                    </div>
                                    <div class="col-md-6">
                                        : {{ $pelamar->nama_pelamar }} <br>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        Tanggal Lahir
                                    </div>
                                    <div class="col-md-6">
                                        : {{ $pelamar->tanggal_lahir }} <br>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        No Telepon
                                    </div>
                                    <div class="col-md-6">
                                        : {{ $pelamar->no_telepon }} <br>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        Jenis Kelamin
                                    </div>
                                    <div class="col-md-6">
                                        : {{ $pelamar->jenis_kelamin }} <br>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-3">
                                        CV Pelamar
                                    </div>
                                    <div class="col-md-6">
                                        : <a href="{{ asset('storage/file/cv/' . $pelamar->cv) }}" class="btn btn-info btn-sm"
                                            target="blank"><i class="fas fa-download"></i> &nbsp; Download CV</a> <br>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        Ijazah Pelamar
                                    </div>
                                    <div class="col-md-6">
                                        : <a href="{{ asset('storage/file/ijazah/' . $pelamar->ijazah) }}" class="btn btn-info btn-sm"
                                            target="blank"><i class="fas fa-download"></i> &nbsp; Download Ijazah</a> <br>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        Foto Pelamar
                                    </div>
                                    <div class="col-md-6">
                                        : <img src="{{ asset('storage/images/pas_foto/' . $pelamar->pas_foto) }}" class="img-fluid" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
