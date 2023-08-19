@extends('admin.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 card-deck">

                <div class="card">
                    <div class="card-header">
                        <center>
                            <h3>Seleksi Tahap 2 Posisi {{ $low->posisi_lowongan }}</h3>
                        </center>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th class="text-center">Nama Pelamar</th>
                                            @foreach ($kriteria as $krit)
                                                <th class="text-center">{{ $krit->nama_kriteria }}</th>
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($perhitungan as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item['nama_pelamar'] }}</td>
                                                @forelse ($item['data'] as $data)
                                                    <td>{{ $data['nama_bobot_kriteria'] }}</td>
                                                @empty
                                                @endforelse
                                            </tr>
                                        @empty
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12 card-deck mt-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="float-left">Kriteria Lowongan {{ $low->posisi_lowongan }}</h3>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        {{-- <th class="text-center">Nama Pelamar</th>
                                        @foreach ($kriteria as $krit)
                                            <th class="text-center">{{ $krit->nama_kriteria }}</th>
                                        @endforeach --}}
                                        <th>Nama Kriteria</th>
                                        <th>Bobot Kriteria</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($kriteria as $item)
                                        <tr>
                                            <td>{{ $item->nama_kriteria }}</td>
                                            <td>{{ $item->bobot_preferensi }}%</td>
                                        </tr>
                                    @empty
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12 card-deck mt-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="float-left">Normalisasi</h3>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">Nama Pelamar</th>
                                        @foreach ($kriteria as $krit)
                                            <th class="text-center">{{ $krit->nama_kriteria }}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($perhitungan as $item)
                                        <tr>
                                            <td>{{ $item['nama_pelamar'] }}</td>
                                            @forelse ($item['data'] as $data)
                                                <td>{{ $data['hitung'] }}</td>
                                            @empty
                                            @endforelse
                                        </tr>
                                    @empty
                                    @endforelse
                                </tbody>
                            </table>
                            <p style="color: red;">Keterangan: Rentang nilai diantara 0 hingga 1</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-md-12 card-deck mt-4 mb-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="float-left">Perankingan Hasil Tes</h3>
                </div>
                <div class="card-body">
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
                                        <th align="center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($perangkingan as $data)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $data['nama_pelamar'] }}</td>
                                            <td>{{ round($data['hasil_normalisasi'] * 100) }}</td>
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
                                            <td align="center">
                                                <form action="{{ route('pelamar.seleksi.dua', $data['id_pelamar']) }}"
                                                    method="post">
                                                    {{ csrf_field() }}

                                                    <input type="hidden" name="id_lowongan" value="{{ $low->id }}">

                                                    <a href="{{ route('seleksi.detail', $data['id_pelamar']) }}"
                                                        class="btn btn-info">Lihat Detail</a>

                                                    @if ($data['status'] == null)
                                                        {{-- <input type="submit" name="submit"
                                                            href="{{ route('pelamar.seleksi.dua', [
                                                                'id' => $data['id_pelamar']
                                                                ]) }}"
                                                            class="btn btn-success" value="Terima"> --}}
                                                        <form method="post"
                                                            action="{{ route('pelamar.seleksi.dua', ['id' => $data['id_pelamar']]) }}">
                                                            @csrf
                                                            <!-- Ini diperlukan jika Anda menggunakan Laravel untuk melindungi formulir dari serangan CSRF -->

                                                            <!-- Contoh pengisian nilai array -->
                                                            <input type="hidden" name="rangked"
                                                                value="{{ $loop->iteration }}">
                                                            <input type="hidden" name="nilai_akhir"
                                                                value="{{ round($data['hasil_normalisasi'] * 100) }}">

                                                            <input type="submit" name="submit" class="btn btn-success"
                                                                value="Terima">
                                                            <input type="submit" name="submit"
                                                                class="btn btn-danger" value="Tolak">
                                                        </form>
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
