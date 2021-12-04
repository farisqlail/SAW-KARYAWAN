@extends('admin.app')

@section('content')

    @include('lowongan.delete-body')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2 class="float-left">Lowongan</h2>
                        <div class="float-right">

                            <a href="{{ route('lowongan.tambah') }}" class="btn btn-success">Tambah</a>

                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="myTable">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Posisi Lowongan</th>
                                        <th class="text-center">Kuota Lowongan</th>
                                        <th class="text-center">Berlaku Sampai</th>
                                        <th class="text-center">Deskripsi Lowongan</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!empty($lowongan))
                                        @foreach ($lowongan as $data)
                                        
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $data->posisi_lowongan }}</td>
                                                <td>{{ $data->kuota }}</td>
                                                <td>{!! \Illuminate\Support\Str::limit($data->berlaku_sampai, 30) !!}</td>
                                                <td>{!! \Illuminate\Support\Str::limit($data->deskripsi_pekerjaan, 30) !!}</td>
                                                <td class="text-center">
                                                    <form
                                                        action="{{ route('lowongan.hapus', ['id' => $data->id_lowongan]) }}"
                                                        method="POST">
                                                        @csrf
                                                        {{-- @if (Auth()->user()->role == 'admin') --}}
                                                            <a href="{{ route('kriteria.index', ['id' => $data->id_lowongan]) }}"
                                                                class="btn btn-sm btn-info">Kriteria</a>
                                                            <a href="{{ route('lowongan.edit', ['id' => $data->id_lowongan]) }}"
                                                                class="btn btn-sm btn-warning">Edit</a>
                                                                <a href="{{ route('lowongan.delete', ['id', $data->id_lowongan]) }}"
                                                                    data-id="{{ route('lowongan.delete', ['id', $data->id_lowongan]) }}" class="btn btn-sm btn-danger"
                                                                    data-toggle="modal" data-target="#modalHapus">
                                                                    Hapus
                                                                </a>
                                                        {{-- @endif --}}
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
