@extends('beautymail::templates.minty')

@section('content')

	@include('beautymail::templates.minty.contentStart')
	<tr>
        <td class="title">
            Selamat,
        </td>
    </tr>
    <tr>
        <td width="100%" height="10"></td>
    </tr>
    <tr>
        <td class="paragraph">
            Selamat anda lolos pada tahap seleksi dua ini dan akan mengikuti tes wawancara.
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
