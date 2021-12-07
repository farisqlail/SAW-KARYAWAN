@extends('admin.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2 class="float-left">Daftar Soal</h2>
                        <div class="float-right">
                            <a href="{{ route('daftar_soal.tambah', ['id' => $jadwaltes->id_jadwal_tes]) }}"
                                class="btn btn-success">Tambah</a>
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
                                    @if (!empty($daftarsoal))
                                        @foreach ($daftarsoal as $data)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $data->soal }}</td>
                                                <td><a href="/upload/{{ $data->file_soal }}">Download File</a></td>
                                                <td>{{ $data->bobot_soal }}</td>
                                                <td class="text-center">

                                                    <a href="{{ route('daftar_soal.edit', ['id' => $data->id_soal]) }}"
                                                        class="btn btn-sm btn-warning">Edit</a>
                                                    <a href="#" class="btn btn-sm btn-danger delete"
                                                        data-id="{{ $data->id_soal }}">Hapus</a>

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
            var soalId = $(this).attr('data-id');
            swal({
                    title: "Apakah kamu yakin ?",
                    text: "Apa kamu yakin ingin menghapus data ini",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location = "/daftar_soal/hapus/" + soalId + ""
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
