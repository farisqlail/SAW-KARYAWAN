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
                                        <th class="text-center">Berlaku Sampai</th>
                                        <th class="text-center">Deskripsi Lowongan</th>
                                        <th class="text-center">Deskripsi Persyaratan</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!empty($lowongan))
                                        @foreach ($lowongan as $data)
                                        
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $data->posisi_lowongan }}</td>
                                                <td>{!! \Illuminate\Support\Str::limit($data->berlaku_sampai, 30) !!}</td>
                                                <td>{!! \Illuminate\Support\Str::limit($data->deskripsi_pekerjaan, 30) !!}</td>
                                                <td>{!! \Illuminate\Support\Str::limit($data->deskripsi_persyaratan, 30) !!}</td>
                                                <td class="text-center">
                                                        {{-- @if (Auth()->user()->role == 'admin') --}}
                                                            <a href="{{ route('kriteria.index', ['id' => $data->id_lowongan]) }}"
                                                                class="btn btn-sm btn-info">Kriteria</a>
                                                            <a href="{{ route('lowongan.edit', ['id' => $data->id_lowongan]) }}"
                                                                class="btn btn-sm btn-warning">Edit</a>
                                                                <a href="#" data-id="{{ $data->id_lowongan }}" class="btn btn-sm btn-danger delete">
                                                                    Hapus
                                                                </a>
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
                    window.location = "/lowongan/hapus/" + lowonganId + ""
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
