@extends('admin.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2 class="float-left">Nilai Jawaban</h2>
                        </form>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <form enctype="multipart/form-data"
                                action="{{ route('jawaban.nilai.update', ['id_hasil_tes' => $hasilTes->id_hasil_tes]) }}"
                                method="POST" class="col-md-12">
                                @csrf
                                {{ method_field('PATCH') }}
                                <div class="form-group">
                                    <label for="soal">Nilai<span class="text-danger">*</span></label><br>
                                    <input type="number" name="nilai" required class="form-control" @if (!empty($hasilTes->nilai))
                                    value={{ $hasilTes->nilai }}
                                @else
                                    placeholder="Nilai 0 ...."
                                    @endif>
                                </div>

                                <div class="float-right">
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
