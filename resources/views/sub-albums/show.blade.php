@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Álbuns do álbum <span style="color:#000;">{{ $album->nome }}</span></h1>
        <a href="{{ route('albums.index') }}" class="btn btn-secondary" style="margin-bottom:2%;"><i class="fas fa-arrow-left"></i> Voltar</a><br>
        <a href="{{ route('sub-albums.create',  $album->id ) }}" class="btn btn-primary" style="margin-bottom:2%;">Criar Sub Álbum</a>
        @include('includes.notification')
        <div class="row">
            @if($album->albums()->count() > 0)
                @foreach ($album->albums as $album)
                    <a href="{{ route('sub-albums.show', $album->id) }}" class="col-md-2 img m-2">
                        <p style="text-decoration:none;"> {{  $album->nome }}</p>
                    </a>   
                @endforeach
            @else
                <div class="col-md-12">
                    <div class="alert alert-success" role="alert">
                        Você ainda não cadastrou Álbuns nesse Álbum
                    </div>
                </div>
            @endif
    
        </div>
    </div>
@endsection