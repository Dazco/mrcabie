@extends('layouts.driver')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Vehicle</h1>

        <!--Posts-->
        <div class="row">
            <div class="col-md-12">
                <div class="reg-form">
                    <div class="card">
                        <h3 class="card-header">Manage Your Vehicle</h3>
                        <div class="card-body">
                            <h5 class="card-title"></h5>
                            {!! Form::open(['method'=>'POST','action'=>'Driver\DriverVehicleController@store']) !!}
                                @include('includes.session_flash')
                                @include('includes.form_error')
                            @if($categories)
                                <div class="form-group row pt-3">
                                    <label for="category" class="col-sm-2 col-form-label">Car Category</label>
                                    <div class="col-sm-6 contact-form">
                                        <select name="category_id" disabled id="category" class="custom-select">
                                            <option value="">Choose Category</option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}" {{old("category_id", ($car && $car->category_id)?$car->category->id:'')==$category->id?'selected':''}}>{{strtoupper($category->name)}} ({{$category->car}})</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            @endif
                            <div class="form-group row pt-3">
                                <label for="car_model" class="col-sm-2 col-form-label">Car Model</label>
                                <div class="col-sm-6 contact-form">
                                    <input name="model" type="text" class="form-control text-success font-weight-bold" id="car_model"
                                           value="{{old("model", ($car &&$car->model)?$car->model:'')}}" disabled>
                                </div>
                            </div>
                            <div class="form-group row pt-3">
                                <label for="plate_number" class="col-sm-2 col-form-label">Plate Number</label>
                                <div class="col-sm-6 contact-form">
                                    <input name="plate_number" type="text" class="form-control text-success font-weight-bold" id="plate_number"
                                           value="{{old("plate_number", ($car && $car->plate_number)?$car->plate_number:'')}}" disabled>
                                </div>
                            </div>
                            <div class="form-group pb-5">
                                <a class="btn btn-primary col-sm-3 float-left mb-3 mb-md-0"
                                   id="edit" href="#">Edit</a>
                                <a class="btn btn-danger col-sm-3 float-left mb-3 mb-md-0"
                                   id="cancel" href="#" style="display: none;">Cancel</a>
                                <button type="submit" class="btn btn-success col-sm-3 float-right mb-3 mb-md-0"
                                        id="submit" style="display: none;">Submit</button>
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
    <script>
        $(document).on("click", "#edit", (e) => {
            e.preventDefault();
            document.querySelectorAll("input, textarea, select, .add").forEach((input) => {
                input.removeAttribute("disabled");
            });
            $("#edit").fadeOut('slow', () => {
                $("#cancel").fadeIn('slow');
                $("#submit").fadeIn('slow');
            });
        });
        $(document).on("click", "#cancel", (e) => {
            e.preventDefault();
            document.querySelectorAll("input, textarea, select").forEach((input) => {
                input.setAttribute("disabled", "disabled");
            });
            $("#cancel").fadeOut('slow', () => {
                $("#edit").fadeIn('slow');
            });
            $("#submit").fadeOut('slow');
        });
    </script>
@endsection