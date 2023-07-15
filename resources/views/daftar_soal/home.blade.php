@extends('layouts.user')
{{-- <img src="{{ asset('assets/img/Tes.png') }}" class="img-fluid" style="margin-top: 80px;" alt="" srcset=""> --}}
@section('content')

    {{-- @include('jawaban.jawaban') --}}

    <div class="card shadow-sm p-3 mb-5 bg-body rounded" style="margin-top: 50px;">
        <h1 class="mb-5">Tes Tulis Online</h1>
        <div class="card-body">

            {{-- <h3>
                Soal {{ $daftarsoal[0]->soal }}
            </h3>

            <br>
            <span>
                Anda bisa download soalnya disini
            </span>
            <br>
            <a href="{{ asset('/upload/' . $daftarsoal[0]->file_soal) }}" class="btn btn-primary mt-3"
                target="blank"><i class="fas fa-download"></i> &nbsp;Download File</a> --}}
            <div class="table-responsive">
                <table class="table table-bordered" id="myTable">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Soal</th>
                            <th class="text-center">File Soal</th>
                            <th class="text-center">Unggah Jawaban</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (!empty($daftarsoal))
                            @foreach ($daftarsoal as $data)
                                <div class="modal fade" id="unggah-jawaban{{ $data->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Unggah Jawaban</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('jawaban.store') }}" method="POST"
                                                    enctype="multipart/form-data">

                                                    {{ csrf_field() }}
                                                    <input type="number" name="id_soal_tes" value="{{ $data->id }}"
                                                        hidden>
                                                    <input type="number" name="id" value="{{ $pelamarGet }}" hidden>
                                                    <input type="number" name="id_lowongan"
                                                        value="{{ $data->id_lowongan }}" hidden>
                                                    <div class="form-group">
                                                        <span class="text-danger">Unggah jawabanmu disini, pastikan
                                                            jawaban yang kamu unggah sesuai soal!</span><br>
                                                        <input type="file" class="btn btn-warning mt-3" name="jawaban"
                                                            value="Unggah Jawaban">
                                                    </div><br>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save
                                                            changes</button>
                                                    </div>
                                                    {{-- <button type="submit" class="btn btn-primary">Uggah Jawaban</button> --}}
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @if ($data->hasil_tes_count > 0)
                                    <div class="modal fade" id="ubah-jawaban{{ $data->hasil_tes->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Unggah Jawaban
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('jawaban.update', [$data->hasil_tes->id]) }}"
                                                        method="POST" enctype="multipart/form-data">
                                                        {{ csrf_field() }}
                                                        {{ method_field('PATCH') }}

                                                        <input type="number" name="id_soal_tes"
                                                            value="{{ $data->id }}" hidden>
                                                        <input type="number" name="id_user" value="{{ $pelamar->id }}"
                                                            hidden>
                                                        <input type="number" name="id_lowongan"
                                                            value="{{ $data->id_lowongan }}" hidden>
                                                        <div class="form-group">
                                                            <span class="text-danger">Unggah jawabanmu disini,
                                                                pastikan
                                                                jawaban yang kamu unggah sesuai soal!</span><br>
                                                            <input type="file" class="btn btn-warning mt-3"
                                                                name="jawaban" value="Unggah Jawaban">
                                                        </div><br>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Save
                                                                changes</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif


                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->soal }}</td>
                                    <td align="center">
                                        <a href="/upload/{{ $data->file_soal }}" class="btn btn-primary" target="blank"><i
                                                class="fas fa-download"></i> &nbsp; Download File</a>
                                    </td>

                                    <td align="center" colspan="2">
                                        @if ($data->hasil_tes_count == 0)
                                            <a href="" class="btn btn-success" data-toggle="modal"
                                                data-target="#unggah-jawaban{{ $data->id }}">Unggah Jawaban</a>
                                        @else
                                            <div class="d-flex justify-content-center">
                                                <a href="{{ asset('storage/file/jawaban/' . $data->hasil_tes->jawaban) }}"
                                                    class="btn btn-success btn-md" target="blank">Unduh Jawaban</a>
                                                <br> <br>
                                                @if (\Carbon\Carbon::now() < \Carbon\Carbon::parse($jadwaltes->durasi_tes))
                                                    <a href="" class="btn btn-danger btn-md ml-3"
                                                        data-toggle="modal"
                                                        data-target="#ubah-jawaban{{ $data->hasil_tes->id }}">Ubah
                                                        Jawaban</a>
                                                @endif
                                            </div>
                                            <span class="text-danger">

                                                @if (\Carbon\Carbon::now() > \Carbon\Carbon::parse($jadwaltes->durasi_tes))
                                                    Jawaban Tidak Dapat di ubah lagi
                                                @else
                                                    Jawaban dapat diubah sampai
                                                    {{ $jadwaltes->durasi_tes }}
                                            </span>
                                        @endif
                            @endif
                            </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5" class="text-center">Data tidak ditemukan</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection
