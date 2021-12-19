@extends('admin.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 card-deck">

                <div class="card">
                    <div class="card-header">
                        <h3 class="float-left">Rangking</h3>

                        <div class="float-right">
                            <form action="{{ route('pelamar.tolak.dua') }}" method="post">
                                @csrf
                                <a href="{{ route('seleksi.dua', $lowongan) }}" class="btn btn-success">Cetak Rekap</a>
                                <input type="submit" name="submit" class="btn btn-danger" value="Tolak Semua">

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
                                        <th align="center">Total</th>
                                        <th align="center">Ranking</th>
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
                                            <td align="center">
                                                <form action="{{ route('pelamar.seleksi.dua', $data['id_pelamar']) }}" method="post">
                                                    {{ csrf_field() }}

                                                    <input type="submit" name="submit"
                                                        href="{{ route('seleksi.detail', $data['id_pelamar']) }}"
                                                        class="btn btn-success" value="Terima">

                                                    <input type="submit" name="submit"
                                                        href="{{ route('seleksi.detail', $data['id_pelamar']) }}"
                                                        class="btn btn-danger" value="Tolak">
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
