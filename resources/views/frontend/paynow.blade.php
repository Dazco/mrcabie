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
                    <div class="card border-0 mt-3">
                        <div class="row no-gutters">
                            <div class="col-3 d-flex align-items-center">
                                <img src="{{url('img/indigo.png')}}" class="card-img" alt="Indigo">
                            </div>
                            <div class="col-md-9">
                                <div class="card-body">
                                    <h3 class="card-title">Cabie Comfort</h3>
                                    <h6 class="card-title">Suv</h6>
                                    <p class="card-text">
                                        <span class="ml-2">6 seaters</span> |
                                        <span class="ml-2">4 bags</span> |
                                        <span class="ml-2">AC</span>
                                    </p>

                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="w-100">
                    <span class="mt-3 text-dark text-heading font-weight-bold">Goa <i class="text-warning fa fa-arrow-circle-right"></i> Mumbai</span><br>
                    04 Jul 2019<br>
                    <span class="font-weight-bold">Pickup Time: </span> 6:45 PM

                    <h3 class="font-weight-bold mt-3 mb-3">Fare Details</h3>
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
                <form action="#">
                    {{Form::token()}}
                    <div class="mt-10">
                        <input type="text" name="name" placeholder="Full Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Full Name'" required class="single-input border border-warning">
                    </div>
                    <div class="mt-30">
                        <input type="email" name="email" placeholder="Email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email address'" required class="single-input border border-warning">
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
                        <textarea class="single-textarea border border-warning" placeholder="Additional Requests?" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Additional Requests?'"></textarea>
                    </div>
                    <div class="mt-10">
                        <button type="submit" class="btn btn-secondary col-5 mb-3">Pay Advance &#8377; 3000</button>
                        <button type="submit" class="btn btn-warning col-5 float-right mb-3">Pay Full &#8377; 7000</button>
                    </div>
                </form>
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