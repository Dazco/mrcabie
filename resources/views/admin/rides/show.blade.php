@extends('layouts.admin')

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

                                <hr>
                                @if($bid)
                                    <h3 class="my-4">Driver Details</h3>
                                    <div class="card mb-3">
                                        <div class="card-header">
                                            <span class="float-left font-weight-bold"><a class="text-success"
                                                                                         href="{{route('admin.drivers.show', $bid->driver->id)}}">{{strtoupper($bid->driver->name)}}</a> <span
                                                        class="text-danger">({{$bid->driver->car->model}})</span></span>
                                            <span class="float-right text-success">{{$bid->driver->car->category->name}}</span>
                                        </div>
                                        <div class="card-body">
                                            <small class="font-weight-bold">PHONE NO</small>
                                            <p class="text-dark font-weight-bolder">{{$bid->driver->phone}}</p>
                                            <hr>
                                            <small class="font-weight-bold">EMAIL</small>
                                            <p class="text-dark font-weight-bolder">{{$bid->driver->email}}</p>
                                            @if($bid->status == "APPROVED" && $ride->status == "APPROVED")
                                                <p class="text-center p-0 m-0"><a
                                                            href="{{route('admin.rides.bid.change', $bid->id)}}"
                                                            class="btn btn-outline-danger col-sm-6"
                                                            onclick="if(!confirm('Do you really want to change the driver for this ride?')) return false;">Change</a>
                                                </p>
                                            @endif
                                        </div>
                                        <div class="card-footer">
                                            @if($bid->status == "APPROVED" && $ride->ride_status == "APPROVED")
                                                <p class="text-center text-success">
                                                    Approved {{$bid->updated_at->diffForHumans()}}</p>
                                            @elseif($bid->status == "STARTED" && $ride->ride_status == "STARTED")
                                                <p class="text-center text-success">
                                                    Started {{$bid->updated_at->diffForHumans()}}</p>
                                            @elseif($bid->status == "ENDED" && $ride->ride_status == "ENDED")
                                                <p class="text-center text-danger">
                                                    Ended {{$bid->updated_at->diffForHumans()}}</p>
                                            @endif
                                        </div>
                                    </div>
                                @else
                                    @if(count($ride->bids)>0)
                                        @foreach($ride->bids as $bid)
                                            <h3 class="my-4">Bids</h3>
                                            <div class="card mb-3">
                                                <div class="card-header">
                                                    <span class="float-left font-weight-bold"><a
                                                                class="text-success    "
                                                                href="{{route('admin.drivers.show', $bid->driver->id)}}">{{strtoupper($bid->driver->name)}}</a> <span
                                                                class="text-danger">({{$bid->driver->car->model}}
                                                            )</span></span>
                                                    <span class="float-right text-success">{{$bid->driver->car->category->name}}</span>
                                                </div>
                                                <div class="card-body">
                                                    <small class="font-weight-bold">PHONE NO</small>
                                                    <p class="text-dark font-weight-bolder">{{$bid->driver->phone}}</p>
                                                    <hr>
                                                    <small class="font-weight-bold">EMAIL</small>
                                                    <p class="text-dark font-weight-bolder">{{$bid->driver->email}}</p>
                                                    <p class="text-center p-0 m-0"><a
                                                                href="{{route('admin.rides.bid.select', $bid->id)}}"
                                                                class="btn btn-outline-success col-sm-6"
                                                                onclick="if(!confirm('Do you really want to select this driver?')) return false;">Select</a>
                                                    </p>
                                                </div>
                                                <div class="card-footer">
                                                    <p class="text-center text-danger"><i
                                                                class="fa fa-user-clock"></i> {{$bid->created_at->diffForHumans()}}
                                                    </p>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <h3 class="text-danger">There are no bids submitted for this ride yet.</h3>
                                    @endif
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