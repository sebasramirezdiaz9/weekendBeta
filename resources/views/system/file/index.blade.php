@extends('adminlte::page')

@section('title', 'Dashboard')
<meta name="csrf-token" content="{{ csrf_token() }}">
@routes
@section('content_header')
    <h1>Expedientes</h1>
@stop

@section('content')
    <p>En este apartado puedes registrar los expedientes medicos de tus pacientes así como ver, editar y eliminar los mismos</p>
    <div id="app">
       <file-create></file-create>
       <file-index></file-index>
    </div>
@stop

@section('js')
    <script src="{{ asset('js/app.js?v='.filemtime('js/app.js')) }}"></script>
@stop