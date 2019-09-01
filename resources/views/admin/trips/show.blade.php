@extends("layouts.admin")

@section('content')
    {!! Form::open(['method'=>'DELETE','action'=>['Admin\AdminTripController@destroy',$trip->id], 'id'=>'delete-form'])!!}
    {!! Form::close() !!}
    <h1>Trip</h1>
    {!! Form::open(['method'=>'PATCH','action'=>['Admin\AdminTripController@update',$trip->id]])!!}
    <div class="form-group row pt-3">
        <label for="source" class="col-sm-2 col-form-label">Source</label>
        <div class="col-sm-10 contact-form">
            <input type="text" class="form-control autocomplete" id="source" name="source"
                   value="{{ $trip->source}}" disabled>
        </div>
    </div>
    <div class="form-group row">
        <label for="destination" class="col-sm-2 col-form-label">Destination</label>
        <div class="col-sm-10 contact-form">
            <input type="text" class="form-control autocomplete" id="destination" name="destination"
                   value="{{$trip->destination}}" disabled>
        </div>
    </div>
    @if(count($categories) > 0)
        <h2>Prices</h2>
        @foreach($categories as $category)
            <?php $price = $trip->prices()->where("trip_category_id", $category->id)->first() ?>
            @if($price)
                <div class="form-group">
                    <label for="category.{{$category->id}}">{{strtoupper($category->name)}}</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                &#8377;
                            </div>
                        </div>
                        <input type="number" name="category.{{$category->id}}" id="category.{{$category->id}}" class="form-control" value="{{$price->amount}}" disabled>
                    </div>
                </div>
            @else
                <div class="form-group">
                    <label for="category.{{$category->id}}">{{strtoupper($category->name)}}</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                &#8377;
                            </div>
                        </div>
                        <input type="number" name="category.{{$category->id}}" id="category.{{$category->id}}" class="form-control" value="NOT SET" disabled>
                    </div>
                </div>
            @endif
        @endforeach
    @endif

    <div class="form-group pb-5">
        <a class="btn btn-primary col-sm-3 float-left mb-3 mb-md-0"
           id="edit" href="#">Edit</a>
        <a class="btn btn-danger col-sm-3 float-left mb-3 mb-md-0"
           id="cancel" href="#" style="display: none;">Cancel</a>
        <a class="btn btn-danger col-sm-3 float-right" data-toggle="tab"
           href="#"
           id="delete" onclick="
            event.preventDefault();
            if(confirm('Do you really want to delete this trip?')) document.getElementById('delete-form').submit();
           ">Delete</a>
        <button type="submit" class="btn btn-success col-sm-3 float-right mb-3 mb-md-0"
           id="submit" style="display: none;">Submit</button>
    </div>
    {!! Form::close() !!}

@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/places.js@1.16.4"></script>
    <script>
        $(document).ready(()=>{
        });
        $(document).on("click", "#edit", (e) => {
            e.preventDefault();
            for (container of document.querySelectorAll(".autocomplete")){
                places({
                    appId: 'plCISBIJPEJ6',
                    apiKey: '4026e03ec5b0b25deedd7d3e41c0e5d9',
                    container: container,
                }).configure({
                    countries: ['in'], // Search in India
                    type: ['city','airport','trainStation'], // Search only for cities names
                    aroundLatLngViaIP: false // disable the extra search/boost around the source IP
                });
            }
            document.querySelectorAll("input, textarea, select, .add").forEach((input) => {
                input.removeAttribute("disabled");
            });
            $("#edit").fadeOut('slow', () => {
                $("#cancel").fadeIn('slow');
            });
            $("#delete").fadeOut('slow', () => {
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
            $("#submit").fadeOut('slow', () => {
                $("#delete").fadeIn('slow');
            });
        });
    </script>
@endsection