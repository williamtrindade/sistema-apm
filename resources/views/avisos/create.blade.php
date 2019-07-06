@extends('layouts.admin')

@section('content')
<div class="container">
        <div class="columns">
            <div class="column is-12-desktop is-12-mobile">
                <h1 class="title is-4">Cadastro de Aviso </h1>
                <div class="box">
                    <form action="{{ route('avisos.store') }}" method="POST">
                        @csrf
                        @method('POST')
                        <div class="field">
                            <label class="label">Título</label>
                            <div class="control">
                                <input class="input" type="text" placeholder="Digite o titulo" name="titulo">
                                @error('titulo')
                                    <p class="help is-danger">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                            
                        <div class="field">
                            <label class="label">Conteúdo</label>
                            <div class="control">
                                <textarea class="textarea" placeholder="Digite o conteúdo" name="conteudo"></textarea>
                                @error('conteudo')
                                    <p class="help is-danger">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        <p>A data e hora é colocada automaticamente :)</p>
                        <button type="submit" class="button is-success">Cadastrar</button>
                        <a href="{{ route('avisos.index') }}" class="button is-text">Cancelar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection