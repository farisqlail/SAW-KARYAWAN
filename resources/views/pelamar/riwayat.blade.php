@extends('layouts.user')

@section('content')

    <div class="container" style="margin-top: 100px;">
        <h1>Riwayat Lamaran</h1>

        <div class="table-responsive mt-5">
            <table class="table table-bordered" id="myTable">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Posisi Lamaran</th>
                        <th class="text-center">Tanggal Lamar</th>
                        <th class="text-center">Status Lamaran</th>
                    </tr>
                </thead>
                <tbody>
                    @if (!empty($pelamar))
                        @foreach ($pelamar as $data)
                            <tr class="text-center">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->lowongan->posisi_lowongan }}</td>
                                <td>{{ $data->lowongan->created_at }}</td>
                                <td>
                                    @if ($data->status_lamaran == NULL)
                                        <span class="text-warning">Lamaran belum ada status</span>
                                    @elseif($data->status_lamaran == 'Diterima Tahap 1')
                                        <span class="text-success">Lamaran Diterima Seleksi 1</span>
                                    @elseif($data->status_lamaran == 'Ditolak')
                                        <span class="text-danger">Lamaran Ditolak</span>
                                    @endif
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

@endsection
