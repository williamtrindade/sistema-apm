@extends('layouts.admin')

@section('content')
<div class="container">
        <div class="columns">
            <div class="column is-12-desktop is-12-mobile">
                
                <h1 class="title is-4">Avisos</h1>
                <a href="{{ route('avisos.create') }}" class="button is-primary" style="margin-bottom:2%;">Cadastrar Aviso</a>
             
                <div class="box">
                    @if(count($avisos) > 0)
                    <div class="control has-icons-left has-icons-right">
                        <input class="input" type="email" placeholder="Busca">
                        <span class="icon is-small is-left">
                            <i class="fas fa-search"></i>
                        </span>
                    </div>
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
                                        <td>{{ $aviso->conteudo }}</td>
                                        <td>{{ $aviso->created_at }}</td>
                                        <td>
                                            <form method="POST" action="{{ route('avisos.destroy', $aviso) }}">
                                                <a href="{{ route('avisos.edit', $aviso->id) }}" class="button is-primary"><i class="fas fa-edit"></i></a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="button is-danger"><i class="fas fa-trash"></i></button>
                                            </form>  
                                        </td>
                                    </tr>
                                @endforeach
    
                            </tbody>
                        </table>
                        {{$avisos->links()}}
                    @else 
                        <div class="box">
                            <h1 class="title is-6">Sem Avisos!</h1>
                        </div>
                    @endif
                   
                </div>
            </div>
        </div>
    </div>
@endsection