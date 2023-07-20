@extends('admin.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="float-left">Jawaban untuk soal {{ $daftarsoal->soal }}</h3>
                        <div class="float-right">
                            <a href="{{ route('daftar_soal.index', ['id' => $daftarsoal->id_jadwal_tes]) }}"
                                class="btn btn-danger">Kembali</a>
                            @if(count($detailJawaban) == 0)
                            <a href="{{ route('detail_jawaban.tambah', $daftarsoal->id) }}"
                                class="btn btn-success">Tambah</a>
                            @endif
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="myTable">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Jawaban A</th>
                                        <th class="text-center">Jawaban B</th>
                                        <th class="text-center">Jawaban C</th>
                                        <th class="text-center">Jawaban D</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!empty($detailJawaban))
                                        @foreach ($detailJawaban as $data)
                                            <tr class="text-center">
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $data->jawaban_a }}</td>
                                                <td>{{ $data->jawaban_b }}</td>
                                                <td>{{ $data->jawaban_c }}</td>
                                                <td>{{ $data->jawaban_d }}</td>
                                                <td class="text-center">
                                                    <a href="{{ route('detail_jawaban.edit', ['id' => $data->id]) }}"
                                                        class="btn btn-warning">Edit</a>
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
    {{-- <script>
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
                        window.location = "/daftar_soal/admin/hapus/" + soalId + ""
                        swal("Data berhasil dihapus", {
                            icon: "success",
                        });
                    } else {
                        swal("Data tidak jadi dihapus");
                    }
                });
        });
    </script> --}}
@endsection
