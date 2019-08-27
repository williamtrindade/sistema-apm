@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>DashBoard</h1>
        <div class="row">
            <div class="col-md-4">
                <div class="card shadow">
                    <div class="card-header">
                        Prestação de Contas
                    </div>
                    <div class="card-body">
                        <h1>{{ $contas }}</h1>
                        <p class="card-text">Cadastrada(s).</p>
                        <a href="{{ route('contas.index') }}" class="btn btn-primary">Acesse</a>
                    </div>
                  </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow">
                    <div class="card-header">
                        Imagens
                    </div>
                    <div class="card-body">
                        <h1>{{ $imagens }}</h1>
                        <p class="card-text">Cadastrada(s).</p>
                        <a href="{{ route('albums.index') }}" class="btn btn-primary">Acesse</a>
                    </div>
                  </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow">
                    <div class="card-header">
                        Avisos
                    </div>
                    <div class="card-body">
                        <h1>{{ $avisos }}</h1>
                        <p class="card-text">Cadastrado(s).</p>
                        <a href="{{ route('avisos.index') }}" class="btn btn-primary">Acesse</a>
                    </div>
                  </div>
            </div>
        </div>
    </div>

@endsection