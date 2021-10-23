<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
    {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}
    <title>Arriendos Online</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
<<<<<<< HEAD
                <a id="TituloArriendo" class="navbar-brand" href="{{ url('/') }}" >
=======
                <a id="TituloArriendo" class="navbar-brand" href="{{ route('serie.inicio') }}" >
>>>>>>> 2679cc3ee61687907b8427a0c4cee385aa674011
                    Arriendos Online
                    {{-- {{ config('app.name', 'Laravel') }} --}}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    
                    <ul class="navbar-nav mr-auto">
                        @if(Auth::check())
                        <p style="visibility: hidden">{{$perfil = \Auth::user()->perfil}}</p>
                        
                        @if($perfil == 'Administrador')
                        <li class="nav-item"><a class="nav-link" href="{{ route('serie.index') }}">{{ __('Series') }}</a></li>
                        <li><a class="nav-link" href="{{ route('categoria.index') }}">{{ __('Categorias') }}</a></li>
                        <li><a class="nav-link" href="{{ route('usuario.index') }}">{{ __('Usuarios') }}</a></li>
                        @endif 
                        @endif
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        @if(Auth::check())
                        <p style="visibility: hidden">{{$perfil = \Auth::user()->perfil}}</p>
                        
                        @if($perfil == 'Usuario')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('carrito.index') }}" >{{ __('Carrito') }}<span class="badge badge-light">{{$cantidad}}</span></a>
                            @endif 
                        </li>
                        @endif 

                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
<<<<<<< HEAD
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar Sesión') }}</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Registrate') }}</a>
                        </li>
=======
                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar Sesión') }}</a></li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">{{ __('Registrate') }}</a></li>
>>>>>>> 2679cc3ee61687907b8427a0c4cee385aa674011
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Salir') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>

                                <a class="nav-link" href="{{ route('usuario.perfil',["id" => auth()->user()->id]) }}" >{{ __('Editar Perfil') }}</a>

                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html>