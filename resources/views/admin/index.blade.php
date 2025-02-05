@extends('adminlte::page')

@section('title', 'Dashboard')
<meta name="csrf-token" content="{{ csrf_token() }}">
@routes
@section('content_header')
    <h1>Dashboard</h1>
@stop


@section('content')
   
    <div id="app">
        <div class="card">
            <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-warning" role="alert">
                        Estadisticas de los lugares visitados
                    </div>
                </div>
            </div>
                <places-charts></places-charts>
            </div>
        </div>
        <div class="card mt-5">
            <div class="card-body">
                <customers-charts></customers-charts>
            </div>
        </div>
    </div>
@stop


@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script src="{{ asset('js/app.js?v='.filemtime('js/app.js')) }}"></script>
@stop
