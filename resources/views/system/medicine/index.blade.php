@extends('adminlte::page')

@section('title', 'Dashboard')
<meta name="csrf-token" content="{{ csrf_token() }}">
@routes
@section('content_header')
    <h1>Medicamento</h1>
@stop

@section('content')
   
    <div id="app">
        <div class="card">
            <div class="card-body">
                <p>En este apartado puedes registrar los medicamentos así como ver, editar y eliminar los mismos</p>
                <medicine-create></medicine-create><br>
                <medicine-index></medicine-index>
            </div>
        </div>

        
    </div>
@stop

@section('js')
    <script src="{{ asset('js/app.js?v='.filemtime('js/app.js')) }}"></script>
@stop