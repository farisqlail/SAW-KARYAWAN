@extends('admin.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="float-left">Laporan Data Pelamar Lolos Seleksi</h3>

                    </div>

                    <div class="card-body">

                        <form action="{{ route('admin.laporan.index') }}" method="get">

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="lowongan">Periode Lowongan</label>
                                        <select class="form-control" required name="periode" id="periode">
                                            <option value="">Pilih Periode Lowongan</option>
                                            @php
                                                $uniqueLowongan = $lowongan->unique('periode'); // Menghapus duplikat berdasarkan field 'periode'
                                            @endphp

                                            @forelse ($uniqueLowongan as $item)
                                                <option @if ($item->id == request('lowongan')) selected @endif
                                                    value="{{ $item->periode }}">{{ $item->periode }}</option>
                                            @empty
                                            @endforelse

                                        </select>
                                    </div>

                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary">Cari</button>
                                    <button type="button" class="btnCetak btn btn-info">Cetak</button>
                                </div>
                            </div>
                        </form>


                        <div class="table-responsive mt-2">
                            <table class="table" id="myTable" style="width: 98%;">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Lowongan</th>
                                        <th>Nama</th>
                                        <th>Tgl Lahir</th>
                                        <th>No Telp</th>
                                        <th>Rangking</th>
                                        <th>Nilai Akhir</th>
                                        <th>Status Wawancara</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($pelamar as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->lowongan->posisi_lowongan }}</td>
                                            <td>{{ $item->nama_pelamar }}</td>
                                            <td>{{ $item->tanggal_lahir }}</td>
                                            <td>{{ $item->no_telepon }}</td>
                                            <td>{{ $item->rangked }}</td>
                                            <td>{{ $item->nilai_akhir }}</td>
                                            <td>{{ $item->status_wawancara == null ? 'Belum ada status' : $item->status_wawancara }}</td>
                                        </tr>
                                    @empty
                                    @endforelse
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
            $('.btnCetak').on('click', function() {
                var periode = $('#periode').val()

                if (!periode) {
                    alert('periode wajib diisi');
                    return false;
                }


                var url = "{{ url('/admin/laporan') }}?status=cetak&periode=" + periode;

                window.open(url, '_blank')
            })
        })
    </script>
@endsection
