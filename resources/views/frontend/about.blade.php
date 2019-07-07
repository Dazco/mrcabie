@extends("layouts.frontend")

@section('description')
@endsection

@section('keywords')
@endsection

@section('title')
    About - MRCABIE
@endsection

@section('styles')
    <link rel="stylesheet" href="{{url('css/magnific-popup.css')}}">
@endsection

@section('content')
    <!-- start banner Area -->
    <section class="banner-area relative about-banner" id="home">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white">
                        About Us
                    </h1>
                    <p class="text-white link-nav"><a href="{{route('home')}}">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="{{route('about')}}"> About Us</a></p>
                </div>
            </div>
        </div>
    </section>
    <!-- End banner Area -->


    <!-- Start home-about Area -->
    <section class="home-about-area section-gap">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 about-left">
                    <img class="img-fluid" src="img/about-img.jpg" alt="">
                </div>
                <div class="col-lg-6 about-right">
                    <h1>Who is Mr Cabie</h1>
                    <h4>We are here to listen from you deliver exellence</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- End home-about Area -->

    <!-- Start image-gallery Area -->
    <section class="image-gallery-area section-gap">
        <div class="container">
            <div class="row section-title">
                <h1>Gallery</h1>
            </div>
            <div class="row">
                <div class="col-lg-4 single-gallery">
                    <a href="img/g1.jpg" class="img-gal"><img class="img-fluid" src="img/g1.jpg" alt=""></a>
                    <a href="img/g4.jpg" class="img-gal"><img class="img-fluid" src="img/g4.jpg" alt=""></a>
                </div>
                <div class="col-lg-4 single-gallery">
                    <a href="img/g2.jpg" class="img-gal"><img class="img-fluid" src="img/g2.jpg" alt=""></a>
                    <a href="img/g5.jpg" class="img-gal"><img class="img-fluid" src="img/g5.jpg" alt=""></a>
                </div>
                <div class="col-lg-4 single-gallery">
                    <a href="img/g3.jpg" class="img-gal"><img class="img-fluid" src="img/g3.jpg" alt=""></a>
                    <a href="img/g6.jpg" class="img-gal"><img class="img-fluid" src="img/g6.jpg" alt=""></a>
                </div>
            </div>
        </div>
    </section>
    <!-- End image-gallery Area -->

    <!-- Start home-calltoaction Area -->
    <section class="home-calltoaction-area relative">
        <div class="container">
            <div class="overlay overlay-bg"></div>
            <div class="row align-items-center section-gap">
                <div class="col-lg-8">
                    <h1>Awesome Support</h1>
                    <p>
                        Our friendly staff will give undivided attention during working hours.
                    </p>
                </div>
                <div class="col-lg-4 btn-left">
                    <a href="{{route('contact')}}" class="primary-btn">Reach Our Support Team</a>
                </div>
            </div>
        </div>
    </section>
    <!-- End home-calltoaction Area -->
@endsection

@section('scripts')
    <script src="{{url('js/jquery.magnific-popup.min.js')}}"></script>
@endsection