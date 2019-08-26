@extends('layouts.admin')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Drivers</h1>

        <!--Posts-->
        <div class="row">
            <div class="col-md-12">
                <div class="card striped-tabled-with-hover">
                    <div class="card-header ">
                        <h4 class="card-title">All Drivers</h4>
                        <p class="card-category"></p>
                    </div>
                    @include('includes.session_flash')
                    <div class="card-body table-full-width table-responsive">
                        <table class="table table-hover table-striped" id="drivers">
                            <thead>
                            <tr>
                                <th>S/N</th>
                                <th><i class="fas fa-user"></i> Name</th>
                                <th><i class="fas fa-id-card"></i> Email</th>
                                <th><i class="fas fa-address-card"></i> Address</th>
                                <th><i class="fas fa-phone"></i> Phone Number</th>
                                <th><i class="fas fa-money-bill-alt"></i> Status</th>
                                <th><i class="fas fa-calendar"></i> Registered At</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($drivers)
                                @for($i= 1;$i<=count($drivers);$i++)
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td>{{ucfirst($drivers[$i-1]->name)}}</td>
                                        <td>{{$drivers[$i-1]->email}}</td>
                                        <td>{{$drivers[$i-1]->address}}</td>
                                        <td>{{$drivers[$i-1]->phone}}</td>
                                        <td>{{$drivers[$i-1]->status}}</td>
                                        <td>{{$drivers[$i-1]->created_at->diffForHumans()}}</td>
                                        <td><a href="{{route("admin.drivers.show", $drivers[$i-1]->id)}}">Manage</a></td>
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
            $('#drivers').DataTable();
        });
    </script>
@endsection