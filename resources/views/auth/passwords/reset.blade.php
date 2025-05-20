@extends('layouts.app')

@section('auth-content')
<!--begin::Authentication - New password -->
  <!--begin::Form-->
  <form class="form w-100" method="POST" action="{{ route('password.update') }}" id="kt_new_password_form">
    @csrf
    <input type="hidden" name="token" value="{{ $token }}">

    <!--begin::Heading-->
    <div class="text-center mb-10">
        <!--begin::Title-->
        <h1 class="text-dark mb-3">Setup New Password</h1>
        <!--end::Title-->
        <!--begin::Link-->
        <div class="text-gray-400 fw-bold fs-4">Already have reset your password ?
        <a href="{{ route('login') }}" class="link-primary fw-bolder">Sign in here</a></div>
        <!--end::Link-->
    </div>
    <!--begin::Heading-->

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!--begin::Input group - Email-->
    <div class="fv-row mb-10">
        <label class="form-label fw-bolder text-dark fs-6">Email Address</label>
        <input class="form-control form-control-lg form-control-solid @error('email') is-invalid @enderror"
               type="email"
               name="email"
               value="{{ $email ?? old('email') }}"
               required
               autocomplete="email"
               autofocus />
        @error('email')
            <div class="fv-plugins-message-container invalid-feedback">
                <div data-field="email" data-validator="notEmpty">{{ $message }}</div>
            </div>
        @enderror
    </div>
    <!--end::Input group - Email-->

    <!--begin::Input group - Password-->
    <div class="mb-10 fv-row" data-kt-password-meter="true">
        <div class="mb-1">
            <label class="form-label fw-bolder text-dark fs-6">Password</label>
            <div class="position-relative mb-3">
                <input class="form-control form-control-lg form-control-solid @error('password') is-invalid @enderror"
                       type="password"
                       name="password"
                       required
                       autocomplete="new-password" />
                <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
                    <i class="bi bi-eye-slash fs-2"></i>
                    <i class="bi bi-eye fs-2 d-none"></i>
                </span>
                @error('password')
                    <div class="fv-plugins-message-container invalid-feedback">
                        <div data-field="password" data-validator="notEmpty">{{ $message }}</div>
                    </div>
                @enderror
            </div>
            <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
            </div>
        </div>
        <div class="text-muted">Use 8 or more characters with a mix of letters, numbers &amp; symbols.</div>
    </div>
    <!--end::Input group - Password-->

    <!--begin::Input group - Confirm Password-->
    <div class="fv-row mb-10">
        <label class="form-label fw-bolder text-dark fs-6">Confirm Password</label>
        <input class="form-control form-control-lg form-control-solid"
               type="password"
               name="password_confirmation"
               required
               autocomplete="new-password" />
    </div>
    <!--end::Input group - Confirm Password-->

    <!--begin::Action-->
    <div class="text-center">
        <button type="submit" id="kt_new_password_submit" class="btn btn-lg btn-primary fw-bolder">
            <span class="indicator-label">Reset Password</span>
            <span class="indicator-progress">Please wait...
            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
        </button>
    </div>
    <!--end::Action-->
</form>
<!--end::Form-->
<!--end::Authentication - New password-->
@endsection

@section('scripts')
<!--begin::Page Custom Javascript(used by this page)-->
<script src="{{ asset('backend/assets/js/custom/authentication/password-reset/new-password.js') }}"></script>
<!--end::Page Custom Javascript-->
@endsection