@extends('admin.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 card-deck">
                <div class="card">
                    <div class="card-header">
                        <h3 class="float-left">Hasil Analisa</h3>
                    </div>

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
                                    @php
                                        $no = 1;
                                    @endphp

                                    @foreach ($alternatif as $data)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $data->nama_pelamar }}</td>
                                            @foreach ($data->bobot_kriteria as $bk)
                                                <td>{{ $bk->nama_bobot }}</td>
                                            @endforeach

                                            {{-- <td>{{ $data->bobotKriteria->nama_bobot }}</td> --}}
                                        </tr>
                                    @endforeach
                                    {{-- @else
                                        <tr>
                                            <td colspan="{{ count($pelamar) + 1 }}" class="text-center">Data tidak
                                                ditemukan</td>
                                        </tr>
                                    @endif --}}
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
                                        <th class="text-center">No</th>
                                        <th class="text-center">Nama Pelamar</th>
                                        <?php $bobot = []; ?>
                                        @foreach ($kriteria as $krit)
                                            <?php $bobot[$krit->id_kriteria] = $krit->bobot_preferensi; ?>
                                            <th class="text-center">{{ $krit->nama_kriteria }}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!empty($alternatif))
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
                                                    'kode'  => $data->id_pelamar,
                                                    'nama'  => $data->nama_pelamar,
                                                    'idLowongan'    => $data->id_lowongan,
                                                    'total' => $total,
                                                ]; ?>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="{{ count($kriteria) + 1 }}" class="text-center">Data tidak
                                                ditemukan</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12 card-deck mt-4">
                <div class="card">
                    <div class="card-header">
                        <h3>Ranking</h3>
                        <div class="float-right">
                            <a href="{{ route('seleksi.satu',  $rangking[0]['idLowongan']) }}" class="btn btn-success">Cetak Rekap</a>
                            <a href="" class="btn btn-danger">Tolak Semua</a>
                        </div>
                    </div>
                    <div class="card-body">
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
                                            <td align="center">

                                                <form action="{{ route('pelamar.update', $t['kode']) }}"
                                                        method="post">

                                                        <a href="{{ route('seleksi.detail', $t['kode']) }}"
                                                            class="btn btn-primary">Detail Pelamar</a>

                                                        {{ csrf_field() }}

                                                        <input type="submit" name="submit"
                                                            href="{{ route('seleksi.detail', $t['kode']) }}"
                                                            class="btn btn-success" value="Terima">

                                                        <input type="submit" name="submit"
                                                            href="{{ route('seleksi.detail', $t['kode']) }}"
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
        @endsection
