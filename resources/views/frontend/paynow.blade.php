@extends("layouts.frontend")

@section('description')
@endsection

@section('keywords')
@endsection

@section('title')
    Pay Now - MRCABIE
@endsection

@section('styles')
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 mt-60 pt-40">
                <div id="fare-details" class="border border-grey align-items-center mt-3 pl-3 d-md-block d-none shadow">
                    <div class="card border-0 mt-3 mb-0 pb-0">
                        <div class="row no-gutters">
                            <div class="col-3 d-flex align-items-center">
                                <img src="{{$trip->prices[0]->category->image}}" class="card-img" alt="{{$trip->prices[0]->category->car}}">
                            </div>
                            <div class="col-md-9">
                                <div class="card-body">
                                    <h3 class="card-title">{{$trip->prices[0]->category->name}}</h3>
                                    <h6 class="card-title">{{$trip->prices[0]->category->car}}</h6>
                                    <p class="card-text">
                                        <span>{{$trip->prices[0]->category->seats}} seaters</span> |
                                        <span class="ml-2">{{$trip->prices[0]->category->bags}} bags</span> |
                                        <span class="ml-2">AC</span>
                                    </p>
                                <p class="font-weight-bold text-black">{{strtoupper($data['trip'])}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="w-100 mt-0 pt-0">
                    <div class="text-center text-lg">
                        <span class="mt-3 text-dark font-weight-bold align-items-center">
                            {{$trip->source}}<br>
                            <i class="text-warning fa fa-arrow-circle-right"></i><br>
                            {{$trip->destination}}</span><br><br>
                        <span class="font-weight-bold">Pickup Date: </span> <span class="ml-2 font-weight-bold text-black">{{\Carbon\Carbon::create($data["pickup_date"])->toFormattedDateString()}}</span><br>
                        <span class="font-weight-bold text-warning">Pickup Time: </span> <span class="ml-2 font-weight-bold text-black">{{\Carbon\Carbon::create($data["pickup_time"])->format("h:m a")}}</span>
                        @if($data['trip'] === "round")
                            <br><span class="font-weight-bold">Return Date: </span> <span class="ml-2 font-weight-bold text-black">{{\Carbon\Carbon::create($data["return_date"])->toFormattedDateString()}}</span><br>
                            <span class="font-weight-bold text-warning">Return Time: </span> <span class="ml-2 font-weight-bold text-black">{{\Carbon\Carbon::create($data["return_time"])->format("h:m a")}}</span>
                        @endif
                    </div>

                    <h3 class="font-weight-bold mt-3 mb-3">Fare Details</h3>
                    <p>Base Fare <span class="float-right mr-2">included</span></p>
                    <p>State, Toll Tax <span class="float-right mr-2">included</span></p>
                    <p>Included Kms <span class="float-right mr-2">{{ceil($data['distance'])}} KM</span></p>
                    <p>Vehicle and Fuel Charges <span class="float-right mr-2">included</span></p>
                    <h3 class="font-weight-bold mb-2">Other Charges</h3>
                    <p>Waiting Charge <span class="float-right mr-2">&#8377; {{$trip->prices[0]->category->waiting}}/min</span></p>
                    <h3 class="font-weight-bold mb-2">Extra KMs Charges</h3>
                    <p>{{ucfirst($trip->prices[0]->category->name)}} <span class="float-right mr-2">&#8377; {{$trip->prices[0]->category->extra_dist}}/Km</span></p>
                </div>
            </div>
            <div class="col-md-7 ml-md-5" style="margin-top: 110px;">
                <form action="{{route("redirect")}}" method="POST">
                    {{Form::token()}}
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
                    <input type="hidden" name="category_id" value="{{$data['category_id']}}">
                    <div class="mt-10">
                        <input type="text" name="name" placeholder="Full Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Full Name'" required class="single-input border border-warning">
                    </div>
                    <div class="mt-30">
                        <input type="email" name="email" placeholder="Email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email address'" required class="single-input border border-warning">
                    </div>
                    <div class="input group mt-30">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">+91</span>
                        </div>
                        <input type="text" name="phone" placeholder="Phone Number" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Phone Number'" required class="single-input border border-warning">
                    </div>
                    <div class="input-group-icon mt-30">
                        <div class="icon"><i class="fa fa-thumb-tack" aria-hidden="true"></i></div>
                        <input type="text" name="pickup_address" placeholder="Full Pickup Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Full Pickup Address'" required class="single-input border border-warning autocomplete">
                    </div>
                    <div class="input-group-icon mt-30">
                        <div class="icon"><i class="fa fa-thumb-tack" aria-hidden="true"></i></div>
                        <input type="text" name="drop_address" placeholder="Full Drop Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Full Drop Address'" required class="single-input border border-warning autocomplete">
                    </div>

                    <div class="mt-30">
                        <textarea name="requests" class="single-textarea border border-warning" placeholder="Additional Requests?" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Additional Requests?'"></textarea>
                    </div>
                    <div class="mt-10">
                        <button name="payment" value="part" type="submit" class="btn btn-secondary col-5 mb-3">Pay Advance &#8377; {{$trip->prices[0]->part_amount}}</button>
                        <button name="payment" value="full" type="submit" class="btn btn-warning col-5 float-right mb-3">Pay Full &#8377; {{$trip->prices[0]->amount}}</button>
                    </div>
                </form>
                @if($content)
                    <div class="mt-4 border border-warning p-3 mb-5">
                        <h2 class="py-4 text-center">Read Before You Book</h2>

                        <div class="col-10 text-black">
                            {!! $content?$content->content:'' !!}
                        </div>
                    </div>
                @endif
            </div>
        </div>

    </div>
@endsection

@section('scripts')
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
                    type: 'address', // Search only for cities names
                    aroundLatLngViaIP: false // disable the extra search/boost around the source IP
                });
            }
        });
    </script>
@endsection