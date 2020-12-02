@extends('adminlte::page')

@section('title', 'Dashboard')
<meta name="csrf-token" content="{{ csrf_token() }}">
@routes
@section('content_header')
    <h1>Doctores</h1>
@stop

@section('content')
   
    <div id="app">
        <div class="card">
            <div class="card-body">
                <p>En este apartado puedes administrar los usuarios de manera correspondiente, para registrar, ver o editar a los mismos</p>
                <create-user></create-user><br>
                 <user-index></user-index>
            </div>
        </div>
        
    </div>
@stop

@section('js')
    <script src="{{ asset('js/app.js?v='.filemtime('js/app.js')) }}"></script>
@stop