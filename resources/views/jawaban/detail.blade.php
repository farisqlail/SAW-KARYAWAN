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
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                Nilai Psikotes
                            </button>
                        </div>
                    </div>

                    <div class="card-body">
                        <h3>Nilai : {{ $hasilTes->nilai }}</h3>
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
                                                <td>{{ $data->detail_jawaban->daftarSoal->soal }}</td>

                                                <td>{{ $data->detail_jawaban->jawaban }}</td>
                                                <td>{{ $data->detail_jawaban->isTrue ? 'Benar' : 'Salah' }}</td>
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

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nilai Psikotes</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ route('jawaban.nilaipsikotes', $pelamar->id) }}">
                    @csrf
                    <input type="text" name="id_kriteria" value="{{ $kriteria->id }}" hidden>
                    <input type="text" name="id_pelamar" value="{{$pelamar->id}}" hidden>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Nilai</label>
                            <select name="nilai" class="form-control" id="">
                                <option value="95">Dapat disarankan</option>
                                <option value="85">Cukup dapat disarankan</option>
                                <option value="75">Kurang dapat disarankan</option>
                                <option value="65">Tidak dapat disarankan</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Keterangan</label>
                            <textarea name="keterangan" class="form-control" id="" cols="30" rows="2"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Nilai</button>
                    </div>
                </form>
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
