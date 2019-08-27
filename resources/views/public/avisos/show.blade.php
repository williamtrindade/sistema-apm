@extends('layouts.app')

@section('content')
<div class="container">
    <a class="btn btn-primary mt-2" href="{{ route('home.avisos.index') }}">Voltar</a>
    <h1 class="mt-3">{{ $aviso->title}}</h1>
    <div class="media-body">
        <h3 class="mt-0 mb-1">{{ $aviso->titulo }}</h3>
        @if ($aviso->pdf)
            @if($aviso->conteudo)
                {!! $aviso->conteudo !!}
            @endif
            <a href="{{asset('storage/avisos/'.$aviso->pdf)}}">Ver Anexo do Aviso</a>
        @else
            {!! $aviso->conteudo !!}
        @endif
        <hr>

        <div class="row">
            <div class="col-md-9"></div>
            <div class="col-md-3"> Públicado em {{ $aviso->created_at->format('d/m/Y') }}</div>
        </div>
    </div>
</div>
<script type="text/javascript">
    const imagens = document.querySelectorAll("img");
    imagens.forEach(imagem => {
        imagem.setAttribute('class', 'img-fluid');
    });
</script> 
@endsection
 