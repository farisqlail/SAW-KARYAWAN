@extends('admin.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2 class="float-left">Tambah Soal</h2>
                        </form>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <form enctype="multipart/form-data" action="{{ route('daftar_soal.simpan') }}" method="POST"
                                class="col-md-12">
                                @csrf
                                <div class="form-group">
                                    <input type="text" name="id" class="form-control" value="{{ $jadwaltes->id }}"
                                        hidden>
                                    <input type="text" name="id_lowongan" class="form-control"
                                        value="{{ $lowongan->id }}" hidden>
                                </div>
                                <div class="form-group">
                                    <label for="kriteria">Kriteria <span class="text-danger">*</span></label>
                                    <select name="kriteria" id="kriteria" required class="form-control">
                                        @forelse ($kriteria as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama_kriteria }}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="soal">Soal<span class="text-danger">*</span></label>
                                    {{-- <input type="text" name="soal" required class="form-control"> --}}
                                    <textarea name="soal" class="form-control" cols="30" rows="3"></textarea>
                                </div>



                                @for ($i = 0; $i < count($urutan); $i++)
                                    <div class="row">
                                        <div class="col-md-8">

                                            <div class="form-group">
                                                <label for="soal">Jawaban {{ $urutan[$i] }} <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" required class="form-control" name="jawaban[]"
                                                    id="">
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-check" style="padding-top: 18%">
                                                <input class="form-check-input" value="{{ $i }}" type="radio"
                                                    name="isTrue" id="isTrue">
                                                <label class="form-check-label" for="isTrue">
                                                    Is True
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                @endfor

                                <br>
                                <div class="float-right">
                                    <a href="{{ route('daftar_soal.index', ['id' => $jadwaltes->id]) }}"
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
