@extends('layouts.app')

@section('content')
    <!--begin::Toolbar-->
    <div class="toolbar" id="kt_toolbar">
        <!-- Container -->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">

            <!-- Page Title -->
            <div class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0"
                 data-kt-swapper="true"
                 data-kt-swapper-mode="prepend"
                 data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}">

                <h1 class="text-dark fw-bold fs-3 my-1">eCommerce Dashboard</h1>
            </div>
            <!-- End Page Title -->

            <!-- Breadcrumb Navigation -->
            <div class="d-flex align-items-center gap-2 gap-lg-3">

                <!-- Home Icon -->
                <a href="{{ route('admin.dashboard') }}" class="text-muted fs-6 ">
                    <i class="bi bi-house-door-fill fs-4 text-success"></i>
                </a>

                <!-- Separator -->
                <span class="text-muted fs-6">></span>

                <!-- Current Page -->
                <h6 class="text-dark fw-semibold mb-0">Change Password</h6>

            </div>
            <!-- End Breadcrumb Navigation -->

        </div>
        <!-- End Container -->
    </div>
    <div class="d-flex flex-column justify-content-center min-vh-100">
        <div class="w-lg-550px bg-body rounded shadow-sm p-10 mx-auto my-auto">
            <!-- Success/Error Messages -->
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <form method="POST" action="{{ route('password.updated') }}" class="form w-100" novalidate
                  id="kt_new_password_form">
                @csrf

                <div class="text-center mb-10">
                    <h1 class="text-dark mb-3">Change Password</h1>
                    <div class="text-gray-400 fw-bold fs-4">
                        Change your password?
                    </div>
                </div>

                <!-- Old Password -->
                <div class="fv-row mb-10">
                    <label class="form-label fw-bolder text-dark fs-6">Old Password</label>
                    <input id="oldPassword" name="oldPassword" type="password"
                           class="form-control form-control-lg form-control-solid @error('oldPassword') is-invalid @enderror"
                           required autocomplete="current-password"/>
                    @error('oldPassword')
                    <div class="fv-plugins-message-container invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <!-- New Password -->
                <div class="mb-10 fv-row" data-kt-password-meter="true">
                    <div class="mb-1">
                        <label class="form-label fw-bolder text-dark fs-6">New Password</label>
                        <div class="position-relative mb-3">
                            <input id="password" name="password" type="password"
                                   class="form-control form-control-lg form-control-solid @error('password') is-invalid @enderror"
                                   required autocomplete="new-password"/>
                            <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                                  data-kt-password-meter-control="visibility">
                            <i class="bi bi-eye-slash fs-2"></i>
                            <i class="bi bi-eye fs-2 d-none"></i>
                        </span>
                        </div>
                        @error('password')
                        <div class="fv-plugins-message-container invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror

                        <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                        </div>
                    </div>
                    <div class="text-muted">Use 8 or more characters with a mix of letters, numbers &amp; symbols.</div>
                </div>

                <!-- Confirm Password -->
                <div class="fv-row mb-10">
                    <label class="form-label fw-bolder text-dark fs-6">Confirm Password</label>
                    <input id="password_confirmation" name="password_confirmation" type="password"
                           class="form-control form-control-lg form-control-solid @error('password_confirmation') is-invalid @enderror"
                           required autocomplete="new-password"/>
                    @error('password_confirmation')
                    <div class="fv-plugins-message-container invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="fv-row mb-10">
                    <div class="form-check form-check-custom form-check-solid form-check-inline">
                        <input class="form-check-input" type="checkbox" name="toc" value="1" required/>
                        <label class="form-check-label fw-bold text-gray-700 fs-6">
                            I Agree &amp; <a href="#" class="ms-1 link-primary">Terms and conditions</a>.
                        </label>
                    </div>
                </div>

                <div class="text-center">
                    <button type="submit" id="kt_new_password_submit" class="btn btn-lg btn-primary fw-bolder">
                        <span class="indicator-label">Change password</span>
                        <span class="indicator-progress">Please wait...
                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                    </span>
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection


