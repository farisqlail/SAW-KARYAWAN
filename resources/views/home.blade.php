@extends('admin.app')

@section('content')
    <div class="container">
        <div class="row justify-content-start">
            <div class="col-md-4">
                <a href="{{ route('lowongan.index') }}">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Rekrutmen Berlangsung</h4>
                            <h3>{{ $lowonganBerlaku }}</h3>
                            <i class="fas fa-clock fa-4x float-right" style="color:rgba(255, 79, 79, 0.702);"></i>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('lowongan.index') }}">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Rekrutmen Selesai</h4>
                            <h3>{{ $lowonganBerakhir }}</h3>
                            <i class="fas fa-calendar-check fa-4x float-right" style="color: rgba(49, 210, 49, 0.716);"></i>
                        </div>
                    </div>
                </a>
            </div>
        </div>


        <br>
        <div class="card">
            <div class="card-body">
                <h3>Riwayat Rekrutmen</h3>
                <div id="chart"></div>
            </div>
        </div>

        @if (auth()->user()->role == 'direksi')
            <div class="row mt-2">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h3>Data Pelamar</h3>
                            <div class="row">
                                <div class="col-md-6">

                                </div>
                                <div class="col-md-6" style="float: right">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="periode_awal">Periode Awal</label>
                                                <select class="form-control" id="periode_awal" name="periode_awal">
                                                    @forelse ($tahun as $item)
                                                        <option value="{{ $item }}">{{ $item }}</option>
                                                    @empty
                                                    @endforelse
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="periode_akhir">Periode Akhir</label>
                                                <select class="form-control" id="periode_akhir" name="periode_akhir">
                                                    @forelse ($tahun as $item)
                                                        <option value="{{ $item }}">{{ $item }}</option>
                                                    @empty
                                                    @endforelse
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div id="chartPelamar"></div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

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
                    data: @php echo json_encode($a); @endphp
                }],

            });


        });
    </script>

    @if (auth()->user()->role == 'direksi')
        <script>
            $(document).ready(function() {

                chartPelamarFn($('#periode_awal').find(':selected').val(), $('#periode_akhir').find(':selected').val())


                $('#periode_awal, #periode_akhir').on('change', function() {
                    var periode_awal = $('#periode_awal').find(':selected').val();
                    var periode_akhir = $('#periode_akhir').find(':selected').val();

                    chartPelamarFn(periode_awal, periode_akhir);
                })


                function chartPelamarFn(awal, akhir) {
                    $.ajax({
                        url: "{{ route('chart.pelamar') }}",
                        method: "GET",
                        data: {
                            periode_awal: awal,
                            periode_akhir: akhir
                        },
                        success: function(response) {
                            console.log(response);

                            Highcharts.chart('chartPelamar', {
                                chart: {
                                    type: 'column'
                                },
                                title: {
                                    text: 'Data Pelamar'
                                },
                                subtitle: {
                                    text: 'Data pelamar'
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
                                        text: 'Total pelamar'
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
                                    data: response.data
                                }],

                            });
                        }
                    })
                }


            })
        </script>
    @endif
@endsection
