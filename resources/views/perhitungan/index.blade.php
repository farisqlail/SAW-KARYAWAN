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
                                
                                    <th class="text-center">Nama Pelamar</th>
                                    @foreach($kriteria as $krit)
                                    <th class="text-center">{{$krit->nama_kriteria}}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($alternatif))
                                @foreach($alternatif as $data)
                                <tr>
                                    
                                    <td>{{$data->nama_pelamar}}</td>
                                    @foreach($data->bobot as $bobot)
                                    <td>{{$bobot->nama_bobot}}</td>
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
                                    <?php $bobot = [] ?>
                                    @foreach($kriteria as $krit)
                                    <?php $bobot[$krit->id_kriteria] = $krit->bobot_preferensi ?>
                                    <th class="text-center">{{$krit->nama_kriteria}}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($alternatif))
                                <?php $rangking = []; ?>
                                @foreach($alternatif as $data)
                                <tr>
                                    <td>{{$data->nama_pelamar}}</td>
                                    <?php $total = 0;
                                    $nilai_normalisasi = 0; ?>
                                    @foreach($data->bobot as $crip)
                                    @if($crip->kriteria->atribut_kriteria == 'cost')
                                    <?php $nilai_normalisasi = ($kode_krit[$crip->kriteria->id_kriteria] / $crip->jumlah_bobot); ?>



                                    @elseif($crip->kriteria->atribut_kriteria == 'benefit')
                                    <?php $nilai_normalisasi = ($crip->jumlah_bobot / $kode_krit[$crip->kriteria->id_kriteria]); ?>


                                    @endif
                                    <?php $total = $total + ($bobot[$crip->kriteria->id_kriteria] * $nilai_normalisasi); ?>
                                    <td>{{number_format($nilai_normalisasi,2,",",".")}}</td>


                                    @endforeach
                                    <?php $rangking[] = [
                                        'total' => $total,
                                        'kode'  => $data->id_pelamar,
                                        'nama'  => $data->nama_pelamar,
                                        
                                    ]; ?>
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
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Total</th>
                                    <th>Ranking</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                usort($rangking, function ($a, $b) {
                                    return $a['total'] <=> $b['total'];
                                });
                                rsort($rangking);
                                $a = 1;
                                $no=1;
                                ?>
                                @foreach($rangking as $t)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$t['nama']}}</td>
                                    <td>{{number_format($t['total'],2,",",".")}}</td>
                                    <td>{{$a++}}</td>
                                    <td align="center">

                                        <form action="{{ route('pelamar.update', $t['kode']) }}" method="post">

                                            <a href="{{ route('seleksi.detail', $t['kode']) }}" class="btn btn-primary">Detail Pelamar</a>

                                            {{ csrf_field() }}
                                            {{-- {{ method_field('PATCH') }} --}}

                                            <input type="submit" name="submit" href="{{ route('seleksi.detail', $t['kode']) }}" class="btn btn-success" value="Terima">

                                            <input type="submit" name="submit" href="{{ route('seleksi.detail', $t['kode']) }}" class="btn btn-danger" value="Tolak">
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