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
                                        <label for="lowongan">Lowongan</label>
                                        <select class="form-control" required name="lowongan" id="lowongan">
                                            <option value="">Pilih Lowongan</option>
                                            @forelse ($lowongan as $item)
                                                <option @if ($item->id == request('lowongan')) selected @endif
                                                    value="{{ $item->id }}">{{ $item->posisi_lowongan }}</option>
                                            @empty
                                            @endforelse

                                        </select>
                                    </div>

                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="periode_awal">Periode Awal</label>
                                        <input type="date" class="form-control" value="{{ request('periode_awal') }}"
                                            id="periode_awal" required name="periode_awal">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="periode_akhir">Periode Akhir</label>
                                        <input type="date" class="form-control" value="{{ request('periode_akhir') }}"
                                            id="periode_akhir" required name="periode_akhir">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="kategori">Kategori</label>
                                        <select class="form-control" name="kategori" required id="kategori">
                                            <option @if ('Seleksi 1' == request('kategori')) selected @endif value="Seleksi 1">
                                                Seleksi 1</option>
                                            <option @if ('Seleksi 2' == request('kategori')) selected @endif value="Seleksi 2">
                                                Seleksi 2</option>
                                            <option @if ('Wawancara' == request('kategori')) selected @endif value="Wawancara">
                                                Wawancara</option>

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
                var periode_awal = $('#periode_awal').val()
                var periode_akhir = $('#periode_akhir').val()
                var lowongan = $('#lowongan').find(':selected').val()
                var kategori = $('#kategori').find(':selected').val()

                if (!periode_awal || !periode_akhir) {
                    alert('periode wajib diisi');
                    return false;
                }

                if (!kategori) {
                    alert('kategori wajib diisi');
                    return false;
                }

                if (!lowongan) {
                    alert('lowongan wajib diisi');
                    return false;
                }

                var url = "{{ url('/admin/laporan') }}?status=cetak&periode_awal=" + periode_awal +
                    "&periode_akhir=" + periode_akhir + "&lowongan=" + lowongan + "&kategori=" + kategori;

                window.open(url, '_blank')
            })
        })
    </script>
@endsection
