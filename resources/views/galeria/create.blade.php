@extends('layouts.admin')

@section('content')
<div class="container">
        <div class="columns">
            <div class="column is-12-desktop is-12-mobile">
                <h1 class="title is-4">Cadastro de Prestação de Contas </h1>
                <div class="box">
                    <form action="{{ route('imagens.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="field">
                            <label class="label">Arquivo</label>
                            <div class="control">
                                <input type="file" name="imagem" id="imagem">
                                @error('imagem')
                                    <p class="help is-danger">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="button is-success">Cadastrar</button>
                        <a href="{{ route('imagens.index') }}" class="button is-text">Cancelar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection