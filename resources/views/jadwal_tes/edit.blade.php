@extends('admin.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2 class="float-left">Edit Jadwal Tes</h2>
                    </form>
                </div>

                <div class="card-body">
                    <div class="row">
                        <form action="{{route('jadwal_tes.update',$jadwal_tes->id)}}" method="POST" class="col-md-12">
                            @csrf
                            <div class="form-group">
                                <label for="nama">Pilih Lowongan<span class="text-danger">*</span></label>
                                <select name="id" class="form-control" required>
                                    <option value="{{$jadwal_tes->id}}">{{ $jadwal_tes->posisi_lowongan}} </option>
                                    @foreach($lowongan as $data)
                                    @if($data->id==$jadwal_tes->id)

                                    @else
                                    <option value="{{$data->id}}">{{$data->posisi_lowongan}}</option>
                                    @endif
                                    @endforeach
                                </select>

                            </div>
                            <div class="form-group">
                                <label for="nama">Tanggal Notif <span class="text-danger">*</span></label>
                                <input type="datetime-local" name="tanggal_notif" class="form-control" value="{{date('Y-m-d\TH:i', strtotime($jadwal_tes->tanggal_notif)) }}">
                            </div>
                            <div class="form-group">
                                <label for="nama">Tanggal Mulai <span class="text-danger">*</span></label>
                                <input type="datetime-local" name="tanggal" class="form-control" value="{{date('Y-m-d\TH:i', strtotime($jadwal_tes->tanggal)) }}">
                            </div>
                            <div class="form-group">
                                <label for="batas">Batas Pengumpulan <span class="text-danger">*</span></label>
                                <input type="datetime-local" name="batas" class="form-control" value="{{date('Y-m-d\TH:i', strtotime($jadwal_tes->durasi_tes)) }}">
                            </div>
                            <div class="float-right">
                                <a href="{{ route('jadwal_tes.index') }}" class="btn btn-danger">Batal</a>
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