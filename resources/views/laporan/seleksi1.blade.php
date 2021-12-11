<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <?php $rangking = []; ?>
    @foreach ($alternatif as $data)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $data->nama_pelamar }}</td>
            <?php $total = 0;
            $nilai_normalisasi = 0; ?>
            @foreach ($data->bobot as $crip)
                @if ($crip->kriteria->atribut_kriteria == 'cost')
                    @php
                        $nilai_normalisasi = $kode_krit[$crip->kriteria->id_kriteria] / $crip->jumlah_bobot;
                    @endphp

                @elseif($crip->kriteria->atribut_kriteria == 'benefit')
                    @php
                        $nilai_normalisasi = $crip->jumlah_bobot / $kode_krit[$crip->kriteria->id_kriteria];
                    @endphp

                @endif
                @php
                    $total = $total + $bobot[$crip->kriteria->id_kriteria] * $nilai_normalisasi;
                @endphp
                <td>{{ number_format($nilai_normalisasi, 2, ',', '.') }}</td>


            @endforeach
            <?php $rangking[] = [
                'kode' => $data->id_pelamar,
                'nama' => $data->nama_pelamar,
                'idLowongan' => $data->id_lowongan,
                'total' => $total,
            ]; ?>
        </tr>
    @endforeach

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th align="center">NO</th>
                    <th align="center">Nama</th>
                    <th align="center">Total</th>
                    <th align="center">Ranking</th>
                    <th align="center">Aksi</th>
                </tr>
            </thead>
            <tbody>

                @php
                    usort($rangking, function ($a, $b) {
                        return $a['total'] <=> $b['total'];
                    });
                    rsort($rangking);
                    $a = 1;
                    $no2 = 1;
                @endphp

                @foreach ($rangking as $t)
                    <tr>
                        <td>{{ $no2++ }}</td>
                        <td>{{ $t['nama'] }}</td>
                        <td>{{ number_format($t['total'], 2, ',', '.') }}</td>
                        <td>{{ $a++ }}</td>
                    </tr>
                @endforeach

            </tbody>
        </table>


        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
                integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
                integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
        </script>

</body>

</html>
