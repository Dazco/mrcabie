@extends("layouts.frontend")

@section('description')
@endsection

@section('keywords')
@endsection

@section('title')
    Cancellation - MRCABIE
@endsection

@section('styles')
@endsection

@section('content')
    <!-- start banner Area -->
    <section class="banner-area relative about-banner" id="home">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white">
                        Cancellation Policy
                    </h1>
                    <p class="text-white link-nav"><a href="{{route('home')}}">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="{{route('cancellation')}}"> Cancellation</a></p>
                </div>
            </div>
        </div>
    </section>
    <!-- End banner Area -->


    <!-- Start home-about Area -->
    <section class="home-about-area section-gap">
        <div class="container">
            <div class="row align-items-center">
                <h2 class="mb-4">Cancellation rules of MR CABIE</h2>
                <ul>
                    <li class="font-weight-bold mb-3"><i class="fa fa-check text-warning"></i> If you cancel a ride 24 hours prior to departure, you will not be charged any cancellation fees. Any cancellation request that comes in post the 24 hours timeline will be charges 100% of the paid amount as cancellation fees.</li>
                    <li class="font-weight-bold mb-3"><i class="fa fa-check text-warning"></i> For requesting a cancellation, call us at 911-911-6955 or 911-911-8876 or email us at info@mrcabie.com</li>
                    <li class="font-weight-bold mb-3"><i class="fa fa-check text-warning"></i> All the cancellation will be made against the ride number provided, so please make sure you have it with you during the time of cancellation</li>
                    <li class="font-weight-bold mb-3"><i class="fa fa-check text-warning"></i> Mr. Cabie will not be held responsible for any cancellation and delay of services in case of traffic jams, natural calamity, agitation or strike etc. </li>
                    <li class="font-weight-bold"><i class="fa fa-check text-warning"></i>Mr. Cabie reserves right to cancel or change the booking vehicle at any point.</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- End home-about Area -->

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
@endsection