@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Add Image to Slideshow</h1>

        <!--Upload Image-->
        {!! Form::open(['method'=>'POST','action'=>'Admin\AdminSlideshowController@store','files'=>true]) !!}
        @include('includes.form_error')
        <div class="custom-file mb-3">
            {!! Form::label('photo','Image:',['class'=>'custom-file-label']) !!}
            {!! Form::file('photo',['class'=>['custom-file-input','readUrl']]) !!}
        </div>
        <figure class="mt-5">
            <img height="250" width="500" src="https://via.placeholder.com/500x250" alt="Image" class="img-responsive" id="renderImage">
        </figure>
        <a class="revertUrl btn btn-danger aligncenter text-white mb-3 col-sm-3 text-center btn-link">Remove</a>
    {!! Form::submit('Add Image',['class'=>'btn btn-primary float-right']) !!}
    {!! Form::close() !!}
        <!--End of upload Image-->

    </div>
    <!-- /.container-fluid -->
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