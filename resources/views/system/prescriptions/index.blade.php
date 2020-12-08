@extends('adminlte::page')

@section('title', 'Dashboard')
<meta name="csrf-token" content="{{ csrf_token() }}">
@routes
@section('content_header')
    <h1>Recetas Medicas</h1>
@stop

@section('content')
    <p>En este apartado puedes crear, editar e imprimir recetas medicas</p>
    <div id="app">
        <div class="card">
            <div class="card-body">
                <prescription-create></prescription-create>
                <prescription-index></prescription-index>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script src="{{ asset('js/app.js?v='.filemtime('js/app.js')) }}"></script>
@stop