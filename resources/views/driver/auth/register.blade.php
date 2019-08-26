@extends('layouts.frontend')

@section('title')
    Registration - Mr Cabie Driver
@endsection

@section('content')
    <!-- start banner Area -->
    <section class="banner-area relative about-banner" id="home">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white">
                        Driver Registration
                    </h1>
                    <p class="text-white link-nav"><a href="{{route('home')}}">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="{{route('register.driver')}}"> Driver Registration</a></p>
                </div>
            </div>
        </div>
    </section>
    <!-- End banner Area -->
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="reg-form">
                    <div class="card">
                        <div class="card-body text-black">
                            <h5 class="card-title"></h5>
                            <hr>
                            {!! Form::open(['method'=>'POST','action'=>'Auth\RegisterController@createDriver','files'=>true,'id'=>'register-form'])!!}
                            @include('includes.session_flash')
                            @include('includes.form_error')
                                <p class="lead mt-3 font-weight-bold">Please Fill in the following with the relevant details</p>
                                <div class="form-group row">
                                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10 contact-form">
                                        <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-sm-2 col-form-label">Email
                                        address</label>
                                    <div class="col-sm-10 contact-form">
                                        <input type="email" class="form-control" id="email"
                                               name="email" value="{{old('email')}}" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="phone" class="col-sm-2 col-form-label">Phone no</label>
                                    <div class="col-sm-10 contact-form">
                                        <input type="text" class="form-control" placeholder="" id="phone"
                                               name="phone" value="{{old('phone')}}" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="address" class="col-sm-2 col-form-label">Contact address</label>
                                    <div class="col-sm-10 contact-form">
                                        <input type="text" name="address" value="{{old('address')}}" class="form-control autocomplete" autocomplete="off" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password" class="col-sm-2 col-form-label">Password</label>
                                    <div class="col-sm-10 contact-form">
                                        <input type="password" class="form-control" id="password"
                                               name="password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password_confirmation" class="col-sm-2 col-form-label">Confirm Password</label>
                                    <div class="col-sm-10 contact-form">
                                        <input type="password" class="form-control" id="password_confirmation"
                                               name="password_confirmation" oninput="check(this)" required>
                                    </div>
                                </div>
                                <div class="form-group pb-sm-5">
                                    <input type="submit" class="btn btn-warning float-right col-sm-3" id="form-submit" value="Register">
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
            <br><br>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/places.js@1.16.4"></script>
    <script>
        function check(input) {
            if (input.value != document.getElementById('password').value) {
                input.setCustomValidity('Password Must be Matching.');
            } else {
                // input is valid -- reset the error message
                input.setCustomValidity('');
            }
        }
        const container = document.querySelector(".autocomplete");
        places({
            appId: 'plCISBIJPEJ6',
            apiKey: '4026e03ec5b0b25deedd7d3e41c0e5d9',
            container: container,
        }).configure({
            countries: ['in'], // Search in India
        });
    </script>
@endsection