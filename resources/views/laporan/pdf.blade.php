<!DOCTYPE html>
<html>

<head>
    <title>Laporan Data Pelamar Lolos Seleksi</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }
    </style>
    <center>
        <h5>Laporan Data Pelamar Lolos Seleksi</h5>
        <h6>Lowongan : {{ $lowongan }}</h6>
        <h6>Kategori : {{ $kategori }}</h6>
        <h6>{{ $periode_awal }} - {{ $periode_akhir }}</h6>

    </center>

    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>No</th>
                <th>Lowongan</th>
                <th>Nama</th>
                <th>Tgl Lahir</th>
                <th>No Telp</th>

            </tr>
        </thead>
        <tbody>
            @forelse ($pelamar as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->lowongan->posisi_lowongan }}</td>
                    <td>{{ $item->nama_pelamar }}</td>
                    <td>{{ $item->tanggal_lahir }}</td>
                    <td>{{ $item->no_telepon }}</td>
                </tr>
            @empty
            @endforelse
        </tbody>
    </table>

</body>

</html>
