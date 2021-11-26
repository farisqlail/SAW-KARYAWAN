@extends('beautymail::templates.minty')

@section('content')

	@include('beautymail::templates.minty.contentStart')
	<tr>
        <td class="title">
            Mohon maaf,
        </td>
    </tr>
    <tr>
        <td width="100%" height="10"></td>
    </tr>
    <tr>
        <td class="paragraph">
            Mohon maaf anda belum lolos pada tahap seleksi satu ini kami berharap yang terbaik untuk anda.
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
