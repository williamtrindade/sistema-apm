@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>Galeria de Imagens</h1>
        <h4>Álbuns do álbum {{ $album->nome }}</h4>
        <a href="{{ route('home.albuns.index') }}" class="btn btn-secondary" ><i class="fas fa-arrow-left"></i> Voltar</a>
        @isset($album)
            @foreach ($album->albums as $album)
                <ul>
                <li><h4><a href="{{ route('home.albuns.imagens',[$album->owner_album_id, $album->id]) }}">{{ $album->nome }}</a></h4></li>
                </ul>
            @endforeach
        @endisset
    </div>

@endsection