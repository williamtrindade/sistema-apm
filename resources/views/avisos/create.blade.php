@extends('layouts.admin')

@section('content')
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <div class="container">
        <div class="columns">
            <div class="column is-12-desktop is-12-mobile">
                <h1 class="title is-4">Cadastro de Aviso </h1>
                <div class="box">
                    <form action="{{ route('avisos.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="form-group">
                            <label for="titulo">Título</label>
                            <input name="titulo" type="text" class="form-control" id="titulo" placeholder="Digite o título">
                            @error('titulo')
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <!-- Create the editor container -->
                        <label class="label">Conteúdo</label>
                        <div id="editor" class="field">
                            
                        </div>

                        <input type="hidden" name="conteudo" id="conteudo">                      
                        @error('conteudo')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                        <hr>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="arquivo">Arquivo</span>
                            </div>
                            <div class="custom-file">
                                <input name="pdf" type="file" class="custom-file-input" id="pdf">
                                <label class="custom-file-label" for="pdf">Escolha o arquivo</label>
                                @error('pdf')
                                    <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <p>A data e hora é colocada automaticamente :)</p>
                        <button type="submit" class="btn btn-success" id="enviar">Cadastrar</button>
                        <a href="{{ route('avisos.index') }}" class="btn btn-link">Cancelar</a>
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
            ['image', 'link'],
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