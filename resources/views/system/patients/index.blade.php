@extends('adminlte::page')

@section('title', 'Dashboard')
<meta name="csrf-token" content="{{ csrf_token() }}">
@routes
@section('content_header')
    <h1>Pacientes</h1>
@stop

@section('content')
   
    <div id="app">
        <div class="card">
            <div class="card-body">
                <p>En este apartado puedes registrar a tus pacientes de manera correspondiente así como ver, editar y eliminar los mismos</p>
                <patients-create></patients-create><br>
                <patients-index></patients-index>
            </div>
        </div>
        
    </div>
@stop

@section('js')
    <script src="{{ asset('js/app.js?v='.filemtime('js/app.js')) }}"></script>
@stop