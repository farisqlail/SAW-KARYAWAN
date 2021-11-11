@extends('admin.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2 class="float-left">Daftar Soal</h2>
                        <div class="float-right">
                                <a href="{{route('daftar_soal.tambah')}}" class="btn btn-success">Tambah</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="myTable">
                                <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Soal</th>
                                    <th class="text-center">File Soal</th>
                                    <th class="text-center">Bobot Soal</th>
                                    <th class="text-center" style="width:30%">Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(!empty($daftarsoal))
                                    @foreach($daftarsoal as $data)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$data->soal}}</td>
                                            <td><a href="/upload/{{$data->file_soal}}">Download File</a></td>
                                            <td>{{$data->bobot_soal}}</td>
                                            <td class="text-center">
                                                <form action="{{route('daftar_soal.hapus',['id' => $data->id_soal])}}" method="POST">
                                                    @csrf
                                                        <a href="{{route('daftar_soal.edit',['id' => $data->id_soal])}}" class="btn btn-sm btn-warning">Edit</a>
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
