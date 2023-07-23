@extends('layouts.user')
{{-- <img src="{{ asset('assets/img/Tes.png') }}" class="img-fluid" style="margin-top: 80px;" alt="" srcset=""> --}}
@section('content')
    {{-- @include('jawaban.jawaban') --}}

    <div class="card shadow-sm p-3 mb-5 bg-body rounded" style="margin-top: 50px;">
        <h3 class="mb-5">Tes Online</h3>

        <form action="{{ route('jawaban.store') }}" method="post">

            @csrf

            <input type="hidden" name="id_lowongan" value="{{ $jadwaltes->id_lowongan }}">

            <div class="card-body">

                @if (count($hasil_tes) === 0)
                    <div class="tes">

                        @foreach ($daftarsoal as $key => $item)
                            <div class="d-flex">
                                <span>{{ $key + 1 }}.</span>
                                <span class="ml-2">{{ $item->soal }}</span>
                            </div>

                            <div class="jawaban mt-2">

                                @foreach ($item->detail as $detail)
                                    <div class="form-check ml-3">
                                        <input class="form-check-input" type="radio" name="jawaban_{{ $item->id }}"
                                            id="jawaban_{{ $item->id }}" value="{{ $detail->id }}">
                                        <label class="form-check-label" for="jawaban_{{ $item->id }}">
                                            {{ $detail->jawaban }}
                                        </label>
                                    </div>
                                @endforeach


                            </div>
                        @endforeach


                    </div>

                    <div class="row">
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                @else
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h3>Pertanyaan sudah di jawab</h3>
                        </div>
                    </div>
                @endif


            </div>
        </form>

    </div>
@endsection
