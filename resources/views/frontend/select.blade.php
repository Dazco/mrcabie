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
        <div class="row">
            <div class="col-md-4 mt-60 pt-40">
                <button class="border btn-lg" data-toggle="collapse" href="#form-collapse" role="button" aria-expanded="false" aria-controls="collapseExample">
                    <span class="font-weight-bold">Goa <i class="fa fa-arrow-right"></i> Mumbai</span><br>
                    One Way | 04 Jul 2019 | 584 Kms | 6:45 PM
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
                <div id="fare-details" class="border border-grey align-items-center mt-3 pl-3 d-md-block d-none shadow">
                    <h3 class="font-weight-bold mt-2 mb-3">Fare Details</h3>
                    <p>Base Fare <span class="float-right mr-2">included</span></p>
                    <p>State, Toll Tax <span class="float-right mr-2">included</span></p>
                    <p>Included Kms <span class="float-right mr-2">584 KM</span></p>
                    <p>Vehicle and Fuel Charges <span class="float-right mr-2">included</span></p>
                    <h3 class="font-weight-bold mb-2">Other Charges</h3>
                    <p>Waiting Charge <span class="float-right mr-2">&#8377; 2/min</span></p>
                    <h3 class="font-weight-bold mb-2">Extra KMs Charges</h3>
                    <p>Cabie Economy <span class="float-right mr-2">&#8377; 12/Km</span></p>
                    <p>Cabie Comfort <span class="float-right mr-2">&#8377; 12/Km</span></p>
                    <p>Cabie Premium <span class="float-right mr-2">&#8377; 16/Km</span></p>
                </div>
            </div>
            <div class="col-md-7 ml-md-5" style="margin-top: 110px;">
                <div class="card mb-3 border-0">
                    <div class="row no-gutters">
                        <div class="col-3 d-flex align-items-center">
                            <img src="{{url('img/indigo.png')}}" class="card-img" alt="Indigo">
                        </div>
                        <div class="col-md-6">
                            <div class="card-body">
                                <h3 class="card-title">Cabie Economy</h3>
                                <h6 class="card-title">Sedan</h6>
                                <hr class="border-warning">
                                <p class="card-text">
                                    <span class="font-weight-bold">Facilities:</span>
                                    <span class="ml-2"><i class="fa fa-car"></i> 4 seaters</span>
                                    <span class="ml-2"><i class="fa fa-suitcase"></i> 3 bags</span>
                                    <span class="ml-2"><i class="fa fa-cloud"></i> AC</span>
                                </p>

                            </div>
                        </div>
                        <div class="col-md-3">
                            <p class="text-black text-heading">&#8377; 3000</p>
                            <button class="btn btn-warning text-uppercase">Book Now</button>
                        </div>
                    </div>
                    <hr class="border-warning">
                </div>
                <div class="card mb-3 border-0">
                    <div class="row no-gutters">
                        <div class="col-3 d-flex align-items-center">
                            <img src="{{url('img/indigo.png')}}" class="card-img" alt="Indigo">
                        </div>
                        <div class="col-md-6">
                            <div class="card-body">
                                <h3 class="card-title">Cabie Comfort</h3>
                                <h6 class="card-title">Suv</h6>
                                <hr class="border-warning">
                                <p class="card-text">
                                    <span class="font-weight-bold">Facilities:</span>
                                    <span class="ml-2"><i class="fa fa-car"></i> 6 seaters</span>
                                    <span class="ml-2"><i class="fa fa-suitcase"></i> 4 bags</span>
                                    <span class="ml-2"><i class="fa fa-cloud"></i> AC</span>
                                </p>

                            </div>
                        </div>
                        <div class="col-md-3">
                            <p class="text-black text-heading">&#8377; 8000</p>
                            <button class="btn btn-warning text-uppercase">Book Now</button>
                        </div>
                    </div>
                    <hr class="border-warning">
                </div>
                <div class="card mb-3 border-0">
                    <div class="row no-gutters">
                        <div class="col-3 d-flex align-items-center">
                            <img src="{{url('img/indigo.png')}}" class="card-img" alt="Indigo">
                        </div>
                        <div class="col-md-6">
                            <div class="card-body">
                                <h3 class="card-title">Cabie Premium</h3>
                                <h6 class="card-title">Lamborghini</h6>
                                <hr class="border-warning">
                                <p class="card-text">
                                    <span class="font-weight-bold">Facilities:</span>
                                    <span class="ml-2"><i class="fa fa-car"></i> 2 seaters</span>
                                    <span class="ml-2"><i class="fa fa-suitcase"></i> 1 bags</span>
                                    <span class="ml-2"><i class="fa fa-cloud"></i> AC</span>
                                </p>

                            </div>
                        </div>
                        <div class="col-md-3">
                            <p class="text-black text-heading">&#8377; 70000</p>
                            <button class="btn btn-warning text-uppercase">Book Now</button>
                        </div>
                    </div>
                    <hr class="border-warning">
                </div>
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
                    type: 'city', // Search only for cities names
                    aroundLatLngViaIP: false // disable the extra search/boost around the source IP
                });
            }
        });
    </script>
@endsection