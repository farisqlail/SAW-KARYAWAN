@extends('admin.app')

@section('content')
<style>
    input[type="file"] {
        display: none;
    }

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
                    <h2 class="float-left">Edit Lowongan</h2>
                    </form>
                </div>

                <div class="card-body">
                    <div class="row">
                        <form enctype="multipart/form-data" action="{{route('lowongan.update',['id_lowongan' => $lowongan->id_lowongan])}}" method="POST" class="col-md-12">
                            @csrf
                            <div class="form-group">
                                <label for="nama">Posisi Lowongan <span class="text-danger">*</span></label>
                                <input type="text" name="posisi" required class="form-control" value="{{$lowongan->posisi_lowongan}}">
                            </div>
                            <div class="form-group">
                                <label for="nama">Kuota Lowongan <span class="text-danger">*</span></label>
                                <input type="number" name="kuota" required class="form-control" value="{{$lowongan->kuota}}">
                            </div>
                            <div class="form-group">
                                    <label for="nama">Berlaku Sampai <span class="text-danger">*</span></label>
                                    <input type="date" name="berlaku" required class="form-control"value="{{$lowongan->berlaku_sampai}}">
                            </div>
                            <div class="form-group">
                                    <label for="nama">Deskripsi<span class="text-danger">*</span></label>
                                    <textarea name="deskripsi" class="form-control">{{$lowongan->keterangan}}</textarea>
                            </div>
                          
                           
                            <div class="float-right">
                                <button type="submit" class="btn btn-success">Tambah</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection