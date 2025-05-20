@extends('layouts.app')

@section('auth-content')
<form class="form w-100" method="POST" action="{{ route('password.email') }}" novalidate="novalidate">
    @csrf

    <div class="text-center mb-10">
        <h1 class="text-dark mb-3">Forgot Password ?</h1>
        <div class="text-gray-400 fw-bold fs-4">Enter your email to reset your password.</div>
    </div>

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="fv-row mb-10">
        <label class="form-label fw-bolder text-gray-900 fs-6">Email</label>
        <input class="form-control form-control-solid @error('email') is-invalid @enderror"
               type="email"
               name="email"
               value="{{ old('email') }}"
               required
               autocomplete="email"
               autofocus />

        @error('email')
            <div class="fv-plugins-message-container invalid-feedback">
                <div data-field="email" data-validator="notEmpty">{{ $message }}</div>
            </div>
        @enderror
    </div>

    <div class="d-flex flex-wrap justify-content-center pb-lg-0">
        <button type="submit" class="btn btn-lg btn-primary fw-bolder me-4">
            <span class="indicator-label">Submit</span>
            <span class="indicator-progress">Please wait...
            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
        </button>
        <a href="{{ route('login') }}" class="btn btn-lg btn-light-primary fw-bolder">Cancel</a>
    </div>
</form>
@endsection