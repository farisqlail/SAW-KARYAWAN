@extends('admin.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 card-deck">

            <div class="card">
                <div class="card-header">
                    <center>
                        <h3>Seleksi Tahap 2 Posisi {{$low->posisi_lowongan}}</h3>
                    </center>
                    
                    <h3 class="float-left">Perankingan Hasil Tes</h3>

                    <div class="float-right">
                        <form action="{{ route('pelamar.tolak.dua') }}" method="post">
                            @csrf
                            <a href="{{ route('seleksi.dua', $lowongan) }}" class="btn btn-md btn-success">Cetak Rekap</a>
                            <input type="submit" name="submit" class="btn btn-danger" value="Seleksi Selesai">

                        </form>
                    </div>
                </div>

                <div class="table-responsive">
                    <div class="container">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th align="center">NO</th>
                                    <th align="center">Nama</th>
                                    <th align="center">Nilai Akhir</th>
                                    <th align="center">Ranking</th>
                                    <th align="center">Status Lamaran</th>
                                    <th align="center">Status Pendaftaran</th>
                                    <th align="center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($hasilTes as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data['nama_pelamar'] }}</td>
                                    <td>{{ number_format($data['total']) }}</td>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        @if ($data['status'] == 'Diterima')
                                            Lolos Seleksi Dua
                                        @elseif($data['status'] == 'Ditolak')
                                            Tidak Lolos Seleksi Dua
                                        @else
                                            Menunggu Seleksi Tahap Dua
                                        @endif
                                    </td>
                                    <td>
                                        @if ($data['created_at'] > date('Y-m-d'))
                                            <span class="badge badge-success">Pendaftaran</span>
                                        @else
                                            <span class="badge badge-danger">Lowongan ditutup</span>
                                        @endif
                                    </td>
                                    <td align="center">
                                        <form action="{{ route('pelamar.seleksi.dua', $data['id_pelamar']) }}" method="post">
                                            {{ csrf_field() }}

                                            <a href="{{ route('seleksi.detail', $data['id_pelamar']) }}" class="btn btn-info">Lihat Detail</a>

                                            @if ($data['status'] == null)
                                            <input type="submit" name="submit" href="{{ route('seleksi.detail', $data['id_pelamar']) }}" class="btn btn-success" value="Terima">

                                            <input type="submit" name="submit" href="{{ route('seleksi.detail', $data['id_pelamar']) }}" class="btn btn-danger" value="Tolak">
                                            @endif
                                        </form>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection