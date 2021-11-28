<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>CV.Lintas Nusa</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

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
                                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">Logout</a></li>

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

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">

        <div class="container">
            <div class="row">
                <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
                    <h1>CV.Lintas Nusa</h1>
                    <h2>Aplikasi Rekrutmen dan Seleksi Karyawan dengan menggunakan metode SAW</h2>
                    <div class="d-flex">
                        <a href="{{ route('lowongan.home') }}" class="btn-get-started scrollto">Cari Lowongan!</a>
                        {{-- <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="glightbox btn-watch-video"><i
                                class="bi bi-play-circle"></i><span>Watch Video</span></a> --}}
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img">
                    <img src="{{ asset('user-template/assets/img/hero-img.png') }}" class="img-fluid animated"
                        alt="">
                </div>
            </div>
        </div>

    </section><!-- End Hero -->



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
