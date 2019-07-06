@extends('layouts.admin')

@section('content')
<div class="container">
        <div class="columns">
            <div class="column is-12-desktop is-12-mobile">
                <h1 class="title is-4">Edição de Aviso </h1>
                <div class="box">
                    <form action="{{ route('avisos.update', $aviso->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="field">
                            <label class="label">Título</label>
                            <div class="control">
                                <input class="input" type="text" placeholder="Digite o titulo" name="titulo" value="{{ $aviso->titulo }}">
                                @error('titulo')
                                    <p class="help is-danger">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                            
                        <div class="field">
                            <label class="label">Conteúdo</label>
                            <div class="control">
                                <textarea class="textarea" placeholder="Digite o conteúdo" name="conteudo">{{ $aviso->conteudo }}</textarea>
                                @error('conteudo')
                                    <p class="help is-danger">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        <p>A data e hora é colocada automaticamente :)</p>
                        <button type="submit" class="button is-success">Finalizar Edição</button>
                        <a href="{{ route('avisos.index') }}" class="button is-text">Cancelar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection