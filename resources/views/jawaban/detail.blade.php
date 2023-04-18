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
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Soal Tes</th>
                                        <th class="text-center">Jawaban</th>
                                        <th class="text-center">Nilai</th>
                                        <th class="text-center" style="width:40%">Aksi</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!empty($hasilTes))
                                        @foreach ($hasilTes as $data)
                                            <tr class="text-center">
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $data->soal }}</td>
                                                <td align="center">
                                                    <a href="{{ asset('storage/file/jawaban/' . $data->jawaban) }}"
                                                        target="blank" class="btn btn-primary" download><i
                                                            class="fas fa-download"></i> &nbsp;Unduh Jawaban</a>
                                                </td>
                                                <td class="text-center">
                                                    @if (!empty($data->nilai))
                                                        {{ $data->nilai }}
                                                    @else
                                                        0
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    <a href="#" data-id="{{ $data->id_soal_tes }}"
                                                        data-url="{{ route('jawaban.nilai.update', [$data->id]) }}"
                                                        class="btn btn-info btnNilai">Nilai Jawaban</a>
                                                </td>
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

    <div class="modal fade" id="nilaiJawaban" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nilai Jawaban
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form enctype="multipart/form-data" id="formNilai"
                        action="{{ route('jawaban.nilai.update', [$data->id]) }}" method="POST" class="col-md-12"
                        id="form-nilaiJawaban">
                        @csrf
                        {{ method_field('PUT') }}
                        <div class="form-group">
                            <label for="bobot">Bobot<span class="text-danger">*</span></label>
                            <select required name="bobot" id="bobot" class="form-control" required>

                                {{-- <option value="Islam">Islam</option> --}}

                            </select>
                        </div>

                        <div class="modal-footer" style="border:none;">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Nilai</button>
                        </div>
                    </form>
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

                            for (let index = 0; index < data.length; index++) {

                                const element = data[index];

                                if(element.id == response?.hasil_tes?.id_bobot_kriteria){
                                    $("#bobot").append(
                                    ` <option selected value="${element.id}">${element.jumlah_bobot}</option>`
                                    );
                                }else{
                                    $("#bobot").append(
                                    ` <option value="${element.id}">${element.jumlah_bobot}</option>`
                                    );
                                }


                            }
                        }
                    }
                })
            })
        })
    </script>
@endsection
