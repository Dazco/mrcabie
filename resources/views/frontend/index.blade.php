@extends("layouts.frontend")

@section('description')
@endsection

@section('keywords')
@endsection

@section('title')
    Mr Cabie
@endsection

@section('styles')
    <link rel="stylesheet" href="{{url('css/animate.min.css')}}">
@endsection

@section('content')
    <!-- start banner Area -->
    <section class="banner-area relative" id="home">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row fullscreen d-flex align-items-center justify-content-between">
                <div class="banner-content col-lg-6 col-md-6 ">
                    <h6 class="text-white ">Welcome to</h6>
                    <h1 class="text-uppercase">
                        Mr Cabie
                    </h1>
                    <p class="pt-10 pb-10 text-white">
                        In just a few minutes, you can book your own taxi in the comforts of your home.
                    </p>
                    {{--<a href="#" class="primary-btn text-uppercase">Call for tax</a>--}}
                </div>
                <div class="col-lg-4  col-md-6 header-right">
                    <h4 id="form_header" class="pb-15 animated bounce slower">Book Your Texi Online!</h4>
                    <!-- List group -->
                    <div class="list-group list-group-horizontal tabbable-tabs mb-3" role="tablist">
                        <a class="list-group-item list-group-item-action active" data-toggle="list" href="#oneway_trip" role="tab">ONE WAY</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#round_trip" role="tab">ROUND TRIP</a>
                    </div>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="oneway_trip" role="tabpanel">
                            <form class="form">
                                {{Form::token()}}
                                <input type="hidden" name="trip" value="round">
                                <div class="form-group">
                                    <input type="text" name="pickup_place" class="form-control autocomplete" autocomplete="off" placeholder="From">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="drop_place" class="form-control autocomplete" autocomplete="off" placeholder="To">
                                </div>
                                <div class="form-group">
                                    <label for="pickup_date" class="text-center text-dark font-weight-bold m-0 p-0">Pickup Date</label>
                                    <div class="input-group dates-wrap">
                                        <input id="pickup_date" class="dates form-control"  placeholder="Pickup Date" type="date" name="pickup_date">
                                        <div class="input-group-prepend">
                                            <span  class="input-group-text"><span class="lnr lnr-calendar-full"></span></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="pickup_time" class="text-center text-dark font-weight-bold m-0 p-0">Pickup Time</label>
                                    <div class="input-group dates-wrap">
                                        <input id="pickup_time" class="dates form-control" type="time" name="pickup_time">
                                        <div class="input-group-prepend">
                                            <span  class="input-group-text"><span class="lnr lnr-clock"></span></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-default btn-lg btn-block text-center text-uppercase">Search Cabs</button>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane" id="round_trip" role="tabpanel">
                            <form class="form">
                                {{Form::token()}}
                                <input type="hidden" name="trip" value="round">
                                <div class="form-group">
                                    <input type="text" name="pickup_place" class="form-control autocomplete" autocomplete="off" placeholder="From">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="drop_place" class="form-control autocomplete" autocomplete="off" placeholder="To">
                                </div>
                                <div class="form-group">
                                    <label for="pickup_date" class="text-center text-dark font-weight-bold m-0 p-0">Pickup Date</label>
                                    <div class="input-group dates-wrap">
                                        <input id="pickup_date" class="dates form-control"  placeholder="Pickup Date" type="date" name="pickup_date">
                                        <div class="input-group-prepend">
                                            <span  class="input-group-text"><span class="lnr lnr-calendar-full"></span></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="pickup_time" class="text-center text-dark font-weight-bold m-0 p-0">Pickup Time</label>
                                    <div class="input-group dates-wrap">
                                        <input id="pickup_time" class="dates form-control" type="time" name="pickup_time">
                                        <div class="input-group-prepend">
                                            <span  class="input-group-text"><span class="lnr lnr-clock"></span></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="return_date" class="text-center text-dark font-weight-bold m-0 p-0">Return Date</label>
                                    <div class="input-group dates-wrap">
                                        <input id="return_date" class="dates form-control" type="date" name="return_date">
                                        <div class="input-group-prepend">
                                            <span  class="input-group-text"><span class="lnr lnr-calendar-full"></span></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="return_time" class="text-center text-dark font-weight-bold m-0 p-0">Return Time</label>
                                    <div class="input-group dates-wrap">
                                        <input id="return_time" class="dates form-control" type="time" name="return_time">
                                        <div class="input-group-prepend">
                                            <span  class="input-group-text"><span class="lnr lnr-clock"></span></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-default btn-lg btn-block text-center text-uppercase">Search Cabs</button>
                                </div>
                            </form>
                        </div>
                    </div>
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
                    <h1>Who is Mr Cabbie?</h1>
                    <h4>We are here to listen from you deliver exellence</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.
                    </p>
                    <a class="text-uppercase primary-btn" href="{{route('about')}}">Get Details</a>
                </div>
            </div>
        </div>
    </section>
    <!-- End home-about Area -->

    <!-- Start services Area -->
    <section class="services-area pb-120">
        <div class="container">
            <div class="row section-title">
                <h1>What Services we offer to our clients</h1>
                <p>Who are in extremely love with eco friendly system.</p>
            </div>
            <div class="row">
                <div class="col-lg-4 single-service">
                    <span class="lnr lnr-car"></span>
                    <a href="#"><h4>Taxi Service</h4></a>
                    <p>
                        Usage of the Internet is becoming more common due to rapid advancement of technology and power.
                    </p>
                </div>
                <div class="col-lg-4 single-service">
                    <span class="lnr lnr-briefcase"></span>
                    <a href="#"><h4>Office Pick-ups</h4></a>
                    <p>
                        Usage of the Internet is becoming more common due to rapid advancement of technology and power.
                    </p>
                </div>
                <div class="col-lg-4 single-service">
                    <span class="lnr lnr-bus"></span>
                    <a href="#"><h4>Event Transportation</h4></a>
                    <p>
                        Usage of the Internet is becoming more common due to rapid advancement of technology and power.
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
@endsection

@section('scripts')
    <script src="{{url('js/easing.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/places.js@1.16.4"></script>
    <script>
        $(document).ready(()=>{
            for (container of document.querySelectorAll(".autocomplete")){
                places({
                    appId: 'plCISBIJPEJ6',
                    apiKey: '4026e03ec5b0b25deedd7d3e41c0e5d9',
                    container: container,
                }).configure({
                    countries: ['in'], // Search in India
                    type: 'city', // Search only for cities names
                    aroundLatLngViaIP: false // disable the extra search/boost around the source IP
                });
            }
            document.querySelector("a[href='#oneway_trip']").addEventListener("click", ()=>{
                if($(window).width() > 750) $("#form_header").removeClass("mt-50");
            }, false);
            document.querySelector("a[href='#round_trip']").addEventListener("click", ()=>{
                if($(window).width() > 750) $("#form_header").addClass("mt-50");
            }, false);
        });
    </script>
@endsection