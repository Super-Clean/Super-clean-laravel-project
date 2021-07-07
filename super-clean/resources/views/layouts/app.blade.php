<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- naaman -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/your-path-to-fontawesome/css/all.css" rel="stylesheet"> <!--load all styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="/css/fontawesome-all.css">
{{----}}


    <title>super clean</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
<style>
    .icons-w3ls.mid-sec-agile {
        background: #22a6f5;
    }

    .icons-w3ls.mid-sec-agile h5 {
        font-size: 31px;
        font-weight: 900;
    }
    .icons-w3ls {
        background: #16293e;
    }

    .icons-w3ls i {
        font-size: 42px;
    }

    .icons-w3ls h5 {
        letter-spacing: 2px;
    }

    .icons-w3ls.mid-sec-agile {
        background: #22a6f5;
    }

    .icons-w3ls.mid-sec-agile h5 {
        font-size: 31px;
        font-weight: 900;
    }
</style>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
<header>
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}" style="height: 60px;margin: 7px">
                <img src="/images/Untitled-1.png" alt="" class="img-fluid" style="height: 66px; width: 280px">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}"
                           style="color: #002752;font-weight: bold;font-size: 20px">{{ __('Home') }}</a>
                    </li>
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/about') }}"
                               style="color: #002752;font-weight: bold;font-size: 20px">{{ __('About') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}"
                               style="color: #002752;font-weight: bold;font-size: 20px">{{ __('Login') }}</a>
                        </li>

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}"
                                   style="color: #002752;font-weight: bold;font-size: 20px">{{ __('Register') }}</a>
                            </li>
                        @endif

                    @else
                        @if (Auth::user()->name==="naaman")
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/Admin') }}"
                                   style="color: #002752;font-weight: bold;font-size: 20px">Admin Dashboard</a>
                            </li>
                        @endif

                        <li class="nav-item">
                            <a class="nav-link" href="{{route('service.index')}}"
                               style="color: #002752;font-weight: bold;font-size: 20px">My services</a>
                        </li>
                        <li style=" padding:10px;" class="nav-item dropdown">
                            <a style=" text-transform: capitalize; padding:10px ; color: #002752; font-weight:bold; font-size: 20px;" id="navbarDropdown" class="nav-item dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }} "
                                   style="color: #002752;font-weight: bold;font-size: 20px"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
</header>

<div id="app">

    <main class="py-4">
        @yield('content')

    </main>
</div>
</body>
</html>
