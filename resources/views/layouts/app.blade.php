<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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
        <nav class="navbar m-nav" role="navigation" aria-label="main navigation">
            <div class="container">
                <div class="navbar-brand">
                    <a class="navbar-item" href="{{ route('home.index') }}">
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
                        <a class="navbar-item" href="{{ route('home.index') }}">
                            Home
                        </a>
                        <a class="navbar-item" href="{{ route('home.avisos') }}" >
                            Avisos
                        </a>
                        <a class="navbar-item" href="{{ route('home.contas') }}">
                            Prestação de contas
                        </a>
                        <a class="navbar-item" href="{{ route('home.imagens') }}">
                            Imagens
                        </a>
                        @guest
                        
                        @else
                        <div class="navbar-item">
                            <div class="buttons">
                                <a href="{{ route('admin.index') }}" class="navbar-item button is-primary">Área Administrativa</a>
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
            @yield('content')   
        </main>
        <footer class="footer">
            <div class="content has-text-centered">
              <p>
                <strong>Bulma</strong> by <a href="https://jgthms.com">Jeremy Thomas</a>. The source code is licensed
                <a href="http://opensource.org/licenses/mit-license.php">MIT</a>. The website content
                is licensed <a href="http://creativecommons.org/licenses/by-nc-sa/4.0/">CC BY NC SA 4.0</a>.
              </p>
            </div>
          </footer>
    </div>
</body>
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>
</html>
