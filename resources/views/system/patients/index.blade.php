@extends('adminlte::page')

@section('title', 'Dashboard')
<meta name="csrf-token" content="{{ csrf_token() }}">
@routes
@section('content_header')
    <h1>Pacientes</h1>
@stop

@section('content')
    <p>En este apartado puedes registrar a tus pacientes de manera correspondiente así como ver, editar y eliminar los mismos</p>
    <div id="app">
        <patients-create></patients-create><br>
        <patients-index></patients-index>
    </div>
@stop

@section('js')
    <script src="{{ asset('js/app.js?v='.filemtime('js/app.js')) }}"></script>
@stop