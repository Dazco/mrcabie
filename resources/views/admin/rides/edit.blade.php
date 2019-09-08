@extends("layouts.admin")

@section('content')
    {!! Form::open(['method'=>'DELETE','action'=>['Admin\AdminRideController@destroy',$ride->id], 'id'=>'delete-form'])!!}
    {!! Form::close() !!}
    <div class="col-md-7 ml-md-5">
        <h2 class="mb-3">Ride #{{$ride->id}}</h2>
        {!! Form::open(['method'=>'PATCH','action'=>['Admin\AdminRideController@update',$ride->id]])!!}
        @include("includes.form_error")
        @include("includes.session_flash")
            <div class="form-group">
                <label for="pickup_address">Full Pickup Address</label>
                <input type="text" name="pickup_address" placeholder="Full Pickup Address" value="{{$ride->pickup_address}}" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Full Pickup Address'" required class="autocomplete form-control" disabled>
            </div>
            <div class="form-group">
                <label for="pickup_date">Pickup Date</label>
                <input type="date" name="pickup_date" placeholder="Pickup Date" value="{{$ride->pickup_date}}" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Pickup Date'" required class="form-control" disabled>
            </div>
            <div class="form-group">
                <label for="pickup_time">Pickup Time</label>
                <input type="time" name="pickup_time" placeholder="Pickup Time" value="{{$ride->pickup_time}}" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Pickup Time'" required class="form-control" disabled>
            </div>
            <div class="form-group">
                <label for="drop_address">Full Drop Address</label>
                <input type="text" name="drop_address" placeholder="Full Drop Address" value="{{$ride->drop_address}}" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Full Drop Address'" required class="form-control autocomplete" disabled>
            </div>
        @if($ride->ride_type == "round")
            <div class="form-group">
                <label for="return_date">Return Date</label>
                <input type="date" name="return_date" placeholder="Return Date" value="{{$ride->return_date}}" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Return Date'" required class="form-control" disabled>
            </div>
            <div class="form-group">
                <label for="return_time">Return Time</label>
                <input type="time" name="return_time" placeholder="Return Time" value="{{$ride->return_time}}" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Return Time'" required class="form-control" disabled>
            </div>
        @endif

            <div class="form-group">
                <label for="requests">Additional Requests</label>
                <textarea name="requests" class="form-control" placeholder="Additional Requests?" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Additional Requests?'" disabled>{{$ride->requests}}</textarea>
            </div>

            <div class="form-group pb-5">
                <a class="btn btn-primary col-sm-3 float-left mb-3 mb-md-0"
                   id="edit" href="#">Edit</a>
                <a class="btn btn-danger col-sm-3 float-left mb-3 mb-md-0"
                   id="cancel" href="#" style="display: none;">Cancel</a>
                <a class="btn btn-danger col-sm-3 float-right" data-toggle="tab"
                   href="#"
                   id="delete" onclick="
                event.preventDefault();
                if(confirm('Do you really want to cancel this ride?')) document.getElementById('delete-form').submit();
               ">Delete</a>
                <button type="submit" class="btn btn-success col-sm-3 float-right mb-3 mb-md-0"
                        id="submit" style="display: none;">Submit</button>
            </div>
        </form>
    </div>

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
                    type: ['address'], // Search only for cities names
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