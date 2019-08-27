@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mt-3">Avisos</h1>
    <ul class="list-unstyled">
        @foreach ($avisos as $aviso)
            <li class="media shadow p-3 mb-2">
                <div class="media-body">
                    <a href="{{ route('home.avisos.show', $aviso->id) }}" class="mt-0 mb-1">
                        <h3>{{ $aviso->titulo }}</h3>
                    </a>
                    <hr>

                    <div class="row">
                        <div class="col-md-9"></div>
                        <div class="col-md-3"> Públicado em {{ $aviso->created_at->format('d/m/Y') }}</div>
                    </div>
                </div>
            </li>     
        @endforeach
    </ul>
</div>
<script type="text/javascript">

    const imagens = document.querySelectorAll("img");
    imagens.forEach(imagem => {
        imagem.setAttribute('class', 'img-fluid');
        console.log(imagem);
    });
</script> 
@endsection
 