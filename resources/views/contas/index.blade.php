@extends('layouts.admin')

@section('content')
<div class="container">
        <div class="columns">
            <div class="column is-12-desktop is-12-mobile">
                
                <h1 class="title is-4 ">Prestação de Contas</h1>
                <a href="{{ route('contas.create') }}" class="button is-primary" style="margin-bottom:2%;">Cadastrar Prestação de Contas</a>
             
                <div class="box">
                    @if($contas->count() > 0)
                    <div class="control has-icons-left has-icons-right">
                            <input class="input" type="email" placeholder="Buscar ano">
                            <span class="icon is-small is-left">
                                <i class="fas fa-search"></i>
                            </span>
                        </div>
                        <table class="table is-fullwidth">
                            <thead>
                                <tr>
                                    <th>Data</th>
                                    <th>Nome do Arquivo</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contas as $conta)
                                <tr>
                                    <td>{{ $conta->created_at->format('d-m-y') }}</td>
                                    <th><a href="{{asset('storage/contas/'.$conta->arquivo)}}">{{  $conta->arquivo }}</a></th>
                                    <th>
                                        <form method="POST" action="{{ route('contas.destroy', $conta) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="button is-danger"><i class="fas fa-trash"></i></button>
                                        </form>  
                                    </th>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>  
                        {{ $contas->links() }}
                    @else
                        <div class="box">
                            <h1 class="title is-6">Sem Prestação de contas!</h1>
                        </div>
                    @endif                 
                  
                </div>
            </div>
        </div>
    </div>
@endsection