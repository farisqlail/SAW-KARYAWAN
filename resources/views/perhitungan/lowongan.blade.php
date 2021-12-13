@extends('admin.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="float-left">Lowongan</h2>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="myTable">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Posisi Lowongan</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($lowongan))
                                @foreach($lowongan as $data)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$data->posisi_lowongan}}</td>
                                    <td class="text-center">
                                        <a href="{{route('perhitungan.index', $data)}}" class="btn btn-sm btn-info">Seleksi 1</a>
                                        <a href="{{ Route('perhitungan.dua', $data) }}" class="btn btn-sm btn-success">Seleksi 2</a>
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