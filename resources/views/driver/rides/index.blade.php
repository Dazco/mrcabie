@extends('layouts.driver')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Rides</h1>

        <!--Posts-->
        <div class="row">
            <div class="col-md-12">
                <div class="reg-form">
                    <div class="card">
                        <h3 class="card-header">{{$page}} Rides</h3>
                        <div class="card-body">
                            <h5 class="card-title"></h5>
                            @if(auth()->guard('driver')->user()->has('car'))
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
                                                <p class="text-center p-0 m-0"><a href="{{route('driver.rides.show', $ride->id)}}" class="btn btn-success col-sm-6">View</a></p>
                                            </div>
                                            <div class="card-footer">
                                                <p class="text-center text-danger"><i class="fa fa-user-clock"></i> {{$ride->created_at->diffForHumans()}}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                    {{$rides->links()}}
                                @else
                                    <h4 class="text-danger">No Rides under this Category Available, Check back later</h4>
                                @endif
                            @else
                                <h4 class="text-danger">Please register a vehicle before bidding for rides.</h4>
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