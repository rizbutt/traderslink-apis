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
                        <a class="navbar-brand" href="index.html">
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
                                    <a class="page-scroll active" href="index.html">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="page-scroll" href="{{ route('aboutus') }}">About Us</a>
                                </li>
                                <li class="nav-item">
                                    <a class="page-scroll" href="javascript:void(0)">Services</a>
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
        
        <main>

            @yield('content')
        </main>
    </div>
    <!-- Start Footer Area -->
    <footer class="footer">
        <!-- Start Middle Top -->
        <div class="footer-middle">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-5 col-12">
                        <!-- Single Widget -->
                        <div class="f-about single-footer">
                            <div class="logo">
                                <a href="index.html"><img src="{{ asset('images/logo.svg') }}" alt="#"></a>
                            </div>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                                has been the industry.</p>
                            <div class="footer-social">
                                <ul>
                                    <li><a href="#"><i class="lni lni-facebook-filled"></i></a></li>
                                    <li><a href="#"><i class="lni lni-twitter-original"></i></a></li>
                                    <li><a href="#"><i class="lni lni-linkedin-original"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- End Single Widget -->
                    </div>
                    <div class="col-lg-5 col-md-7 col-12">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-6">
                                <!-- Single Widget -->
                                <div class="single-footer f-link">
                                    <h3>Company</h3>
                                    <ul>
                                        <li><a href="#">About Comapny</a></li>
                                        <li><a href="#">Privacy Policy</a></li>
                                    </ul>
                                </div>
                                <!-- End Single Widget -->
                            </div>
                            <div class="col-lg-6 col-md-6 col-6">
                                <!-- Single Widget -->
                                <div class="single-footer f-contact f-link">
                                    <h3>Contact Us</h3>
                                    <p>Untrammelled & nothing preven our being able</p>
                                    <ul class="footer-contact">
                                        <li><i class="lni lni-phone"></i> <a href="#">+092 (345) 6789</a></li>
                                        <li><i class="lni lni-envelope"></i> <a
                                                href="mailto:support@gmail.com">support@traderslink.pk</a></li>
                                        <li><i class="lni lni-map-marker"></i> Pakistan</li>
                                        
                                    </ul>
                                </div>
                                <!-- End Single Widget -->
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <!-- Single Widget -->
                        <div class="single-footer gallery">
                            <h3>Photo Gallery</h3>
                            <ul class="list">
                                <li><a href="#"><img src="{{ asset('images/gallery1.jpg') }}" alt="#"><i
                                            class="lni lni-instagram"></i></a></li>
                                <li><a href="#"><img src="{{ asset('images/gallery2.jpg') }}" alt="#"><i
                                            class="lni lni-instagram"></i></a></li>
                                <li><a href="#"><img src="{{ asset('images/gallery3.jpg') }}" alt="#"><i
                                            class="lni lni-instagram"></i></a></li>
                                <li><a href="#"><img src="{{ asset('images/gallery4.jpg') }}" alt="#"><i
                                            class="lni lni-instagram"></i></a></li>
                                <li><a href="#"><img src="{{ asset('images/gallery5.jpg') }}" alt="#"><i
                                            class="lni lni-instagram"></i></a></li>
                                <li><a href="#"><img src="{{ asset('images/gallery6.jpg') }}" alt="#"><i
                                            class="lni lni-instagram"></i></a></li>
                            </ul>
                        </div>
                        <!-- End Single Widget -->
                    </div>
                </div>
            </div>
        </div>
        <!--/ End Footer Middle -->
        <!-- Start Footer Bottom -->
        <div class="footer-bottom">
            <div class="container">
                <div class="inner">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="left">
                                <p>Designed and Developed by<a href="#" rel="nofollow"
                                        target="_blank">MathTech</a></p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="right">
                                <p>All Right Reserved Design By Traderslink</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Footer Middle -->
    </footer>
    <!--/ End Footer Area -->
    <a href="#" class="scroll-top btn-hover">
        <i class="lni lni-chevron-up"></i>
    </a>
    <script src="{{ asset('js/count-up.min.js') }}"></script>
    <script src="{{ asset('js/wow.min.js') }}"></script>
    <script src="{{ asset('js/tiny-slider.js') }}"></script>
    <script src="{{ asset('js/glightbox.min.js') }}"></script>
    <script src="{{ asset('js/imagesloaded.min.js') }}"></script>
    <script src="{{ asset('js/isotope.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script type="text/javascript">

            var slider = new tns({
            container: '.home-slider',
            slideBy: 'page',
            autoplay: false,
            mouseDrag: true,
            gutter: 0,
            items: 1,
            nav: true,
            controls: false,
            controlsText: [
                '<i class="lni lni-arrow-left prev"></i>',
                '<i class="lni lni-arrow-right next"></i>'
            ],
            responsive: {
                1200: {
                    items: 1,
                },
                992: {
                    items: 1,
                },
                0: {
                    items: 1,
                }

            }
        });
    </script>
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
        $('#type').change(function () {
            if($(this).prop("checked") == true){
                console.log("Checkbox is checked.");
                $("#vencity").css("display", "block");
            }else{
                $("#vencity").css("display", "none");
            }
        });
        });
    </script>
</body>
</html>
