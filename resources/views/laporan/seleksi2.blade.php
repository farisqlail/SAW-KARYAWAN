<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

</head>

<body>
    <div class="container">

        <h1 class="text-center mt-5 mb-5">Laporan Seleksi Satu</h1>

        <div class="table-responsive">
            <div class="container">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th align="center">NO</th>
                            <th align="center">Nama</th>
                            <th align="center">Alamat</th>
                            <th align="center">Telepon</th>
                            <th align="center">Total</th>
                            <th align="center">Ranking</th>
                            <th align="center">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($hasilTes as $data)
                            @php
                                $hitung = $data->nilai * ($data->bobot_soal / 100);
                                
                                $rangking[] = [
                                    'nama'      => $data->pelamar->nama_pelamar,
                                    'alamat'    => $data->pelamar->alamat,
                                    'telepon'   => $data->pelamar->no_telepon,
                                    'status'    => $data->pelamar->seleksi_dua,
                                    'hitung'    => $hitung,
                                    'bobot'     => $data->bobot_soal,
                                    'id'        => $data->id_pelamar,
                                ];
                            @endphp

                        @endforeach

                        @php
                            usort($rangking, function ($a, $b) {
                                return $a['hitung'] <=> $b['hitung'];
                            });
                            rsort($rangking);
                            $a = 1;
                            $no2 = 1;
                        @endphp

                        @foreach ($rangking as $t)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $t['nama'] }}</td>
                                <td>{{ $t['alamat'] }}</td>
                                <td>{{ $t['telepon'] }}</td>
                                <td>{{ number_format($t['hitung']) }}</td>
                                <td>{{ $a++ }}</td>
                                <td>
                                    @if ($t['status'] == "Diterima")
                                        Seleksi Satu
                                    @elseif($t['status'] == "Ditolak")
                                        Seleksi Satu
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
    </div>


    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"
        integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous">
    </script>


</body>

</html>
