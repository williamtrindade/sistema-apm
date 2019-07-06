<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="box-gd">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div id="app">
        <nav class="navbar" role="navigation" aria-label="main navigation">
            <div class="container">
                <div class="navbar-brand">
                    <a class="navbar-item" href="{{ route('admin.index') }}">
                        APM - SM
                    </a>
                    <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
                        <span aria-hidden="true"></span>
                        <span aria-hidden="true"></span>
                        <span aria-hidden="true"></span>
                    </a>
                </div>
                    
                <div id="navbarBasicExample" class="navbar-menu">      
                    <div class="navbar-start">
                     
                    </div>            
                    <div class="navbar">
                           
                    </div>
                    <div class="navbar-end">
                        <a class="navbar-item" href="{{ route('admin.index') }}">
                            Dashboard
                        </a>
                        <a class="navbar-item" href="{{ route('avisos.index') }}" >
                            Avisos
                        </a>
                        <a class="navbar-item" href="{{ route('contas.index') }}">
                            Prestação de contas
                        </a>
                        <a class="navbar-item" href="{{ route('imagens.index') }}">
                            Galeria
                        </a>
                        @guest
                        
                        @else
                        <div class="navbar-item">
                            <div class="buttons">
                                <a href="{{ route('home.index') }}" class="navbar-item button is-primary">Voltar ao Site</a>
                            </div>
                        </div>
                    
                        <div class="navbar-item has-dropdown is-hoverable">
                            <a class="navbar-link">
                                {{Auth::user()->name}}
                            </a>
                        
                            <div class="navbar-dropdown">
                                <a class="navbar-item"  href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </div>
                       
                        @endguest
                    </div>
                </div>
            </nav>
        </div>
        
        <main>
            <div class="container" style="margin-top:3%">
                @include('includes.notification')
                @yield('content')   
            </div>
          
        </main>
    </div>
</body>
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>
</html>
