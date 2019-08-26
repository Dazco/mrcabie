@extends('layouts.driver')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Ride #{{$ride->id}}</h1>

        <!--Posts-->
        <div class="row">
            <div class="col-md-12">
                <div class="reg-form">
                    <div class="card">
                        <h3 class="card-header">{{strtoupper($ride->ride_type)}} RIDE <span
                                    class="text-danger">({{strtoupper($ride->category->name)}})</span></h3>
                        <div class="card-body">
                            <h5 class="card-title"></h5>
                            <div class="container-fluid font-weight-bold">
                                @include('includes.session_flash')
                                @include('includes.form_error')
                                <h3 class="mb-4">Ride Details</h3>
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
                                @if($bid)
                                    @if($bid->status == "PENDING" && $ride->ride_status == "BOOKED")
                                        <h4 class="mt-5 text-center text-danger">You have already applied for this
                                            ride.</h4>
                                        <p class="text-center mt-5"><a href="{{route("driver.rides.withdraw", $bid->id)}}"
                                                                  type="button" class="btn btn-danger col-sm-6"
                                                                  onclick="if(!confirm('Do you really want to withdraw your bid for this ride?')) return false;">Withdraw Bid
                                                </a></p>
                                    @elseif($bid->status == "APPROVED" && $ride->ride_status == "APPROVED")
                                        <p class="text-center"><a href="{{route("driver.rides.start", $bid->id)}}"
                                                                  type="button" class="btn btn-success col-sm-6"
                                                                  onclick="if(!confirm('Do you really want to start this ride?')) return false;">Start
                                                Ride</a></p>
                                        <p class="text-center mt-5"><a href="{{route("driver.rides.withdraw", $bid->id)}}"
                                                                  type="button" class="btn btn-danger col-sm-6"
                                                                  onclick="if(!confirm('Do you really want to withdraw your bid for this ride?')) return false;">Withdraw Bid
                                                </a></p>
                                    @elseif($bid->status == "STARTED" && $ride->ride_status == "STARTED")
                                        <p class="text-center"><a href="{{route("driver.rides.end", $bid->id)}}"
                                                                  type="button" class="btn btn-danger col-sm-6"
                                                                  onclick="if(!confirm('Do you really want to end this ride?')) return false;">End
                                                Ride</a></p>
                                    @elseif($bid->status == "ENDED" && $ride->ride_status == "ENDED")
                                        <h3 class="mt-5 text-center text-danger">This Ride has been closed</h3>
                                    @endif
                                @else
                                    <p class="text-center"><a href="{{route("driver.rides.apply", $ride->id)}}"
                                                              type="button" class="btn btn-outline-success col-sm-6"
                                                              onclick="if(!confirm('Do you really want to apply for this ride?')) return false;">Apply</a>
                                    </p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End of Categories-->

    </div>
    <!-- /.container-fluid -->
@endsection

@section('scripts')
@endsection