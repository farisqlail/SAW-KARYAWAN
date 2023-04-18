@extends('admin.app')

@section('content')
    {{-- @include('jawaban.nilai', [$hasilTes[0]->id]) --}}
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2 class="float-left">Hasil Tes {{ $pelamar->nama_pelamar }}</h2>
                        <div class="float-right">
                            <a href="{{ route('jawaban.index', ['id' => $pelamar->id]) }}" class="btn btn-danger">Kembali</a>

                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <form enctype="multipart/form-data"
                                action="{{ route('jawaban.nilai.update', [$hasilTes[0]->id]) }}" method="POST"
                                class="col-md-12" id="form-nilaiJawaban">
                                @csrf
                                {{ method_field('PUT') }}
                                <div class="form-group">
                                    <label for="soal">Nilai<span class="text-danger">*</span></label><br>
                                    <input type="number" name="nilai" required class="form-control"
                                        @if ($hasilTes[0]->nilai !== null) value={{ $hasilTes[0]->nilai }}
                                                                @else
                                                                    placeholder="Nilai 0 ...." @endif>


                                    <div class="modal-footer" style="border:none;">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-success">Nilai</button>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
