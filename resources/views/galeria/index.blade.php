@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="columns is-multiline">
        <div class="column is-12-desktop is-12-mobile">
            <h1 class="title is-4">Galeria de Imagens</h1>
            <a href="{{ route('imagens.create') }}" class="button is-primary" style="margin-bottom:2%;">Cadastrar Aviso</a>

            <div class="box">
                 
                <div class="columns is-multiline">
                        <div class="column is-one-quarter-desktop is-half-tablet">
                        <div class="card">
                            <div class="card-image">
                                <figure class="image is-3by2">
                                    <img src="https://unsplash.it/300/200/?random&pic=1" alt="">
                                </figure>
                            </div>
                            <footer class="card-footer">
                                <a class="card-footer-item">
                                    APAGAR
                                </a>
                            </footer>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection