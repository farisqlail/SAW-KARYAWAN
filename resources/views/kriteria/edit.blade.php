@extends('admin.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2 class="float-left">Edit Kriteria</h2>
                        </form>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <form action="{{route('kriteria.update', $data->id)}}" method="POST" class="col-md-12">
                                @csrf
                                <div class="form-group">
                                    <input type="text" name="id_lowongan" class="form-control" value="{{$data->id_lowongan}}" hidden>
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama Kriteria <span class="text-danger">*</span></label>
                                    <input type="text" name="nama_kriteria" class="form-control" value="{{$data->nama_kriteria}}">
                                </div>
                                <div class="form-group">
                                    <label for="atribut">Atribut <span class="text-danger">*</span></label>
                                    <select name="atribut_kriteria" class="form-control">
                                        <option value="">-- Pilih Atribut --</option>
                                        <option value="cost" {{($data->atribut_kriteria=='cost')?'selected':''}}>Cost</option>
                                        <option value="benefit" {{($data->atribut_kriteria=='benefit')?'selected':''}}>Benefit</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="tampil_di_pelamar">Tampil di Pelamar <span class="text-danger">*</span></label>
                                    <select name="tampil_di_pelamar" required class="form-control">
                                        <option value="1" @if($data->tampil_di_pelamar == 1) selected @endif >Ya</option>
                                        <option value="0" @if($data->tampil_di_pelamar == 0) selected @endif >Tidak</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="bobot">Bobot Preferensi (%)<span class="text-danger">*</span></label>
                                    <input type="number" name="bobot_preferensi" class="form-control" max="100" value="{{$data->bobot_preferensi}}" required>
                                </div>
                                <div class="float-right">
                                    <a href="{{ route('kriteria.index', ['id' => $data->id_lowongan]) }}" class="btn btn-danger">Batal</a>
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
