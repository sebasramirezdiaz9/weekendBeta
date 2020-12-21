@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Bienvenido</h1>
@stop

@section('content')
    <p style="font-size:35px;">Weekend es un sistema para que tu elijas el lugar que desees en todas las ciudades del mundo y ademas puedas agregar a favoritos los mismos
    y ver los favoritos de los demas usuarios. Agradecemos a Google y Laravel.</p>
    <div class="row mt-5 ml-5">
    <div class="col-md-3">
    <i style="color:orange;" class="fas fa-map-marked-alt fa-9x"></i>
    </div>
    <div class="col-md-3">
    <i style="color:orange;" class="fas fa-heart fa-9x"></i>
    </div>
    <div class="col-md-3">
    <i style="color:orange;" class="fas fa-users fa-9x"></i>
    </div>
    <div class="col-md-3">
    <i style="color:orange;" class="fas fa-glass-cheers fa-9x"></i>
    </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop