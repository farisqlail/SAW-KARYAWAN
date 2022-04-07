@extends('admin.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12 card-deck">

                <?php $bobot = []; ?>
                @foreach ($kriteria as $krit)
                    <?php $bobot[$krit->id_kriteria] = $krit->bobot_preferensi; ?>
                    <span hidden>{{ $krit->nama_kriteria }}</span>
                @endforeach
                @if (!empty($alternatif))
                    <?php $rangking = []; ?>
                    @foreach ($alternatif as $data)
                        <?php $total = 0;
                        $nilai_normalisasi = 0; ?>
                        @foreach ($data->bobot as $crip)
                            @if ($crip->kriteria->atribut_kriteria == 'cost')
                                <?php $nilai_normalisasi = $kode_krit[$crip->kriteria->id_kriteria] / $crip->jumlah_bobot; ?>
                            @elseif($crip->kriteria->atribut_kriteria == 'benefit')
                                <?php $nilai_normalisasi = $crip->jumlah_bobot / $kode_krit[$crip->kriteria->id_kriteria]; ?>
                            @endif
                            <?php $total = $total + $bobot[$crip->kriteria->id_kriteria] * $nilai_normalisasi; ?>
                            <span hidden>{{ number_format($nilai_normalisasi, 2, ',', '.') }}</span>
                        @endforeach
                        <?php $rangking[] = [
                            'total' => $total,
                            'kode' => $data->id_pelamar,
                            'nama' => $data->nama_pelamar,
                            'cv' => $data->cv,
                            'idLowongan' => $data->id_lowongan,
                            'seleksi_1' => $data->seleksi_satu,
                        ]; ?>
                        </tr>
                    @endforeach
                @endif

                <div class="col-md-12 card-deck mt-4">
                    <div class="card">
                        <div class="card-header">
                            <h3>Daftar Pelamar</h3>
                        </div>



                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th align="center">NO</th>
                                            <th align="center">Nama</th>
                                            <th align="center">Ranking</th>
                                            <th align="center">Status Seleksi Satu</th>
                                            <th align="center">Dokumen</th>
                                            <th align="center">Status Dokumen</th>
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
                                            <div class="modal fade" id="dokumen" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Lihat</h5>
                                                            <button type="button" class="close"
                                                                data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body" align="center">
                                                            <a href="{{ route('perhitungan.pdf', $t['kode']) }}"
                                                                class="btn btn-danger btn-sm" target="blank">Lihat CV</a>
                                                            <a href="{{ route('perhitungan.pdfIjazah', $t['kode']) }}"
                                                                class="btn btn-danger btn-sm" target="blank">Lihat
                                                                Ijazah</a>
                                                            <a href="{{ route('perhitungan.pasFoto', $t['kode']) }}"
                                                                class="btn btn-danger btn-sm" target="blank">Lihat Pas
                                                                Foto</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <tr>
                                                <td>{{ $no2++ }}</td>
                                                <td>{{ $t['nama'] }}</td>
                                                <td>{{ $a++ }}</td>
                                                <td>
                                                    @if ($t['seleksi_1'] == 'Diterima')
                                                        Lolos Seleksi Satu
                                                    @elseif ($t['seleksi_1'] == 'Ditolak')
                                                        Tidak Lolos Seleksi
                                                    @else
                                                        Menunggu Seleksi
                                                    @endif
                                                </td>
                                                <td align="center">
                                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                                        data-target="#dokumen">
                                                        Lihat Dokumen
                                                    </button>

                                                </td>
                                                <td></td>
                                                <td align="center">

                                                    <form action="{{ route('pelamar.update', $t['kode']) }}"
                                                        method="post">
                                                        {{ csrf_field() }}

                                                        <a href="{{ route('seleksi.detail', $t['kode']) }}"
                                                            class="btn btn-info btn-sm">Lihat Detail</a>

                                                        <a href="{{ route('seleksi.detail', $t['kode']) }}"
                                                            class="btn btn-success btn-sm">Valid</a>

                                                        <a href="{{ route('seleksi.detail', $t['kode']) }}"
                                                            class="btn btn-danger btn-sm">Tidak Valid</a>

                                                        @if ($t['seleksi_1'] == null)
                                                            <input type="submit" name="submit" class="btn btn-success"
                                                                value="Terima">

                                                            <input type="submit" name="submit" class="btn btn-danger"
                                                                value="Tolak">
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
            @endsection
