@extends('layouts.app')

@section('auth-content')
    <!--begin::Authentication - Sign-up -->
    <form class="form w-100" novalidate="novalidate" id="kt_docs_formvalidation_text" action="{{ route('register') }}"
          method="POST">
        @csrf
        <!--begin::Heading-->
        <div class="mb-10 text-center">
            <!--begin::Title-->
            <h1 class="text-dark mb-3">Create an Account</h1>
            <!--end::Title-->
            <!--begin::Link-->
            <div class="text-gray-400 fw-bold fs-4">Already have an account?
                <a href="{{ route('login') }}" class="link-primary fw-bolder">Sign in here</a></div>
            <!--end::Link-->
        </div>
        <!--end::Heading-->

        <!--begin::Input group-->
        <div class="row fv-row mb-7">
            <!--begin::Col-->
            <div class="col-xl-6">
                <label class="form-label fw-bolder text-dark fs-6">Full Name</label>
                <input class="form-control form-control-lg form-control-solid" type="text"
                       placeholder="Enter your full name" name="name" value="{{ old('name') }}" autocomplete="off"/>
                @error('name')
                <div class="fv-plugins-message-container invalid-feedback">
                    <div data-field="name" data-validator="notEmpty">{{ $message }}</div>
                </div>
                @enderror
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-6">
                <label class="form-label fw-bolder text-dark fs-6">User Name</label>
                <input class="form-control form-control-lg form-control-solid" type="text"
                       placeholder="Enter your username" name="username" value="{{ old('username') }}"
                       autocomplete="off"/>
                @error('username')
                <div class="fv-plugins-message-container invalid-feedback">
                    <div data-field="username" data-validator="notEmpty">{{ $message }}</div>
                </div>
                @enderror
            </div>
            <!--end::Col-->
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="fv-row mb-7">
            <label class="form-label fw-bolder text-dark fs-6">Email</label>
            <input class="form-control form-control-lg form-control-solid" type="email" placeholder="Enter your email"
                   name="email" value="{{ old('email') }}" autocomplete="off"/>
            @error('email')
            <div class="fv-plugins-message-container invalid-feedback">
                <div data-field="email" data-validator="notEmpty">{{ $message }}</div>
            </div>
            @enderror
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="mb-10 fv-row" data-kt-password-meter="true">
            <!--begin::Wrapper-->
            <div class="mb-1">
                <!--begin::Label-->
                <label class="form-label fw-bolder text-dark fs-6">Password</label>
                <!--end::Label-->
                <!--begin::Input wrapper-->
                <div class="position-relative mb-3">
                    <input class="form-control form-control-lg form-control-solid" type="password"
                           placeholder="Enter your password" name="password" autocomplete="off"/>
                    <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                          data-kt-password-meter-control="visibility">
                    <i class="bi bi-eye-slash fs-2"></i>
                    <i class="bi bi-eye fs-2 d-none"></i>
                </span>
                    @error('password')
                    <div class="fv-plugins-message-container invalid-feedback">
                        <div data-field="password" data-validator="notEmpty">{{ $message }}</div>
                    </div>
                    @enderror
                </div>
                <!--end::Input wrapper-->
                <!--begin::Meter-->
                <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                </div>
                <!--end::Meter-->
            </div>
            <!--end::Wrapper-->
            <!--begin::Hint-->
            <div class="text-muted">Use 8 or more characters with a mix of letters, numbers &amp; symbols.</div>
            <!--end::Hint-->
        </div>
        <!--end::Input group=-->
        <!--begin::Input group-->
        <div class="fv-row mb-5">
            <label class="form-label fw-bolder text-dark fs-6">Confirm Password</label>
            <input class="form-control form-control-lg form-control-solid" type="password"
                   placeholder="Confirm your password" name="password_confirmation" autocomplete="off"/>
            @error('password_confirmation')
            <div class="fv-plugins-message-container invalid-feedback">
                <div data-field="password_confirmation" data-validator="notEmpty">{{ $message }}</div>
            </div>
            @enderror
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="fv-row mb-10">
            <label class="form-check form-check-custom form-check-solid form-check-inline">
                <input class="form-check-input" type="checkbox" name="toc" value="1"/>
                <span class="form-check-label fw-bold text-gray-700 fs-6">I Agree
            <a href="#" class="ms-1 link-primary">Terms and conditions</a>.</span>
            </label>
            @error('toc')
            <div class="fv-plugins-message-container invalid-feedback">
                <div data-field="toc" data-validator="notEmpty">{{ $message }}</div>
            </div>
            @enderror
        </div>
        <!--end::Input group-->
        <!--begin::Actions-->
        <div class="text-center">
            <button type="submit" id="kt_sign_up_submit" class="btn btn-lg btn-primary" data-kt-page-loading>
                <span class="indicator-label">Submit</span>
                <span class="indicator-progress">Please wait...
            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
            </button>
        </div>
        <!--end::Actions-->
    </form>
    <!--end::Authentication - Sign-up-->
@endsection
