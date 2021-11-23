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

                                    @foreach ($pelamar as $data)
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
                                    @if (!empty($pelamar))
                                        @php
                                            $rangking = [];
                                        @endphp
                                        @foreach ($nilaiAlternatif as $data)
                                            <tr>
                                                <td>{{ $no++ }}</td>

                                                @php
                                                    $total = 0;
                                                @endphp
                                                @if ($data->bobot_kriteria->kriteria->atribut_kriteria == 'cost')
                                                    @php
                                                        $normalisasi = $kode_krit[$data->bobot_kriteria->kriteria->id_kriteria] / $data->bobot_kriteria->jumlah_bobot;
                                                    @endphp
                                                @elseif($data->bobot_kriteria->kriteria->atribut_kriteria ==
                                                    'benefit')
                                                    @php
                                                        $normalisasi = $data->bobot_kriteria->jumlah_bobot / $kode_krit[$data->bobot_kriteria->kriteria->id_kriteria];
                                                    @endphp
                                                @endif
                                                @php
                                                    $total = $total + $data->bobot_kriteria->id_kriteria * $normalisasi;
                                                @endphp
                                                    <td>{{ number_format($normalisasi, 2, ',', '.') }}</td>
                                                @php
                                                    $rangking[] = [
                                                        'kode' => $data->id,
                                                        'nama' => $data->bobot_kriteria->kriteria->nama_kriteria,
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
            </div>

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
                                    @if (!empty($pelamar))
                                        @php
                                            $rangking = [];
                                        @endphp
                                        @foreach ($nilaiAlternatif as $data)
                                            @php
                                                $bobot = [];
                                                $total = 0;
                                            @endphp
                                            @if ($data->bobot_kriteria->kriteria->atribut_kriteria == 'cost')
                                                @php
                                                    $normalisasi = $kode_krit[$data->bobot_kriteria->kriteria->id_kriteria] / $data->bobot_kriteria->jumlah_bobot;
                                                @endphp
                                            @elseif($data->bobot_kriteria->kriteria->atribut_kriteria == 'benefit')
                                                @php
                                                    $normalisasi = $data->bobot_kriteria->jumlah_bobot / $kode_krit[$data->bobot_kriteria->kriteria->id_kriteria];
                                                @endphp
                                            @endif
                                            @php
                                                $total = $total + $data->bobot_kriteria->id_kriteria * $normalisasi;
                                            @endphp
                                            {{-- {{ number_format($normalisasi, 2, ',', '.') }} --}}
                                            @foreach ($pelamar as $item)
                                                @if ($item->id_pelamar == $data->id_pelamar)
                                                    @php
                                                        $rangking[] = [
                                                            'kode' => $item->id,
                                                            'nama' => $item->nama_pelamar,
                                                            'total' => $total,
                                                            'id_pelamar' => $item->id_pelamar
                                                        ];
                                                    @endphp
                                                @endif
                                            @endforeach
                                            @php
                                                usort($rangking, function ($a, $b) {
                                                    return $a['total'] <=> $b['total'];
                                                });
                                                rsort($rangking);
                                                // }
                                                
                                                $a = 1;
                                                $no2 = 1;
                                            @endphp
                                        @endforeach
                                    @endif

                                    @foreach ($rangking as $t)
                                        <tr>
                                            <td>{{ $no2++ }}</td>
                                            <td>{{ $t['nama'] }}</td>
                                            <td>{{ number_format($t['total'], 2, ',', '.') }}</td>
                                            <td>{{ $a++ }}</td>
                                            <td>
                                                <a href="{{ route('seleksi.detail', $t['id_pelamar']) }}" class="btn btn-success">Lihat Detail</a>
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
