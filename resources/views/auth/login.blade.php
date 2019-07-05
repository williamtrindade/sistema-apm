@extends('layouts.app')

@section('content')
<body class="layout-default">
    <section class="hero is-fullheight is-medium is-primary is-bold">
        <div class="hero-body">
            <div class="container">
                <div class="columns is-centered">
                    <div class="box">
                        <div class="card-content">                  
                            <div class="is-flex is-horizontal-center">  
                                <figure class="image" style="width:200px;margin-bottom:4%">
                                    <img src="/img/lg.png" alt="logo">
                                </figure>                 
                            </div>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="field">
                                    <p class="control has-icons-left">
                                        <input id="email" type="email" class="input form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="E-mail">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <span class="icon is-small is-left">
                                            <i class="fas fa-envelope"></i>
                                        </span>                 

                                    </p>

                                </div>
                                <div class="field">
                                    <p class="control has-icons-left">
                                        <input id="password" type="password" class="input form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Senha">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <span class="icon is-small is-left">
                                        <i class="fa fa-lock"></i>
                                        </span>
                                    </p>
                                </div>

                                <div>
                                    <p class="control">                                
                                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="remember">
                                                {{ __('Lembrar de mim') }}
                                        </label>
                                    </p>
                                </div>

                                <div>
                                    <p class="control">
                                        <button class="button is-primary is-medium is-fullwidth">
                                        <i class="fa fa-user"></i>
                                        <p style="margin-left:2%">Login</p>
                                        </button>
                                    </p>       
                                </div>
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Esqueceu Sua Senha?') }}
                                    </a>
                                @endif
                            </form>               
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> 
</body>
@endsection
