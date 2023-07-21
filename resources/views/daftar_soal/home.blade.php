@extends('layouts.user')
{{-- <img src="{{ asset('assets/img/Tes.png') }}" class="img-fluid" style="margin-top: 80px;" alt="" srcset=""> --}}
@section('content')
    {{-- @include('jawaban.jawaban') --}}

    <div class="card shadow-sm p-3 mb-5 bg-body rounded" style="margin-top: 50px;">
        <h3 class="mb-5">Tes Online</h3>
        <div class="card-body">


            <div class="tes">
                <div class="d-flex">
                    <span>1.</span>
                    <span class="ml-2">Pertanyaanananananana</span>
                </div>
                
                <div class="jawaban mt-2">
                    <div class="form-check ml-3">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1"
                            checked>
                        <label class="form-check-label" for="exampleRadios1">
                            Jawaban a
                        </label>
                    </div>
                    <div class="form-check ml-3">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1"
                            checked>
                        <label class="form-check-label" for="exampleRadios1">
                            Jawaban b
                        </label>
                    </div>
                    <div class="form-check ml-3">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1"
                            checked>
                        <label class="form-check-label" for="exampleRadios1">
                            Jawaban c
                        </label>
                    </div>
                    <div class="form-check ml-3">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1"
                            checked>
                        <label class="form-check-label" for="exampleRadios1">
                            Jawaban d
                        </label>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection
