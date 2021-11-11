@extends('admin.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="float-left">Bobot Kriteria</h2>
                    <div class="float-right">
                        <a href="{{route('bobot_kriteria.tambah',['id' => $kriteria->id_kriteria])}}" class="btn btn-success">Tambah</a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kriteria</th>
                                    <th>Keterangan</th>
                                    <th>Nilai Bobot</th>
                                    <th class="text-center" style="width:20%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($bobot_kriteria))
                                @foreach($bobot_kriteria as $data)
                                
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$datakriteria->nama_kriteria}}</td>
                                    <td>{{$data->nama_bobot}}</td>
                                    <td>{{$data->jumlah_bobot}}</td>
                                    <td class="text-center">
                                        <form action="{{route('bobot_kriteria.hapus',['id' => $data->id_bobot_kriteria])}}" method="POST">
                                            @csrf
                                            <a href="{{route('bobot_kriteria.edit',['id' => $data->id_bobot_kriteria])}}" class="btn btn-sm btn-warning">Edit</a>
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