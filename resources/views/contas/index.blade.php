@extends('layouts.admin')

@section('content')
<div class="container">
        <div class="columns">
            <div class="column is-12-desktop is-12-mobile">   
                <h1 class="title is-4 ">Prestação de Contas</h1>
                <a href="{{ route('contas.create') }}" class="btn btn-primary" style="margin-bottom:2%;">Cadastrar Prestação de Contas</a>
                <div class="box">
                    @include('includes.notification')
                    @if($contas->count() > 0)
                       
                        <table class="table">
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
                                    <td>{{ Carbon\Carbon::parse($conta->data)->format('d/m/Y ') }}</td>
                                    <th><a href="{{asset('storage/contas/'.$conta->arquivo)}}">{{  $conta->arquivo }}</a></th>
                                    <th>
                                        <form method="POST" action="{{ route('contas.destroy', $conta) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                        </form>  
                                    </th>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>  
                        {{ $contas->links() }}
                    @else
                        <div class="alert alert-success" role="alert">
                            Sem Prestação de contas!
                        </div>
                    @endif                 
                  
                </div>
            </div>
        </div>
    </div>
@endsection