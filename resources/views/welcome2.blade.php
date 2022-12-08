@extends('layouts.user')

@section('content')
    <div>
        <div class="mx-auto d-flex flex-lg-row flex-column hero">
            <!-- Left Column -->
            <div
                class="left-column flex-lg-grow-1 d-flex flex-column align-items-lg-start text-lg-start align-items-center text-center">
                <h1 class="title-text-big">
                    Website<br class="d-lg-block d-none" />
                    <span style="color: #FF7468">Rekrutmen</span><br class="d-lg-block d-none" />
                    PT.Jayaland
                </h1>
                <p class="text-caption">
                    Webiste ini dibuat untuk memudahkan proses rekrutmen PT.Jayaland
                </p>
                <div class="d-flex flex-sm-row flex-column align-items-center mx-auto mx-lg-0 justify-content-center gap-3">
                    <a href="{{ route('lowongan.home') }}" class="btn btn-get text-white d-inline-flex">
                        Lihat Lowongan
                    </a>
                    {{-- <button class="btn btn-outline">
                                <div class="d-flex align-items-center">
                                    <svg class="me-2" width="27" height="27" viewBox="0 0 27 27" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M16.1793 13.7935L11.9166 10.9515V16.6355L16.1793 13.7935ZM18.1673 14.0708L11.1013 18.7815C11.0511 18.8149 10.9928 18.834 10.9326 18.8369C10.8723 18.8398 10.8125 18.8263 10.7593 18.7978C10.7062 18.7694 10.6617 18.727 10.6307 18.6753C10.5997 18.6236 10.5833 18.5644 10.5833 18.5041V9.0828C10.5833 9.0225 10.5997 8.96334 10.6307 8.91162C10.6617 8.8599 10.7062 8.81756 10.7593 8.7891C10.8125 8.76064 10.8723 8.74713 10.9326 8.75001C10.9928 8.7529 11.0511 8.77206 11.1013 8.80546L18.1673 13.5161C18.213 13.5466 18.2504 13.5878 18.2763 13.6362C18.3022 13.6846 18.3157 13.7386 18.3157 13.7935C18.3157 13.8483 18.3022 13.9024 18.2763 13.9507C18.2504 13.9991 18.213 14.0404 18.1673 14.0708Z"
                                            fill="#5D6E86" />
                                        <rect x="0.75" y="1.29346" width="25" height="25" rx="12.5" stroke="#5D6E86" />
                                    </svg>
                                    Watch the video
                                </div>
                            </button> --}}
                </div>
            </div>

            <!-- Right Column -->
            <div class="right-column d-flex justify-content-center justify-content-lg-start text-center pe-0">
                <img class="position-absolute d-lg-block d-none hero-right"
                    src="http://api.elements.buildwithangga.com/storage/files/2/assets/Header/Header3/Header-3-2.png"
                    alt="" />
                <div class="d-flex align-items-end card-outer">
                    <div class="mx-auto d-flex flex-wrap align-items-center">
                        <div class="card border-0 position-relative d-flex flex-column">
                            <div class="d-flex align-items-center" style="margin-bottom: 1.25rem">
                                <div>
                                    <img style="margin-right: 1rem"
                                        src="http://api.elements.buildwithangga.com/storage/files/2/assets/Header/Header3/Header-3-3.png"
                                        alt="" />
                                </div>
                                <div class="text-start">
                                    <p class="card-name">Felix Potah</p>
                                    <p class="card-job">Pro Mentor</p>
                                </div>
                            </div>
                            <div class="row text-start" style="margin-bottom: 1.25rem">
                                <div class="col-6">
                                    <p class="card-price-left">64,100</p>
                                    <p class="card-caption">Followers</p>
                                </div>
                                <div class="col-6 ps-0">
                                    <p class="card-price-right">106</p>
                                    <p class="card-caption">Reviews</p>
                                </div>
                            </div>
                            <button class="btn btn-hire text-white">
                                <div class="test d-none">show</div>
                                Hire Me
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
