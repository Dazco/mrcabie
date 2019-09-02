@extends('layouts.admin')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Trips</h1>

        <!--Posts-->
        <div class="row">
            <div class="col-md-12">
                <div class="card striped-tabled-with-hover">
                    <div class="card-header ">
                        <h4 class="card-title">All Trips</h4>
                        <p class="card-category">These are all the trips you cover</p>
                    </div>
                    @include('includes.session_flash')
                    <div class="card-body table-full-width table-responsive">
                        <table class="table table-hover table-striped" id="all_trips">
                            <thead>
                            <tr>
                                <th>S/N</th>
                                <th><i class="fas fa-location-arrow"></i> Source</th>
                                <th><i class="fas fa-location-arrow"></i> Destination</th>
                                <th><i class="fas fa-location-arrow"></i> Distance</th>
                                <th><i class="fas fa-clock"></i> Duration</th>
                                <th><i class="fas fa-calendar"></i> Created At</th>
                                <th><i class="fas fa-calendar"></i> Updated At</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($trips)
                                @for($i= 1;$i<=count($trips);$i++)
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td>{{ucfirst($trips[$i-1]->source)}}</td>
                                        <td>{{ucfirst($trips[$i-1]->destination)}}</td>
                                        <td>{{ucfirst($trips[$i-1]->distance)}}</td>
                                        <td>{{ucfirst($trips[$i-1]->duration)}}</td>
                                        <td>{{$trips[$i-1]->created_at->diffForHumans()}}</td>
                                        <td>{{$trips[$i-1]->updated_at->diffForhumans()}}</td>
                                        <td><a href="{{route("admin.trips.show", $trips[$i-1]->id)}}">Details</a></td>
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
            $('#all_trips').DataTable();
        });
    </script>
@endsection