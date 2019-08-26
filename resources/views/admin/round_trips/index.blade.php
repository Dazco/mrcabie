@extends("layouts.admin")

@section('content')
    @include('includes.form_error')
    <h1>Round Trip</h1>
    @if(count($categories)>0)
        {!! Form::open(['method'=>'POST','action'=>['Admin\AdminRoundTripController@store']])!!}
        @foreach($categories as $category)
            <?php $trip = App\RoundTrip::where("trip_category_id", $category->id)->first() ?>
            @if($trip)
                <label>{{strtoupper($category->name)}}</label>
                <div class="form-group row pt-3">
                    <label for="dist.category.{{$category->id}}" class="col-sm-2 col-form-label">Base Distance</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                KM
                            </div>
                        </div>
                        <input type="text" class="form-control" id="dist.category.{{$category->id}}" name="dist.category.{{$category->id}}"
                               value="{{ $trip->base_distance }}" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label for="base.category.{{$category->id}}">Base Price</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                &#8377;
                            </div>
                        </div>
                        <input type="number" name="base.category.{{$category->id}}" id="base.category.{{$category->id}}" class="form-control" value="{{$trip->base_amount}}" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label for="extra.category.{{$category->id}}">Extra Km Price</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                &#8377;
                            </div>
                        </div>
                        <input type="number" name="extra.category.{{$category->id}}" id="extra.category.{{$category->id}}" class="form-control" value="{{$trip->extra_amount}}" disabled>
                    </div>
                </div>
            @else
                <label>{{strtoupper($category->name)}}</label>
                <div class="form-group row pt-3">
                    <label for="dist.category.{{$category->id}}" class="col-sm-2 col-form-label">Base Distance</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                KM
                            </div>
                        </div>
                        <input type="text" class="form-control" id="dist.category.{{$category->id}}" name="dist.category.{{$category->id}}"
                               value="" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label for="base.category.{{$category->id}}">Base Price</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                &#8377;
                            </div>
                        </div>
                        <input type="number" name="base.category.{{$category->id}}" id="base.category.{{$category->id}}" class="form-control" value="" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label for="extra.category.{{$category->id}}">Extra Km Price</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                &#8377;
                            </div>
                        </div>
                        <input type="number" name="extra.category.{{$category->id}}" id="extra.category.{{$category->id}}" class="form-control" value="" disabled>
                    </div>
                </div>
            @endif
        @endforeach
        <div class="form-group pb-5">
            <a class="btn btn-primary col-sm-3 float-left mb-3 mb-md-0"
               id="edit" href="#">Edit</a>
            <a class="btn btn-danger col-sm-3 float-left mb-3 mb-md-0"
               id="cancel" href="#" style="display: none;">Cancel</a>
            <button type="submit" class="btn btn-success col-sm-3 float-right mb-3 mb-md-0"
                    id="submit" style="display: none;">Submit</button>
        </div>
        {!! Form::close() !!}
    @else
        <h3 class="mt-4 text-dark">Please Add a Trip Category before proceeding</h3>
    @endif

@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/places.js@1.16.4"></script>
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
            document.querySelectorAll("input, textarea").forEach((input) => {
                input.setAttribute("disabled", "disabled");
            });
            $("#cancel").fadeOut('slow', () => {
                $("#edit").fadeIn('slow');
            });
            $("#submit").fadeOut('slow');
        });
    </script>
@endsection