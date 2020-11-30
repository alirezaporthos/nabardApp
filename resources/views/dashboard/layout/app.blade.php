<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicon -->
    <link rel="icon" href="{{asset('templates/dashboard/img/core-img/small-logo.png')}}">

    <!-- Master Stylesheet [If you remove this CSS file, your file will be broken undoubtedly.] -->
    <link rel="stylesheet" href="{{asset('templates/dashboard/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('templates/dashboard/css/persianDatepicker-default.css')}}">
    <link rel="stylesheet" href="{{asset('templates/dashboard/css/sweetalert.css')}}">
    <link rel="stylesheet" href="{{asset('templates/dashboard/css/lightbox.min.css')}}">

</head>

<body>


<!-- Setting Panel -->
<div class="theme-setting-wrapper">
{{--    <div id="settings-trigger"><i class="ti-settings font-17"></i></div>--}}
    <div id="theme-settings" class="settings-panel">
        <i class="settings-close zmdi zmdi-close font-22 font-weight-bold"></i>
        <p class="settings-heading mb-20 text-center">حالت منو :</p>

        <div class="sidebar-bg-options selected text-center px-5" id="sidebar-dark-theme">
            <div><span class="btn btn-outline-primary btn-sm btn-block">حالت تیره</span></div>
        </div>
        <div class="sidebar-bg-options text-center px-5" id="sidebar-color-theme">
            <div><span class="btn btn-outline-primary btn-sm btn-block">رنگارنگ</span></div>
        </div>
        <div class="sidebar-bg-options text-center px-5" id="sidebar-light-theme">
            <div><span class="btn btn-outline-primary btn-sm btn-block">حالت روشن</span></div>
        </div>

    </div>
</div>

<title>
      @yield('title')
</title>


<!-- ======================================
******* Page Wrapper Area Start **********
======================================= -->
<div class="ecaps-page-wrapper" >
    <!-- Sidemenu Area -->
    <div class="ecaps-sidemenu-area">
        <!-- Desktop Logo -->
        <div class="ecaps-logo">
            <a href="/"><img class="desktop-logo" src="{{asset('templates/dashboard/img/logo.png')}}" alt="لوگوی دسک تاپ">
        </div>

        <!-- Side Nav -->
        <div class="ecaps-sidenav" id="ecapsSideNav">
            <!-- Side Menu Area -->
            <div class="side-menu-area">
                <!-- Sidebar Menu -->
                <nav>
                    <ul class="sidebar-menu" data-widget="tree">

                        <li class="{{ Request::routeIs('dashboard.index') ?'active':''}}">
                            <a href="{{route('dashboard.index')}}"><i class=" icon_building"></i> <span> داشبورد </span></a>
                        </li>

                        <li class="{{ Request::routeIs('dashboard.teams.index') ?'active':''}}">
                            <a href="{{route('dashboard.teams.index')}}"><i class="fa fa-user-circle-o"></i> <span> تیم ها </span></a>
                        </li>



                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                                <i class="fa fa-sign-out"></i> <span>خروج</span></a>
                        </li>

                        <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>

                    </ul>
                    </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <!-- Page Content -->
    <div class="ecaps-page-content">
        <!-- Top Header Area -->
        <header class="top-header-area d-flex align-items-center justify-content-between">
            <div class="left-side-content-area d-flex align-items-center">


                <!-- Triggers -->
                <div class="ecaps-triggers mr-1 mr-sm-3">
                    <div class="menu-collasped" id="menuCollasped">
                        <i class="zmdi zmdi-menu"></i>
                    </div>
                    <div class="mobile-menu-open" id="mobileMenuOpen">
                        <i class="zmdi zmdi-menu"></i>
                    </div>
                </div>

            </div>

            <div class="right-side-navbar d-flex align-items-center justify-content-end">
                <!-- Mobile Trigger -->
                <div class="right-side-trigger" id="rightSideTrigger">
                    <i class="fa fa-reorder"></i>
                </div>


            </div>
        </header>


        @yield('body')

       {{-- footer   --}}
    <!-- Footer Area -->
        {{-- <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- Footer Area -->
                    <footer class="footer-area d-flex align-items-center flex-wrap">
                        <!-- Copywrite Text -->

                        <!-- Footer Nav -->

                    </footer>
                </div>
            </div>
        </div> --}}



        <!--footer-->

        {{--        footer   --}}

    </div>
</div>
</div>

<!-- ======================================
********* Page Wrapper Area End ***********
======================================= -->

<!-- Must needed plugins to the run this Template -->
<script src="{{asset('templates/dashboard/js/jquery.min.js')}}"></script>
<script src="{{asset('templates/dashboard/js/axios.min.js')}}"></script>
<script src="{{asset('templates/dashboard/js/popper.min.js')}}"></script>
<script src="{{asset('templates/dashboard/js/bootstrap.min.js')}}"></script>
<script src="{{asset('templates/dashboard/js/bundle.js')}}"></script>
<script src="{{asset('templates/dashboard/js/default-assets/setting.js')}}"></script>
<script src="{{asset('templates/dashboard/js/default-assets/fullscreen.js')}}"></script>
<script src="{{asset('templates/dashboard/js/default-assets/select2.min.js')}}"></script>
<script src="{{asset('templates/dashboard/js/persianDatepicker.min.js')}}"></script>


<!-- Active JS -->
<script src="{{asset('templates/dashboard/js/default-assets/active.js')}}"></script>
<script src="{{asset('templates/dashboard/js/sweetalert.min.js')}}"></script>

<!-- These plugins only need for the run this page -->
<script src="{{asset('templates/dashboard/js/default-assets/file-upload.js')}}"></script>
<script src="{{asset('templates/dashboard/js/default-assets/basic-form.js')}}"></script>
<script src="{{asset('templates/dashboard/js/lightbox.min.js')}}"></script>
<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

@include('swal')
@yield('script')
<script>

        $(".datepicker").persianDatepicker({
            persianNumbers: false,
            formatDate: "YYYY-0M-0D",

        });

</script>
</body>
</html>
