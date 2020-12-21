@extends('adminlte::page')

@section('title', 'Places')
<meta name="csrf-token" content="{{ csrf_token() }}">
@routes
@section('content_header')
    <h1>Lugares Populares</h1>
@stop

@section('content')
   
    <div id="app">
        <div class="card">
            <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-warning" role="alert">
                        Hola Usuario aqui están los lugares más populares
                    </div>
                </div>
            </div>
                <show-places-populars></show-places-populars>
            </div>
        </div>
        
    </div>
@stop

@section('js')
    <script src="{{ asset('js/app.js?v='.filemtime('js/app.js')) }}"></script>
@stop