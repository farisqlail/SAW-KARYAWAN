{{-- @extends('layouts.user')

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
                                                            id="jenis_kelamin" value="Laki-laki">
                                                        <label class="form-check-label" for="jenis_kelamin">
                                                            Laki - Laki
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="jenis_kelamin"
                                                            id="jenis_kelami" value="Perempuan">
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
@endsection --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Daftar PT. Jayaland</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
</head>

<body>
    <section class="h-100 w-100" style="box-sizing: border-box; background-color: #f5f5f5">
        <style scoped>
            @import url("https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap");

            .content-3-5 .btn:focus,
            .content-3-5 .btn:active {
                outline: none !important;
            }

            .content-3-5 .width-left {
                width: 0%;
            }

            .content-3-5 .width-right {
                width: 100%;
                height: 100%;
                padding: 8rem 2rem;
                background-color: #fcfdff;
            }

            .content-3-5 .centered {
                left: 50%;
                top: 50%;
                transform: translate(-50%, -50%);
            }

            .content-3-5 .right {
                width: 100%;
            }

            .content-3-5 .title-text {
                font: 600 1.875rem/2.25rem Poppins, sans-serif;
                margin-bottom: 0.75rem;
            }

            .content-3-5 .caption-text {
                font: 400 0.875rem/1.75rem Poppins, sans-serif;
                color: #a8adb7;
            }

            .content-3-5 .input-label {
                font: 500 1.125rem/1.75rem Poppins, sans-serif;
                color: #39465b;
            }

            .content-3-5 .div-input {
                font: 300 1rem/1.5rem Poppins, sans-serif;
                padding: 1rem 1.25rem;
                margin-top: 0.75rem;
                border-radius: 0.75rem;
                border: 1px solid #cacbce;
                color: #2a3240;
                transition: 0.3s;
            }

            .content-3-5 .div-input:focus-within {
                border: 1px solid #ff7468;
                color: #2a3240;
                transition: 0.3s;
            }

            .content-3-5 .div-input input::placeholder {
                color: #cacbce;
                transition: 0.3s;
            }

            .content-3-5 .div-input:focus-within input::placeholder {
                color: #2a3240;
                outline: none;
                transition: 0.3s;
            }

            .content-3-5 .div-input .icon-toggle-empty-3-5 path,
            .content-3-5 .div-input:focus-within .icon path {
                transition: 0.3;
                fill: #ff7468;
                transition: 0.3s;
            }

            .content-3-5 .input-field {
                font: 300 1rem/1.5rem Poppins, sans-serif;
                width: 100%;
                background-color: #fcfdff;
                transition: 0.3s;
            }

            .content-3-5 .input-field:focus {
                outline: none;
                transition: 0.3s;
            }

            .content-3-5 .forgot-password {
                font: 400 0.875rem/1.25rem Poppins, sans-serif;
                color: #cacbce;
                transition: 0.3s;
                text-decoration: none;
            }

            .content-3-5 .forgot-password:hover {
                color: #2a3240;
            }

            .content-3-5 .btn-fill {
                font: 500 1.25rem/1.75rem Poppins, sans-serif;
                background-color: #ff7468;
                padding: 0.75rem 1rem;
                margin-top: 2.25rem;
                border-radius: 0.75rem;
                transition: 0.5s;
                color: #fff;
            }

            .content-3-5 .btn-fill:hover {
                background-color: transparent;
                border: 1px solid #ff7468;
                color: #ff7468;
                transition: 0.5s;
            }

            .content-3-5 .bottom-caption {
                font: 400 0.875rem/1.25rem Poppins, sans-serif;
                margin-top: 2rem;
                color: #2a3240;
            }

            .content-3-5 .green-bottom-caption {
                color: #ff7468;
                font-weight: 500;
            }

            .content-3-5 .green-bottom-caption:hover {
                color: #ff7468;
                cursor: pointer;
                text-decoration: underline;
            }

            @media (min-width: 576px) {
                .content-3-5 .width-right {
                    padding: 8rem 4rem;
                }

                .content-3-5 .right {
                    width: 58.333333%;
                }
            }

            @media (min-width: 768px) {
                .content-3-5 .right {
                    width: 66.666667%;
                }
            }

            @media (min-width: 992px) {
                .content-3-5 .width-left {
                    width: 48%;
                }

                .content-3-5 .width-right {
                    width: 52%;
                }

                .content-3-5 .right {
                    width: 75%;
                }
            }

            @media (min-width: 1200px) {
                .content-3-5 .right {
                    width: 58.333333%;
                }
            }
        </style>
        <div class="content-3-5 d-flex flex-column align-items-center h-100 flex-lg-row"
            style="font-family: 'Poppins', sans-serif">
            <div class="position-relative d-none d-lg-block h-100 width-left">
                <img class="position-absolute img-fluid centered"
                    src="http://api.elements.buildwithangga.com/storage/files/2/assets/Empty%20State/EmptyState3/Empty-3-5.png"
                    alt="" />
            </div>
            <div class="d-flex mx-auto align-items-left justify-content-left width-right mx-lg-0">
                <div class="right mx-lg-0 mx-auto">
                    <div class="align-items-center justify-content-center d-lg-none d-flex">
                        <img class="img-fluid"
                            src="http://api.elements.buildwithangga.com/storage/files/2/assets/Empty%20State/EmptyState3/Empty-3-5.png"
                            alt="" />
                    </div>
                    <h3 class="title-text">Daftar</h3>
                    <p class="caption-text">
                        Silahkan isi data dirimu untuk mendaftar.
                    </p>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div style="margin-bottom: 1.75rem">
                            <label for="" class="d-block input-label">Nama Lengkap</label>
                            <div class="d-flex w-100 div-input">
                                <i class="fas fa-user icon mt-1" style="margin-right: 1rem; color:#ff7468;" width="24" height="24"></i>
                                <input id="name" type="text"
                                    class="input-field border-0 {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name"
                                    value="{{ old('name') }}" placeholder="Nama lengkap anda ..." required autofocus>
                                    @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div style="margin-bottom: 1rem">
                            <label for="" class="d-block input-label">Email</label>
                            <div class="d-flex w-100 div-input">
                                <i class="fas fa-envelope icon mt-1" style="margin-right: 1rem; color:#ff7468;" width="24" height="24"></i>
                                <input id="email" type="email"
                                    class="input-field border-0 {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                                    value="{{ old('email') }}" placeholder="Alamat Email anda ..." required autofocus>
                                    @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div style="margin-top: 1rem">
                            <label for="" class="d-block input-label">Kata Sandi</label>
                            <div class="d-flex w-100 div-input">
                                <i class="fas fa-lock icon mt-1" style="margin-right: 1rem; color:#ff7468;" width="24" height="24"></i>
                                    <input id="password" type="password"
                                        class="input-field border-0 {{ $errors->has('password') ? ' is-invalid' : '' }}"
                                        name="password" placeholder="Kata sandi anda ..." required>
                                        @if ($errors->has('password'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                            </div>
                        </div>
                        <div style="margin-top: 1rem">
                            <label for="" class="d-block input-label">Konfirmasi Kata Sandi</label>
                            <div class="d-flex w-100 div-input">
                                <i class="fas fa-lock icon mt-1" style="margin-right: 1rem; color:#ff7468;" width="24" height="24"></i>
                                    <input id="password_confirmation" type="password"
                                        class="input-field border-0 {{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}"
                                        name="password_confirmation" placeholder="Konfirmasi kata sandi anda ..." >
                                        @if ($errors->has('password_confirmation'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                        </span>
                                    @endif
                            </div>
                        </div>

                        <button class="btn btn-fill d-block w-100" type="submit">
                            Daftar
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Password toggle -->
        <script>
            function togglePassword() {
                var x = document.getElementById("password-content-3-5");
                if (x.type === "password") {
                    x.type = "text";
                    document
                        .getElementById("icon-toggle")
                        .setAttribute("fill", "#ff7468");
                } else {
                    x.type = "password";
                    document
                        .getElementById("icon-toggle")
                        .setAttribute("fill", "#ff7468");
                }
            }
        </script>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
    </script>
</body>

</html>

