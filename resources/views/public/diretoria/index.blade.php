@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Diretoria</h1>
        <img class="img-fluid" src="{{ secure_asset('img/diretoria.png') }}"  alt="">
        <h1>Ex-Presidentes</h1>
        <img src="{{ secure_asset('img/expresidentes.jpg') }}" alt="">
    </div>
   
@endsection