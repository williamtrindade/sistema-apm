@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">  
            <h1>Galeria de Imagens</h1>
            <a href="{{ route('albums.create') }}" class="btn btn-primary" style="margin-bottom:2%;"><i class="fas fa-plus"></i> Criar Álbum</a>

            @include('includes.notification')
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 shadow p-4"> 
            @if($albums->count() > 0)
                <h4>Todos os Álbuns</h4>
                <table class="table  table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Nome do Álbum</th>
                            <th>Quantidade de Sub Álbuns</th>
                            <th  style="text-align: center;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($albums as $album)
                            <tr>
                                <th>{{ $album->nome }}</th>
                                <th>{{ $album->albums()->count() }}</th>
                                <th style="text-align: right;">
                                    <a href="{{ route('sub-albums.show', $album->id) }}" class="btn btn-success">
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
                {{ $contas->links() }}
            @else
                <div class="col-md-12">
                    <div class="alert alert-success" role="alert">
                        Você ainda não cadastrou Álbuns na galeria!
                    </div>
                </div>
            @endif
        </div>

    </div>
</div>
@endsection