<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @auth
        <meta name="user-id" content="{{ auth()->id() }}">
    @endauth

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="{{ asset('images/icons/connection.ico') }}" rel="icon">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link  href="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.js"></script>
    <style type="text/css">
        .badge-notify{
           background: red;
           position:relative;
           top: -15px;
           left: -8px;
        }

        .list-group-item {
            width: 350px;
        }

        #notification {
            z-index: 2;
            position: absolute;
        }

        @media screen and (max-width: 393px) {
            .logo {
                width: 190px;
            }
        }

        @media screen and (max-width: 320px) {
            .logo {
                width: 160px;
            }
        }

    </style>
    @yield('css')
</head>
<body class="container-profile100">
        <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-white shadow-sm">
            <div class="container" style="z-index: 1;">
                <a class="navbar-brand" href="{{ url('/home') }}">
                    <img src="{{ asset('images/connectioncoin_logo.png') }}" class="img-responsive mr-2 logo">
                </a>

                @auth
                    <div class="navbar d-block d-sm-none" style="width: 50px; margin-left: -60px;">
                        <a href="#notification" data-toggle="collapse" class="nav-link">
                            <i class="fa fa-bell"></i>
                            <span class="badge badge-notify" style="font-size:10px;">
                                {{ count( auth()->user()->unreadNotifications ) }}
                            </span>
                        </a>

                        <div id="notification" class="collapse" style="left: -400%">
                            @include('shared.notifications')
                        </div>
                    </div>
                @endauth
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto" style="z-index: 1;">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a href="{{ route('connections.create') }}" class="nav-link">
                                    Create Connection
                                </a>
                            </li>
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
                                <a href="{{ route('stories.index') }}" class="nav-link">
                                    Home
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('coins.search') }}" class="nav-link">
                                    Map
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="#" class="nav-link" onclick="event.preventDefault();
                                document.getElementById('wordpress-store-form').submit();">
                                    Store
                                </a>
                                <form action="{{ route('wordpress_store.store') }}" method="POST" id="wordpress-store-form">
                                    @csrf
                                </form>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('connections.create') }}" class="nav-link">
                                    Create Connection
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('messages.index') }}" class="nav-link">
                                    Messages
                                </a>
                            </li>

                            @auth
                                <li class="nav-item d-none d-sm-block">
                                    <a href="#notification" data-toggle="collapse" class="nav-link">
                                        <i class="fa fa-bell"></i>
                                        <span class="badge badge-notify" style="font-size:10px;">
                                            {{ count( auth()->user()->unreadNotifications ) }}
                                        </span>
                                    </a>

                                    <div id="notification" class="collapse" style="right: 20%;">
                                        @include('shared.notifications')
                                    </div>
                                </li>
                            @endauth

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->getFullName() }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                    <a class="dropdown-item" href="{{ route('users.show', ['user' => auth()->id()]) }}">
                                        My Profile
                                    </a>

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

        <main>
            @yield('content')
        </main>
    <!-- Scripts -->
    <script type="text/javascript">
        var APP_URL = {!! json_encode(url('/')) !!}
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.1.1/socket.io.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    @yield('js')
</body>
</html>
