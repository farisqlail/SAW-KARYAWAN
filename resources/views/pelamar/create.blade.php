@extends('admin.app')

@section('content')

    <style>
        .custom-file-upload {
            border: 1px solid #ccc;
            display: inline-block;
            padding: 6px 12px;
            cursor: pointer;
        }

    </style>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2 class="float-left">Lamar Pekerjaan</h2>
                        </form>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <form enctype="multipart/form-data" action="{{ route('pelamar.simpan') }}" method="POST"
                                class="col-md-12">
                                @csrf
                                <div class="form-group">
                                    <input type="text" name="id_user" class="form-control" value="{{Auth::id()}}" hidden>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="id_lowongan" class="form-control" value="{{$lowongan->id_lowongan}}" hidden>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Nama Lengkap <span class="text-danger">*</span></label>
                                            <input type="text" name="nama_pelamar" required class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Tanggal Lahir <span class="text-danger">*</span></label>
                                            <input type="date" name="tanggal_lahir" required class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="">Jenis Kelamin <span class="text-danger">*</span></label>
                                    <select name="jenis_kelamin" class="form-control">
                                        <option value="">Pilih Jenis Kemalin</option>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="">Kriteria <span class="text-danger">*</span></label>
                                    <select name="id_kriteria" class="form-control">
                                        <option value="">Pilih Kriteria</option>
                                        @foreach ($kriteria as $item)
                                            <option value="{{ $item->id_kriteria }}">{{ $item->nama_kriteria }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">No Telepon <span class="text-danger">*</span></label>
                                            <input type="number" name="no_telepon" required class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6"></div>
                                </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <label for="">CV</label>
                                <input name="cv" class="form-control-file custom-file-upload" type="file" />
                            </div>
                            <div class="col-md-3">
                                <label for="">Ijazah</label>
                                <input name="ijazah" class="form-control-file custom-file-upload" type="file" />

                            </div>
                            <div class="col-md-3">
                                <label for="">Pas Foto</label>
                                <input name="pas_foto" class="form-control-file custom-file-upload" type="file" />
                            </div>
                        </div>

                        <div class="lamar-btn mt-3" align="right">
                            <button type="submit" class="btn btn-primary">Lamar</button>
                        </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>

@endsection
