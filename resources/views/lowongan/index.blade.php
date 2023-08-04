@extends('admin.app')

@section('content')


    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2 class="float-left">Lowongan</h2>
                        <div class="float-right">
                            @if (Auth::user()->role == 'admin')
                                <a href="{{ route('lowongan.tutup-periode') }}" class="btn btn-danger">Tutup Periode</a>
                                <a href="{{ route('lowongan.tambah') }}" class="btn btn-success">Tambah</a>
                            @elseif (Auth::user()->role == 'divisi')
                                <a href="{{ route('lowongan.tambah') }}" class="btn btn-success">Tambah</a>
                            @elseif(Auth::user()->role == 'direksi')
                                <a href="{{ route('lowongan.tutup-periode') }}" class="btn btn-danger">Tutup Periode</a>
                            @endif

                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="myTable" style="width: 98%;">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Posisi Lowongan</th>
                                        <th class="text-center">Berlaku Sampai</th>
                                        <th class="text-center">Status Lowongan</th>
                                        <th class="text-center">Status Approve</th>
                                        <th class="text-center">Deskripsi Lowongan</th>
                                        @if (Auth::user()->role == 'admin')
                                            <th>Aksi</th>
                                        @elseif(Auth::user()->role == 'divisi')
                                            <th>Aksi</th>
                                        @elseif(Auth::user()->role == 'direksi')
                                            <th>Aksi</th>
                                        @elseif(Auth::user()->role == 'hrd')
                                            <th>Aksi</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!empty($lowongan))
                                        @foreach ($lowongan as $data)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $data->posisi_lowongan }}</td>
                                                <td>{!! \Illuminate\Support\Str::limit($data->berlaku_sampai, 30) !!}</td>
                                                <td align="center">
                                                    @if ($data->berlaku_sampai > date('Y-m-d') && $data->status_lowongan == null)
                                                        <span class="badge badge-success">Pendaftaran</span>
                                                    @elseif(strtolower($data->status_lowongan) == strtolower('Seleksi 1'))
                                                        <span class="badge badge-warning">Seleksi 1</span>
                                                    @elseif($data->status_lowongan == 'Seleksi 2')
                                                        <span class="badge badge-warning">Seleksi 2</span>
                                                    @elseif($data->status_lowongan == 'Seleksi Selesai')
                                                        <span class="badge badge-danger">Seleksi Selesai</span>
                                                    @endif
                                                </td>
                                                <td align="center">
                                                    @if ($data->status_approve == 'hrd')
                                                        <span class="badge badge-warning">Menunggu approvement HRD</span>
                                                    @elseif($data->status_approve == 'direksi')
                                                        <span class="badge badge-warning">Menunggu approvement
                                                            Direksi</span>
                                                    @elseif($data->status_approve == 'tolak direksi')
                                                        <span class="badge badge-danger">Lowongan ditolak direksi</span>
                                                    @elseif($data->status_approve == 'tolak hrd')
                                                        <span class="badge badge-danger">Lowongan ditolak hrd</span>
                                                    @else
                                                        <span class="badge badge-success">Approvement</span>
                                                    @endif
                                                </td>
                                                <td>{!! \Illuminate\Support\Str::limit($data->deskripsi_pekerjaan, 30) !!}</td>
                                                <td>
                                                    @if (Auth()->user()->role == 'admin')
                                                        <a href="{{ route('kriteria.index', ['id' => $data->id]) }}"
                                                            class="btn btn-sm btn-info btn-sm">Kriteria</a>
                                                        <a href="{{ route('lowongan.edit', ['id' => $data->id]) }}"
                                                            class="btn btn-sm btn-warning btn-sm">Edit</a>
                                                        <a href="#" data-id="{{ $data->id }}"
                                                            class="btn btn-sm btn-danger delete">
                                                            Hapus
                                                        </a>
                                                    @elseif (Auth()->user()->role == 'divisi')
                                                        <a href="{{ route('kriteria.index', ['id' => $data->id]) }}"
                                                            class="btn btn-sm btn-info btn-sm">Kriteria</a>
                                                        <a href="{{ route('lowongan.edit', ['id' => $data->id]) }}"
                                                            class="btn btn-sm btn-warning btn-sm">Edit</a>
                                                        <a href="#" data-id="{{ $data->id }}"
                                                            class="btn btn-sm btn-danger delete">
                                                            Hapus
                                                        </a>
                                                    @elseif(Auth::user()->role == 'direksi')
                                                        @if ($data->status_approve != 'selesai')
                                                            <a href="{{ route('lowongan.approveDireksi', $data->id) }}"
                                                                class="btn btn-sm btn-success">
                                                                Setujui
                                                            </a>
                                                            <a href="{{ route('lowongan.tolakDireksi', $data->id) }}"
                                                                class="btn btn-sm btn-danger">
                                                                Tolak
                                                            </a>
                                                        @endif
                                                        <a href="{{ route('lowongan.detailAdmin', $data->id) }}"
                                                            class="btn btn-sm btn-info">
                                                            Detail
                                                        </a>
                                                    @elseif(Auth::user()->role == 'hrd')
                                                        @if ($data->status_approve != 'direksi' && $data->status_approve == 'hrd')
                                                            <a href="{{ route('lowongan.approveHrd', $data->id) }}"
                                                                class="btn btn-sm btn-success">
                                                                Ajukan ke direksi
                                                            </a>
                                                            <a href="{{ route('lowongan.tolakHrd', $data->id) }}"
                                                                class="btn btn-sm btn-danger">
                                                                Tolak
                                                            </a>
                                                        @endif
                                                        <a href="{{ route('lowongan.detailAdmin', $data->id) }}"
                                                            class="btn btn-sm btn-info">
                                                            Detail
                                                        </a>
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
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $('.delete').click(function() {
            var lowonganId = $(this).attr('data-id');
            swal({
                    title: "Apakah kamu yakin ?",
                    text: "Apa kamu yakin ingin menghapus data ini",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location = "/lowongan/admin/hapus/" + lowonganId + ""
                        swal("Data berhasil dihapus", {
                            icon: "success",
                        });
                    } else {
                        swal("Data tidak jadi dihapus");
                    }
                });
        });
    </script>
@endsection
