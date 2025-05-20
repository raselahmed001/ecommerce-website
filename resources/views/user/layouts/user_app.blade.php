<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
      data-sidebar-image="none" data-preloader="disable">

<head>

    <meta charset="utf-8"/>
    <title>@yield('title', 'Dashboard') | Velzon - Admin & Dashboard Template</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description"/>
    <meta content="Themesbrand" name="author"/>
    <!-- App favicon -->
    @include('user.ui.head')
    <!-- Custom Styles -->
    @stack('styles')

</head>

<body id="kt_body">

<!-- Begin page -->
<div id="layout-wrapper">

    <header id="page-topbar">
        <div class="layout-width">
            @include('user.ui.navbar')
        </div>
    </header>


    <!-- ==========Sidebar ========== -->
    @include('user.ui.sidebar')
    <!-- Left Sidebar End -->


    <!-- ============================================================== -->
    <!-- Main Content -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                @yield('user_content')

            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

        @include('user.ui.footer')
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->


<!--begin::Page loading-->
@include('page-loader')
<!--end::Page loading-->

<!--begin::Javascript-->
@include('user.ui.script')

@stack('scripts')
<!--end::Javascript-->
</body>

</html>
