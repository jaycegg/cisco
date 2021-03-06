<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Page qui servira de template JS et CSS -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>CESI - Netacad et Tickets</title>
    <link rel="icon" href="{!! asset('images/logo.jpg') !!}"/>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <!-- Barre de menu -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{!! asset('images/logoPhrase.png') !!}" alt=""/>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Coté gauche de la Navbar -->
                    <ul class="navbar-nav mr-auto"></ul>

                    <!-- Coté droit de la Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Menu si l'utilisateur est non connecté -->
                        @guest
                            <!-- Si la route existe dans web.php -->
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Se connecter') }}</a>
                                </li>
                            @endif
                            
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('S\'inscrire') }}</a>
                                </li>
                            @endif
                        
                        <!-- Menu si l'utilisateur est connecté -->
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="btn btn-warning nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <!-- Affiche le nom de l'utilisateur -->
                                    {{ Auth::user()->prenom }} {{ Auth::user()->name }}
                                </a>

                                <!-- Bouton Déconnecter -->
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Déconnecter') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <!-- Insérer le contenu des autres vues avec section('content') -->
            @yield('content')
        </main>
    </div>

    <footer class="monFooter">
        <div class="row">
            <div class="col-sm-2 p-1">
                © CESI - RIL 2020/2021
            </div>
            <div class="col-sm-8 p-1"></div>
            <div class="col-sm-2 p-1">
                <!-- Affiche la version de Laravel et de PHP -->
                Laravel v{{ Illuminate\Foundation\Application::VERSION }} - (PHP v{{ PHP_VERSION }})
            </div>
        </div>
    </footer>
</body>

</html>
