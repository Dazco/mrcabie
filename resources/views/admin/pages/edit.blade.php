@extends("layouts.admin")

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit {{ucfirst($type)}} Page</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-md-9">
            @include("includes.session_flash")
            @include("includes.form_error")
            <form action="{{action('Admin\AdminPagesController@page_post', $type)}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    {!! Form::label('content','Content:') !!}
                    {!! Form::textarea('content',old('content', $page?$page->content:null),['class'=>'form-control']) !!}
                </div>

                <button type="submit" class="btn btn-danger btn-lg mt-3 col-4">Submit</button>
            </form>
        </div>
    </div>
@endsection
