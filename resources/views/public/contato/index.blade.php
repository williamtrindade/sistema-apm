@extends('layouts.app')

@section('content')

<div class="container" >
    <div class="col-md-12" id="contato">
        <div class=" p-3">    
            <h1>Contato</h1>    
            <div class="row">
                <div class="col-md-6 mt-2">
                    <h5> Envie um e-mail:</h5>
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
                            <input required name="nome" type="text" class="form-control" id="nome" placeholder="Digite seu nome">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input required name="email" type="email" class="form-control" id="email" placeholder="Digite seu e-mail">
                        </div>  
                        <div class="form-group">
                            <label for="mensagem">Sua Mensagem: </label>
                            <textarea required name="mensagem" class="form-control" id="mensagem" rows="3"></textarea>
                        </div>
                        <button class="btn btn-primary" type="submit">Enviar</button>
                    </form>
                </div>

                <div class="col-md-6 mt-2">
                    <h5>Entre em contato conosto:</h5>
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

@endsection