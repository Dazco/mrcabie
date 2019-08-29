@extends('layouts.admin')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Slideshow</h1>

        <!--Posts-->
        <div class="row">
            <div class="col-md-12">
                <div class="card striped-tabled-with-hover">
                    <div class="card-header ">
                        <h4 class="card-title">All Images</h4>
                        <p class="card-category">These are all the images of your slideshow</p>
                    </div>
                    @include('includes.session_flash')
                    {!! Form::open(['method'=>'POST','action'=>'Admin\AdminSlideshowController@multiDestroy','onsubmit'=>"return confirm('Do you really want to remove this image from the slideshow?')"]) !!}
                    <div class="card-body table-full-width table-responsive">
                        <table class="table table-hover table-striped" id="all_media">
                            <thead>
                            <tr>
                                <th>
                                    <div class="form-check">
                                        {!! Form::checkbox('delete-all',null,false,['class'=>'form-check','id'=>'delete-all']) !!}
                                        {!! Form::label('delete-all','Select All',['class'=>'form-check-label delete-all-label']) !!}
                                    </div>
                                </th>
                                <th>S/N</th>
                                <th><i class="fas fa-image"></i> Image</th>
                                <th><i class="fas fa-calendar-alt"></i> Created</th>
                                <th>
                                    {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($media)
                                @for($i= 1;$i<=count($media);$i++)
                                    <tr>
                                        <td>{!! Form::checkbox('delete-me[]',$media[$i-1]->id,false,['class'=>'form-check delete-me']) !!}</td>
                                        <td>{{$i}}</td>
                                        <td><img src="{{$media[$i-1]->image}}" alt="" height="50" width="80"></td>
                                        <td>{{$media[$i-1]->created_at->diffForHumans()}}</td>
                                        <td></td>
                                    </tr>
                                @endfor
                            @endif
                            </tbody>
                        </table>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <!--End of Media-->

    </div>
    <!-- /.container-fluid -->
@endsection

@section('scripts')
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/b-1.5.4/b-print-1.5.4/kt-2.5.0/r-2.2.2/sc-1.5.0/datatables.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#all_media').DataTable();

            $('#delete-all').change(function(){
                if($(this).is(':checked')) {
                    // Checkbox is checked..
                    $('.delete-me').prop('checked', true);
                    $('.delete-all-label').html('Unselect All');
                } else {
                    // Checkbox is not checked..
                    $('.delete-me').prop('checked', false);
                    $('.delete-all-label').html('Select All');
                }
            });
        });
    </script>
@endsection