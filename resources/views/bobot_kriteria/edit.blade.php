@extends('admin.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2 class="float-left">Edit Bobot Kriteria</h2>
                        </form>
                    </div>

                    <div class="card-body">
                        @include('alert')
                        <div class="row">
                            <form action="{{ route('bobot_kriteria.update', $data->id) }}" method="POST" class="col-md-12">
                                @csrf
                                <div class="form-group">
                                    <input type="text" name="id_kriteria" class="form-control"
                                        value="{{ $data->id_kriteria }}" hidden>
                                </div>
                                <div class="form-group">
                                    <label for="keterangan_bobot">Keterangan Bobot <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="keterangan_bobot" class="form-control"
                                        value="{{ $data->nama_bobot }}">
                                </div>
                                <div class="form-group">
                                    <label for="jumlah_bobot">Jumlah Bobot <span class="text-danger">*</span></label>
                                    <input type="number" name="jumlah_bobot" value="{{ $data->jumlah_bobot }}" class="form-control" required>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nilai_awal">Nilai Awal <span class="text-danger">*</span></label>
                                            <input type="text" value="{{ $data->nilai_awal }}" name="nilai_awal" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nilai_akhir">Nilai Akhir <span class="text-danger">*</span></label>
                                            <input type="text" value="{{ $data->nilai_akhir }}" name="nilai_akhir" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="float-right">
                                    <a href="{{ route('bobot_kriteria.index', ['id' => $data->id]) }}"
                                        class="btn btn-danger">Batal</a>
                                    <button type="submit" class="btn btn-success">Edit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
