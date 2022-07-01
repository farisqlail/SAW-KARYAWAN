@extends('admin.app')

@section('content')
    <style>
        .progress {
            position: relative;
            width: 100%;
            border: 1px solid #7F98B2;
            padding: 1px;
            border-radius: 3px;
        }

        .bar {
            background-color: #B4F5B4;
            width: 0%;
            height: 25px;
            border-radius: 3px;
        }

        .percent {
            position: absolute;
            display: inline-block;
            top: 3px;
            left: 48%;
            color: #7F98B2;
        }
    </style>

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
                                        Tempat Lahir
                                    </div>
                                    <div class="col-md-6">
                                        : {{ $pelamar->tanggal_lahir }}, &nbsp;{{ $pelamar->tempat_lahir }} <br>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        Agama
                                    </div>
                                    <div class="col-md-6">
                                        : {{ $pelamar->agama }} <br>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        Alamat
                                    </div>
                                    <div class="col-md-6">
                                        : {{ $pelamar->alamat }} <br>
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
                                <div class="row">
                                    <div class="col-md-3">
                                        No Telepon
                                    </div>
                                    <div class="col-md-6">
                                        : {{ $pelamar->no_telepon }} <br>
                                    </div>
                                </div>
                                @foreach ($alternatif as $data)
                                    <div class="row">
                                        <div class="col-md-3">
                                            {{ $data->nama_kriteria }}
                                        </div>
                                        <div class="col-md-6">
                                            : {{ $data->nama_bobot }} <br>
                                        </div>

                                    </div>
                                @endforeach

                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-3">
                                        Foto Pelamar
                                    </div>
                                    <div class="col-md-6">
                                        : <img src="{{ asset('storage/images/pas_foto/' . $pelamar->pas_foto) }}"
                                            class="img-fluid" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <br>
            <div class="card" style="width: 67rem;">
                <div class="card-body">
                    <h3>CV Pelamar</h3>
                    <div class="pdf mt-4" style="margin: -10px; " align="center">
                        <embed src="{{ asset('storage/file/cv/' . $pelamar->cv) }}" type="application/pdf" height="760px"
                            width="80%">
                    </div>
                </div>
            </div>

            <br>
            <div class="card" style="width: 67rem;">
                <div class="card-body">
                    <h3>Ijazah Pelamar</h3>
                    <div class="pdf mt-4" style="margin: -10px; " align="center">
                        <embed src="{{ asset('storage/file/ijazah/' . $pelamar->ijazah) }}" type="application/pdf"
                            height="760px" width="80%">
                    </div>

                    <div class="button-validasi mt-4" align="right">
                        <form action="{{ route('pelamar.statusDokumen', $pelamar->id_pelamar) }}" method="post"
                            id="formx">
                            {{ csrf_field() }}
                            @if ($pelamar->status_dokumen == null)
                                <input type="submit" name="submit" class="btn btn-danger btn-sm"
                                    value="Dokumen Tidak Valid">

                                <input type="submit" name="submit" class="btn btn-success btn-sm"
                                    data-uia="login-submit-button" value="Dokumen Valid">

                                <div class="progress">
                                    <div class="bar"></div>
                                    <div class="percent">0%</div>
                                </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection

@push('scripts')
    <script>
        (function() {

                var bar = $('.bar');
                var percent = $('.percent');
                var status = $('#status');

                $('form').ajaxForm({
                    beforeSubmit: validate,
                    beforeSend: function() {
                        status.empty();
                        var percentVal = '0%';
                        var posterValue = $('input[name=submit]').fieldValue();
                        bar.width(percentVal)
                        percent.html(percentVal);
                    },
                    uploadProgress: function(event, position, total, percentComplete) {
                        var percentVal = percentComplete + '%';
                        bar.width(percentVal)
                        percent.html(percentVal);
                    },
                });
    </script>
@endpush
