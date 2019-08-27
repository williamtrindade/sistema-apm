@extends('layouts.admin')

@section('content')
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<div class="container">
    <div class="columns">
        <div class="column is-12-desktop is-12-mobile">
            <h1 class="title is-4">Criação de Álbum dentro do álbum {{ $album->nome }}</h1>
            <div class="box">
                <form action="{{ route('sub-albums.store') }}" method="POST">
                    @csrf
                    <!--NOME-->
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input required name="nome" type="text" class="form-control" id="nome" placeholder="Digite o Nome">
                        @error('nome')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>

                    <!-- EDITOR -->
                    <label class="label" for="editor">Descrição(Opcional)</label>
                    <div id="editor" class="field">
                        
                    </div>
                    <input required type="hidden" name="descricao" id="conteudo">                      
                    @error('descricao')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                    
                    <!--NIVEL-->
                    <input type="hidden" name="nivel" value="1">

                    <!--OWNER ALBUM --> 
                    <input type="hidden" name="owner_album_id" value="{{ $album->id }}">

                    <hr>
                    <button type="submit" class="btn btn-success" id="enviar">Cadastrar</button>
                    <a href="{{ route('sub-albums.show', $album->id) }}" class="btn btn-link">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Include the Quill library -->
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

<!-- Initialize Quill editor -->
<script>
    var toolbarOptions = [
        [{ 'header': 1 }, { 'header': 2 }],     
        [{ 'align': [] }],
    ];

    var quill = new Quill('#editor', {
        modules: {
            toolbar: toolbarOptions
        },
        theme: 'snow'
    });

    document.querySelector('#enviar').addEventListener('click', function() {
        const textEditor = document.querySelector('.ql-editor');
        const hiddenInput = document.querySelector('#conteudo');
        hiddenInput.setAttribute('value', textEditor.innerHTML);
    });
</script>
@endsection