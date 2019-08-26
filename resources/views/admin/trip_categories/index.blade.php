@extends('layouts.admin')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Trip Categories</h1>

        <!--Posts-->
        <div class="row">
            <div class="col-md-12">
                <div class="card striped-tabled-with-hover">
                    <div class="card-header ">
                        <h4 class="card-title">All Trip Categories</h4>
                        <p class="card-category">These are all the categories of trips on the site</p>
                    </div>
                    @include('includes.session_flash')
                    <div class="card-body table-full-width table-responsive">
                        <table class="table table-hover table-striped" id="all_trip_categories">
                            <thead>
                            <tr>
                                <th>S/N</th>
                                <th><i class="fas fa-car"></i> Name</th>
                                <th><i class="fas fa-car"></i> Car</th>
                                <th><i class="fas fa-users"></i> Seats</th>
                                <th><i class="fas fa-briefcase"></i> Bags</th>
                                <th><i class="fas fa-money-bill-alt"></i> Waiting Charge</th>
                                <th><i class="fas fa-money-bill-alt"></i> Extra KM Charge</th>
                                <th><i class="fas fa-calendar"></i> Created At</th>
                                <th><i class="fas fa-calendar"></i> Updated At</th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($categories)
                                @for($i= 1;$i<=count($categories);$i++)
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td>{{strtoupper($categories[$i-1]->name)}}</td>
                                        <td>{{strtoupper($categories[$i-1]->car)}}</td>
                                        <td>{{strtoupper($categories[$i-1]->seats)}}</td>
                                        <td>{{strtoupper($categories[$i-1]->bags)}}</td>
                                        <td>{{strtoupper($categories[$i-1]->waiting)}}</td>
                                        <td>{{strtoupper($categories[$i-1]->extra_dist)}}</td>
                                        <td>{{$categories[$i-1]->created_at->diffForHumans()}}</td>
                                        <td>{{$categories[$i-1]->updated_at->diffForhumans()}}</td>
                                        <td><a href="{{route("admin.categories.edit", $categories[$i-1]->id)}}">Edit</a></td>
                                        <td>
                                            {{Form::open(['method'=>'DELETE', 'action'=>['Admin\AdminTripCategoryController@destroy', $categories[$i-1]->id], 'onsubmit'=>"return confirm('Do you really want to delete this Category?')"])}}
                                                <button type="submit" class="btn-danger">Delete</button>
                                            {{Form::close()}}
                                        </td>
                                    </tr>
                                @endfor
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--End of Categories-->

    </div>
    <!-- /.container-fluid -->
@endsection

@section('scripts')
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/b-1.5.4/b-print-1.5.4/kt-2.5.0/r-2.2.2/sc-1.5.0/datatables.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#all_trip_categories').DataTable();
        });
    </script>
@endsection