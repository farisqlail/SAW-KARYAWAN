@extends('admin.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2 class="float-left">Hasil Wawancara {{ $pelamar->nama_pelamar }}</h2>
                    </div>

                    <div class="container">

                        <form action="{{ route('hasil.store', $pelamar->id) }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="status">status</label>
                                <select name="status" required class="form-control">
                                    <option @if($pelamar->status_wawancara == 'Ditolak') selected @endif value="Ditolak">Ditolak</option>
                                    <option  @if($pelamar->status_wawancara == 'Diterima') selected @endif value="Diterima">Diterima</option>

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="nama">Hasil Wawancara<span class="text-danger">*</span></label><br>
                                <textarea name="wawancara" id="wawancara" class="form-control">

{{ $pelamar->hasil_wawancara }}

                        </textarea>
                            </div>

                            <div class="button mb-3" align="right">

                                <button class="btn btn-success" type="submit">Submit</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

    <script>
        CKEDITOR.replace('wawancara');
    </script>
@endsection
