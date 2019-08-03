@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>Galeria de Imagens</h1>
        <h4>Álbuns</h4>
        @isset($albums)
            @foreach ($albums as $album)
                <ul>
                <li><h4><a href="{{ route('home.albuns.show', $album->id) }}">{{ $album->nome }}</a></h4></li>
                </ul>
            @endforeach
        @endisset
    </div>

@endsection