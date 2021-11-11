@extends('admin.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="float-left">Kriteria</h2>
                    <div class="float-right">
                        <a href="{{route('kriteria.tambah',['id' => $lowongan->id_lowongan])}}" class="btn btn-success">Tambah</a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Kriteria</th>
                                    <th class="text-center">Atribut</th>
                                    <th class="text-center">Bobot (%)</th>
                                    <th class="text-center" style="width: 30%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($kriteria))
                                @foreach($kriteria as $data)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$data->nama_kriteria}}</td>
                                    <td>{{$data->atribut_kriteria}}</td>
                                    <td>{{$data->bobot_preferensi}}</td>
                                    <td class="text-center">
                                        <form action="{{route('kriteria.hapus',['id' => $data->id_kriteria])}}" method="POST">
                                            @csrf
                                            <a href="{{route('bobot_kriteria.index',['id' => $data->id_kriteria])}}" class="btn btn-sm btn-info">Bobot kriteria</a>
                                            <a href="{{route('kriteria.edit',['id' => $data->id_kriteria])}}" class="btn btn-sm btn-warning">Edit</a>
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