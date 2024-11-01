<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Admin page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="DISKOMINFOTIK KBB" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- App favicon -->
    <link rel="icon" href="{{ asset('assets/logo/logo-mpp1.png') }}" type="image/png">

    <!-- Plugins css -->
    <link href="{{ asset('template_backend/assets/libs/flatpickr/flatpickr.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('template_backend/assets/libs/selectize/css/selectize.bootstrap3.css') }}" rel="stylesheet" type="text/css" />

    <!-- Bootstrap css -->
    <link href="{{ asset('template_backend/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App css -->
    <link href="{{ asset('template_backend/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />
    <!-- icons -->
    <link href="{{ asset('template_backend/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="{{ asset('template_backend/assets/libs/spectrum-colorpicker2/spectrum.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('template_backend/assets/libs/flatpickr/flatpickr.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('template_backend/assets/libs/clockpicker/bootstrap-clockpicker.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.5/css/selectize.min.css"/>
    <style>
        .select2-container .select2-selection--single, .select2-container--default .select2-selection--single .select2-selection__rendered, .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 40px;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 40px;
        }
    </style>
    <!-- Head js -->
    <script src="{{ asset('template_backend/assets/js/head.js') }}"></script>

</head>

<!-- body start -->
<body data-layout-mode="default" data-theme="light" data-topbar-color="dark" data-menu-position="fixed" data-leftbar-color="light" data-leftbar-size='default' data-sidebar-user='false'>

    <!-- Begin page -->
    <div id="wrapper">


        <!-- Topbar Start -->
        <div class="navbar-custom">
            <div class="container-fluid">
                <ul class="list-unstyled topnav-menu float-end mb-0">

                    <li class="dropdown d-none d-lg-inline-block">
                        <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light" data-toggle="fullscreen" href="#">
                            <i class="fe-maximize noti-icon"></i>
                        </a>
                    </li>

                    <li class="dropdown notification-list topbar-dropdown">
                        <a class="nav-link dropdown-toggle nav-user me-0 waves-effect waves-light" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <img src="{{ Storage::url(Auth::user()->avatar) }}" alt="user-image" class="rounded-circle">
                            <span class="pro-user-name ms-1">
                                {{ Auth::user()->name }} <i class="mdi mdi-chevron-down"></i>
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end profile-dropdown ">
                            <!-- item-->
                            <div class="dropdown-header noti-title">
                                <h6 class="text-overflow m-0">Welcome !</h6>
                            </div>

                            <!-- item-->
                            {{-- <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="fe-user"></i>
                                <span>My Account</span>
                            </a> --}}

                            <div class="dropdown-divider"></div>

                            <!-- item-->
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();" class="dropdown-item notify-item">
                                <i class="fe-log-out"></i>
                                <span>Logout</span>
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>

                        </div>
                    </li>

                </ul>

                <!-- LOGO -->
                <div class="logo-box">
                    <a href="{{ url(env('APP_URL')) }}" class="logo logo-dark text-center">
                        <span class="logo-sm">
                            <img src="{{ Storage::url(ApplicationHelper::getSetting()->logo_1) }}" alt="" height="50">
                            <!-- <span class="logo-lg-text-light">UBold</span> -->
                        </span>
                        <span class="logo-lg">
                            <img src="{{ Storage::url(ApplicationHelper::getSetting()->logo_1) }}" alt="" height="60">
                            <!-- <span class="logo-lg-text-light">U</span> -->
                        </span>
                    </a>

                    <a href="{{ url(env('APP_URL')) }}" class="logo logo-light text-center">
                        <span class="logo-sm">
                            <img src="{{ Storage::url(ApplicationHelper::getSetting()->logo_1) }}" alt="" height="50">
                        </span>
                        <span class="logo-lg">
                            <img src="{{ Storage::url(ApplicationHelper::getSetting()->logo_1) }}" alt="" height="60">
                        </span>
                    </a>
                </div>

                <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                    <li>
                        <button class="button-menu-mobile waves-effect waves-light">
                            <i class="fe-menu"></i>
                        </button>
                    </li>

                    <li>
                        <!-- Mobile menu toggle (Horizontal Layout)-->
                        <a class="navbar-toggle nav-link" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                            <div class="lines">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </a>
                        <!-- End mobile menu toggle-->
                    </li>




                </ul>
                <div class="clearfix"></div>
            </div>
        </div>
        <!-- end Topbar -->

        <!-- ========== Left Sidebar Start ========== -->
        <div class="left-side-menu">

            <div class="h-100" data-simplebar>

                <!-- User box -->
                <div class="user-box text-center">
                    <img src="{{ asset('template_backend/assets/images/users/user-1.jpg') }}" alt="user-img" title="Mat Helme" class="rounded-circle avatar-md">
                    <div class="dropdown">
                        <a href="javascript: void(0);" class="text-dark dropdown-toggle h5 mt-2 mb-1 d-block" data-bs-toggle="dropdown">Geneva Kennedy</a>
                        <div class="dropdown-menu user-pro-dropdown">

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="fe-user me-1"></i>
                                <span>My Account</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="fe-settings me-1"></i>
                                <span>Settings</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="fe-lock me-1"></i>
                                <span>Lock Screen</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="fe-log-out me-1"></i>
                                <span>Logout</span>
                            </a>

                        </div>
                    </div>
                    <p class="text-muted">Admin Head</p>
                </div>

                <!--- Sidemenu -->
                <div id="sidebar-menu">

                    <ul id="side-menu">

                        <li class="menu-title">Menu</li>
                        <li>
                            <a href="{{ url('/dashboard') }}">
                                <i class="mdi mdi-view-dashboard-outline"></i>
                                <span> Dashboard </span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('page.index') }}">
                                <i class="mdi mdi-text-box-multiple-outline"></i>
                                <span> Halaman </span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('post') }}">
                                <i class="mdi mdi-post-outline"></i>
                                <span> Data Posting </span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('contactMessage.index') }}">
                                <i class="mdi mdi-inbox"></i>
                                <span> Pesan Kontak </span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('gallery.index') }}">
                                <i class="mdi mdi-image-multiple"></i>
                                <span> Galeri </span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('sliders.index') }}">
                                <i class="mdi mdi-image-multiple"></i>
                                <span> Slider </span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('pengumuman.index') }}">
                                <i class="mdi mdi-image-multiple"></i>
                                <span> Pengumuman </span>
                            </a>
                        </li>

                        <li class="menu-title mt-2">Master Data</li>

                        <li>
                            <a href="{{ route('category') }}">
                                <i class="mdi mdi-card-text-outline"></i>
                                <span> Kategori </span>
                            </a>
                        </li>

                        <li>
                            <a href="#autentikasi" data-bs-toggle="collapse">
                                <i class="mdi mdi-key"></i>
                                <span>Autentikasi</span> <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="autentikasi">
                                <ul class="nav-second-level">
                                    <li>
                                        <a href="{{ url('/role') }}">Role</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/permission') }}">Permission</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/user') }}">Pengguna</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li>
                            <a href="{{ route('setting.form', ['id' => 1]) }}">
                                <i class="mdi mdi-cog-outline"></i>
                                <span> pengaturan </span>
                            </a>
                        </li>


                    </ul>

                </div>
                <!-- End Sidebar -->

                <div class="clearfix"></div>

            </div>
            <!-- Sidebar -left -->

        </div>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">

                    @yield('content')

                </div> <!-- container -->

            </div> <!-- content -->

            <!-- Footer Start -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <script>
                                document.write(new Date().getFullYear())

                            </script> &copy; {{ ApplicationHelper::getSetting()->appname }}
                        </div>
                    </div>
                </div>
            </footer>
            <!-- end Footer -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->


    </div>

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- Vendor js -->
    <script src="{{ asset('template_backend/assets/js/vendor.min.js') }}"></script>

    <!-- Plugins js-->
    <script src="{{ asset('template_backend/assets/libs/flatpickr/flatpickr.min.js') }}"></script>
    <script src="{{ asset('template_backend/assets/libs/spectrum-colorpicker2/spectrum.min.js')}}"></script>
    <script src="{{ asset('template_backend/assets/libs/clockpicker/bootstrap-clockpicker.min.js') }}"></script>
    <script src="{{ asset('template_backend/assets/js/pages/form-pickers.init.js') }}"></script>
    <script src="{{ asset('template_backend/assets/libs/selectize/js/standalone/selectize.min.js') }}"></script>
    <!-- App js-->
    <script src="{{ asset('template_backend/assets/js/app.min.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.5/js/selectize.min.js" ></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        @if(session('success'))
        swal({
            title: "Sukses!"
            , text: "{{ session('success') }}"
            , icon: "success"
            , timer: 5000
            , confirmButtonText: 'Tutup'
        , });
        @endif

        @if(session('error'))
        swal({
            title: "Error!"
            , text: "{{ session('error') }}"
            , icon: "error"
            , timer: 5000
            , confirmButtonText: 'Tutup'
        , });
        @endif

    </script>
    <script>
        var showLoadingAlert = function() {
            Swal.fire({
                title: "Mohon tunggu..."
                , html: "<i class=\"fa fa-spinner fa-spin\"></i> Processing..."
                , icon: "info"
                , showConfirmButton: false
                , allowOutsideClick: false
                , allowEscapeKey: false
            })
        }

        var loadingDone = function() {
            Swal.close()
        }

        var msg_warning = function(text) {
            Swal.fire({
                title: 'Peringatan!'
                , text: text
                , icon: 'warning'
                , timer: 5000
                , confirmButtonText: 'Tutup'
            });
        }
        var msg_success = function(text) {
            Swal.fire({
                title: 'Sukses!'
                , text: text
                , icon: 'success'
                , timer: 3000
                , confirmButtonText: 'Tutup'
            });
        }
        var msg_error = function(text) {
            Swal.fire({
                title: 'Error!'
                , text: text
                , icon: 'error'
                , timer: 5000
                , confirmButtonText: 'Tutup'
            });
        }

    </script>

    <script src="{{ asset('template_backend/assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('template_backend/assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('template_backend/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('template_backend/assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('template_backend/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('template_backend/assets/libs/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('template_backend/assets/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('template_backend/assets/libs/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('template_backend/assets/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('template_backend/assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
    <script src="{{ asset('template_backend/assets/libs/datatables.net-select/js/dataTables.select.min.js') }}"></script>

    <script src="https://cdn.tiny.cloud/1/twd2auu3u2wg8fd5a9k0cw5fh2pdcf5ayq7jk8zrqxny1f8s/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @stack('custom-scripts')

    @section('js')
    @show
</body>
</html>
