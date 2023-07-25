@extends('admin.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2 class="float-left">Hasil Tes {{ $pelamar->nama_pelamar }}</h2>
                        <div class="float-right">
                           
                            <a href="{{ route('jawaban.index', ['id' => $pelamar->id_lowongan]) }}"
                                class="btn btn-danger">Kembali</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <h3>Nilai : {{$hasilTes->nilai}}</h3>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Soal Tes</th>
                                        <th class="text-center">Jawaban</th>
                                        <th class="text-center">Hasil</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!empty($jawaban_pelamar))
                                        @foreach ($jawaban_pelamar as $data)
                                            <tr class="text-center">
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{$data->detail_jawaban->daftarSoal->soal}}</td>

                                                <td>{{$data->detail_jawaban->jawaban}}</td>
                                                <td>{{$data->detail_jawaban->isTrue ? 'Benar' : 'Salah'}}</td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="5" class="text-center">Data tidak ditemukan</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('.btnNilai').on('click', function() {

                var id_soal_tes = $(this).data('id');

                var url = $(this).data('url');

                $('#bobot').empty();

                $('#formNilai').attr('action', url);

                $('#nilaiJawaban').modal('show');

                $.ajax({
                    url: "{{ route('jawaban.bobot-kriteria') }}",
                    method: "GET",
                    data: {
                        id_soal_tes: id_soal_tes,
                        id_pelamar: "{{ $pelamar->id }}"
                    },
                    success: function(response) {
                        if (response) {
                            var data = response.data;

                            var hasil_tes = response?.hasil_tes;

                            $('#nilai').val(hasil_tes.nilai);
                        }
                    }
                })
            })
        })
    </script>
@endsection
