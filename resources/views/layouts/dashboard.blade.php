<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <script defer src="https://use.fontawesome.com/releases/v5.7.1/js/all.js" integrity="sha384-eVEQC9zshBn0rFj4+TU78eNA19HMNigMviK/PU/FFjLXqa/GKPgX58rvt5Z8PLs7" crossorigin="anonymous"></script>
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    {{-- jQuery --}}
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <link type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css"></link>
    {{-- Moment js --}}
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    {{-- Datepicker --}}
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
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
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('instructions') }}">{{ __('Instrucțiuni') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('clocking') }}">{{ __('Pontare') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('panel_index') }}">{{ __('Panou') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('settings') }}">{{ __('Setări') }}</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
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

        <div class="container">
            <div class="row py-4" id="body-row">
                <!-- Sidebar -->
                <div id="sidebar-container" class="d-none d-md-block col-md-3 col-lg-2">
                    <!-- Bootstrap List Group -->
                    <ul class="list-group sticky-top sticky-offset">
                        <li class="list-group-item sidebar-separator-title text-muted d-flex align-items-center">
                            <small>MAIN MENU</small>
                        </li>
                        <a href="{{ route('panel_index') }}" class="list-group-item">{{ __('Sumar') }}</a>
                        <a href="{{ route('panel_users') }}" class="list-group-item">{{ __('Muncitori') }}</a>
                        <a href="{{ route('panel_users_create') }}" class="list-group-item">{{ __('Adaugă muncitor') }}</a>
                        <li class="list-group-item sidebar-separator"></li>
                        <li class="list-group-item sidebar-separator-title text-muted d-flex align-items-center">
                            <small>ACTIONS</small>
                        </li>
                        <a href="#" class="list-group-item list-group-item-action p-2 d-flex justify-content-center">
                            <button class="btn btn-primary">Descarcă Excel</button>
                        </a>
                        <li class="list-group-item sidebar-separator"></li>
                    </ul>
                    <!-- List Group END-->
                </div>
                <!-- sidebar-container END -->
            
                <div class="col">
                    <main class="">
                        @yield('content')
                    </main>
                </div>
            </div> <!-- body-row END -->
        </div>
    </div>
</body>
</html>
