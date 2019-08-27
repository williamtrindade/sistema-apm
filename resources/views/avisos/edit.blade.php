@extends('layouts.admin')

@section('content')
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">


<div class="container">
        <div class="columns">
            <div class="column is-12-desktop is-12-mobile">
                <h1 class="title is-4">Edição de Aviso </h1>
                <div class="box">
                    <form action="{{ route('avisos.update', $aviso->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="titulo">Título</label>
                            <input value="{{ $aviso->titulo }}" name="titulo" type="text" class="form-control" id="titulo" placeholder="Digite o título">
                            @error('titulo')
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                    
                        <!-- Create the editor container -->
                        <label>Conteúdo</label>
                        <div id="editor">

                        </div>
                        <input type="hidden" name="conteudo" id="conteudo">       

                        <p>A data e hora é colocada automaticamente :)</p>
                        <button type="submit" class="btn btn-success" id="enviar">Finalizar Edição</button>
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

        document.querySelector('.ql-editor').innerHTML = '{!! $aviso->conteudo !!}';       

        document.querySelector('#enviar').addEventListener('click', function() {
            const textEditor = document.querySelector('.ql-editor');
            const hiddenInput = document.querySelector('#conteudo');

            hiddenInput.setAttribute('value', textEditor.innerHTML);
        });
    </script>
@endsection