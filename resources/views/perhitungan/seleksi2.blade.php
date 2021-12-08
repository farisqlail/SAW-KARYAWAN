@extends('admin.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 card-deck">

                <div class="card">
                    <div class="card-header">
                        <h3 class="float-left">Rangking</h3>
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

                                    {{-- @php $total = []; @endphp --}}

                                    @foreach ($hasilTes as $data)
                                        @php
                                            $hitung = $data->nilai * ($data->bobot_soal / 100);
                                            // $total = $hitung / $data->bobot_soal;
                                            
                                            $rangking[] = [
                                                'nama' => $data->pelamar->nama_pelamar,
                                                'hitung' => $hitung,
                                                'bobot' => $data->bobot_soal,
                                            ];
                                        @endphp

                                    @endforeach

                                    @php
                                        usort($rangking, function ($a, $b) {
                                            return $a['hitung'] <=> $b['hitung'];
                                        });
                                        rsort($rangking);
                                        $a = 1;
                                        $no2 = 1;
                                    @endphp

                                    @foreach ($rangking as $t)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $t['nama'] }}</td>
                                            <td>{{ number_format($t['hitung']) }}</td>
                                            <td>{{ $a++ }}</td>
                                            <td align="center">

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
