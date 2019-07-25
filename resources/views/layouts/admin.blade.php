
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed&display=swap" rel="stylesheet"> 
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home.index') }}">
                <img src="{{ asset('img/logoe.png') }}" width="25" height="30" alt="Logotipo APM">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="nav navbar-nav mr-auto">
                
                </ul>
                <ul class="nav justify-content-center navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('admin.index') }}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('avisos.index') }}">Avisos</a>
                    </li>
                    <li class="nav-item">
                        <a  class="nav-link active" href=" {{ route('contas.index') }}">Prestação de Contas</a>
                    </li>
                    <li class="nav-item">
                        <a  class="nav-link active" href="{{ route('imagens.index') }}" >Galeria de Imagens</a>
                    </li>
                </ul>
                @guest
                            
                @else
                <ul class="nav justify-content-end">
                    <li class="nav-item dropdown">
                        <a style="color:white;" class="nav-link dropdown-toggle" href="{{ route('admin.index') }}" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{Auth::user()->name}}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item" href="{{ route('logout') }}">
                                Sair
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a type="button" class="btn btn-success" href="{{ route('home.index') }}">Voltar Ao Site</a>
                    </li>
                </ul>
                @endguest
            </div>
        </div>
    </nav>

    <main>
        @yield('content')   
    </main>
        
    </div>

</body>
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>
</html>
