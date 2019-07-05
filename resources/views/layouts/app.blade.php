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
        <nav class="navbar" role="navigation" aria-label="main navigation">
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
                    <div class="navbar-end">
                        <div class="navbar-item">
                            <div class="buttons">
                                @guest
                                <a href="{{ route('login') }}" class="button is-primary">
                                    <strong>{{ __('Login') }}</strong>
                                </a>
                                @else
                                <div class="navbar-start">
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
                                </div>
                                @endguest
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        
        <main>
            @yield('content')   
        </main>
    </div>
</body>
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>
</html>
