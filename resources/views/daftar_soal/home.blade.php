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

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center justify-content-between">

            <h1 class="logo"><a href="{{ url('/') }}">CV.Lintas Nusa</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

        </div>
    </header><!-- End Header -->


    <div class="container" align="center" style="margin-top: 6rem;">
        <div class="card shadow-sm p-3 mb-5 bg-body rounded">
            <h1 class="mb-5">Tes Tulis Online</h1>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h3>
                            Soal {{ $daftarsoal[0]->soal }}
                        </h3>

                        <br>
                        <span>
                            Anda bisa download soalnya disini
                        </span>
                        <br>
                        <a href="{{ asset('/upload/' . $daftarsoal[0]->file_soal) }}" class="btn btn-primary mt-3"  target="blank"><i
                                class="fas fa-download"></i> &nbsp;Download File</a>
                    </div>
                    <div class="col-md-6">
                        <form action="{{ route('jawaban.store') }}" method="POST" enctype="multipart/form-data">
                            
                            {{ csrf_field() }}

                            
                            <input type="number" name="id_soal_tes" value="{{ $daftarsoal[0]->id_soal }}" hidden>   
                            <input type="number" name="id_pelamar" value="{{ $pelamarGet }}" hidden>
                            <input type="number" name="id_lowongan" value="{{ $pelamar[0]->id_lowongan }}" hidden>
                            <div class="form-group">
                                <h3>Unggah Jawaban</h3><br>
                                <span>Jika sudah menyelesaikan soal unggah jawabanmu disini</span><br>
                                <input type="file" class="btn btn-success mt-3" name="jawaban" value="Unggah Jawaban">
                            </div><br>

                            <button type="submit" class="btn btn-primary">Uggah Jawaban</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>


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
