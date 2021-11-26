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
            Selamat anda lolos pada tahap seleksi satu ini dan akan mengikuti seleksi kedua.
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
