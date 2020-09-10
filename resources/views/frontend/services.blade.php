@extends("layouts.frontend")

@section('description')
@endsection

@section('keywords')
@endsection

@section('title')
    Services|MRCABIE
@endsection

@section('styles')
    <link rel="stylesheet" href="{{url('css/magnific-popup.css')}}">
@endsection
<!-- start banner Area -->
<section class="banner-area relative about-banner" id="home">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <h1 class="text-white">
                    Services
                </h1>
                <p class="text-white link-nav"><a href="{{route('home')}}">Home </a> <span
                        class="lnr lnr-arrow-right"></span> <a href="{{route('services')}}"> Services</a></p>
            </div>
        </div>
    </div>
</section>
<!-- End banner Area -->

<!-- Start services Area -->
<section class="services-area pb-120 mt-5">
    <div class="container">
        <div class="row section-title">
            <h1>What Services we offer to our clients</h1>
        </div>
        <div class="row">
            <div class="col-lg-4 single-service">
                <span class="lnr lnr-location"></span>
                <a href="#"><h4>LOCAL CAB SERVICE</h4></a>
                <p>
                    @if($services && $services->local)
                        {{$services->local}}
                    @else
                        Wanna book taxi / cabs within the city? We have the local cab service for you.Usage of the
                        Internet is becoming more common due to rapid advancement of technology and power.
                    @endif
                </p>
            </div>
            <div class="col-lg-4 single-service">
                <span class="lnr lnr-car"></span>
                <a href="#"><h4>OUTSTATION CAB SERVICE</h4></a>
                <p>
                    @if($services && $services->outstation)
                        {{$services->outstation}}
                    @else
                        Planning to go on long routes? Contact us, we will avail you the best outstation taxi /cabs.
                    @endif
                </p>
            </div>
            <div class="col-lg-4 single-service">
                <span class="lnr lnr-bus"></span>
                <a href="#"><h4>ONE WAY CAB SERVICE</h4></a>
                <p>
                    @if($services && $services->oneway)
                        {{$services->oneway}}
                    @else
                        The best taxi cabs now available at lowest fares
                    @endif
                </p>
            </div>
        </div>
    </div>
</section>
<!-- End services Area -->

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

<!-- Start home-about Area -->
<section class="home-about-area section-gap">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 about-left">
                <img class="img-fluid" src="img/about-img.jpg" alt="">
            </div>
            <div class="col-lg-6 about-right">
                <h1>Who is Mr Cabbie?</h1>
                <h4>A Taxi Cab Service for Everyone</h4>
                <p>
                    Mr. Cabie offers the most affordable and reliable cab services 24/7, You can get our best cab
                    services in Rudrapur, Haldwani, Nainital, Pantnagar, Haridwar, Dehradun and other cities
                </p>
                <a class="text-uppercase primary-btn" href="{{route('about')}}">Get Details</a>
            </div>
        </div>
    </div>
</section>
<!-- End home-about Area -->
@section('content')
@endsection

@section('scripts')
@endsection
