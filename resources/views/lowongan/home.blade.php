<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>CV.Lintas Nusa | Lowongan</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    {{-- <link href="{{ asset('user-template/assets/img/favicon.png') }}" rel="icon"> --}}
    <link href="{{ asset('user-template/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('user-template/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('user-template/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('user-template/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('user-template/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('user-template/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('user-template/assets/css/style.css') }}" rel="stylesheet">
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center justify-content-between">

            <h1 class="logo"><a href="{{ url('/') }}">CV.Lintas Nusa</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

            <nav id="navbar" class="navbar">
                @if (Route::has('login'))
                    <ul>
                        <li><a class="nav-link scrollto active" href="{{ route('lowongan.home') }}">Lowongan</a></li>
                        @auth
                        @if ($pelamar[0]->status_lamaran == 'Diterima')
                        <li><a class="nav-link scrollto" href="{{ route('soal-tes.home') }}">Tes Online</a>
                        </li>
                        @endif
                            <li class="dropdown"><a href="#"><span>{{ Auth::user()->name }}</span> <i
                                        class="bi bi-chevron-down"></i></a>
                                <ul>
                                    <li><a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                                                                document.getElementById('logout-form').submit();">Logout</a>
                                    </li>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </ul>
                            </li>
                        @else
                            <li><a class="nav-link scrollto" href="{{ route('login') }}">Login</a></li>
                            <li><a class="getstarted scrollto" href="{{ route('register') }}">Register</a></li>
                        @endauth
                    </ul>
                @endif
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <main id="main">
        <div class="container mt-5 mb-5">
            <h1 style="margin-top: 100px;" align="center">Daftar Lowongan Pekerjaan</h1>

            <div class="row" style="margin-top: 50px">
                @foreach ($lowongan as $data)
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h4>{{ $data->posisi_lowongan }}</h4>
                                <span class="text-muted">Kuota {{ $data->kuota }} - <i
                                        class="text-danger">{{ $data->berlaku_sampai }}</i></span>
                                <p class="mt-3">
                                    {!! $data->deskripsi_pekerjaan !!}
                                </p>
                                <p class="mt-1">
                                    {!! $data->deskripsi_persyaratan !!}
                                </p>
                                @if (Auth::guest())
                                    <div class="button-group" align="right">
                                        <a href="{{ route('login') }}" class="btn-get-started">Lamar</a>
                                    </div>
                                @else
                                    <div class="button-group" align="right">
                                        <a href="{{ route('pelamar.tambah', $data->id_lowongan) }}"
                                            class="btn-get-started">Lamar</a>
                                    </div>
                                @endif

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
    </main>



    <!-- Vendor JS Files -->
    <script src="{{ asset('user-template/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('user-template/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('user-template/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('user-template/assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('user-template/assets/vendor/purecounter/purecounter.js') }}"></script>
    <script src="{{ asset('user-template/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('user-template/assets/js/main.js') }}"></script>

</body>

</html>
