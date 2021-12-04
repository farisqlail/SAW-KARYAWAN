@extends('admin.app')

@section('content')

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

                                            <div class="modal fade" id="modalHapus" tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Hapus Lowongan
                                                            </h5>
                                                            <button type="button" class="close"
                                                                data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body text-center">
                                                            <img src="{{ asset('assets/img/delete-alert.gif') }}"
                                                                img="img-fluid" width="200" alt=""><br><br>
                                                            <h4>Yakin ingin menghapus lowongan ?</h4>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form
                                                                action="{{ route('lowongan.hapus', ['id' => $data->id_lowongan]) }}"
                                                                method="POST">
                                                                @csrf
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

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
                                                        @if (Auth()->user()->role == 'admin')
                                                            <a href="{{ route('kriteria.index', ['id' => $data->id_lowongan]) }}"
                                                                class="btn btn-sm btn-info">Kriteria</a>
                                                            <a href="{{ route('lowongan.edit', ['id' => $data->id_lowongan]) }}"
                                                                class="btn btn-sm btn-warning">Edit</a>
                                                            <button type="button" class="btn btn-sm btn-danger"
                                                                data-toggle="modal" data-target="#modalHapus">
                                                                Hapus
                                                            </button>
                                                        @endif
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
