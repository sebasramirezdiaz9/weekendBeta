@extends('adminlte::page')

@section('title', 'Dashboard')
<meta name="csrf-token" content="{{ csrf_token() }}">
@routes
@section('content_header')
    <h1>Inventario</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body"> 
        <div id="app">
              
         <p>En este apartado podras ver los medicamentos existentes en la farmacia</p>
        <inventory-index></inventory-index>
                
        </div>
    </div>
</div>

@stop

@section('js')
    <script src="{{ asset('js/app.js?v='.filemtime('js/app.js')) }}"></script>
@stop