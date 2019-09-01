@extends("layouts.frontend")

@section('description')
@endsection

@section('keywords')
@endsection

@section('title')
    Select Car - MRCABIE
@endsection

@section('styles')
@endsection

@section('content')
    <div class="container">
        <div class="row  mt-60 mb-30">
            <div class="col-md-7 mr-md-5" style="margin-top: 110px;">
                @if($prices)
                    <form class="form" method="POST" action="{{route("paynow")}}" id="paynow_form">
                        <input type="hidden" name="trip" value="{{$data['trip']}}">
                        <input type="hidden" name="pickup_city" value="{{$data['pickup_city']}}">
                        <input type="hidden" name="drop_city" value="{{$data['drop_city']}}">
                        <input type="hidden" name="pickup_date" value="{{$data['pickup_date']}}">
                        <input type="hidden" name="pickup_time" value="{{$data['pickup_time']}}">
                        @if($data["trip"] === "round")
                            <input type="hidden" name="return_date" value="{{$data['return_date']}}">
                            <input type="hidden" name="return_time" value="{{$data['return_time']}}">
                        @endif
                        <input type="hidden" name="distance" value="{{$data['distance']}}">
                        <input type="hidden" name="category_id" id="category_id">
                        {{Form::token()}}
                    </form>
                    @foreach($prices as $price)
                        <div class="card mb-3 border-0">
                            <div class="row no-gutters">
                                <div class="col-3 d-flex align-items-center">
                                    <img src="{{$price->category->image}}" class="card-img" alt="Indigo">
                                </div>
                                <div class="col-md-6">
                                    <div class="card-body">
                                        <h3 class="card-title">{{Str::title($price->category->name)}}</h3>
                                        <h6 class="card-title">{{ucfirst($price->category->car)}} or similar</h6>
                                        <hr class="border-warning">
                                        <p class="card-text">
                                            <span class="font-weight-bold">Facilities:</span>
                                            <span class="ml-2"><i class="fa fa-car"></i> {{$price->category->seats}} seaters</span>
                                            <span class="ml-2"><i class="fa fa-suitcase"></i> {{$price->category->bags}} bags</span>
                                            <span class="ml-2"><i class="fa fa-cloud"></i> AC</span>
                                        </p>

                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <p class="text-black text-heading">&#8377; {{$price->amount}}</p>
                                    <button class="btn btn-warning text-uppercase book_btn" data-category_id="{{$price->category->id}}">Book Now</button>
                                </div>
                            </div>
                            <hr class="border-warning">
                        </div>
                    @endforeach
                @else
                    <h2>Sorry Couldn't fetch Cabs. Please contact our team from our contact page to book right away</h2>
                @endif
            </div>
            <div class="col-md-4 pt-40">
                <button class="border btn-lg w-100" data-toggle="collapse" href="#form-collapse" role="button" aria-expanded="false" aria-controls="collapseExample">
                    <span class="font-weight-bold">{{$data["pickup_city"]}}<br>
                        <i class="text-warning fa fa-arrow-circle-right"></i><br>
                        {{$data["drop_city"]}}</span><br>
                    {{\Carbon\Carbon::create($data["pickup_date"]." ".$data["pickup_time"])->toDayDateTimeString()}} <br>
                    <span class="font-weight-bold">{{ucfirst($data["trip"])}}</span>
                    <i class="fa fa-caret-down fa-lg float-right"></i>
                </button>
                <div id="form-collapse" class="header-right collapse">
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
                                        <input id="pickup_date" class="dates form-control"  placeholder="Pickup Date" type="date" name="pickup_date" required min="{{today()->format('Y-m-d')}}">
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
                                        <input id="pickup_date" class="dates form-control"  placeholder="Pickup Date" type="date" name="pickup_date" required min="{{today()->format('Y-m-d')}}">
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
                                        <input id="return_date" class="dates form-control" type="date" name="return_date" required min="{{today()->format('Y-m-d')}}">
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
                <div id="fare-details" class="border border-grey align-items-center mt-3 pl-3 d-md-block d-none shadow">
                    <h3 class="font-weight-bold mt-2 mb-3">Fare Details</h3>
                    <p>Base Fare <span class="float-right mr-2">included</span></p>
                    <p>State, Toll Tax <span class="float-right mr-2">included</span></p>
                    <p>Vehicle and Fuel Charges <span class="float-right mr-2">included</span></p>
                    <p>Included Kms <span class="float-right mr-2">{{$data['trip']==='round'?2 * ceil($data["distance"]):ceil($data["distance"])}} KM</span></p>
                    @if($prices)
                        <h3 class="font-weight-bold mb-2">Other Charges</h3>
                        <p>Waiting Charge <span class="float-right mr-2">&#8377; {{$prices[0]->category->waiting}}</span></p>
                        <h3 class="font-weight-bold mb-2">Extra KMs Charges</h3>
                        @foreach($prices as $price)
                            <p>{{Str::title($price->category->name)}} <span class="float-right mr-2">&#8377; {{$price->category->extra_dist}}/Km</span></p>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/places.js@1.16.4"></script>
    <script>
        const arr = [];
        for (container of document.querySelectorAll(".autocomplete")){
            arr.push(places({
                appId: 'plCISBIJPEJ6',
                apiKey: '4026e03ec5b0b25deedd7d3e41c0e5d9',
                container: container,
            }).configure({
                countries: ['in'], // Search in India
                type: ['city','airport','trainStation'], // Search only for cities names
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

        document.querySelectorAll(".book_btn").forEach((btn)=>{
            btn.addEventListener("click", ({target}) => {
                document.querySelector("#category_id").value = target.dataset.category_id;
                document.querySelector("#paynow_form").submit();
            });
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
    </script>
@endsection