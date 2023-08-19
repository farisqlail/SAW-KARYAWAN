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
        <h6>{{ $periode }}</h6>

    </center>

    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>No</th>
                <th>Lowongan</th>
                <th>Nama</th>
                <th>Tgl Lahir</th>
                <th>No Telp</th>
                <th>Peringkat</th>
                <th>Nilai Akhir</th>
                <th>Status Wawancara</th>

            </tr>
        </thead>
        <tbody>
            @forelse ($pelamar as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->posisi_lowongan }}</td>
                    <td>{{ $item->nama_pelamar }}</td>
                    <td>{{ $item->tanggal_lahir }}</td>
                    <td>{{ $item->no_telepon }}</td>
                    <td>{{ $item->rangked }}</td>
                    <td>{{ $item->nilai_akhir }}</td>
                    <td>{{ $item->status_wawancara }}</td>

                </tr>
            @empty
            @endforelse
        </tbody>
    </table>

</body>

</html>
