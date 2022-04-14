<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Rekap Seleksi 2</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">


    <style>
        /* body {
            font-family: arial;
        } */

        .print {
            margin-top: 10px;
        }

        @media print {
            .print {
                display: none;
            }
        }

        /* table {
            border-collapse: collapse;
        } */
    </style>
</head>

<body>
    <div class="container">
        <h3 class="text-center mt-2 mb-2">CV. LINTAS NUSA</h3>
        <p class="text-center mt-2 mb-2">Jl. Kalidami No.51, Mojo, Kec. Gubeng, Kota Surabaya, Jawa Timur</p>
        <p class="text-center mt-2 mb-2">No. Telepon: (031) 5687462 | Email: lintasnusa1990@gmail.com</p>
        <hr style="border: 2;">
        <p class="text-center mt-2 mb-2"><b>Laporan Rekap Hasil Seleksi Tahap 2 Pelamar untuk Posisi {{$lowongan->posisi_lowongan}}</b></p>
        <p >Tanggal: {{date('d-m-Y')}}</p>

        <div class="table-responsive">

            <table border="1" cellspacing="" cellpadding="4" width="100%">
                <thead>
                    <tr>
                        <th align="center">No</th>
                        <th align="center">Nama</th>
                        <th align="center">Nilai Akhir</th>
                        <th align="center">Ranking</th>
                        <th align="center">Keterangan</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($hasilTes as $t)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $t['nama_pelamar'] }}</td>
                        <td>{{ number_format($t['total']) }}</td>
                        <td>{{ $loop->iteration}}</td>
                        <td>
                            @if ($t['status'] == "Diterima")
                            Lolos Seleksi Dua
                            @elseif($t['status'] == "Ditolak")
                            Tidak Lolos Seleksi Dua
                            @else
                            <span class="text-danger">Belum Ada keterangan</span>
                            @endif

                        </td>

                    </tr>
                    @endforeach

                </tbody>
            </table>

        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous">
    </script>


</body>

</html>