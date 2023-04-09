@extends('admin.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12 card-deck">
                <div class="col-md-12 card-deck mt-4">
                    <div class="card">
                        <div class="card-header">
                            <h3>Daftar Pelamar</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th align="center">NO</th>
                                            <th align="center">Nama</th>
                                            <th align="center">Status Dokumen</th>
                                            <th align="center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($perangkingan as $t)
                                            <div class="modal fade" id="dokumen" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Lihat</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body" align="center">
                                                            <a href="{{ route('perhitungan.pdf', $t['id_pelamar']) }}"
                                                                class="btn btn-danger btn-sm" target="blank">Lihat CV</a>
                                                            <a href="{{ route('perhitungan.pdfIjazah', $t['id_pelamar']) }}"
                                                                class="btn btn-danger btn-sm" target="blank">Lihat
                                                                Ijazah</a>
                                                            <a href="{{ route('perhitungan.pasFoto', $t['id_pelamar']) }}"
                                                                class="btn btn-danger btn-sm" target="blank">Lihat Pas
                                                                Foto</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $t['nama_pelamar'] }}</td>
                                                <td align="center">
                                                    @if ($t['status_dokumen'] == 'Dokumen Valid')
                                                        <span class="badge badge-success">Dokumen Valid</span>
                                                    @elseif($t['status_dokumen'] == 'Dokumen Tidak Valid')
                                                        <span class="badge badge-danger">Dokumen Tidak Valid</span>
                                                    @else
                                                        <span class="badge badge-warning">Dokumen belum tervalidasi</span>
                                                    @endif
                                                </td>
                                                <td align="center">
                                                    <a href="{{ route('seleksi.detail', $t['id_pelamar']) }}"
                                                        class="btn btn-info btn-sm">Lihat Detail</a>
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
            @endsection
