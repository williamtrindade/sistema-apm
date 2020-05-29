@extends('layouts.admin')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Configurações</h1>

                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="data-tab" data-toggle="tab" role="tab" aria-controls="data" aria-selected="true" href="#data">Dados</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="login-tab" data-toggle="tab" role="tab" aria-controls="login" aria-selected="false" href="#login">Login</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="data" role="tabpanel" aria-labelledby="home-tab">
                        <div>
                            <h4 class="mt-3">Informações do colégio:</h4>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="login" role="tabpanel" aria-labelledby="profile-tab">
                    @include('includes.notification')

                        <div>
                            <h4 class="mt-3">Dados para login:</h4>
                            <form method="POST" action="{{ route('configuracoes.login.update') }}">
                                @method('PUT')
                                @csrf
                                <div class="form-group">
                                    <label for="name">Nome</label>
                                    <input name="name" autofocus type="text" class="form-control" id="name" placeholder="Nome" required size="255">
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input name="email" autofocus type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Email">
                                </div>

                                <div class="form-group">
                                    <label for="senha">Senha</label>
                                    <input name="password" type="password" class="form-control" id="senha" placeholder="Senha">
                                </div>
                                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Salvar alterações</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection