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
    <style>
        input::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
            color: red;
            opacity: 1; /* Firefox */
        }

        :-ms-input-placeholder { /* Internet Explorer 10-11 */
            color: red;
        }

        ::-ms-input-placeholder { /* Microsoft Edge */
            color: red;
        }
    </style>
@endsection

@section('content')
    <!-- start banner Area -->
    <section class="banner-area relative" id="home" style="background: url({{$banner?$banner->image:url('img/header-bg.jpg')}}) center;">
        <div class="overlay overlay-bg" @if(!$banner || !$banner->is_clear)style="background-color: rgba(0, 0, 0, 0.8);"@endif></div>
        <div class="container">
            <div class="row fullscreen d-flex align-items-center justify-content-between">
                <div class="banner-content col-lg-6 col-md-6 ">
                    <h6 class="text-white ">{{$banner?$banner->small_heading:'Welcome to'}}</h6>
                    <h1 class="text-uppercase">
                        {{$banner?$banner->big_heading:'Mr Cabie'}}
                    </h1>
                    <p class="pt-10 pb-10 text-white">
                        {{$banner?$banner->paragraph:'In just a few minutes, you can book your own taxi in the comforts of your home.'}}
                    </p>
                </div>
                <div class="col-lg-4  col-md-6 header-right">
                    <h3 id="form_header" class="pt-5 text-black text-uppercase"><a class="text-black" href="tel:911-911-6955">911-911-6955</a>, <br>
                        <a class="text-black" href="tel:911-911-8876">911-911-8876</a></h3>
                    <h4 class="pt-15 pb-15 animated bounce slower">Book Your Cab Online!</h4>
                    @include("includes.session_flash")
                    @include("includes.form_error")
                    <!-- List group -->
                    <div class="list-group list-group-horizontal tabbable-tabs mb-3" role="tablist">
                        <a class="list-group-item list-group-item-action active" data-toggle="list" href="#oneway_trip" role="tab">ONE WAY</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#round_trip" role="tab">ROUND TRIP</a>
                    </div>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="oneway_trip" role="tabpanel">
                            <form class="form" method="GET" action="{{route("select")}}">
                                <input type="hidden" name="trip" value="oneway">
                                <div class="form-group">
                                    <input type="text" name="pickup_city" class="form-control autocomplete" autocomplete="off" placeholder="From" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="drop_city" class="form-control autocomplete" autocomplete="off" placeholder="To" required>
                                </div>
                                <div class="form-group">
                                    <label for="pickup_date" class="text-center text-dark font-weight-bold m-0 p-0">Pickup Date</label>
                                    <div class="input-group dates-wrap">
                                        <input id="pickup_date" class="dates form-control"  placeholder="Pickup Date" type="date" name="pickup_date" required min="{{ today()->format("Y-m-d") }}">
                                        <div class="input-group-prepend">
                                            <span  class="input-group-text"><span class="lnr lnr-calendar-full"></span></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="pickup_time" class="text-center text-dark font-weight-bold m-0 p-0">Pickup Time</label>
                                    <div class="input-group dates-wrap">
                                        <input id="pickup_time" class="dates form-control" type="time" name="pickup_time"  required>
                                        <div class="input-group-prepend">
                                            <span  class="input-group-text"><span class="lnr lnr-clock"></span></span>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="pickupLat" data-pickup-lat>
                                <input type="hidden" name="pickupLon" data-pickup-lon>
                                <input type="hidden" name="dropLat" data-drop-lat>
                                <input type="hidden" name="dropLon" data-drop-lon>
                                {{Form::token()}}
                                <div class="form-group">
                                    <button type="submit" class="btn btn-default btn-lg btn-block text-center text-uppercase">Search Cabs</button>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane" id="round_trip" role="tabpanel">
                            <form class="form" method="GET" action="{{route("select")}}">
                                <input type="hidden" name="trip" value="round">
                                <div class="form-group">
                                    <input type="text" name="pickup_city" class="form-control autocomplete" autocomplete="off" placeholder="From" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="drop_city" class="form-control autocomplete" autocomplete="off" placeholder="To" required>
                                </div>
                                <div class="form-group">
                                    <label for="pickup_date" class="text-center text-dark font-weight-bold m-0 p-0">Pickup Date</label>
                                    <div class="input-group dates-wrap">
                                        <input id="pickup_date" class="dates form-control"  placeholder="Pickup Date" type="date" name="pickup_date" required min="{{ today()->format("Y-m-d") }}">
                                        <div class="input-group-prepend">
                                            <span  class="input-group-text"><span class="lnr lnr-calendar-full"></span></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="pickup_time" class="text-center text-dark font-weight-bold m-0 p-0">Pickup Time</label>
                                    <div class="input-group dates-wrap">
                                        <input id="pickup_time" class="dates form-control" type="time" name="pickup_time" required>
                                        <div class="input-group-prepend">
                                            <span  class="input-group-text"><span class="lnr lnr-clock"></span></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="return_date" class="text-center text-dark font-weight-bold m-0 p-0">Return Date</label>
                                    <div class="input-group dates-wrap">
                                        <input id="return_date" class="dates form-control" type="date" name="return_date" required min="{{ today()->format("Y-m-d") }}">
                                        <div class="input-group-prepend">
                                            <span  class="input-group-text"><span class="lnr lnr-calendar-full"></span></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="return_time" class="text-center text-dark font-weight-bold m-0 p-0">Return Time</label>
                                    <div class="input-group dates-wrap">
                                        <input id="return_time" class="dates form-control" type="time" name="return_time" required>
                                        <div class="input-group-prepend">
                                            <span  class="input-group-text"><span class="lnr lnr-clock"></span></span>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="pickupLat" data-pickup-lat>
                                <input type="hidden" name="pickupLon" data-pickup-lon>
                                <input type="hidden" name="dropLat" data-drop-lat>
                                <input type="hidden" name="dropLon" data-drop-lon>
                                {{Form::token()}}
                                <div class="form-group">
                                    <button type="submit" class="btn btn-default btn-lg btn-block text-center text-uppercase">Search Cabs</button>
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
                    <h1>Who is Mr Cabie?</h1>
                    <h4>A Taxi Cab Service for Everyone</h4>
                    <p>
                        Mr. Cabie offers the most affordable and reliable cab services 24/7, You can get our best cab services   in Rudrapur, Haldwani, Nainital, Pantnagar, Haridwar, Dehradun and other cities
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
            </div>
            <div class="row">
                <div class="col-lg-4 single-service">
                    <span class="lnr lnr-location"></span>
                    <a href="#"><h4>LOCAL CAB SERVICE</h4></a>
                    <p>
                        Wanna book taxi / cabs within the city? We have the local cab service for you.Usage of the Internet is becoming more common due to rapid advancement of technology and power.
                    </p>
                </div>
                <div class="col-lg-4 single-service">
                    <span class="lnr lnr-car"></span>
                    <a href="#"><h4>OUTSTATION CAB SERVICE</h4></a>
                    <p>
                        Planning to go on long routes? Contact us, we will avail you the best outstation taxi /cabs.
                    </p>
                </div>
                <div class="col-lg-4 single-service">
                    <span class="lnr lnr-bus"></span>
                    <a href="#"><h4>ONE WAY CAB SERVICE</h4></a>
                    <p>
                        The best taxi cabs now available at lowest fares
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
            const arr = [];
            for (container of document.querySelectorAll(".autocomplete")){
                arr.push(places({
                    appId: 'plCISBIJPEJ6',
                    apiKey: '4026e03ec5b0b25deedd7d3e41c0e5d9',
                    container: container,
                }).configure({
                    countries: ['in'], // Search in India
                    type: ['city','airport','trainStation'], // Search only for cities, aiports and train stations names
                    aroundLatLngViaIP: false // disable the extra search/boost around the source IP
                }));
            }
            arr[0].on("change", (e)=>{
                document.querySelector("#oneway_trip [data-pickup-lat]").value = e.suggestion.latlng.lat;
                document.querySelector("#oneway_trip [data-pickup-lon]").value = e.suggestion.latlng.lng;
            });
            arr[1].on("change", (e)=>{
                document.querySelector("#oneway_trip [data-drop-lat]").value = e.suggestion.latlng.lat;
                document.querySelector("#oneway_trip [data-drop-lon]").value = e.suggestion.latlng.lng;
            });
            arr[2].on("change", (e)=>{
                document.querySelector("#round_trip [data-pickup-lat]").value = e.suggestion.latlng.lat;
                document.querySelector("#round_trip [data-pickup-lon]").value = e.suggestion.latlng.lng;
            });
            arr[3].on("change", (e)=>{
                document.querySelector("#round_trip [data-drop-lat]").value = e.suggestion.latlng.lat;
                document.querySelector("#round_trip [data-drop-lon]").value = e.suggestion.latlng.lng;
            });
            document.querySelector("a[href='#oneway_trip']").addEventListener("click", ()=>{
                if($(window).width() > 750) $("#form_header").removeClass("mt-25");
            }, false);
            document.querySelector("a[href='#round_trip']").addEventListener("click", ()=>{
                if($(window).width() > 750) $("#form_header").addClass("mt-25");
            }, false);

            const set_min_time = (date_picker, time_picker)=>{
                const date = new Date();
                const year = date.getFullYear();
                let month = date.getMonth() +1;
                if (month < 10) month = '0'+month;
                let day = date.getDate();
                if (day < 10) day = '0'+day;
                const today = year + '-'+month+'-'+day;
                if(date_picker.value === today){
                    let hours = date.getHours() + 1;
                    if(hours > 23) hours = hours - 24;
                    let minutes = date.getMinutes();
                    if (minutes < 10) minutes = '0'+minutes;
                    const time = hours + ":" + minutes;
                    time_picker.setAttribute("min", time);
                }else{
                    time_picker.setAttribute("min", "");
                }
            };

            $("#round_trip #pickup_date").change((e)=>{
                document.querySelector("#return_date").setAttribute("min", e.target.value);
                const time_picker = document.querySelector("#round_trip #pickup_time");
                set_min_time(e.target, time_picker);
            });
            $("#round_trip #return_date").change((e)=>{
                const time_picker = document.querySelector("#round_trip #return_time");
                set_min_time(e.target, time_picker);
            });
            $("#oneway_trip #pickup_date").change((e)=>{
                const time_picker = document.querySelector("#oneway_trip #pickup_time");
                set_min_time(e.target, time_picker);
            });

            // Time Picker Minimum setings
            $("#round_trip #pickup_date").change();
            $("#round_trip #return_date").change();
            $("#oneway_trip #pickup_date").change();
            //End of Time picker Minimum settings
        });

    </script>
@endsection