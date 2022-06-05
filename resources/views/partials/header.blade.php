<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/favicon.svg') }}" />
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    
  

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/LineIcons.2.0.css') }}" >
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/tiny-slider.css') }}" >
    <link rel="stylesheet" href="{{ asset('css/glightbox.min.css') }}" >
    <link rel="stylesheet" href="{{ asset('css/main.css') }}" >
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}" >
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}" >
    <link rel="stylesheet" href="{{ asset('css/aboutus.css') }}" >
</head>
<body>

    <div id="app">
        <header class="header navbar-area">
        <!-- Toolbar Start -->
        <div class="toolbar-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-9 col-12">
                    </div>
                    <div class="col-lg-4 col-md-3 col-12">
                        <div class="toolbar-sl-share">
                        <ul>
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('newuser') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                            <!-- <ul>
                                <li><a href="#"><i class="lni lni-facebook-filled"></i></a></li>
                                <li><a href="#"><i class="lni lni-twitter-original"></i></a></li>
                                <li><a href="#"><i class="lni lni-pinterest"></i></a></li>
                                <li><a href="#"><i class="lni lni-youtube"></i></a></li>
                            </ul> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Toolbar End -->
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                    <div class="nav-inner">
                    <nav class="navbar navbar-expand-lg">
                        <a class="navbar-brand" href="{{ route('main') }}">
                            <img src="{{ asset('images/logo.svg') }}" alt="Logo">
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                            <ul id="nav" class="navbar-nav ms-auto">
                                <li class="nav-item">
                                    <a class="page-scroll {{ (request()->is('/')) ? 'active' : '' }}" href="{{ route('main') }}">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="page-scroll {{ (request()->is('/about-us')) ? 'active' : '' }}" href="{{ route('aboutus') }}">About Us</a>
                                </li>
                                <li class="nav-item">
                                    <a class="page-scroll dd-menu collapsed" href="javascript:void(0)"
                                        data-bs-toggle="collapse" data-bs-target="#submenu-1-1"
                                        aria-controls="navbarSupportedContent" aria-expanded="false"
                                        aria-label="Toggle navigation">Find By Category</a>
                                    <ul class="sub-menu collapse" id="submenu-1-1">
                                    @foreach($categories as $category)
                                        <li class="nav-item"><a href="{{ route('category', $category->slug ) }}">{{ $category->name }}</a>
                                    @endforeach
                                    </li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a class="page-scroll" href="{{ route('contactus') }}">Contact</a>
                                </li>
                            </ul>
                        </div> <!-- navbar collapse -->
                        <div class="button">
                            <a href="{{ route('findparts') }}" class="btn white-bg mouse-dir">Find Your Part <span class="dir-part"></span></a>
                        </div>
                    </nav> <!-- navbar -->
                    </div>
                    </div>
                </div>
            </div>
        </header>