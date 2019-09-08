@extends("layouts.frontend")

@section('title')
    Redirecting
@endsection

@section('content')
    <div class="container text-center align-self-center mt-120 pt-120 pb-120">
        <div class="row">
            @if($is_success)
                <h2 class="text-heading mb-3">Payment Successful</h2>
                <p>Your Ride has been successfully booked and a confirmation has been sent to your email.</p>

                <div class="card mt-20">
                    <h3 class="card-header">{{strtoupper($ride->ride_type)}} RIDE <span
                                class="text-danger">({{strtoupper($ride->category->name)}})</span></h3>
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        <div class="container-fluid font-weight-bold">
                            @include('includes.session_flash')
                            @include('includes.form_error')
                            <h3 class="mb-4">Ride Details</h3>
                            <p class="row mb-3">
                                <span class="col-sm-3">RIDE NUMBER </span>
                                <span class="col-sm-9 text-dark">#{{$ride->id}}</span>
                            </p>
                            <p class="row mb-3">
                                <span class="col-sm-3">PICK UP </span>
                                <span class="col-sm-9 text-dark">{{$ride->pickup_address}}</span>
                            </p>
                            <p class="row mb-3">
                                <span class="col-sm-3">DROP OFF </span>
                                <span class="col-sm-9 text-dark">{{$ride->drop_address}}</span>
                            </p>
                            <p class="row mb-3">
                                <span class="col-sm-3">PICKUP DATE / TIME  </span>
                                <span class="col-sm-9 text-danger">{{$ride->pickup_date}}
                                    / {{$ride->pickup_time}}</span>
                            </p>
                            @if($ride->ride_type == "round")
                                <p class="row mb-3">
                                    <span class="col-sm-3">RETURN DATE / TIME  </span>
                                    <span class="col-sm-9 text-danger">{{$ride->return_date}}
                                        / {{$ride->return_time}}</span>
                                </p>
                            @endif
                            <p class="row mb-3">
                                <span class="col-sm-3">TOTAL AMOUNT  </span>
                                <span class="col-sm-9 text-dark">&#8377; {{$ride->total_amount}}</span>
                            </p>
                            <p class="row mb-3">
                                <span class="col-sm-3">AMOUNT PAID </span>
                                <span class="col-sm-9 text-dark">&#8377; {{$ride->amount_paid}}</span>
                            </p>
                            <p class="row mb-3">
                                <span class="col-sm-3">AMOUNT  OWED</span>
                                <span class="col-sm-9 text-danger">&#8377; {{$ride->amount_owed}}</span>
                            </p>
                            <p class="row mb-3">
                                <span class="col-sm-3">REQUESTS</span>
                                <span class="col-sm-9 text-dark">{{$ride->requests?$ride->requests:"No Requests"}}</span>
                            </p>

                            <hr>
                            <h3 class="my-4">Client Details</h3>
                            <p class="row mb-3">
                                <span class="col-sm-3">NAME</span>
                                <span class="col-sm-9 text-dark">{{strtoupper($ride->client->name)}}</span>
                            </p>
                            <p class="row mb-3">
                                <span class="col-sm-3">EMAIL</span>
                                <span class="col-sm-9 text-dark">{{$ride->client->email}}</span>
                            </p>
                            <p class="row mb-3">
                                <span class="col-sm-3">PHONE NO.</span>
                                <span class="col-sm-9 text-danger">{{strtoupper($ride->client->phone)}}</span>
                            </p>
                        </div>
                    </div>
                </div>

            @else
                <h2 class="mb-3">OOPs!</h2>
                <p>{{$message}}</p>
            @endif
        </div>
    </div>
@endsection