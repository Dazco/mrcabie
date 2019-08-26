@extends('layouts.admin')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800 text-uppercase">{{$driver->name}}</h1>
        <div class="row">

            <!-- Total Jobs -->
            <div class="col-xl-6 col-md-6 mb-4">
                <div class="card border-left-danger shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Total Jobs
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$driver->total_rides}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-comments fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Earnings -->
            <div class="col-xl-6 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Earnings
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">&#8377; {{$driver->total_earnings}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--Posts-->
        <div class="row">
            <div class="col-md-12">
                <div class="reg-form">
                    <div class="card">
                        <h3 class="card-header">Completed Rides</h3>
                        <div class="card-body">
                            <h5 class="card-title"></h5>
                            @if(count($rides)>0)
                                @foreach($rides as $ride)
                                    Ride #{{$ride->id}}
                                    <div class="card mb-3">
                                        <div class="card-header">
                                            <span class="float-left text-danger font-weight-bold">{{strtoupper($ride->client->name)}}</span>
                                            <span class="float-right text-success">&#8377; {{$ride->total_amount}}</span>
                                        </div>
                                        <div class="card-body">
                                            <small class="font-weight-bold">PICK UP</small>
                                            <p class="text-dark font-weight-bolder">{{$ride->pickup_address}}</p>
                                            <hr>
                                            <small class="font-weight-bold">DROP OFF</small>
                                            <p class="text-dark font-weight-bolder">{{$ride->drop_address}}</p>
                                        </div>
                                        <div class="card-footer">
                                            <p class="text-center text-danger">Completed {{$ride->updated_at->diffForHumans()}}
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                                {{$rides->links()}}
                            @else
                                <h4 class="text-danger">This driver hasn't completed any Job yet</h4>
                            @endif
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