@extends("layouts.admin")

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Read Before You Book Content</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-md-9">
            @include("includes.session_flash")
            @include("includes.form_error")
            <form action="{{route('admin.read_before_post', $content? $content->id: 'null')}}" method="post">
                {{csrf_field()}}
                <textarea class="content" name="content">{!! $content?$content->content:'' !!}</textarea>
                @include("includes.tinymce")

                <button type="submit" class="btn btn-danger btn-lg mt-3 col-4">Submit</button>
            </form>
        </div>
    </div>
@endsection