<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="DAZCO">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>MRCABIE - Admin Panel</title>

    <!-- Custom fonts for this template-->
    <link href="{{url('admin/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{url('admin/css/sb-admin-2.min.css')}}" rel="stylesheet">

    <style>
        @media (max-width: 546px){
            .container-fluid{
                padding: 0 !important;
                margin: 0 !important;
            }
        }
    </style>

    @yield("styles")

</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-danger sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route("admin.dashboard")}}">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-user"></i>
            </div>
            <div class="sidebar-brand-text mx-3">Admin</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="{{route("admin.dashboard")}}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Main Site
        </div>

        <!-- Nav Item - Uploads Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#banner_collapse" aria-expanded="true" aria-controls="banner_collapse">
                <i class="fa fa-fw fa-book-open"></i>
                <span>Banner</span>
            </a>
            <div id="banner_collapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Edit:</h6>
                    <a class="collapse-item" href="{{route('admin.banner_get')}}"><i class="fa fa-fw fa-book-open"></i> Edit</a>
                </div>
            </div>
        </li>

        <!-- Nav Item - Uploads Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#slideshow_collapse" aria-expanded="true" aria-controls="slideshow_collapse">
                <i class="fa fa-fw fa-images"></i>
                <span>Slideshow</span>
            </a>
            <div id="slideshow_collapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Manage images for Slideshow:</h6>
                    <a class="collapse-item" href="{{route('admin.slideshow.index')}}"><i class="fa fa-fw fa-book-open"></i> All Images</a>
                    <a class="collapse-item" href="{{route('admin.slideshow.create')}}"><i class="fa fa-fw fa-upload"></i>Upload Image</a>
                </div>
            </div>
        </li>

        <!-- Nav Item - Uploads Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#gallery_collapse" aria-expanded="true" aria-controls="gallery_collapse">
                <i class="fa fa-fw fa-images"></i>
                <span>Site Gallery</span>
            </a>
            <div id="gallery_collapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Manage Media for Gallery:</h6>
                    <a class="collapse-item" href="{{route('admin.media.index')}}"><i class="fa fa-fw fa-book-open"></i> All Media</a>
                    <a class="collapse-item" href="{{route('admin.media.create')}}"><i class="fa fa-fw fa-upload"></i>Upload Media</a>
                </div>
            </div>
        </li>

        <!-- Nav Item - Uploads Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#read_before_collapse" aria-expanded="true" aria-controls="read_before_collapse">
                <i class="fa fa-fw fa-book-open"></i>
                <span>Read Before You Book</span>
            </a>
            <div id="read_before_collapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Edit:</h6>
                    <a class="collapse-item" href="{{route('admin.read_before_get')}}"><i class="fa fa-fw fa-book-open"></i> Edit</a>
                </div>
            </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Trips
        </div>

        <!-- Nav Item - Uploads Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#trips_collapse" aria-expanded="true" aria-controls="trips_collapse">
                <i class="fa fa-fw fa-location-arrow"></i>
                <span>Oneway Trips</span>
            </a>
            <div id="trips_collapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Manage Trips:</h6>
                    <a class="collapse-item" href="{{route('admin.trips.index')}}"><i class="fa fa-fw fa-location-arrow"></i> All Trips</a>
                    <a class="collapse-item" href="{{route('admin.trips.create')}}"><i class="fa fa-fw fa-location-arrow"></i> Add Trip</a>
                </div>
            </div>
        </li>

        <!-- Nav Item - Uploads Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#round_trips_collapse" aria-expanded="true" aria-controls="round_trips_collapse">
                <i class="fa fa-fw fa-location-arrow"></i>
                <span>Round Trips</span>
            </a>
            <div id="round_trips_collapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Manage Round Trips:</h6>
                    <a class="collapse-item" href="{{route('admin.round_trips.index')}}"><i class="fa fa-fw fa-location-arrow"></i> Settings</a>
                </div>
            </div>
        </li>

        <!-- Nav Item - Uploads Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#trip_categories_collapse" aria-expanded="true" aria-controls="trip_categories_collapse">
                <i class="fa fa-fw fa-tags"></i>
                <span>Trip Categories</span>
            </a>
            <div id="trip_categories_collapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Manage Trip Categories:</h6>
                    <a class="collapse-item" href="{{route('admin.categories.index')}}"><i class="fa fa-fw fa-tags"></i> All Categories</a>
                    <a class="collapse-item" href="{{route('admin.categories.create')}}"><i class="fa fa-fw fa-tag"></i> Add Category</a>
                </div>
            </div>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Drivers
        </div>

        <!-- Nav Item - Uploads Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#drivers_collapse" aria-expanded="true" aria-controls="drivers_collapse">
                <i class="fa fa-fw fa-location-arrow"></i>
                <span>Drivers</span>
            </a>
            <div id="drivers_collapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Manage Drivers:</h6>
                    <a class="collapse-item" href="{{route('admin.drivers.unapproved')}}"><i class="fa fa-fw fa-users"></i> Unapproved Drivers</a>
                    <a class="collapse-item" href="{{route('admin.drivers.index')}}"><i class="fa fa-fw fa-users"></i> Active Drivers</a>
                    <a class="collapse-item" href="{{route('admin.drivers.in_active')}}"><i class="fa fa-fw fa-users"></i> In-Active Drivers</a>
                </div>
            </div>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider">
        <!-- Heading -->
        <div class="sidebar-heading">
            Rides
        </div>
        <!-- Nav Item - Uploads Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#rides_collapse" aria-expanded="true" aria-controls="rides_collapse">
                <i class="fa fa-fw fa-car"></i>
                <span>Rides</span>
            </a>
            <div id="rides_collapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Manage Rides:</h6>
                    <a class="collapse-item" href="{{route('admin.rides.index')}}"><i class="fa fa-fw fa-users"></i> Booked Rides</a>
                    <a class="collapse-item" href="{{route('admin.rides.approved')}}"><i class="fa fa-fw fa-users"></i> Approved Rides</a>
                    <a class="collapse-item" href="{{route('admin.rides.started')}}"><i class="fa fa-fw fa-users"></i> Started Rides</a>
                    <a class="collapse-item" href="{{route('admin.rides.ended')}}"><i class="fa fa-fw fa-users"></i> Ended Rides</a>
                </div>
            </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <!-- Topbar Search -->
                <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" action="{{route('admin.rides.search')}}">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for Ride Number..." aria-label="Search" aria-describedby="basic-addon2" name="ride_number">
                        <div class="input-group-append">
                            <button class="btn btn-danger" type="submit">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                    <li class="nav-item dropdown no-arrow d-sm-none">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-search fa-fw"></i>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                            <form class="form-inline mr-auto w-100 navbar-search" action="{{route('admin.rides.search')}}">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for Ride Number..." aria-label="Search" aria-describedby="basic-addon2" name="ride_number">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>

                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{Auth::guard("admin")->user()->name}}</span>
                            <img class="img-profile rounded-circle" src="https://api.adorable.io/avatars/50/{{Auth::guard('admin')->user()->name}}.png">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Profile
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                Settings
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                Activity Log
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

                @yield("content")

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; MR CABBIE 2019</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="{{url("logout")}}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="{{url('admin/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

<!-- Custom scripts for all pages-->
<script src="{{url('admin/js/sb-admin-2.min.js')}}"></script>

@yield("scripts")

</body>

</html>
