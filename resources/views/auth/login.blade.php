@extends('layouts.app')

@section('auth-content')
    <!--begin::Form-->
    <form class="form w-100" novalidate="novalidate" id="kt_sign_in_form" action="{{ route('login') }}" method="POST">
        @csrf

        <!--begin::Heading-->
        <div class="text-center mb-10">
            <!--begin::Title-->
            <h1 class="text-dark mb-3">Sign In to Metronic</h1>
            <!--end::Title-->
            <!--begin::Link-->
            <div class="text-gray-400 fw-bold fs-4">New Here?
                <a href="{{ route('register') }}" class="link-primary fw-bolder">Create an Account</a></div>
            <!--end::Link-->
        </div>
        <!--begin::Heading-->
        <!--begin::Input group-->
        <div class="fv-row mb-10">
            <!--begin::Label-->
            <label class="form-label fs-6 fw-bolder text-dark">Email</label>
            <!--end::Label-->
            <!--begin::Input-->
            <input class="form-control form-control-lg form-control-solid" type="email" name="email" autocomplete="off"
                   required/>
            <!--end::Input-->
            @error('email')
            <div class="fv-plugins-message-container invalid-feedback">
                <div data-field="email" data-validator="notEmpty">{{ $message }}</div>
            </div>
            @enderror
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="fv-row mb-10">
            <!--begin::Wrapper-->
            <div class="d-flex flex-stack mb-2">
                <!--begin::Label-->
                <label class="form-label fw-bolder text-dark fs-6 mb-0">Password</label>
                <!--end::Label-->

                <!--begin::Link-->
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="link-primary fs-6 fw-bolder">Forgot Your
                        Password?</a>
                @endif
                <!--end::Link-->

            </div>
            <!--end::Wrapper-->
            <!--begin::Input-->
            <input class="form-control form-control-lg form-control-solid" type="password" name="password"
                   autocomplete="off" required/>
            <!--end::Input-->
            @error('password')
            <div class="fv-plugins-message-container invalid-feedback">
                <div data-field="password" data-validator="notEmpty">{{ $message }}</div>
            </div>
            @enderror
        </div>
        <!--end::Input group-->
        <div class="fv-row mb-10">

            <!--begin::Input-->
            <input class="form-check-input" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} />
            <!--end::Input-->
            <!--begin::Label-->
            <label class="form-label fs-6 fw-bolder text-dark">Remember Me</label>
            <!--end::Label-->

        </div>
        <!--begin::Actions-->
        <div class="text-center">
            <!--begin::Submit button-->
            <button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-primary w-100 mb-5" data-kt-page-loading>
                <span class="indicator-label">Continue</span>
                <span class="indicator-progress">Please wait...
                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
            </button>
            <!--end::Submit button-->
        </div>
        <!--end::Actions-->
    </form>
    <!--end::Form-->
@endsection
