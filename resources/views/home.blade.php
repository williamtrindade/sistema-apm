@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="p-1 shadow" id="banner">
                <div class="container">
                    <div class=" p-4">
                        <h1 style="color:#fff">
                            <b>Associação de Pais e Mestres do Colégio Militar de Santa Maria</b>
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        #banner {
            text-align: center;
            background-attachment: fixed;
            background-position: top;
            background-image: url('/img/banner.jpg');
            background-size: cover;
        }
        #banner div div h1 {
            margin-top:8%;
            margin-bottom:8%;
            font-size: 230%;
            color:#fff;
            text-shadow: -5px 3px 20px #000000;        }
    </style>
    <div class=" m-3" style="border-top:2px green solid">
                        <h4 class="text-center m-3">Acesso Rápido</h4>

        <div class="row">
                <div class="col-md-6">
                    <ul class="pages">
                        <li><a href="{{ route('home.avisos.index') }}">Avisos</a></li>
                        <li><a href="{{ route('home.diretoria.index') }}">Diretoria</a></li>
                        <li><a href="{{ route('home.estatuto.index') }}">Estatuto</a></li>
                        <li><a href="{{ route('home.contas.index') }}">Prestação de Contas</a></li>
                        
                    </ul>
                </div>
                <div class="col-md-6">
                    <ul class="pages">
                        <li><a href="{{ route('home.funcionarios.index') }}">Funcionários</a></li>
                        <li><a href="{{ route('home.albuns.index') }}">Galeria de Imagens</a></li>
                        <li><a href="{{ route('home.contato.index') }}">Contato</a></li>
                        <li><a href="{{ route('home.horario.index')}}">Horário de Funcionamento ao Público externo</a></li>
                    </ul>
                    
                </div>
        </div>
    </div>
    <style>
        .pages li a {
            font-size: 140%;
        }
    </style>

        
    <div class=" m-3" style="border-top:2px green solid">
        <div class="row">
            <div class="col-md-12">
                <div class="  p-3">
                    <h4 class="text-center"> Últimos Avisos da APM</h4>
                    @foreach ($avisos as $aviso)
                        <div class="media">
                            <div class="media-body m-2">
                            <h5 class="mt-0">
                                <a href="{{ route('home.avisos.show', $aviso->id) }}" class="mt-0 mb-1">
                                    {{ $aviso->titulo }}
                                </a>
                            </h5>
                            </div>
                        </div>   
                        <hr>
                    @endforeach
                    <div class="card-body">
                        <a href="{{ route('home.avisos.index') }}" class="btn btn-primary">
                            Ver Todos Avisos
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="m-4" style="border-top:2px green solid">
        <div class="row">
            <div class="col-md-6">
                <div class=" p-3">        
                    <h5><i class="fas fa-users"></i> Diretoria</h5>
                    <div class="card-body">
                        <p>Conheça a diretoria da APM</p>
                        <a href="{{ route('home.diretoria.index') }}" class="btn btn-primary">Acesse</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6" id="estatuto">
                <div class="  p-3">        
                    <h5><i class="fas fa-file-pdf"></i> Estatuto</h5>
                    <div class="card-body">
                        <p>Baixe e Leia nosso estatuto</p>
                        <a href="{{ asset('pdf/estatuto.pdf') }}" download class="btn btn-primary">Download</a>
                    </div>
                </div>
            </div>
        
        </div>
        <hr>

        <div class="row" style="border-top:2px red solid">
            <div class="col-md-6" id="funcionarios">
                <div class="  p-3">        
                    <h5><i class="fas fa-users"></i> Funcionários</h5>
                    <div class="card-body">
                        <p>Auxiliares Administrativas:</p>
                        <ul>      
                            <li>Patrícia de Miranda Rossi</li>
                            <li>Jane Dias Torri</li>
                        </ul>
                        <p>Assistente Social:</p>
                        <ul>      
                            <li>Marta Kirchoff Fagundes de Farias</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="   p-3">        
                    <h5><i class="fas fa-clock"></i> Horário de Funcionamento ao Público externo</h5>
                    <div class="card-body">
                        <p>Segunda a Quinta:</p>
                        <ul>
                            <li>7h30min às 12h - 13h30min às 16h30min</li>
                        </ul>
                        <p>Sexta-feira:</p>
                        <ul>
                            <li>7h30min às 12h</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row" style="border-top:2px blue solid">
            <div class="col-md-12" id="contato">
                <div class=" p-3">        
                    <div class="row">
                        <div class="col-md-6 mt-2">
                            <h5><i class="fas fa-envelope"></i> Envie um e-mail</h5>
                            @if (session('email-sent'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('email-sent') }}
                                </div>
                            @endif

                            @if (session('email-fail'))
                                <div class="alert alert-danger" role="alert">
                                    {{ session('email-fail') }}
                                </div>
                            @endif

                            <form action="{{ route('email.send') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="nome">Nome</label>
                                    <input required name="nome" type="text" class="form-control" id="nome" placeholder="digite seu nome">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input required name="email" type="email" class="form-control" id="email" placeholder="name@dominio.com">
                                </div>  
                                <div class="form-group">
                                    <label for="mensagem">Sua Mensagem: </label>
                                    <textarea required name="mensagem" class="form-control" id="mensagem" rows="3"></textarea>
                                </div>
                                <button class="btn btn-primary" type="submit">Enviar</button>
                            </form>
                        </div>

                        <div class="col-md-6 mt-2">
                            <h5>Entre em contato conosco</h5>
                            <h5 class="mt-3"><b>Secretaria</b> </h5>
                            <p>E-mail: <a href="mailto:apmcmsm@gmail.com">apmcmsm@gmail.com</a> </p> 
                            <p>Fones: (055) 3213-2104 / (055) 3218-4366</p>

                            <h5><b>Presidente (Paulo Pinho):</b></h5>
                            <p>E-mail: <a href="mailto:psdps@hotmail.com">psdps@hotmail.com</a> </p>
                            <p>Fones: (055) 9665-0450 (Whatsapp/Vivo) / (055) 9148-7260 (Claro)</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<style>
  
</style>
@endsection