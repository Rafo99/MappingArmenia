<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title', config('app.name')) | Admin Panel - MappingArmenia.com</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css"
          type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
          rel="stylesheet">
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

</head>

<body id="page-top">

<div id="wrapper">

    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <div class="text-center d-none d-md-inline" style="display: flex !important; align-items: center">
            <button class="rounded-circle border-0" id="sidebarToggle" style="margin: 0"></button>
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-text mx-3">Admin</div>
            </a>
        </div>
        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="{{ route('admin.index') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Categories
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
               aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-cog"></i>
                <span>Tours</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Actions</h6>
                    <a class="collapse-item" href="{{ route('admin.tours.add') }}">Add Tour</a>
                    <a class="collapse-item" href="{{ route('admin.tours.show') }}">View Tours</a>
                </div>
            </div>
        </li>

        <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
               aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-fw fa-wrench"></i>
                <span>Packages</span>
            </a>
            <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                 data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Actions</h6>
                    <a class="collapse-item" href="{{ route('admin.packages.add') }}">Add Package</a>
                    <a class="collapse-item" href="{{ route('admin.packages.show') }}">View Packages</a>
                </div>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities2"
               aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-fw fa-wrench"></i>
                <span>Blogs</span>
            </a>
            <div id="collapseUtilities2" class="collapse" aria-labelledby="headingUtilities"
                 data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Actions</h6>
                    <a class="collapse-item" href="{{ route('admin.blogs.add') }}">Add Blog</a>
                    <a class="collapse-item" href="{{ route('admin.blogs.show') }}">View Blogs</a>
                </div>
            </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Messages <span class="badge badge-danger badge-counter" style="right: unset; margin:  0; transform-origin: unset; font-size: 12px">{{ $all_messages }}</span>
        </div>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.messages') }}">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Messages<span class="badge badge-danger badge-counter" style="right: unset; margin:  0; transform-origin: unset">{{ $count_messages }}</span></span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.orders') }}">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Orders<span class="badge badge-danger badge-counter" style="right: unset; margin:  0; transform-origin: unset">{{ $count_orders }}</span></span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.plans') }}">
                <i class="fas fa-fw fa-table"></i>
                <span>Plans<span class="badge badge-danger badge-counter" style="right: unset; margin:  0; transform-origin: unset">{{ $count_plans }}</span></span>
            </a>
        </li>

        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Settings
        </div>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.slider') }}">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Slider</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.contact') }}">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Contact</span>
            </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">



    </ul>

    <div id="content-wrapper" class="d-flex flex-column">

        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <!-- Nav Item - Messages -->
                    {{--<li class="nav-item dropdown no-arrow mx-1">--}}
                        {{--<a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"--}}
                           {{--data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                            {{--<i class="fas fa-envelope fa-fw"></i>--}}
                            {{--<!-- Counter - Messages -->--}}
                            {{--<span class="badge badge-danger badge-counter">7</span>--}}
                        {{--</a>--}}
                        {{--<!-- Dropdown - Messages -->--}}
                        {{--<div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"--}}
                             {{--aria-labelledby="messagesDropdown">--}}
                            {{--<h6 class="dropdown-header">--}}
                                {{--Message Center--}}
                            {{--</h6>--}}
                            {{--<a class="dropdown-item d-flex align-items-center" href="#">--}}
                                {{--<div class="dropdown-list-image mr-3">--}}
                                    {{--<img class="rounded-circle" src="https://source.unsplash.com/fn_BT9fwg_E/60x60"--}}
                                         {{--alt="">--}}
                                    {{--<div class="status-indicator bg-success"></div>--}}
                                {{--</div>--}}
                                {{--<div class="font-weight-bold">--}}
                                    {{--<div class="text-truncate">Hi there! I am wondering if you can help me with a--}}
                                        {{--problem I've been having.--}}
                                    {{--</div>--}}
                                    {{--<div class="small text-gray-500">Emily Fowler · 58m</div>--}}
                                {{--</div>--}}
                            {{--</a>--}}
                            {{--<a class="dropdown-item d-flex align-items-center" href="#">--}}
                                {{--<div class="dropdown-list-image mr-3">--}}
                                    {{--<img class="rounded-circle" src="https://source.unsplash.com/AU4VPcFN4LE/60x60"--}}
                                         {{--alt="">--}}
                                    {{--<div class="status-indicator"></div>--}}
                                {{--</div>--}}
                                {{--<div>--}}
                                    {{--<div class="text-truncate">I have the photos that you ordered last month, how would--}}
                                        {{--you like them sent to you?--}}
                                    {{--</div>--}}
                                    {{--<div class="small text-gray-500">Jae Chun · 1d</div>--}}
                                {{--</div>--}}
                            {{--</a>--}}
                            {{--<a class="dropdown-item d-flex align-items-center" href="#">--}}
                                {{--<div class="dropdown-list-image mr-3">--}}
                                    {{--<img class="rounded-circle" src="https://source.unsplash.com/CS2uCrpNzJY/60x60"--}}
                                         {{--alt="">--}}
                                    {{--<div class="status-indicator bg-warning"></div>--}}
                                {{--</div>--}}
                                {{--<div>--}}
                                    {{--<div class="text-truncate">Last month's report looks great, I am very happy with the--}}
                                        {{--progress so far, keep up the good work!--}}
                                    {{--</div>--}}
                                    {{--<div class="small text-gray-500">Morgan Alvarez · 2d</div>--}}
                                {{--</div>--}}
                            {{--</a>--}}
                            {{--<a class="dropdown-item d-flex align-items-center" href="#">--}}
                                {{--<div class="dropdown-list-image mr-3">--}}
                                    {{--<img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"--}}
                                         {{--alt="">--}}
                                    {{--<div class="status-indicator bg-success"></div>--}}
                                {{--</div>--}}
                                {{--<div>--}}
                                    {{--<div class="text-truncate">Am I a good boy? The reason I ask is because someone told--}}
                                        {{--me that people say this to all dogs, even if they aren't good...--}}
                                    {{--</div>--}}
                                    {{--<div class="small text-gray-500">Chicken the Dog · 2w</div>--}}
                                {{--</div>--}}
                            {{--</a>--}}
                            {{--<a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>--}}
                        {{--</div>--}}
                    {{--</li>--}}

                    {{--<div class="topbar-divider d-none d-sm-block"></div>--}}

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ $user->name }}</span>
                            <img class="img-profile rounded-circle" src="{{ asset('img/users/'.$user->avatar) }}"
                                 style="width: 40px; height: 40px">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                             aria-labelledby="userDropdown">
                            {{--<a class="dropdown-item" href="#">--}}
                            {{--<i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>--}}
                            {{--Profile--}}
                            {{--</a>--}}
                            {{--<a class="dropdown-item" href="#">--}}
                            {{--<i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>--}}
                            {{--Settings--}}
                            {{--</a>--}}
                            {{--<a class="dropdown-item" href="#">--}}
                            {{--<i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>--}}
                            {{--Activity Log--}}
                            {{--</a>--}}
                            {{--<div class="dropdown-divider"></div>--}}
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                               data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->

            @yield('content')

        </div>


        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Mapping LLC {{ date('Y') }}</span>
                </div>
            </div>
        </footer>

    </div>

</div>


<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
<script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
@stack('script')


</body>

</html>
