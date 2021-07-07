@extends('welcome')

@section('web')
    <!DOCTYPE html>
<html lang="zxx">

<head>
{{--	<title>Cleaning Services Home Service Category</title>--}}
<!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8"/>
    <meta name="keywords"
          content="Cleaning Services Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design"/>
    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>


    <link rel="stylesheet" href="css/bootstrap.css">
    <!-- Bootstrap-Core-CSS -->
    <link rel="stylesheet" href="css/progresscircle.css">
    <!-- progress -->
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all"/>
    <!-- Style-CSS -->
    <link rel="stylesheet" href="css/fontawesome-all.css">
    <!-- Font-Awesome-Icons-CSS -->
    <!-- //Custom-Files -->

    <!-- Web-Fonts -->
    <link
        href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
        rel="stylesheet">
    <link
        href="//fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=devanagari,latin-ext"
        rel="stylesheet">
    <!-- //Web-Fonts -->

</head>

<body>
<!-- header -->
<header>
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}" style="height: 60px;margin: 7px">
                <img src="images/Untitled-1.png" alt="" class="img-fluid" style="height: 66px; width: 280px">
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
                            <a style="text-transform: capitalize; padding:10px ; color: #002752; font-weight:bold; font-size: 20px;" id="navbarDropdown" class="nav-item dropdown-toggle" href="#" role="button" data-toggle="dropdown"
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
<!-- //header -->

<!-- banner -->
<div class="callbacks_container">
    <ul class="rslides" id="slider3">
        <li>
            <div class="slider-info banner-w3-1">
                <div class="w3l-overlay">
                    <div class="banner-text text-center container">
                        <h3 class="text-white mb-4 text-uppercase">Professional
                            <span>Super Clean </span>
                        </h3>
                        <p class="movetxt text-white text-uppercase">We like when it's
                            <span>clean around!</span> & We working hard to make your place
                            <span>clean</span>
                        </p>
                    </div>
                </div>
            </div>
        </li>
        <li>
            <div class="slider-info banner-w3-2">
                <div class="w3l-overlay">
                    <div class="banner-text text-center container">
                        <h3 class="text-white mb-4 text-uppercase">Professional
                            <span>Super Clean </span>
                        </h3>
                        <p class="movetxt text-white text-uppercase">We like when it's
                            <span>clean around!</span> & We working hard to make your place
                            <span>clean</span>
                        </p>
                    </div>
                </div>
            </div>
        </li>
        <li>
            <div class="slider-info banner-w3-3">
                <div class="w3l-overlay">
                    <div class="banner-text text-center container">
                        <h3 class="text-white mb-4 text-uppercase">Professional
                            <span>Super Clean </span>
                        </h3>
                        <p class="movetxt text-white text-uppercase">We like when it's
                            <span>clean around!</span> & We working hard to make your place
                            <span>clean</span>
                        </p>
                    </div>
                </div>
            </div>
        </li>
    </ul>
</div>
<!-- //banner -->

<!-- banner bottom -->
<div class="about py-5">
    <div class="container py-xl-5 py-lg-3">
        <div class="row">
            <div class="col-lg-5 agileits_works-grid">
                <h3 class="tittle mb-xl-5 mb-4 text-dark text-uppercase font-weight-bold pl-4 py-3">Welcome to our
                    <span>Cleaning Services</span>
                </h3>
            </div>
            <div class="col-lg-7 agileits_works-grid1 mt-lg-0 mt-4">
                <p>Super clean is cleaning services is committed to providing you with the highest quality of cleaning
                    in the industry.
                    Your home is in the best of hands.</p>
            </div>
        </div>
    </div>
</div>
<!-- //banner bottom -->

<!-- services -->
<section class="services-w3ls py-5">
    <div class="container py-xl-5 py-lg-3">
        <div class="row">
            <div class="col-lg-5 agileits_works-grid">
                <h3 class="tittle mb-xl-5 mb-4 text-dark text-uppercase font-weight-bold pl-4 py-3">Our Services</h3>
            </div>

        </div>
        <div class="row">
            <div class="col-md-4 p-sm-0">
                <div class="icons-w3ls text-white p-4">
                    <i class="fas fa-home  py-4"></i>
                    <h5 class="text-uppercase"><a href="/create/places">Places Cleaning</a></h5>
                </div>

                <p class="p-4">Cleaning houses, Offices &Gardens. Vacuums, washes dishes,
                    beds, cleans and scrubs counters, and dusts surfaces,Pruning and trimming trees and shrubs, sweeps
                    floors, Re-edging and cleaning garden and flower.</p>
            </div>
            <div class="col-md-4 p-sm-0 my-md-0 my-5">
                <div class="icons-w3ls text-white p-4 mid-sec-agile" style="height: 161px">
                    <h5 class="text-uppercase pb-2 text-center"><a style="color: white" href="/create/cars">Cars
                            Cleaning</a></h5>
                    <i class="fas fa-car py-4"></i>
                </div>
                <p class="p-4">Our service is completely eco-friendly. We use waterless car-wash solutions that wash,
                    foe all type of cars Sedan, 4x4 and Van
                    wax and shine, in addition to a full arsenal of environmentally friendly supplies. swipe prior to
                    our posted daily deadline.</p>
            </div>
            <div class="col-md-4 p-sm-0">
                <div class="icons-w3ls text-white p-4">
                    <i class="fas fa-braille py-4"></i>

                    <h5 class="text-uppercase"><a href="/create/laundries">Laundries Cleaning</a></h5>
                </div>
                <p class="p-4">Our team washes, cleans, and dries your laundry for folding – with 100% eco-friendly and
                    high-quality detergents.</p>
            </div>
        </div>
    </div>
</section>
<!-- //services -->

<!-- footer -->
<footer class="py-4">
    <div class="container py-xl-5 py-lg-3">
        <div class="row">
            <div class="col-md-8 footer-title">
                <h1 class="tittle text-white text-uppercase font-weight-bold pl-4 py-3">Connect with Social</h1>
            </div>
            <div class="col-md-4 logo-2 text-md-right text-center mt-md-0 mt-4">
                <!-- social icons -->
                <div class="social-icons text-md-right text-center">
                    <ul class="list-unstyled">
                        <li>
                            <a href="#" class="fab fa-facebook-f icon-border facebook rounded-circle"> </a>
                        </li>
                        <li class="mx-2">
                            <a href="#" class="fab fa-twitter icon-border twitter rounded-circle"> </a>
                        </li>
                        <li>
                            <a href="#" class="fab fa-instagram icon-border instagram rounded-circle"> </a>
                        </li>

                    </ul>
                </div>
                <!-- //social icons -->
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 logo-2 text-md-right text-center">
                <a class="navbar-brand" href="{{ url('/') }}" style="height: 60px;margin: 7px">
                    <img src="images/Untitled-1.png" alt="" class="img-fluid" style="height: 66px; width: 280px">
                </a>
            </div>
        </div>
    </div>
</footer>
<!-- //footer -->


<!-- Js files -->
<!-- JavaScript -->
<script src="js/jquery-2.2.3.min.js"></script>
<!-- Default-JavaScript-File -->

<!-- Banner Responsiveslides -->
<script src="js/responsiveslides.min.js"></script>
<script>
    // You can also use "$(window).load(function() {"
    $(function () {
        // Slideshow 4
        $("#slider3").responsiveSlides({
            auto: true,
            pager: true,
            nav: false,
            speed: 500,
            namespace: "callbacks",
            before: function () {
                $('.events').append("<li>before event fired.</li>");
            },
            after: function () {
                $('.events').append("<li>after event fired.</li>");
            }
        });

    });
</script>
<!-- // Banner Responsiveslides -->

<!-- progresscircle -->
<script src="js/progresscircle.js"></script>
<script>
    $('.circlechart').circlechart(); // Initialization
</script>
<!-- //progresscircle -->

<!-- smooth scrolling -->
<script src="js/SmoothScroll.min.js"></script>
<!-- move-top -->
<script src="js/move-top.js"></script>
<!-- easing -->
<script src="js/easing.js"></script>
<!--  necessary snippets for few javascript files -->
<script src="js/cleaning.js"></script>

<script src="js/bootstrap.js"></script>
<!-- Necessary-JavaScript-File-For-Bootstrap -->

<!-- //Js files -->

</body>

</html>
@endsection
