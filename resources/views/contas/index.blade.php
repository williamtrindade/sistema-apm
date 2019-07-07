@extends('layouts.admin')

@section('content')
<div class="container">
        <div class="columns">
            <div class="column is-12-desktop is-12-mobile">
                
                <h1 class="title is-4">Prestação de Contas</h1>
                <a href="{{ route('contas.create') }}" class="button is-primary" style="margin-bottom:2%;">Inserir Prestação de Contas</a>
             
                <div class="box">
                    <div class="control has-icons-left has-icons-right">
                        <input class="input" type="email" placeholder="Buscar ano">
                        <span class="icon is-small is-left">
                            <i class="fas fa-search"></i>
                        </span>
                    </div>
                    @foreach ($contas as $conta)
                        <a href="{{asset('storage/contas/'.$conta->arquivo)}}">fffffff</a>
                        {{ $conta->arquivo }}   <br> 
                    @endforeach
                    {{ $contas->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection