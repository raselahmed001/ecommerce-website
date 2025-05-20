<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->
<head>
    <base href="">
    <title>@yield('title', 'Dashboard') | {{ config('app.name') }}</title>
    <meta charset="utf-8"/>
    <meta name="turbo-cache-control" content="no-cache">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description"
          content="The most advanced Bootstrap Admin Theme on Themeforest trusted by 94,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue & Laravel versions. Grab your copy now and get life-time updates for free."/>
    <meta name="keywords"
          content="Metronic, bootstrap, bootstrap 5, Angular, VueJs, React, Laravel, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta property="og:locale" content="en_US"/>
    <meta property="og:type" content="article"/>
    <meta property="og:title"
          content="Metronic - Bootstrap 5 HTML, VueJS, React, Angular & Laravel Admin Dashboard Theme"/>
    <meta property="og:url" content="https://keenthemes.com/metronic"/>
    <meta property="og:site_name" content="Keenthemes | Metronic"/>


    @include('backend.ui.head')

    <!-- Custom Styles -->
    @stack('styles')
</head>
<!--end::Head-->

<!--begin::Body-->
<body id="kt_body"
      class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed"
      style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">
<!--begin::Main-->
<!--begin::Root-->
<div class="d-flex flex-column flex-root">
    <!--begin::Page-->
    <div class="flex-row page d-flex flex-column-fluid">
        @guest
            <!-- Guest/Login Content -->

            <!--begin::Background-->
            <div
                class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed"
                style="background-image: url({{ asset('backend/assets/media/illustrations/sketchy-1/14-dark.png') }})">
                <!--end::Background-->
                <
                <!--begin::Content-->
                <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
                    <!--begin::Logo-->
                    <a href="#" class="mb-12">
                        <img alt="Logo" src="{{ asset('backend/assets/media/logos/logo-2.svg') }}" class="h-40px"/>
                    </a>
                    <!--end::Logo-->
                    <!--begin::Wrapper-->
                    <div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
                        @yield('auth-content')
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Content-->
            </div>
        @else
            <!--begin::Sidebar-->
            @include('backend.ui.sidebar')
            <!--end::Sidebar-->

            <!--begin::Wrapper-->
            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                <!--begin::Navbar-->
                @include('backend.ui.navbar')
                <!--end::Navbar-->

                <!--begin::Content-->
                <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                    <!--begin::Post-->
                    <div class="post d-flex flex-column-fluid" id="kt_post">
                        <!--begin::Container-->
                        <div id="kt_content_container" class="container-xxl">


                            @yield('content')


                        </div>
                        <!--end::Container-->
                    </div>
                    <!--end::Post-->
                </div>
                <!--end::Content-->

                <!--begin::Footer-->
                @include('backend.ui.footer')
                <!--end::Footer-->
            </div>
            <!--end::Wrapper-->
        @endguest
    </div>
    <!--end::Page-->
</div>
<!--end::Root-->

<!--begin::Page loading-->
@include('page-loader')
<!--end::Page loading-->

<!--begin::Javascript-->
@include('backend.ui.script')
{{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
@stack('scripts')
<!--end::Javascript-->
</body>
<!--end::Body-->
</html>
