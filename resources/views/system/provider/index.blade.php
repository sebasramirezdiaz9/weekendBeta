@extends('adminlte::page')

@section('title', 'Dashboard')
<meta name="csrf-token" content="{{ csrf_token() }}">
@routes
@section('content_header')
    <h1>Proveedores</h1>
@stop

@section('content')
    <p>En este apartado puedes registrar los proveedores correspondiente así como ver, editar y eliminar los mismos</p>
    <div id="app">
        <provider-create></provider-create>
        <provider-index></provider-index>
       
    </div>
@stop

@section('js')
    <script src="{{ asset('js/app.js?v='.filemtime('js/app.js')) }}"></script>
@stop