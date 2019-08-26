@extends('layouts.admin')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Add Trip</h1>

        <!--Add Trip-->
        {!! Form::open(['method'=>'POST','action'=>'Admin\AdminTripController@store']) !!}
        @include('includes.form_error')
        <div class="form-group">
            {!! Form::label('source','Source:') !!}
            {!! Form::text('source',null,['class'=>'form-control autocomplete']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('destination','Destination:') !!}
            {!! Form::text('destination',null,['class'=>'form-control autocomplete']) !!}
        </div>
        @if(count($categories) > 0)
            <h2>Prices</h2>
            @foreach($categories as $category)
                <div class="form-group">
                    <label for="category.{{$category->id}}">{{strtoupper($category->name)}}</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                &#8377;
                            </div>
                        </div>
                        <input type="number" name="category.{{$category->id}}" id="category.{{$category->id}}" class="form-control">
                    </div>
                </div>
            @endforeach
        @endif
    {!! Form::submit('Add Trip',['class'=>'btn btn-primary float-right']) !!}
    {!! Form::close() !!}
    <!--End of Add Trip-->

    </div>
    <!-- /.container-fluid -->
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/places.js@1.16.4"></script>
    <script>
        $(document).ready(()=>{
            for (container of document.querySelectorAll(".autocomplete")){
                places({
                    appId: 'plCISBIJPEJ6',
                    apiKey: '4026e03ec5b0b25deedd7d3e41c0e5d9',
                    container: container,
                }).configure({
                    countries: ['in'], // Search in India
                    type: 'city', // Search only for cities names
                    aroundLatLngViaIP: false // disable the extra search/boost around the source IP
                });
            }
        });
    </script>
@endsection