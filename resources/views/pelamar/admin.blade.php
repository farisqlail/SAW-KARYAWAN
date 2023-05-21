@extends('admin.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2 class="float-left">Pelamar</h2>

                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="myTable" style="width: 98%;">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Lowongan</th>
                                        <th class="text-center">Nama</th>
                                        <th class="text-center">Tgl Lahir</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($pelamar as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->lowongan->posisi_lowongan }}</td>
                                            <td>{{ $item->nama_pelamar }}</td>
                                            <td>{{ $item->tanggal_lahir }}</td>
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
