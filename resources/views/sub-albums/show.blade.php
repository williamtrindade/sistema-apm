@extends('layouts.admin')

@section('content')
<style>
    .a-img{
        font-style: none;
        color: #000;
        text-decoration: none;
        border:#000 1px solid;
        height: 170px;
    }

    .a-img:hover {
        color: #000;
    }
</style>
<div class="container">
    <h1>Galeria</h1>

    <a href="{{ route('albums.index') }}" class="btn btn-secondary" style="margin-bottom:2%;"><i class="fas fa-arrow-left"></i> Voltar</a><br>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('albums.index') }}">Albums</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$album->nome}}</li>
        </ol>
    </nav>
    <a href="{{ route('sub-albums.create',  $album->id ) }}" class="btn btn-primary" style="margin-bottom:2%;"><i class="fas fa-plus"></i> Criar Sub Álbum</a>
    @include('includes.notification')
    
       
    </table>

    <div class="row">
        @if($album->albums()->count() > 0)
            <div class="col-md-12">
                <h4>Álbuns do álbum <span style="color:#000;">{{ $album->nome }}</span></h4>
            </div>
            <table class="table  table-striped m-3">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Nome do Álbum</th>
                        <th>Quantidade de Imagens / Vídeos</th>
                        <th  style="text-align: center;"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($album->albums as $album)
                    <tr>
                        <th>{{ $album->nome }}</th>
                        <th>{{ $album->imagens->count() + $album->videos->count()}}</th>
                        <th style="text-align: right;">
                            <a href="{{ route('imagens.show', $album->id) }}" class="btn btn-success">
                                <i class="fas fa-eye"></i> Visualizar
                            </a>  
                    
                            <a href="{{ route('albums.edit', $album->id) }}" class="btn btn-primary">
                                <i class="fas fa-edit"></i> Editar
                            </a>
    
                            <form style="display: inline;" method="POST" action="{{ route('albums.destroy', $album->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Excluir</button>
                            </form>
    
                        </th>
                    </tr>
                    @endforeach
                </tbody>
            </table>
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