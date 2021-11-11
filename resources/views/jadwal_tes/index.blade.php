@extends('admin.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2 class="float-left">Jadwal Tes</h2>
                        <div class="float-right">
                            <a href="{{route('jadwal_tes.tambah')}}" class="btn btn-success">Tambah</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Posisi Lowongan</th>
                                    <th class="text-center">Tanggal Tes</th>
                                    <th class="text-center">Batas Pengumpulan</th>
                                    <th class="text-center" style="width:40%">Aksi</th>

                                </tr>
                                </thead>
                                <tbody>
                                @if(!empty($jadwal_tes))
                                    @foreach($jadwal_tes as $data)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$data->posisi_lowongan}}</td>
                                            <td>{{$data->tanggal}}</td>
                                            <td>{{$data->durasi_tes}}</td>
                                            <td class="text-center">
                                                <form action="{{route('jadwal_tes.hapus',['id' => $data->id_jadwal_tes])}}" method="POST">
                                                    @csrf
                                                    
                                                    <a href="{{route('jadwal_tes.pilihsoal',['id' => $data->id_jadwal_tes])}}" class="btn btn-sm btn-info">Pilih soal</a>
                                                    <a href="" class="btn btn-sm btn-info">Nilai</a>
                                                    <a href="{{route('jadwal_tes.ubah',['id' => $data->id_jadwal_tes])}}"class="btn btn-sm btn-warning">Edit</a>
                                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                                </form>
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
