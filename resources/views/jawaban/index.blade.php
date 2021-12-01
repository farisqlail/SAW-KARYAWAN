@extends('admin.app')

@section('content')

@include('jawaban.nilai')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2 class="float-left">Hasil Tes</h2>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Posisi Lowongan</th>
                                        <th class="text-center">Nama Pelamar</th>
                                        <th class="text-center">File Jawaban</th>
                                        <th class="text-center">Nilai</th>
                                        <th class="text-center" style="width:40%">Aksi</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!empty($hasilTes))
                                        @foreach ($hasilTes as $data)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $data->pelamar->lowongan->posisi_lowongan }}</td>
                                                <td>{{ $data->pelamar->nama_pelamar }}</td>
                                                <td align="center"><a href="{{ asset('storage/file/jawaban/'. $data->jawaban) }}"
                                                        target="blank" class="btn btn-primary"><i
                                                            class="fas fa-download"></i> &nbsp;Unduh</a></td>
                                                <td class="text-center">
                                                    @if (!empty($data->nilai))
                                                        {{ $data->nilai }}
                                                    @else
                                                        0
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    {{-- <form action="{{route('jadwal_tes.hapus',['id' => $data->id_jadwal_tes])}}" method="POST">
                                                @csrf
                                                
                                                <a href="{{route('daftar_soal.index',['id' => $data->id_jadwal_tes])}}" class="btn btn-sm btn-info">Daftar Soal</a>
                                                <a href="{{ route('jawaban.index') }}" class="btn btn-sm btn-info">Nilai</a>
                                                <a href="{{route('jadwal_tes.ubah',['id' => $data->id_jadwal_tes])}}"class="btn btn-sm btn-warning">Edit</a>
                                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                            </form> --}}
                                                    {{-- <a href="{{ route('jawaban.nilai', $data->id_hasil_tes) }}"
                                                        class="btn btn-info">Nilai Jawaban</a> --}}
                                                        {{-- <button type="button" class="btn btn-info" data-toggle="modal" data-target="#nilaiJawaban">
                                                            Nilai Jawaban
                                                          </button> --}}
                                                          <a href="{{ route('jawaban.nilai', $data->id_hasil_tes) }}" data-id="{{ $data->id_hasil_tes }}" data-toggle="modal" data-target="#nilaiJawaban" class="btn btn-info">Nilai Jawaban</a>
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
            </div>
        </div>
    </div>

@endsection
