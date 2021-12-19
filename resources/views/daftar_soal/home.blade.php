@extends('layouts.user')

@section('content')

    @include('jawaban.jawaban')

    <div class="container" style="margin-top: 6rem;">
        <div class="card shadow-sm p-3 mb-5 bg-body rounded">
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
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->soal }}</td>
                                        <td align="center">
                                            <a href="/upload/{{ $data->file_soal }}" class="btn btn-primary"
                                                target="blank"><i class="fas fa-download"></i> &nbsp; Download File</a>
                                        </td>

                                        <td align="center">
                                            <a href="{{ route('jawaban.unggah', $data->id_jadwal_tes) }}"
                                                data-id={{ $data->id_jadwal_tes }} class="btn btn-success"
                                                data-toggle="modal" data-target="#unggah-jawaban">Unggah Jawaban</a>
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

                    {{-- <form action="{{ route('jawaban.store') }}" method="POST" enctype="multipart/form-data">

                {{ csrf_field() }}


                <input type="number" name="id_soal_tes" value="{{ $daftarsoal[0]->id_soal }}" hidden>
                <input type="number" name="id_pelamar" value="{{ $pelamarGet }}" hidden>
                <input type="number" name="id_lowongan" value="{{ $pelamar[0]->id_lowongan }}" hidden>
                <div class="form-group">
                    <h3>Unggah Jawaban</h3><br>
                    <span>Jika sudah menyelesaikan soal unggah jawabanmu disini</span><br>
                    <input type="file" class="btn btn-success mt-3" name="jawaban" value="Unggah Jawaban">
                </div><br>

                <button type="submit" class="btn btn-primary">Uggah Jawaban</button>
            </form> --}}



                </div>
            </div>
        </div>


    @endsection
