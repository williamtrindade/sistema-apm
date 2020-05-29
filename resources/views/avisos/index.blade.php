@extends('layouts.admin')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-12">
                
                <h1>Avisos</h1>
                <a href="{{ route('avisos.create') }}" class="btn btn-primary" style="margin-bottom:2%;"><i class="fas fa-plus"></i> Cadastrar Aviso</a>
             
                <div>
                    @if(count($avisos) > 0)
                        <table class="table is-fullwidth">
                            <thead>
                                <tr>
                                    <th>Título</th>
                                    <th>Conteúdo</th>
                                    <th>Data / Hora</th> 
                                    <th>Ação</th>   
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($avisos as $aviso)
                                    <tr>
                                        <td>{{ $aviso->titulo }}</td>
                                        <td>...</td>
                                        <td>{{ $aviso->created_at }}</td>
                                        <td>
                                            <form method="POST" action="{{ route('avisos.destroy', $aviso->id) }}">
                                                <a href="{{ route('avisos.edit', $aviso->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i> Editar</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Excluir</button>
                                            </form>  
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$avisos->links()}}
                    @else 
                        <div class="alert alert-success" role="alert">
                        Você não cadastrou Avisos!
                        </div>
                    @endif
                   
                </div>
            </div>
        </div>
    </div>
@endsection