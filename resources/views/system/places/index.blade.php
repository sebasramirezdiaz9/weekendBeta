@extends('adminlte::page')

@section('title', 'Places')
<meta name="csrf-token" content="{{ csrf_token() }}">
@routes
@section('content_header')
    <h1>Lugares</h1>
@stop

@section('content')
   
    <div id="app">
        <div class="card">
            <div class="card-body">
                <p>Hola Usuario aqui podras elegir por categoria los lugares que desees visitar</p>
                <show-places></show-places>
            </div>
        </div>
        
    </div>
@stop

@section('js')
    <script src="{{ asset('js/app.js?v='.filemtime('js/app.js')) }}"></script>
@stop