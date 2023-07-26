@extends('layouts.user')

{{-- <img src="{{ asset('assets/img/Form.png') }}" class="img-fluid" style="margin-top: 80px;" alt="" srcset=""> --}}

@section('content')
    <main id="main">

        <div class="container">
            <div class="row " style="margin-top: 50px;">
                <div class="col-md-12">
                    <div class="card shadow p-3 mb-5 bg-white rounded">

                        <div class="card-body">
                            <div class="row">

                                @if (Session::has('success'))
                                    <div class="alert alert-success">
                                        {{ Session::get('success') }}
                                        @php
                                            Session::forget('success');
                                        @endphp
                                    </div>
                                @endif

                                @include('alert')

                                <form enctype="multipart/form-data" action="{{ route('lowongan.pelamar.simpan') }}"
                                    method="POST" class="col-md-12 needs-validation" novalidate>
                                    @csrf

                                    <div class="form-group">
                                        <input type="text" name="id_user" class="form-control"
                                            value="{{ Auth::id() }}" hidden>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="id_lowongan" class="form-control"
                                            value="{{ $lowongan->id }}" hidden>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Nama Lengkap <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" name="nama_pelamar" required class="form-control"
                                                    value="{{ Auth::user()->name }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Tempat Lahir <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir') }}"
                                                    required class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Tanggal Lahir <span
                                                        class="text-danger">*</span></label>
                                                <input type="date" name="tanggal_lahir"
                                                    value="{{ old('tanggal_lahir') }}" required class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Agama <span class="text-danger">*</span></label>
                                                <select name="agama" class="form-control" required>
                                                    <option value="">Pilih agama
                                                    </option>
                                                    <option @if (old('agama') == 'Islam') selected @endif
                                                        value="Islam">Islam</option>
                                                    <option @if (old('agama') == 'Kristen') selected @endif
                                                        value="Kristen">Kristen</option>
                                                    <option @if (old('agama') == 'Katolik') selected @endif
                                                        value="Katolik">Katolik</option>
                                                    <option @if (old('agama') == 'Buddha') selected @endif
                                                        value="Buddha">Buddha</option>
                                                    <option @if (old('agama') == 'Hindu') selected @endif
                                                        value="Hindu">Hindu</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Jenis Kelamin <span
                                                        class="text-danger">*</span></label>
                                                <div class="row mt-2">
                                                    <div class="col-md-6">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                name="jenis_kelamin"
                                                                @if (old('jenis_kelamin') == 'Laki-laki') checked @endif
                                                                id="jenis_kelamin" value="Laki-laki">
                                                            <label class="form-check-label" for="jenis_kelamin">
                                                                Laki - Laki
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                name="jenis_kelamin"
                                                                @if (old('jenis_kelamin') == 'Perempuan') checked @endif
                                                                id="jenis_kelamin" value="Perempuan">
                                                            <label class="form-check-label" for="jenis_kelamin">
                                                                Perempuan
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">No Telepon <span class="text-danger">*</span></label>
                                                <input type="number" name="no_telepon" value="{{ old('no_telepon') }}"
                                                    required class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Alamat <span class="text-danger">*</span></label>
                                                <textarea name="alamat" id="" cols="30" rows="5" required class="form-control">{{ old('alamat') }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- 
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="">IPK</label>
                                                <input type="number" step="0.01" name="ipk" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="">Pengalaman Kerja <span class="text-danger">*</span></label>
                                            <select name="pengalaman" class="form-control" id="">
                                                <option value="1">1 Tahun</option>
                                                <option value="2">2 Tahun</option>
                                                <option value="3">3 Tahun</option>
                                                <option value="4">4 Tahun</option>
                                            </select>
                                        </div>
                                    </div> --}}


                                    <div class="row mt-3">
                                        <div class="col-md-12">
                                            @foreach ($kriteria as $key => $kt)
                                                <div class="form-group">
                                                    <input type="hidden" name="kriteria_id[]"
                                                        value="{{ $kt->id }}">
                                                    <div class="form-group">
                                                        <label for="kriteria">{{ $kt->nama_kriteria }} <span
                                                                class="text-danger">*</span></label>
                                                        @if ($kt->nama_kriteria === 'PENGALAMAN')
                                                            <select name="kriteria[]" id="kriteria" required
                                                                class="form-control">
                                                                @foreach ($bobot_kriteria as $option)
                                                                    @if ($kt->id == $option->id_kriteria)
                                                                        <option value="{{ $option->nilai_awal }}"
                                                                            @if (old('kriteria')) @if (old('kriteria')[$key] == $option->id) selected @endif
                                                                            @endif>
                                                                            {{ $option->nama_bobot }}</option>
                                                                    @endif
                                                                @endforeach
                                                            </select>
                                                        @else
                                                            <input type="text" name="kriteria[]" id="kriteria"
                                                                @if (old('kriteria')) value="{{ old('kriteria')[$key] }}" @endif
                                                                required class="form-control">
                                                        @endif
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>


                            </div>

                            <div class="form-group mt-2">
                                <label for="">CV <span class="text-danger">*</span></label><br>
                                <input name="cv" class="form-control-file mt-2" type="file" required />
                                @if ($errors->has('cv'))
                                    <span class="text-danger">{{ $errors->first('cv') }}</span>
                                @endif
                            </div>

                            <div class="form-group mt-3">
                                <label for="">Ijazah <span class="text-danger">*</span></label><br>
                                <input name="ijazah" class="form-control-file mt-2 " id="ijazah" type="file"
                                    required />
                                @if ($errors->has('ijazah'))
                                    <span class="text-danger">{{ $errors->first('ijazah') }}</span>
                                @endif
                            </div>

                            <div class="form-group mt-3">
                                <label for="">Pas Foto <span class="text-danger">*</span></label><br>
                                <input name="pas_foto" class="form-control-file mt-2" type="file" required />
                                @if ($errors->has('pas_foto'))
                                    <span class="text-danger">{{ $errors->first('pas_foto') }}</span>
                                @endif
                            </div>

                        </div>

                        <div class="modal fade" id="lamar" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Cek Data Kamu!</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body text-center mx-auto">
                                        <img src="{{ asset('assets/img/cek.gif') }}" class="img-fluid" width="250">

                                        <h3>Apakah anda yakin datamu sudah benar ?</h3>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary">Yakin Lamar</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="lamar-btn mt-3" align="right">
                            <button type="button" class="btn btn-get text-white d-inline-flex" style="border: none;"
                                data-bs-toggle="modal" data-bs-target="#lamar">
                                Lamar
                            </button>
                            {{-- <button type="submit" class="btn-get-started" style="border: none;">Lamar</button> --}}
                        </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </main>
@endsection
