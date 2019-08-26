@extends('layouts.admin')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Edit Trip Category</h1>

        <!--Edit Trip Category-->
        {!! Form::model($category,['method'=>'PATCH','action'=>['Admin\AdminTripCategoryController@update', $category->id]]) !!}
        @include('includes.form_error')
        <div class="form-group">
            {!! Form::label('name','Name:') !!}
            {!! Form::text('name',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('car','Car Type:') !!}
            {!! Form::text('car',null,['class'=>'form-control']) !!}
        </div>
        <div class="custom-file mb-3">
            {!! Form::label('photo','Car Image:',['class'=>'custom-file-label']) !!}
            {!! Form::file('photo',['class'=>['custom-file-input','readUrl']]) !!}
        </div>
        <figure class="mt-5">
            <img height="250" width="500" src="{{$category->image}}" alt="Image" class="img-responsive" id="renderImage">
        </figure>
        <a class="revertUrl btn btn-danger aligncenter text-white mb-3 col-sm-3 text-center btn-link">Remove</a>

        <div class="form-group">
            {!! Form::label('seats','No of Seats:') !!}
            {!! Form::number('seats',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('bags','No of Bags:') !!}
            {!! Form::number('bags',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            <label for="waiting">Waiting Charge</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        &#8377;
                    </div>
                </div>
                {!! Form::number('waiting',null,['class'=>'form-control']) !!}
            </div>
        </div>
        <div class="form-group">
            <label for="extra_dist">Extra KM Charge</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        &#8377;
                    </div>
                </div>
                {!! Form::number('extra_dist',null,['class'=>'form-control']) !!}
            </div>
        </div>
    {!! Form::submit('Edit Category',['class'=>'btn btn-primary float-right']) !!}
    {!! Form::close() !!}
    <!--End of Edit Trip Category-->

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