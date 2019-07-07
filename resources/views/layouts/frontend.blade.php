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
<body>
<header id="header">
    <div class="header-top">
    </div>
    <div class="container main-menu">
        <div class="row align-items-center justify-content-between d-flex">
            <a href="{{route("home")}}"><img src="img/logo.png" alt="Mr Cabie logo" title="Mr Cabie" /></a>
            <nav id="nav-menu-container">
                <ul class="nav-menu">
                    <li class="{{Request::is("/")?'menu-active':''}}"><a href="{{route("home")}}">Home</a></li>
                    <li class="{{Request::is("about")?'menu-active':''}}"><a href="{{route("about")}}">About</a></li>
                    <li class="{{Request::is("services")?'menu-active':''}}"><a href="{{route("services")}}">Services</a></li>
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
                    <p>lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum<br><a href="{{route('about')}}" class="text-warning">read more...</a></p>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h6>Our Contacts</h6>
                    <p> 22 Ayodele Street, BRT Terminal, Fadeyi , Lagos</p>
                    <ul>
                        <li><span class="text-warning font-weight-bold">Tel:</span> +234 810 082 8886</li>
                        <li><span class="text-warning font-weight-bold">Tel:</span> +234 810 082 8886</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-6 social-widget">
                <div class="single-footer-widget">
                    <h6>Follow Us</h6>
                    <p>Let us be social</p>
                    <div class="footer-social d-flex align-items-center">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-dribbble"></i></a>
                        <a href="#"><i class="fa fa-behance"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4  col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h6>Newsletter</h6>
                    <p>Stay updated with our latest</p>
                    <div class="" id="mc_embed_signup">
                        <form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="form-inline">
                            <input class="form-control" name="EMAIL" placeholder="Enter Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Email '" required="" type="email">
                            <button class="click-btn btn btn-default"><span class="lnr lnr-arrow-right"></span></button>
                            <div style="position: absolute; left: -5000px;">
                                <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
                            </div>

                            <div class="info"></div>
                        </form>
                    </div>
                </div>
            </div>
            <p class="mt-80 mx-auto footer-text col-lg-12">
                Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | <a href="{{env("APP_URL")}}">Mr Cabie</a><br>
                <a href="">powered by DAZCO</a>
            </p>
        </div>
    </div>
    <img class="footer-bottom" src="img/footer-bottom.png" alt="">
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