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
                    <p class="text-white link-nav"><a href="{{route('home')}}">Home </a> <span
                            class="lnr lnr-arrow-right"></span> <a href="{{route('about')}}"> About Us</a></p>
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
                    <h1>Mr. Cabie taxi service</h1>
                    <h4></h4>
                    <p>
                        @if($page && $page->content)
                            {{$page->content}}
                        @else
                            Mr. Cabie provides Taxi service/ Cab service available at your doorstep on a single visit on
                            our website or on a single call, the safest and the most affordable taxis / cabs near you,to
                            book your cab you can go visit our booking page
                            <a class="font-weight-bold" href="{{url("")}}">({{url("")}})</a> or  call us at our numbers.
                            We operate one way and outstation cabs in 15+ cities like Rudrapur, Haldwani, New Delhi,
                            Jaipur, Bareilly, Chandigarh, Dehradun, Haridwar and more.
                        @endif
                    </p>
                    <h4 class="font-weight-bolder">
                        Mr. Cabie is an affordable and quality Service provider of:
                    </h4>
                    <ul>
                        <li class="font-weight-bold"><i class="fa fa-check text-warning"></i> One way taxi / cabs <a
                                href="{{route('oneway_cabs')}}">({{route("oneway_cabs")}})</a></li>
                        <li class="font-weight-bold"><i class="fa fa-check text-warning"></i> Outstation taxi / cabs <a
                                href="{{url("")}}">({{url("")}})</a></li>
                        <li class="font-weight-bold"><i class="fa fa-check text-warning"></i> Local taxi /cabs (Phone:
                            <a class="font-weight-bolder" href="tel:911-911-6955">911-911-6955</a>)
                        </li>
                    </ul>
                    <h4 class="font-weight-bolder">
                        While booking your taxi / cab never worry as we
                    </h4>
                    <ul>
                        <li class="font-weight-bold"><i class="fa fa-check text-warning"></i> Inspect our cabs regularly
                        </li>
                        <li class="font-weight-bold"><i class="fa fa-check text-warning"></i> Verify our drivers</li>
                        <li class="font-weight-bold"><i class="fa fa-check text-warning"></i> Have a cancellation policy
                            too. (call us at <a class="font-weight-bolder" href="tel:911-911-6955">911-911-6955</a> to
                            know more on this)
                        </li>
                        <li class="font-weight-bold"><i class="fa fa-check text-warning"></i> Have 24*7 helpline number
                            <a class="font-weight-bolder" href="tel:911-911-8876 ">911-911-8876 </a> , <a
                                class="font-weight-bolder" href="tel:911-911-6955">911-911-6955</a></li>
                    </ul>
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
                            <a href="{{$photo->image}}" class="img-gal"><img class="img-fluid" src="{{$photo->image}}"
                                                                             alt="{{$photo->title}}"></a>
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
