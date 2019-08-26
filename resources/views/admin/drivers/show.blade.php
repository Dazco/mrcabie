@extends('layouts.admin')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Drivers</h1>

        <!--Posts-->
        <div class="row">
            <div class="col-md-12">
                <div class="reg-form">
                    <div class="card">
                        <h3 class="card-header">Manage Driver - <span class="text-dark">{{$driver->name}}</span></h3>
                        <div class="card-body">
                            <h5 class="card-title"></h5>
                            <div class="form-group row pt-3">
                                @include('includes.session_flash')
                                @include('includes.form_error')
                            </div>
                            <h3>Personal Details</h3>
                            <div class="form-group row pt-3">
                                <label for="status" class="col-sm-2 col-form-label">Status</label>
                                <div class="col-sm-6 contact-form">
                                    <input type="text" class="form-control text-dark font-weight-bold" id="status"
                                           value="{{$driver->status}}" disabled>
                                    <div class="col-sm-12 mt-3">
                                        @if(! $driver->is_approved)
                                            {!! Form::open(['method'=>'PATCH','action'=>['Admin\AdminDriverController@update',$driver->id],'onsubmit'=>"return confirm('Do you really want to approve $driver->name')"]) !!}
                                            <input type="hidden" name="is_approved" value="1">
                                            <input type="hidden" name="is_active" value="1">
                                            <button class="btn btn-outline-danger mt-3 mt-sm-0 col-sm-6">Approve Driver</button>
                                            {!! Form::close() !!}
                                        @else
                                            @if($driver->is_active)
                                                {!! Form::open(['method'=>'PATCH','action'=>['Admin\AdminDriverController@update',$driver->id],'onsubmit'=>"return confirm('Do you really want to disable $driver->name')"]) !!}
                                                <input type="hidden" name="is_active" value="0">
                                                <button class="btn btn-outline-danger mt-3 mt-sm-0 col-sm-6">Disable Driver</button>
                                                {!! Form::close() !!}
                                            @else
                                                {!! Form::open(['method'=>'PATCH','action'=>['Admin\AdminDriverController@update',$driver->id],'onsubmit'=>"return confirm('Do you really want to activate $driver->name')"]) !!}
                                                <input type="hidden" name="is_active" value="1">
                                                <button class="btn btn-outline-danger mt-3 mt-sm-0 col-sm-6">Activate Driver</button>
                                                {!! Form::close() !!}
                                            @endif
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row pt-3">
                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-6 contact-form">
                                    <input type="text" class="form-control text-dark font-weight-bold" id="address"
                                           value="{{$driver->email}}" disabled>
                                </div>
                            </div>
                            <div class="form-group row pt-3">
                                <label for="address" class="col-sm-2 col-form-label">Address</label>
                                <div class="col-sm-6 contact-form">
                                    <input type="text" class="form-control text-dark font-weight-bold" id="address"
                                           value="{{$driver->address}}" disabled>
                                </div>
                            </div>
                            <div class="form-group row pt-3">
                                <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                                <div class="col-sm-6 contact-form">
                                    <input type="text" class="form-control text-dark font-weight-bold" id="phone"
                                           value="{{$driver->phone}}" disabled>
                                </div>
                            </div>

                            <hr class="my-5">
                            <h3 class="mt-5">Car Details</h3>
                            @if($driver->car)
                                <div class="form-group row pt-3">
                                    <label for="car_category" class="col-sm-2 col-form-label">Car Category</label>
                                    <div class="col-sm-6 contact-form">
                                        <input type="text" class="form-control text-success font-weight-bold" id="car_category"
                                               value="{{strtoupper($driver->car->category->name)}}" disabled>
                                    </div>
                                </div>
                                <div class="form-group row pt-3">
                                    <label for="car_model" class="col-sm-2 col-form-label">Car Model</label>
                                    <div class="col-sm-6 contact-form">
                                        <input type="text" class="form-control text-success font-weight-bold" id="car_model"
                                               value="{{$driver->car->model}}" disabled>
                                    </div>
                                </div>
                                <div class="form-group row pt-3">
                                    <label for="plate_number" class="col-sm-2 col-form-label">Plate Number</label>
                                    <div class="col-sm-6 contact-form">
                                        <input type="text" class="form-control text-success font-weight-bold" id="plate_number"
                                               value="{{$driver->car->plate_number}}" disabled>
                                    </div>
                                </div>
                                <p class="text-center p-0 mt-5"><a href="{{route('admin.driver.history', $driver->id)}}" class="btn btn-outline-danger col-sm-6">Job History</a></p>
                            @else
                                <h5 class="text-danger">Driver hasn't registered a car yet.</h5>
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