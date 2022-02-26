<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('contents/admin') }}/assets/images/favicon.png">
    <title> @yield('title') </title>
    <link href="{{ asset('contents/admin') }}/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="{{ asset('contents/admin') }}/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('contents/admin') }}/assets/plugins/morrisjs/morris.css" rel="stylesheet">
    <link href="{{ asset('contents/admin') }}/css/adminpress.css" rel="stylesheet">
    <link href="{{ asset('contents/admin') }}/css/style.css" rel="stylesheet">
    <link href="{{ asset('contents/admin') }}/css/colors/blue.css" id="theme" rel="stylesheet">
    <link href="{{ asset('contents/admin') }}/css/toastr.css" id="theme" rel="stylesheet">

    <!-- color code link -->
    <link href="{{ asset('contents/admin') }}/css/bootstrap-tagsinput.css" id="theme" rel="stylesheet">
    <!-- summernote link -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="{{ asset('contents/website') }}/assets/css/toastr.css">
</head>

<body class="fix-header fix-sidebar card-no-border">
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <div id="main-wrapper">
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- ============================== Logo Start ================================ -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="{{ url('admin/dashboard') }}">
                        <!-- Logo icon -->
                        <b>
                            <!-- Dark Logo icon -->
                            <img src="{{ asset('contents/admin') }}/assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
                            <!-- Light Logo icon -->
                            <img src="{{ asset('contents/admin') }}/assets/images/logo-light-icon.png" alt="homepage" class="light-logo" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span>
                            <!-- dark Logo text -->
                            <img src="{{ asset('contents/admin') }}/assets/images/logo-text.png" alt="homepage" class="dark-logo" />
                            <!-- Light Logo text -->    
                            <img src="{{ asset('contents/admin') }}/assets/images/logo-light-text.png" class="light-logo" alt="homepage" />
                        </span> 
                    </a>
                </div>
                <!-- =============================== End Logo =============================== -->
                <div class="navbar-collapse">
                    <!-- ============================== toggle and nav items ================================ -->
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                        <li class="nav-item m-l-10"> <a class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        <!-- ========================= Comment Start ===================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-message"></i>
                                <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                            </a>
                            <div class="dropdown-menu mailbox animated slideInUp">
                                <ul>
                                    <li>
                                        <div class="drop-title">Notifications</div>
                                    </li>
                                    <li>
                                        <div class="message-center">
                                            <!-- Message -->
                                            <a href="index.html#">
                                                <div class="btn btn-danger btn-circle"><i class="fa fa-link"></i></div>
                                                <div class="mail-contnet">
                                                <h5>Luanch Admin</h5> <span class="mail-desc">Just see the my new admin!</span> <span class="time">9:30 AM</span> </div>
                                            </a>
                                        </div>
                                    </li>
                                    <li>
                                        <a class="nav-link text-center" href="javascript:void(0);"> <strong>Check all notifications</strong> <i class="fa fa-angle-right"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!-- ============================= End Comment ================================= -->

                        <!-- ============================== Messages Staet ================================ -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-email"></i>
                                <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                            </a>
                            <div class="dropdown-menu mailbox animated slideInUp" aria-labelledby="2">
                                <ul>
                                    <li>
                                        <div class="drop-title">You have 4 new messages</div>
                                    </li>
                                    <li>
                                        <div class="message-center">
                                            <!-- Message -->
                                            <a href="index.html#">
                                                <div class="user-img"> <img src="{{ asset('contents/admin') }}/assets/images/users/1.jpg" alt="user" class="img-circle"> <span class="profile-status online pull-right"></span> </div>
                                                <div class="mail-contnet">
                                                    <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:30 AM</span> </div>
                                            </a>
                                        </div>
                                    </li>
                                    <li>
                                        <a class="nav-link text-center" href="javascript:void(0);"> <strong>See all e-Mails</strong> <i class="fa fa-angle-right"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!-- =============================== End Messages =============================== -->
                    </ul>
                    <!-- =========================== User profile and search =================================== -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- ============================= Search Start ================================= -->
                        <li class="nav-item hidden-sm-down search-box"> <a class="nav-link hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-search"></i></a>
                            <form class="app-search">
                                <input type="text" class="form-control" placeholder="Search & enter"> <a class="srh-btn"><i class="ti-close"></i></a> </form>
                        </li>
                        <!-- ============================ Profile Start ================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{ asset('contents/admin') }}/assets/images/users/1.jpg" alt="user" class="profile-pic" /></a>
                            <div class="dropdown-menu dropdown-menu-right scale-up">
                                <ul class="dropdown-user">
                                    <li>
                                        <div class="dw-user-box">
                                            <div class="u-img"><img src="{{ asset('contents/admin') }}/assets/images/users/1.jpg" alt="user"></div>
                                            <div class="u-text">
                                                <h4>{{ auth::user()->name }}</h4>
                                                <p class="text-muted">{{ auth::user()->email }}</p><a href="pages-profile.html" class="btn btn-rounded btn-danger btn-sm">View Profile</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="index.html#"><i class="ti-user"></i> My Profile</a></li>
                                    <li><a href="index.html#"><i class="ti-wallet"></i> My Balance</a></li>
                                    <li><a href="index.html#"><i class="ti-email"></i> Inbox</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="index.html#"><i class="ti-settings"></i> Account Setting</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i> Logout</a></li>
                                </ul>
                            </div>
                        </li>
                        <!-- ============================ Profile End ================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ========================== End Topbar header ==================================== -->

        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- User profile -->
                <div class="user-profile">
                    <!-- User profile image -->
                    <div class="profile-img"> <img src="{{ asset('contents/admin') }}/assets/images/users/profile.png" alt="user" />
                        <!-- this is blinking heartbit-->
                        <div class="notify setpos"> <span class="heartbit"></span> <span class="point"></span> </div>
                    </div>
                    <!-- User profile text-->
                    <div class="profile-text">
                        <h5>{{ auth::user()->name }}</h5>
                        <a href="index.html#" class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"><i class="mdi mdi-settings"></i></a>
                        <a href="app-email.html" class="" data-toggle="tooltip" title="Email"><i class="mdi mdi-gmail"></i></a>
                        <a href="{{ url('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="" data-toggle="tooltip" title="Logout"><i class="mdi mdi-power"></i></a>
                        <div class="dropdown-menu animated flipInY">
                            <!-- text-->
                            <a href="index.html#" class="dropdown-item"><i class="ti-user"></i> My Profile</a>
                            <!-- text-->
                            <a href="index.html#" class="dropdown-item"><i class="ti-wallet"></i> My Balance</a>
                            <!-- text-->
                            <a href="index.html#" class="dropdown-item"><i class="ti-email"></i> Inbox</a>
                            <!-- text-->
                            <div class="dropdown-divider"></div>
                            <!-- text-->
                            <a href="index.html#" class="dropdown-item"><i class="ti-settings"></i> Account Setting</a>
                            <!-- text-->
                            <div class="dropdown-divider"></div>
                            <!-- text-->
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item"><i class="fa fa-power-off"></i> Logout</a>
                            <!-- text-->
                        </div>
                    </div>
                </div>
                <!-- End User profile text-->
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                        <li> 
                            <a class="waves-effect waves-dark" href="{{ url('admin/dashboard') }}" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">Dashboard</span></a>
                        </li>
                        <li> 
                            <a class="waves-effect waves-dark" href="{{ url('admin/all-users') }}" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">All Users</span></a>
                        </li>
                        <li>
                            <a class="waves-effect waves-dark" href="{{ url('admin/banner') }}" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">Banner</span></a>
                        </li>
                        <li> 
                            <a class="waves-effect waves-dark" href="{{ url('admin/brand') }}" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">Brands</span></a>
                        </li>
                        <li> 
                            <a class="has-arrow waves-effect waves-dark" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">Add Category</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{ route('category') }}">Category</a></li>
                                <li><a href="{{ route('sub-category') }}">Sub Category</a></li>
                                <li><a href="{{ route('sub-sub-category') }}">Sub SubCategory</a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="waves-effect waves-dark" href="{{ url('admin/product') }}" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">Product</span></a>
                        </li>
                        <li> 
                            <a class="has-arrow waves-effect waves-dark" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">Shipping Area</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{ route('division') }}">Division</a></li>
                                <li><a href="{{ route('district') }}">District</a></li>
                                <li><a href="#">State</a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="waves-effect waves-dark" href="{{ url('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="mdi mdi-power"></i><span class="hide-menu">Logout</span></a>
                        </li>
                    </ul>
                </nav>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <div class="page-wrapper">
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Dashboard</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
            <!-- ============================Container fluid Start================================== -->
            <div class="container-fluid">
                @yield('content')
            </div>
            <!-- =============================Container fluid End ================================= -->

            <!-- ==============================Footer Start ================================ -->
            <footer class="footer"> © 2017 Admin Press Admin by themedesigner.in </footer>
            <!-- ============================Footer End================================== -->

        </div>
    </div>

    <!-- =========================All Jquery===================================== -->
    <script src="{{asset('contents/admin')}}/assets/plugins/jquery/jquery.min.js"></script>
    <script src="{{ asset('contents/admin') }}/js/dataTables.bootstrap.js"></script>
    <script src="{{ asset('contents/admin') }}/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('contents/admin') }}/assets/plugins/bootstrap/js/popper.min.js"></script>
    <script src="{{ asset('contents/admin') }}/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{ asset('contents/admin') }}/js/jquery.slimscroll.js"></script>
    <script src="{{ asset('contents/admin') }}/js/waves.js"></script>
    <script src="{{ asset('contents/admin') }}/js/sidebarmenu.js"></script>
    <script src="{{ asset('contents/admin') }}/assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="{{ asset('contents/admin') }}/js/custom.min.js"></script>
    <script src="{{ asset('contents/admin') }}/assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <script src="{{ asset('contents/admin') }}/assets/plugins/raphael/raphael-min.js"></script>
    <script src="{{ asset('contents/admin') }}/assets/plugins/morrisjs/morris.min.js"></script>
    <script src="{{ asset('contents/admin') }}/js/dashboard1.js"></script>
    <script src="{{ asset('contents/admin') }}/js/bootstrap-datepicker.min.js"></script>
    <script src="{{ asset('contents/admin') }}/assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
    
    <script src="{{ asset('contents/admin') }}/js/custom.js"></script>
    
    <!-- color code -->
    <script src="{{ asset('contents/admin') }}/js/bootstrap-tagsinput.min.js"></script>
    <!-- summernote -->
    <script src="{{ asset('contents/admin') }}/js/summernote-bs4.min.js"></script>
    <script>
        $(function(){
          'use strict';
          // Summernote editor
          $('#summernote').summernote({
            height: 150,
            tooltip: false
          })
          $('#summernote2').summernote({
            height: 150,
            tooltip: false
          })
          $('#summernote3').summernote({
            height: 150,
            tooltip: false
          })
          $('#summernote4').summernote({
            height: 150,
            tooltip: false
          })
        });
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        @if(Session::has('messege'))
            var type="{{Session::get('alert-type','info')}}"
            switch(type){
                case 'info':
                    toastr.info("{{ Session::get('messege') }}");
                    break;
                case 'success':
                    toastr.success("{{ Session::get('messege') }}");
                    break;
                case 'warning':
                    toastr.warning("{{ Session::get('messege') }}");
                    break;
                case 'error':
                    toastr.error("{{ Session::get('messege') }}");
                break;
            }
        @endif
    </script>
</body>

</html>