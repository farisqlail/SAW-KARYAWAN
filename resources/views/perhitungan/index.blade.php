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
                                    @if (!empty($pelamar))
                                        @foreach ($pelamar as $data)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $data->nama_pelamar }}</td>
                                            @foreach ($kriteria as $krit)
                                                    @foreach ($data->bobotKriteria as $bk)
                                                        @if ($krit->id_kriteria == $bk->id_kriteria)
                                                            <td>{{ $bk->nama_bobot }}</td>
                                                        @endif
                                                    @endforeach
                                            @endforeach
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="{{ count($pelamar) + 1 }}" class="text-center">Data tidak
                                                ditemukan</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            {{-- <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="text-center">Kode</th>
                        @foreach ($kriteria as $krit)
                            <th class="text-center">{{ $krit->id }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @if (!empty($alternatif))
                                    @foreach ($alternatif as $data)
                                        <tr>
                                            <td>{{$data->kode_alternatif}}</td>
                                            @foreach ($data->bobot_kriteria as $bk)
                                                <td>{{$bk->jumlah_bobot}}</td>
                                            @endforeach
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="{{(count($kriteria)+1)}}" class="text-center">Data tidak ditemukan</td>
                                    </tr>
                                @endif
                </tbody>
            </table>
        </div>
    </div> --}}

            {{-- <div class="col-md-12 card-deck mt-4">
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
                                @php
                                    $bobot = [];
                                    $no = 1;
                                @endphp
                                @foreach ($kriteria as $krit)
                                    @php
                                        $bobot[$krit->id] = $krit->bobot_preferensi;
                                    @endphp
                                    <th class="text-center">{{ $krit->bobot_preferensi }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @if (!empty($alternatif))
                                @php
                                    $rangking = [];
                                @endphp
                                @foreach ($nilaiAlternatif as $data)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        @php
                                            $total = 0;
                                        @endphp
                                        @foreach ($data->bobot_kriteria as $bk)
                                            @if ($bk->kriteria->atribut_kriteria == 'cost')
                                                @php
                                                    $normalisasi = $kode_krit[$bk->kriteria->id_kriteria] / $bk->jumlah_bobot;
                                                @endphp
                                            @elseif($bk->kriteria->atribut_kriteria == 'benefit')
                                                @php
                                                    $normalisasi = $bk->jumlah_bobot / $kode_krit[$bk->kriteria->id_kriteria];
                                                @endphp
                                            @endif
                                            @php
                                                $total = $total + $bobot[$bk->kriteria->id_kriteria] * $normalisasi;
                                            @endphp
                                            <td>{{ number_format($normalisasi, 2, ',', '.') }}</td>
                                        @endforeach
                                        @php
                                            $rangking[] = [
                                                'kode' => $data->id,
                                                'nama' => $data->kriteria->nama_kriteria,
                                                'total' => $total,
                                            ];
                                        @endphp
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
    </div> --}}

            <div class="col-md-12 card-deck mt-4">
                <div class="card">
                    <div class="card-header">
                        <h3>Ranking</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>Nama</th>
                                        <th>Total</th>
                                        <th>Ranking</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @php
                                        //   if (!empty($alternatif)) {
                                        //         $rangking = [];
                                        //         foreach ($nilaiAlternatif as $data) {
                                        //             usort($rangking, function ($a, $b) {
                                        //                 return $a['total'] <=> $b['total'];
                                        //             });
                                        //             usort($rangking);
                                        
                                        //             $rangking[] = [
                                        //                 'kode' => $data->id,
                                        //                 'nama' => $data->kriteria->nama_kriteria,
                                        //                 'total' => $total,
                                        //             ];
                                        //         }
                                        //     }
                                        $rangking = [];
                                        // if (!empty($rangking)) {
                                        usort($rangking, function ($a, $b) {
                                            return $a['total'] <=> $b['total'];
                                        });
                                        rsort($rangking);
                                        // }
                                        
                                        $no = 1;
                                    @endphp
                                    @foreach ($rangking as $t)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $t['nama_bobot'] }}</td>
                                            <td>{{ number_format($t['total'], 2, ',', '.') }}</td>
                                            <td>{{ $a++ }}</td>
                                            <td></td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
