@extends("layouts.frontend")

@section('description')
@endsection

@section('keywords')
@endsection

@section('title')
    One way cabs / one side taxi
@endsection

@section('styles')
    <style>
        .booking_form input{ /* Chrome, Firefox, Opera, Safari 10.1+ */
            color: white !important;
            opacity: 1 !important; /* Firefox */
        }

        .booking_form input::placeholder{ /* Chrome, Firefox, Opera, Safari 10.1+ */
            color: white !important;
            opacity: 1 !important; /* Firefox */
        }

        .booking_form input:-ms-input-placeholder { /* Internet Explorer 10-11 */
            color: white;
        }

        .booking_form input::-ms-input-placeholder { /* Microsoft Edge */
            color: white;
        }
    </style>
@endsection

@section('content')
    <!-- start banner Area -->
    <section class="banner-area relative about-banner" id="home">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white">
                        Oneway Cabs
                    </h1>
                    <p class="text-white link-nav"><a href="{{route('home')}}">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="{{route('oneway_cabs')}}"> Oneway Cabs</a></p>
                </div>
            </div>
        </div>
    </section>
    <!-- End banner Area -->

    @if($media)
        <!-- Start Carousel Area -->
        <section class="pt-5 d-flex justify-content-center text-center">
            <div id="carouselExampleIndicators" class="carousel slide shadow-lg" data-ride="carousel">
                <ol class="carousel-indicators">
                @for($i=0; $i<count($media); $i++)
                        <li data-target="#carouselExampleIndicators" data-slide-to="{{$i}}" class="{{$i==0?'active':''}}"></li>
                @endfor
                </ol>
                <div class="carousel-inner">
                    @for($i=0; $i<count($media); $i++)
                        <div class="carousel-item {{$i==0?'active':''}}">
                            <img class="d-block w-100" src="{{$media[$i]->image}}" alt="Mr. Cabie one way cabs" style="max-height: 500px;" title="Mr. Cabie one way cabs">
                        </div>
                    @endfor
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </section>
        <!-- End Carusel Area -->
    @endif

    <!-- Start home-about Area -->
    <section class="home-about-area section-gap">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 col-md-6 header-right about-left">
                    <h3 id="form_header" class="text-black text-uppercase"><a class="text-black" href="tel:911-911-6955">911-911-6955</a>, <br>
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
                            <form class="form booking_form" method="GET" action="{{route("select")}}">
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
                            <form class="form booking_form" method="GET" action="{{route("select")}}">
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
                <div class="col-lg-7 about-right" style="font-size: 130%;">
                    <p>Mr. Cabie is the best taxi service provider for One way cabs / taxis, Get clean taxi, with AC and doorstep pickup.  We provide cabs with the cheapest fares</p>
                    <p> With Mr. Cabie you can opt for a one side cab service / one way cab service for many  routes such as Delhi to Rudrapur, Nainital, Haldwani, Kathgodam, Almora, Chandigarh, Jaipur and others. In one way taxi, you do not have to pay for the both side, instead of that just pay for the one side and save your money. They are economical* and subject to availability*</p>
                </div>
            </div>
            <h2 class="text-center my-4">Popular Routes</h2>
            <div class="row align-items-center">
                <div class="col-sm-4">
                    <ul>
                        <li class="font-weight-bold"><i class="fa fa-check text-warning"></i> Haldwani to Delhi Airport</li>
                        <li class="font-weight-bold"><i class="fa fa-check text-warning"></i> Haridwar to Delhi Airport</li>
                        <li class="font-weight-bold"><i class="fa fa-check text-warning"></i> Chandigarh to Delhi</li>
                    </ul>
                </div>
                <div class="col-sm-4">
                    <ul>
                        <li class="font-weight-bold"><i class="fa fa-check text-warning"></i> Bareilly to Delhi</li>
                        <li class="font-weight-bold"><i class="fa fa-check text-warning"></i> Rudrapur to Delhi Airport</li>
                    </ul>
                </div>
                <div class="col-sm-4">
                    <ul>
                        <li class="font-weight-bold"><i class="fa fa-check text-warning"></i> Dehradun to Delhi</li>
                        <li class="font-weight-bold"><i class="fa fa-check text-warning"></i> Nainital to Delhi</li>
                        <li class="font-weight-bold"><i class="fa fa-check text-warning"></i> Jaipur to Delhi</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- End home-about Area -->

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
                    type: 'city', // Search only for cities names
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
                    const time = hours + ":" + date.getMinutes();
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