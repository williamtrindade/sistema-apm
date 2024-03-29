<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
        @if(env('APP_ENV') == 'production')
        <!-- Global site tag (gtag.js) - Google Analytics -->
            <script async src="https://www.googletagmanager.com/gtag/js?id=UA-147667083-1"></script>
            <script>
                window.dataLayer = window.dataLayer || [];
                function gtag(){dataLayer.push(arguments);}
                gtag('js', new Date());

                gtag('config', 'UA-147667083-1');
            </script>
        @endif
    <script src="https://cdnjs.com/libraries/Chart.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Associação de Pais e mestres do colégio militar de Santa Maria') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed&display=swap" rel="stylesheet"> 
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>

    @if(env('APP_ENV') == 'production')
        <link rel="stylesheet" href="{{ secure_asset('css/app.css') }}">
    @else
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @endif
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar navbar-dark" style="background-color:#AE1C28">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home.index') }}">
                @if(env('APP_ENV') == 'production')
                    <img src="{{ secure_asset('img/logoe.png') }}" width="25" height="30" alt="Logotipo APM">
                @else
                    <img src="{{ asset('img/logoe.png') }}" width="25" height="30" alt="Logotipo APM">
                @endif
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="nav navbar-nav mr-auto">
                
                </ul>
                <ul class="nav justify-content-center navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('home.index') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('home.avisos.index') }}">Avisos</a>
                    </li>
                    <li class="nav-item">
                        <a  class="nav-link active" href=" {{ route('home.contas.index') }}">Prestação de Contas</a>
                    </li>
                    <li class="nav-item">
                        <a  class="nav-link active" href="{{ route('home.albuns.index') }}" >Galeria</a>
                    </li>
                </ul>
                @guest
                            
                @else
                <ul class="nav justify-content-end">
                    <li class="nav-item">
                        <a type="button" class="btn btn-success" href="{{ route('admin.index') }}">Área Administrativa</a>
                    </li>
                </ul>
                @endguest
            </div>
        </div>
    </nav>

    <main>
        @yield('content')   
        @include('includes.footer')
        @include('includes.backtop')
    </main>
</body>
<!-- Scripts -->
    @if(env('APP_ENV') == 'production')
        <script src="{{ secure_asset('js/app.js') }}" defer></script>
    @else
        <script src="{{ asset('js/app.js') }}" defer></script>
    @endif
</html>
