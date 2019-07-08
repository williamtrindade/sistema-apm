@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="columns">
        <div class="column is-12-desktop is-12-mobile">
            <h1 class="title is-4">Dashboard</h1>
            <div class="box">
                <h1 class="title is-4">Estatísticas</h1>
                <div class="columns">
                    <div class="column is-4-desktop">
                        <div class="box">
                            <h1>Avisos</h1>
                            <h1 class="title is-1">{{ $avisos }}</h1>
                        </div>
                    </div>
                    <div class="column is-4-desktop">
                        <div class="box">
                            <h1>Prestação de Contas</h1>
                            <h1 class="title is-1">{{ $contas }} 
                                <span class="subtitle is-5">
                                    @if($contas > 1)
                                        Prestações
                                    @else 
                                        Prestação
                                    @endif
                                </span>
                            </h1>
                            
                        </div>
                    </div>
                    <div class="column is-4-desktop">
                        <div class="box">
                            <h1>Galeria</h1>
                            <h1 class="title is-1">{{ $imagens }}
                                <span class="subtitle is-5">
                                    @if($imagens > 1)
                                        Imagens
                                    @else 
                                        Imagem
                                    @endif
                                </span>
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection