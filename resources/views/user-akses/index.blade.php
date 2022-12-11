@extends('admin.app')

@section('content')


    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2 class="float-left">Tambah Pengguna</h2>
                        <div class="float-right">

                            {{-- <a href="{{ route('user-akses.tambah') }}" class="btn btn-success">Tambah</a> --}}
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambahUser">
                                Tambah Data
                            </button>

                        </div>
                    </div>

                    {{-- Modal Tambah --}}
                    <div class="modal fade" id="tambahUser" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Tambah Pengguna</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('user-akses.store') }}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label for="">Nama Lengkap</label>
                                            <input type="text" class="form-control" name="name"
                                                placeholder="Nama Lengkap ...">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Email</label>
                                            <input type="email" class="form-control" name="email"
                                                placeholder="Email ...">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Role</label>
                                            <select name="role" class="form-control" id="">
                                                <option value="">Pilih Role</option>
                                                <option value="direksi">Direksi</option>
                                                <option value="hrd">HRD</option>
                                                <option value="divisi">Divisi</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Nama Divisi</label>
                                            <input type="text" class="form-control" name="division_name"
                                                placeholder="Nama Divisi ...">
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary">Tambah</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    {{-- End Modal Tambah --}}

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="myTable" style="width: 98%;">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Nama</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">Role</th>
                                        <th class="text-center">Nama Divisi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!empty($user))
                                        @foreach ($user as $data)
                                            <div class="modal fade" id="tambahUser{{ $data->id }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Edit Pengguna
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('user-akses.update', $data->id) }}"
                                                                method="post">
                                                                {{ method_field('PUT') }}
                                                                @csrf
                                                                <div class="form-group">
                                                                    <label for="">Nama Lengkap</label>
                                                                    <input type="text" class="form-control"
                                                                        name="name" value="{{ $data->name }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="">Email</label>
                                                                    <input type="email" class="form-control"
                                                                        name="email" value="{{ $data->email }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="">Role</label>
                                                                    <select name="role" class="form-control"
                                                                        id="">
                                                                        <option value="">Pilih Role</option>
                                                                        <option value="direksi">Direksi</option>
                                                                        <option value="hrd">HRD</option>
                                                                        <option value="divisi">Divisi</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="">Password Baru</label>
                                                                    <input type="password" class="form-control"
                                                                        name="password"
                                                                        value="{{ $data->password }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="">Nama Divisi</label>
                                                                    <input type="text" class="form-control"
                                                                        name="division_name"
                                                                        value="{{ $data->division_name }}">
                                                                </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Tutup</button>
                                                            <button type="submit" class="btn btn-primary">Edit</button>
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <tr class="text-center">
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $data->name }}</td>
                                                <td>{{ $data->email }}</td>
                                                <td>{{ $data->role }}</td>
                                                <td>{{ $data->division_name }}</td>
                                                <td>
                                                    {{-- @if (Auth()->user()->role == 'admin') --}}
                                                    <button type="button" class="btn btn-info btn-sm"
                                                        data-toggle="modal" data-target="#tambahUser{{ $data->id }}">
                                                        Edit
                                                    </button>
                                                    <a href="#" data-id="{{ $data->id }}"
                                                        class="btn btn-sm btn-danger delete">
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
            var userId = $(this).attr('data-id');
            swal({
                    title: "Apakah kamu yakin ?",
                    text: "Apa kamu yakin ingin menghapus data ini",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location = "/admin/user-akses/hapus/" + userId + ""
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
