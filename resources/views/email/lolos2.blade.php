@extends('beautymail::templates.minty')

@section('content')

    @include('beautymail::templates.minty.contentStart')
    <tr>
        <td class="title">
            Yth.
            {{ $pelamar->nama_pelamar }}
        </td>
    </tr>
    <tr>
        <td width="100%" height="10"></td>
    </tr>
    <tr>
        <td class="paragraph">
            Menindaklanjuti pengumuman seleksi tahap 2 untuk lowongan <b>{{ $pelamar->lowongan->posisi_lowongan }}</b>,
            melalui surat ini kami sampaikan bahwa anda LOLOS pada seleksi tahap 2 dan dimohon untuk mengikuti wawancara
            yang akan diselenggarakan pada:
            <br><br>
            @php
                $dateNow = date('d');
                $lama = $dateNow + 7;
                $durasi = $lama - 31;
                $bulan = date('m') + 1;
                $hasil = date('Y') . '-' . '0' . $bulan . '-' . '0' . $durasi;
            @endphp
            Tanggal : {{ $hasil }}
            <br>
            Tempat : Jl. Kalidami No.51, Mojo, Kec. Gubeng, Kota Surabaya, Jawa Timur
            <br><br>
            Untuk informasi yang lebih lenjut dapat hubungi 081249356745.

            Atas perhatiannya kami sampaikan terimakasih.
        </td>
    </tr>
    <tr>
        <td width="100%" height="25"></td>
    </tr>
    <tr>
    </tr>
    <tr>
        <td width="100%" height="25"></td>
    </tr>
    @include('beautymail::templates.minty.contentEnd')

@stop
