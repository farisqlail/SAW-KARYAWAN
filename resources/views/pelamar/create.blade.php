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

        <div class="container">
            <div class="row justify-content-center" style="margin-top: 100px;">
                <div class="col-md-8">
                    <div class="card shadow p-3 mb-5 bg-white rounded">

                        <h2 class="float-left">Lamar Pekerjaan</h2>
                        </form>


                        <div class="card-body">
                            <div class="row">
                                <form enctype="multipart/form-data" action="{{ route('pelamar.simpan') }}"
                                    method="POST" class="col-md-12">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" name="id_user" class="form-control"
                                            value="{{ Auth::id() }}" hidden>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="id_lowongan" class="form-control"
                                            value="{{ $lowongan->id_lowongan }}" hidden>
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
                                                <label for="">Tanggal Lahir <span
                                                        class="text-danger">*</span></label>
                                                <input type="date" name="tanggal_lahir" required class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Jenis Kelamin <span
                                                        class="text-danger">*</span></label>
                                                <select name="jenis_kelamin" class="form-control">
                                                    <option value="">Pilih Jenis Kelamin</option>
                                                    <option value="Laki-laki">Laki-laki</option>
                                                    <option value="Perempuan">Perempuan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                @foreach ($kriteria as $kriteria)
                                                    <div class="form-group">
                                                        <label for="Kriteria">{{ $kriteria->nama_kriteria }}</label>
                                                        <select name="id_bobot_kriteria" class="form-control">
                                                            <option value="">-- Pilih {{ $kriteria->nama_kriteria }}--
                                                            </option>
                                                            @foreach ($bobot_kriteria as $bobot)
                                                                @if ($kriteria->id_kriteria == $bobot->id_kriteria)
                                                                    <option value="{{ $bobot->id_bobot_kriteria }}">
                                                                        {{ $bobot->nama_bobot }}</option>
                                                                @else

                                                                @endif
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">No Telepon <span class="text-danger">*</span></label>
                                                <input type="number" name="no_telepon" required class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6"></div>
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

                        <div class="lamar-btn mt-3" align="right">
                            <button type="submit" class="btn-get-started" style="border: none;">Lamar</button>
                        </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
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
