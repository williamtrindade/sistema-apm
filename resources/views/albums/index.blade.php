@extends('layouts.admin')

@section('content')
<style>
    .img {
        width: 100%;
        height: 160px;
        transition:0.5s;
        border-radius: 2px;
        border:#000 2px solid;
    }
    .img:hover {
        border:transparent 2px solid;

    }
</style>
<div class="container">
    <div class="row">
        <div class="col-md-12">  
            <h1>Álbuns</h1>
            <a href="{{ route('albums.create') }}" class="btn btn-primary" style="margin-bottom:2%;">Criar Álbum</a>
            @include('includes.notification')
        </div>
    </div>
    <div class="row">
        @if($albums->count() > 0)
            @foreach ($albums as $album)
                <a href="{{ route('sub-albums.show', $album->id) }}" class="col-md-2 img m-2">
                    <p style="text-decoration:none;"> {{  $album->nome }}</p>
                </a>   
            @endforeach
        @else
            <div class="col-md-12">
                <div class="alert alert-success" role="alert">
                    Você ainda não cadastrou Álbuns na galeria!
                </div>
            </div>
        @endif

    </div>
</div>
@endsection