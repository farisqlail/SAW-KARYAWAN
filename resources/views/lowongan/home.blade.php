<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SPK Franchise</title>
    <!-- Favicons -->
    <link rel="shortcut icon" href="{{ asset('assets/img/icon.png') }}" type="image/x-icon">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <style>
        html,
        body {
            background-color: #fff;
            /*color: #636b6f;*/
            color: black;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 50px;
            text-align: center;
        }

        .links {
            font-size: 20px;
            font-weight: 500;
        }

        .links>a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 16px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }

        .brand {
            width: 120px;
            height: 120px;
            overflow: hidden;
            border-radius: 50%;
            margin: 20px auto;
            box-shadow: 0 4px 8px rgba(0, 0, 0, .05);
            position: relative;
            z-index: 1;
        }

        .brand img {
            width: 100%;
        }

        h4 {
            font-weight: 600;
            color: #636b6f;
        }

    </style>
</head>

<body>
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
            <div class="top-right links">
                <a href="">Lowongan</a>
                @auth
                    <a href="{{ url('/home') }}">Home</a>
                @else
                    <a href="{{ route('login') }}">Login</a>
                    <a href="{{ route('register') }}">Register</a>
                @endauth
            </div>
        @endif


        <div class="container">
            <div class="title mb-5">
                Aplikasi Rekrutmen dan Seleksi Karyawan
            </div>
            {{-- <div class="brand">
                    <img src="{{asset('assets/img/icon.png')}}" alt="logo">
                </div>
                <div class="title m-b-md">
                    Aplikasi Rekrutmen dan Seleksi Karyawan
                </div> --}}

            <div class="row">
                @foreach ($lowongan as $data)
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <h4>{{ $data->posisi_lowongan }}</h4>
                                <span class="text-muted">Kuota {{ $data->kuota }} - <i class="text-danger">{{ $data->berlaku_sampai }}</i></span>
                                <p class="mt-3">
                                    {{ $data->keterangan }}
                                </p>

                                <div class="button-group" align="right">
                                    <a href="{{ route('pelamar.tambah', $data->id_lowongan) }}" class="btn btn-outline-primary">Lamar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>

</body>

</html>
