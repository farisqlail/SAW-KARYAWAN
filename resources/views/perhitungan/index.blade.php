@extends('layouts.app')

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
                                        <th class="text-center">Kode</th>
                                        <th class="text-center">Nama</th>
                                        @foreach ($kriteria as $krit)
                                            <th class="text-center">{{ $krit->nama }}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @if (!empty($alternatif))
                                    @foreach ($alternatif as $data)
                                        <tr>
                                            <td>{{$data->kode_alternatif}}</td>
                                            <td>{{$data->nama_alternatif}}</td>
                                            @foreach ($data->bobot_kriteria as $bk)
                                                <td>{{$bk->nama_bobot}}</td>
                                            @endforeach
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="{{(count($kriteria)+1)}}" class="text-center">Data tidak ditemukan</td>
                                    </tr>
                                @endif --}}
                                </tbody>
                            </table>
                        </div>

                        <div class="table-responsive">
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
                                    {{-- @if (!empty($alternatif))
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
                                        <th class="text-center">Kode</th>
                                        @php
                                            $bobot = [];
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
                                                <td>{{ $data->id }}</td>
                                                @php
                                                    $total = 0;
                                                @endphp
                                                @foreach ($data->bobot_kriteria as $bk)
                                                    @if ($bk->kriteria->atribut == 'cost')
                                                        @php
                                                            $normalisasi = $kode_krit[$bk->kriteria->id] / $bk->jumlah_bobot;
                                                        @endphp
                                                    @elseif($bk->kriteria->atribut_kriteria == 'benefit')
                                                        @php
                                                            $normalisasi = $bk->jumlah_bobot / $kode_krit[$bk->kriteria->id];
                                                        @endphp
                                                    @endif
                                                    @php
                                                        $total = $total + $bobot[$bk->kriteria->id] * $normalisasi;
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
                                        <th>Kode</th>
                                        <th>Nama</th>
                                        <th>Total</th>
                                        <th>Ranking</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    {{-- @php
                                        usort($rangking, function ($a, $b) {
                                            return $a['total'] <=> $b['total'];
                                        });
                                        rsort($rangking);
                                        $a = 1;
                                    @endphp
                                    @foreach ($rangking as $t)
                                        <tr>
                                            <td>{{ $t['kode'] }}</td>
                                            <td>{{ $t['nama'] }}</td>
                                            <td>{{ number_format($t['total'], 2, ',', '.') }}</td>
                                            <td>{{ $a++ }}</td>
                                        </tr>
                                    @endforeach --}}

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
