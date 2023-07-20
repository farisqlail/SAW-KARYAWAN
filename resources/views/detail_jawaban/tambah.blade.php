@extends('admin.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2 class="float-left">Tambah Jawaban</h2>
                        </form>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <form enctype="multipart/form-data" action="{{ route('detail_jawaban.simpan') }}" method="POST"
                                class="col-md-12">
                                @csrf
                                <div class="form-group">
                                    
                                    <input type="text" name="id_daftar_soal" class="form-control"
                                        value="{{ $daftarsoal->id }}" hidden>
                                </div>
                                <div class="form-group">
                                    <label for="soal">Jawaban A<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="jawaban_a" id="">
                                </div>
                                <div class="form-group">
                                    <label for="soal">Jawaban B<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="jawaban_b" id="">
                                </div>
                                <div class="form-group">
                                    <label for="soal">Jawaban C<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="jawaban_c" id="">
                                </div>
                                <div class="form-group">
                                    <label for="soal">Jawaban D<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="jawaban_d" id="">
                                </div>
                                
                                <br>
                                <div class="float-right">
                                    <a href="{{ route('detail_jawaban.index', ['id' => $daftarsoal->id]) }}"
                                        class="btn btn-danger">Batal</a>
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
