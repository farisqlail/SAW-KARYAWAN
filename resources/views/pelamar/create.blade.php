@extends('layouts.user')

@section('content')

<main id="main">

    <div class="container">
        <div class="row justify-content-center" style="margin-top: 100px;">
            <div class="col-md-8">
                <div class="card shadow p-3 mb-5 bg-white rounded">

                    <h2 class="float-left">Lamar Pekerjaan</h2>
                    </form>


                    <div class="card-body">
                        <div class="row">
                            <form enctype="multipart/form-data" action="{{ route('pelamar.simpan') }}" method="POST" class="col-md-12">
                                @csrf
                                
                                <div class="form-group">
                                    <input type="text" name="id_user" class="form-control" value="{{ Auth::id() }}" hidden>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="id_lowongan" class="form-control" value="{{ $lowongan->id_lowongan }}" hidden>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Nama Lengkap <span class="text-danger">*</span></label>
                                            <input type="text" name="nama_pelamar" required class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Tanggal Lahir <span class="text-danger">*</span></label>
                                            <input type="date" name="tanggal_lahir" required class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Tempat Lahir <span class="text-danger">*</span></label>
                                            <input type="text" name="tempat_lahir" required class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Agama <span class="text-danger">*</span></label>
                                            <select name="agama" class="form-control" required>
                                                <option value="">Pilih Agama</option>
                                                <option value="Islam">Islam</option>
                                                <option value="Kristen">Kristen</option>
                                                <option value="Katolik">Katolik</option>
                                                <option value="Buddha">Buddha</option>
                                                <option value="Hindu">Hindu</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Jenis Kelamin <span class="text-danger">*</span></label>
                                            <select name="jenis_kelamin" class="form-control">
                                                <option value="">Pilih Jenis Kelamin</option>
                                                <option value="Laki-laki">Laki-laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">No Telepon <span class="text-danger">*</span></label>
                                            <input type="number" name="no_telepon" required class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Alamat <span class="text-danger">*</span></label>
                                            <textarea name="alamat" id="" cols="30" rows="5" required class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>


                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            @foreach($kriteria as $kriteria)
                                            <div class="form-group">
                                                <label for="Kriteria">{{$kriteria->nama_kriteria}}</label>
                                                <select name="{{$kriteria->id_kriteria}}" class="form-control">
                                                    <option value="">-- Pilih {{$kriteria->nama_kriteria}}--</option>
                                                    @foreach($bobot_kriteria as $bobot)
                                                    @if($kriteria->id_kriteria==$bobot->id_kriteria)
                                                    <option value="{{$bobot->id_bobot_kriteria}}">{{$bobot->nama_bobot}}</option>
                                                    @else

                                                    @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>


                        </div>

                        <div class="form-group mt-2">
                            <label for="">CV</label><br>
                            <input name="cv" class="form-control-file mt-2" type="file" />
                        </div>

                        <div class="form-group mt-3">
                            <label for="">Ijazah</label><br>
                            <input name="ijazah" class="form-control-file mt-2" type="file" />
                        </div>

                        <div class="form-group mt-3">
                            <label for="">Pas Foto</label><br>
                            <input name="pas_foto" class="form-control-file mt-2" type="file" />
                        </div>

                    </div>

                    <div class="modal fade" id="lamar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Cek Data Kamu!</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-center mx-auto">
                              <img src="{{ asset('assets/img/cek.gif') }}" class="img-fluid" width="250">

                              <h3>Apakah anda yakin datamu sudah benar ?</h3>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                              <button type="submit" class="btn btn-primary">Yakin Lamar</button>
                            </div>
                          </div>
                        </div>
                      </div>

                    <div class="lamar-btn mt-3" align="right">
                        <button type="button" class="btn-get-started" style="border: none;" data-bs-toggle="modal" data-bs-target="#lamar">
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