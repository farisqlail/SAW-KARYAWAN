@extends('layouts.user')

@section('content')
    <div class="container">
        <div class="row" align="center">
            <div class="col-md-8">
                <div class="card shadow p-3 rounded" style="margin-top: 100px; width: 70rem; border: none;">

                    <div class="card-body">
                        <h1 class="mb-5" align="center">Register</h1>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row mt-3">
                                        <label for="name"
                                            class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                        <div class="col-md-6">
                                            <input id="name" type="text"
                                                class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                                name="name" value="{{ old('name') }}" placeholder="Nama Lengkap ..." required autofocus>

                                            @if ($errors->has('name'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row mt-3">
                                        <label for="email"
                                            class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                        <div class="col-md-6">
                                            <input id="email" type="email"
                                                class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                                name="email" value="{{ old('email') }}" placeholder="Email ..." required>

                                            @if ($errors->has('email'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row mt-3">
                                        <label for="password"
                                            class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                        <div class="col-md-6">
                                            <input id="password" type="password"
                                                class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                                name="password" placeholder="Password ..." required>

                                            @if ($errors->has('password'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row mt-3">
                                        <label for="password-confirm"
                                            class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                        <div class="col-md-6">
                                            <input id="password-confirm" type="password" class="form-control"
                                                name="password_confirmation" placeholder="Confirm Password ..." required>
                                        </div>
                                    </div>

                                    <div class="form-group row mt-3">
                                        <label for="jenis_kelamin" class="col-md-4 col-form-label text-md-right">Jenis
                                            Kelamin</label>

                                        <div class="col-md-6">
                                            <div class="row mt-2">
                                                <div class="col-md-6">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="jenis_kelamin"
                                                            id="jenis_kelamin" value="Laki-laki" checked>
                                                        <label class="form-check-label" for="jenis_kelamin">
                                                            Laki - Laki
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="jenis_kelamin"
                                                            id="jenis_kelami" value="Perempuan" checked>
                                                        <label class="form-check-label" for="jenis_kelamin">
                                                            Perempuan
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                            @if ($errors->has('jenis_kelamin'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('jenis_kelamin') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group row mt-3">
                                        <label for="tanggal_lahir" class="col-md-4 col-form-label text-md-right">Tanggal
                                            Lahir</label>

                                        <div class="col-md-6">
                                            <input id="tanggal_lahir" type="date"
                                                class="form-control{{ $errors->has('tanggal_lahir') ? ' is-invalid' : '' }}"
                                                name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required>

                                            @if ($errors->has('tanggal_lahir'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('tanggal_lahir') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row mt-3">
                                        <label for="tempat_lahir" class="col-md-4 col-form-label text-md-right">Tempat
                                            Lahir</label>

                                        <div class="col-md-6">
                                            <input id="tempat_lahir" type="text"
                                                class="form-control{{ $errors->has('tempat_lahir') ? ' is-invalid' : '' }}"
                                                name="tempat_lahir" value="{{ old('tempat_lahir') }}"
                                                placeholder="Tempat Lahir ..." required>

                                            @if ($errors->has('tempat_lahir'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('tempat_lahir') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row mt-3">
                                        <label for="agama" class="col-md-4 col-form-label text-md-right">Agama</label>

                                        <div class="col-md-6">
                                            <select name="agama" class="form-control" required>
                                                <option value="">Pilih Agama</option>
                                                <option value="Islam">Islam</option>
                                                <option value="Kristen">Kristen</option>
                                                <option value="Katolik">Katolik</option>
                                                <option value="Buddha">Buddha</option>
                                                <option value="Hindu">Hindu</option>
                                            </select>

                                            @if ($errors->has('agama'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('agama') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row mt-3">
                                        <label for="no_telepon" class="col-md-4 col-form-label text-md-right">No
                                            Telepon</label>

                                        <div class="col-md-6">
                                            <input id="no_telepon" type="text"
                                                class="form-control{{ $errors->has('no_telepon') ? ' is-invalid' : '' }}"
                                                name="no_telepon" value="{{ old('no_telepon') }}"
                                                placeholder="No Telepon ..." required>

                                            @if ($errors->has('no_telepon'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('no_telepon') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row mt-3">
                                        <label for="alamat" class="col-md-4 col-form-label text-md-right">Alamat</label>

                                        <div class="col-md-6">
                                            <input id="alamat" type="text"
                                                class="form-control{{ $errors->has('alamat') ? ' is-invalid' : '' }}"
                                                name="alamat" value="{{ old('alamat') }}"
                                                placeholder="Alamat ..." required>

                                            @if ($errors->has('alamat'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('alamat') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                </div>
                            </div>



                            <div class="form-group mt-5" align="right">
                                <button type="submit" class="btn-get-started" style="border: none;">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
