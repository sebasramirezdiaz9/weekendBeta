@extends('adminlte::page')

@section('title', 'Dashboard')
<meta name="csrf-token" content="{{ csrf_token() }}">
@routes
@section('content_header')
    <h1>Medicamento</h1>
@stop

@section('content')
    <p>En este apartado puedes registrar tus medicamentos de manera correspondiente así como ver, editar y eliminar los mismos</p>
    <div id="app">
        <medicine-create></medicine-create><br>
        <medicine-index></medicine-index>
        
    </div>
@stop

@section('js')
    <script src="{{ asset('js/app.js?v='.filemtime('js/app.js')) }}"></script>
@stop