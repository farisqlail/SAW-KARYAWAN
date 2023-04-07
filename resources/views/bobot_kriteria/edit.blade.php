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
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="bobot_awal">Bobot Awal <span class="text-danger">*</span></label>
                                            <input type="text" name="bobot_awal" value="{{ $data->bobot_awal }}" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="bobot_akhir">Bobot Akhir <span class="text-danger">*</span></label>
                                            <input type="text" name="bobot_akhir" value="{{ $data->bobot_akhir }}" class="form-control" required>
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
