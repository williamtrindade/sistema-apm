@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="columns">
            <div class="column is-12-desktop is-12-mobile">
                <h1 class="title is-4">Cadastro de Prestação de Contas </h1>
                <div class="box">
                    <form action="{{ route('contas.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="arquivo">Arquivo</span>
                            </div>
                            <div class="custom-file">
                                <input name="arquivo" type="file" class="custom-file-input" id="arquivo" aria-describedby="arquivo">
                                <label class="custom-file-label" for="arquivo">Escolha um arquivo</label>
                            </div>
                            @error('arquivo')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <p>A data é colocada automaticamente :)</p>
                        <button type="submit" class="btn btn-success">Cadastrar</button>
                        <a href="{{ route('contas.index') }}" class="btn btn-link">Cancelar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection