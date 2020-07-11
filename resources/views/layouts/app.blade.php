<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

 

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

     <title>@yield('title','Papeleria')</title>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/home') }}">
                    <img src="/img/logo_s.png">
             
                   {{--  {{ config('app.name', 'PAPELERIA') }} --}}
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">
                                {{ __('Iniciar sesión') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">
                                    {{ __('Registrarte') }}</a>
                                </li>
                            @endif
                        @else


                          

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <img height="40px" src="{{Auth::user()->avatar}}"> <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar sesión') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

@if (Auth::check())   


    <nav style="text-align: center; " class="navbar navbar-expand-lg bg-dark navbar-dark">
    <ul class="navbar-nav">

    <li class="nav-item">
        <a class="nav-link" href="{{ route('home') }}">PRINCIPAL</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('productos') }}">Productos</a>
    </li>
    @if (auth()->user()->perfil_id==1)
    <li class="nav-item">
        <a class="nav-link" href="{{ route('proveedores') }}">Proveedores</a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('compras') }}">Compras</a>
    </li>
    @endif

    <li class="nav-item">
        <a class="nav-link" href="{{ route('ventas') }}">Ventas</a>
    </li>



    
  </ul>

</nav>
           
@endif
        

        <main class="py-4">
            @yield('contenido')
  
        </main>
    </div>
</body>
</html>



