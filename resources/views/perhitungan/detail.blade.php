@extends('admin.app')

@section('content')
    <style>
        #myProgress {
            width: 100%;
            background-color: grey;
        }

        #myBar {
            width: 1%;
            height: 30px;
            background-color: green;
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

                        <div class="row">
                            <div class="col-md-12">
                                <h5>Kriteria Lowongan</h5>
                                <ul>
                                    @forelse ($pelamar->bobot as $item)
                                        <li>{{ $item->kriteria->nama_kriteria }} : {{ $item->nama_bobot }}</li>
                                    @empty
                                    @endforelse

                                    @forelse ($bobot_kriteria as $item)
                                        <li>{{ $item->nama_kriteria }} : {{ $item->nama_bobot }}</li>
                                    @empty
                                    @endforelse

                                </ul>
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
                        <form action="{{ route('pelamar.statusDokumen', $pelamar->id) }}" method="post" id="formx">
                            {{ csrf_field() }}
                            @if (Auth::user()->role == 'admin')
                                @if ($pelamar->status_dokumen == null)
                                <button type="button" id="btnTolak" class="btn btn-danger btnTolak btn-sm" data-url="{{ route('pelamar.statusDokumen', $pelamar->id) }}"> Dokumen Tidak Valid</button>

                                    <input type="submit" name="submit" class="btn btn-success btn-sm"
                                        data-uia="login-submit-button" value="Dokumen Valid">
                                @endif
                            @elseif(Auth::user()->role == 'hrd')
                                @if ($pelamar->status_dokumen == null)
                                    {{-- <input type="submit" name="submit" class="btn btn-danger btn-sm"
                                        value="Dokumen Tidak Valid"> --}}

                                        <button type="button" id="btnTolak" class="btn btn-danger btnTolak btn-sm" data-url="{{ route('pelamar.statusDokumen', $pelamar->id) }}"> Dokumen Tidak Valid</button>
                                    <input type="submit" name="submit" class="btn btn-success btn-sm"
                                        data-uia="login-submit-button" value="Dokumen Valid">
                                @endif
                            @endif
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <div class="modal fade" id="modalTolak" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Catatan Dokumen Tidak Valid
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form  id="formTolak"
                        action="#" method="POST" >
                        @csrf
                        <input type="hidden" name="status" value="Dokumen Tidak Valid">

                        <div class="form-group">
                            <label for="catatan">Catatan<span class="text-danger">*</span></label>
                            <textarea class="form-control" name="catatan" required id="catatan" rows="3"></textarea>
                        </div>
                        <div class="modal-footer" style="border:none;">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script>
        $('body').append('<div style="" id="loadingDiv"><div class="loader">Loading...</div></div>');
        $(window).on('load', function() {
            setTimeout(removeLoader, 2000); //wait for page load PLUS two seconds.
        });

        function removeLoader() {
            $("#loadingDiv").fadeOut(500, function() {
                // fadeOut complete. Remove the loading div
                $("#loadingDiv").remove(); //makes page more lightweight
            });
        }

        $(document).ready(function() {
            $('#btnTolak').on('click', function() {

                var url = $(this).data('url');

                $('#catatan').empty();

                $('#formTolak').attr('action', url);

                $('#modalTolak').modal('show');
            })
        })

        $(window).load(function() {
            $('#loading').hide();
        });
    </script>
@endsection
