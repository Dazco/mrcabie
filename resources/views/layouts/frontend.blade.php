<!DOCTYPE html>
<html lang="zxx" class="no-js">
<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{url('img/fav.png')}}">
    <!-- Author Meta -->
    <meta name="author" content="DAZCO">
    <!-- Meta Description -->
    <meta name="description" content=@yield("description")>
    <!-- Meta Keyword -->
    <meta name="keywords" content=@yield("keywords")>
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>@yield("title")</title>

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
    <!--
    CSS
    ============================================= -->
    {{--Library styles--}}
    <link rel="stylesheet" href="{{url('css/linearicons.css')}}">
    <link rel="stylesheet" href="{{url('css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    @yield("styles")
    <link rel="stylesheet" href="{{url('css/main.css')}}">
</head>
<body class="loader-active">
<!--== Preloader Area Start ==-->
<div class="preloader">
    <div class="preloader-spinner">
        <div class="loader-content">
            <img src="{{url('img/preloader.gif')}}" alt="MR CABIE">
        </div>
    </div>
</div>
<!--== Preloader Area End ==-->

<header id="header">
    <div class="header-top">
    </div>
    <div class="container main-menu">
        <div class="row align-items-center justify-content-between d-flex">
            <a href="{{route("home")}}"><img src="{{url('img/logo.png')}}" alt="Mr Cabie logo" title="Mr Cabie" /></a>
            <nav id="nav-menu-container">
                <ul class="nav-menu">
                    <li class="{{Request::is("/")?'menu-active':''}}"><a href="{{route("home")}}">Home</a></li>
                    <li class="{{Request::is("about")?'menu-active':''}}"><a href="{{route("about")}}">About</a></li>
                    <li class="{{Request::is("services")?'menu-active':''}}"><a href="{{route("services")}}">Services</a></li>
                    <li class="{{Request::is("oneway_cabs")?'menu-active':''}}"><a href="{{route("oneway_cabs")}}">Oneway Cabs</a></li>
                    <li class="{{Request::is("gallery")?'menu-active':''}}"><a href="{{route("gallery")}}">Gallery</a></li>
                    <li class="{{Request::is("contact")?'menu-active':''}}"><a href="{{route("contact")}}">Contact</a></li>
                </ul>
            </nav><!-- #nav-menu-container -->
        </div>
    </div>
</header><!-- #header -->

@yield("content")

<!-- start footer Area -->
<footer class="footer-area section-gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h6>About Us</h6>
                    <p>Mr. Cabie offers the most affordable and reliable cab services 24/7, You can get our best cab services in Rudrapur, Haldwani, Nainital, Pantnagar, Haridwar, Dehradun and other cities <br><a href="{{route('about')}}" class="text-warning">read more...</a></p>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h6>Our Contacts</h6>
                    <p>  Rhone-e 208, Omaxe,  Rudrapur,  Uttarakhand </p>
                    <ul>
                        <li><span class="text-warning font-weight-bold">Tel:</span> 911-911-6955</li>
                        <li><span class="text-warning font-weight-bold">Tel:</span> 911-911-8876</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-6 social-widget">
                <div class="single-footer-widget">
                    <h6>Follow Us</h6>
                    <p>Let us be social</p>
                    <div class="footer-social d-flex align-items-center">
                        <a href="https://www.facebook.com/2166298106734258"><i class="fa fa-facebook fa-lg"></i></a>
                        <a href="https://www.instagram.com/mr.cabie"><i class="fa fa-instagram fa-lg"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4  col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h6>Policies</h6>
                    <p><a class="text-warning" target="_blank" href="https://app.termly.io/document/terms-and-conditions/ae1a7f41-4177-40d0-be1e-708f534baa85">Terms and Conditions</a></p>
                    <p><a class="text-warning" href="{{route('cancellation')}}">Cancellation Policy</a></p>
                    <p><a class="text-warning" href="https://app.termly.io/document/privacy-notice/fdac810a-832c-4cf6-9e3f-676d726c0b99">Privacy Policy</a></p>
                </div>
            </div>
            <p class="mt-80 mx-auto footer-text col-lg-12">
                Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | <a href="{{env("APP_URL")}}">Mr Cabie</a><br>
                <a href="">powered by DAZCO</a>
            </p>
        </div>
    </div>
    <img class="footer-bottom" src="{{url('img/footer-bottom.png')}}" alt="">
</footer>
<!-- End footer Area -->

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="{{url('js/jquery.ajaxchimp.min.js')}}"></script>
<script src="{{url('js/superfish.min.js')}}"></script>
@yield("scripts")
<script src="{{url('js/main.js')}}"></script>
</body>
</html>