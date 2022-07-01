@extends('admin.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header card-header-icon card-header-primary">
                        <div class="card-icon">
                            <i class="material-icons">group</i>
                        </div>
                    </div>
                    <div class="card-body">
                    <h4 class="card-title">Pelamar yang menunggu validasi :</h4>
                        <h4>{{ $pelamarv }}</h4>
                        <h4 class="card-title">Pelamar yang menunggu seleksi 1 :</h4>
                        <h4>{{ $pelamar }}</h4>
                        <h4 class="card-title">Pelamar yang menunggu seleksi 2 : </h4>
                        <h4>{{ $pelamars2 }}</h4>
                        
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" style="padding-bottom: 60px;">
                    <div class="card-header card-header-icon card-header-success">
                        <div class="card-icon">
                            <i class="material-icons">schedule</i>
                        </div>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">Rekrutmen Berlangsung</h4>
                        <h3>{{ $lowonganBerlaku }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" style="padding-bottom: 60px;" >
                    <div class="card-header card-header-icon card-header-rose">
                        <div class="card-icon">
                            <i class="material-icons">check</i>
                        </div>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">Rekrutmen Selesai</h4>
                        <h3>{{ $lowonganBerakhir }}</h3>
                    </div>
                </div>
            </div>
        </div>

        <br>
        <div class="card">
            <div class="card-body">
                <h3>Riwayat Rekrutmen</h3>
                {{-- <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Lowongan</th>
                                <th>Total</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($riwayat as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->posisi_lowongan }}</td>
                                    <td>{{ $data->pelamar_count }}</td>
                                    <td>
                                        @if ($data->berlaku_sampai > \Carbon\Carbon::now())
                                            Pendaftaran Berlangsung
                                        @else
                                            Pendaftaran Ditutup
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table> --}}

                    <div id="chart"></div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://code.highcharts.com/highcharts.js"></script>

    <script>
        // Create the chart
        $(document).ready(function() {
            Highcharts.chart('chart', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Riwayat Rekrutmen'
                },
                subtitle: {
                    text: 'Riwayat rekrutmen pelamar perlowongan'
                },
                accessibility: {
                    announceNewData: {
                        enabled: true
                    }
                },
                xAxis: {
                    type: 'category'
                },
                yAxis: {
                    title: {
                        text: 'Total pelamar perlowongan'
                    }

                },
                legend: {
                    enabled: false
                },
                plotOptions: {
                    series: {
                        borderWidth: 0,
                        dataLabels: {
                            enabled: true,
                            format: '{point.y:.0f}'
                        }
                    }
                },

                tooltip: {
                    headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                    pointFormat: '<span style="color:{point.color}">{point.date} <br>{point.name}</span>: <b>{point.y:.0f}</b><br/>'
                },

                series: [{
                    name: "Jumlah Pelamar",
                    colorByPoint: true,
                    data: @php echo json_encode($a);
                     @endphp
                }],
                
            });
        });
    </script>
@endsection
