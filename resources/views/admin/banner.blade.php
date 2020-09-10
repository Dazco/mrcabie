@extends("layouts.admin")

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Homepage Banner</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-md-9">
            @include("includes.session_flash")
            @include("includes.form_error")
            <form action="{{action('Admin\AdminController@banner_post', $banner?$banner->id:'null')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="custom-file mb-3">
                    {!! Form::label('photo','Background Image:',['class'=>'custom-file-label']) !!}
                    {!! Form::file('photo',['class'=>['custom-file-input','readUrl']]) !!}
                </div>
                <figure class="mt-5">
                    <img height="250" width="500" src="{{$banner?$banner->image:'https://via.placeholder.com/500x250'}}" alt="Image" class="img-responsive" id="renderImage">
                </figure>
                <a class="revertUrl btn btn-danger aligncenter text-white mb-3 col-sm-3 text-center btn-link">Remove</a>

                <div class="form-group">
                    {!! Form::label('small_heading','Small Heading:') !!}
                    {!! Form::text('small_heading',old('small_heading', $banner?$banner->small_heading:null),['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('big_heading','Big Heading:') !!}
                    {!! Form::text('big_heading',old('big_heading', $banner?$banner->big_heading:null),['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('paragraph','Paragraph:') !!}
                    {!! Form::textarea('paragraph',old('paragraph', $banner?$banner->paragraph:null),['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('is_clear','Hide Image?:') !!}
                    {!! Form::select('is_clear',[0 =>'Yes', 1=>'No'],old('is_clear', $banner?$banner->is_clear:null),['class'=>'custom-select']) !!}
                </div>

                <button type="submit" class="btn btn-danger btn-lg mt-3 col-4">Submit</button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function readURL(input,img) {
            var fileTypes = ['jpg', 'jpeg', 'png'];  //acceptable file types
            if (input.files && input.files[0]) {
                var extension = input.files[0].name.split('.').pop().toLowerCase(); //file extension from input file
                if(fileTypes.indexOf(extension) > -1)
                {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $(img)
                            .attr('src', e.target.result)
                        // .width(350)
                        // .height(200);
                    };
                    reader.readAsDataURL(input.files[0]);
                }else{
                    alert("Invalid photo")
                }
            }
        }
        function revertURL(img,src) {
            $(img).attr('src', src)
        }
        $(document).on('click','.revertUrl',function(){
            revertURL('#renderImage',"https://via.placeholder.com/500x250");
        });
        $(document).on('change','.readUrl',function(){
            readURL(this,'#renderImage');
        });
    </script>
@endsection
