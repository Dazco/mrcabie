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
                    <h4>A Taxi Cab Service for Everyone</h4>
                    <p>
                        Mr. Cabie offers the most affordable and reliable cab services 24/7, You can get our best cab services   in Rudrapur, Haldwani, Nainital, Pantnagar, Haridwar, Dehradun and other cities
                    </p>
                    <h4>We offer 3 services:</h4>
                    <ul>
                        <li class="font-weight-bold"><i class="fa fa-check text-warning"></i> Local Cabs (Inside City)</li>
                        <li class="font-weight-bold"><i class="fa fa-check text-warning"></i> Outstation Cabs (Outside City)</li>
                        <li class="font-weight-bold"><i class="fa fa-check text-warning"></i> One Way Cabs (One Side Routes only)</li>
                    </ul>

                    {{--<h5 class="mt-3">Local cab service</h5>
                    <p>Cabs Inside the city, and within a limit of 30 km. This service is provided in Rudrapur, Pantnagar, Haldwani and Dehradun</p>

                    <h5 class="mt-3">Local cab service</h5>
                    <p>Cabs Inside the city, and within a limit of 30 km. This service is provided in Rudrapur, Pantnagar, Haldwani and Dehradun</p>--}}
                </div>
            </div>
            <h2 class="text-center mb-4">Popular Routes</h2>
            <div class="row align-items-center">
                <div class="col-sm-4">
                    <ul>
                        <li class="font-weight-bold"><i class="fa fa-check text-warning"></i> Rudrapur to Nainital</li>
                        <li class="font-weight-bold"><i class="fa fa-check text-warning"></i> Delhi to Nainital</li>
                        <li class="font-weight-bold"><i class="fa fa-check text-warning"></i> Rudrapur to Delhi</li>
                        <li class="font-weight-bold"><i class="fa fa-check text-warning"></i> Rudrapur to Haldwani</li>
                    </ul>
                </div>
                <div class="col-sm-4">
                    <ul>
                        <li class="font-weight-bold"><i class="fa fa-check text-warning"></i> Haldwani to Delhi</li>
                        <li class="font-weight-bold"><i class="fa fa-check text-warning"></i> Haridwar to Delhi</li>
                        <li class="font-weight-bold"><i class="fa fa-check text-warning"></i> Delhi to Rudrapur</li>
                        <li class="font-weight-bold"><i class="fa fa-check text-warning"></i> Pune to Mumbai</li>
                    </ul>
                </div>
                <div class="col-sm-4">
                    <ul>
                        <li class="font-weight-bold"><i class="fa fa-check text-warning"></i> Dehradun to Delhi</li>
                        <li class="font-weight-bold"><i class="fa fa-check text-warning"></i> Chandigarh to Delhi</li>
                        <li class="font-weight-bold"><i class="fa fa-check text-warning"></i> Nainital to Delhi</li>
                        <li class="font-weight-bold"><i class="fa fa-check text-warning"></i> Haldwani to Nainital</li>
                    </ul>
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
            <div class="row d-flex justify-content-center">
                @if($media && count($media) > 0)
                    @foreach($media as $photo)
                        <div class="col-lg-4 mb-3">
                            <a href="{{$photo->image}}" class="img-gal"><img class="img-fluid" src="{{$photo->image}}" alt="{{$photo->title}}"></a>
                        </div>
                    @endforeach
                @else
                    <h1 class="text-secondary">No Images Uploaded</h1>
                @endif
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