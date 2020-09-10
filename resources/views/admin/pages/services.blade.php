@extends("layouts.admin")

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Services</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-md-9">
            @include("includes.session_flash")
            @include("includes.form_error")
            <form action="{{action('Admin\AdminPagesController@services_post')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    {!! Form::label('local','Local Cab Service:') !!}
                    {!! Form::textarea('local',old('local', $services?$services->local:null),['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('outstation','Outstation Cab Service:') !!}
                    {!! Form::textarea('outstation',old('outstation', $services?$services->outstation:null),['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('oneway','Oneway Cab Service:') !!}
                    {!! Form::textarea('oneway',old('oneway', $services?$services->oneway:null),['class'=>'form-control']) !!}
                </div>

                <button type="submit" class="btn btn-danger btn-lg mt-3 col-4">Submit</button>
            </form>
        </div>
    </div>
@endsection
