@extends('web.auth.layout.app')
@section('title','Set Password')

@section('content')

<div class="auth-page">

    <!-- overlay -->
    <div class="auth-overlay"></div>

    <!-- Header -->
    <header class="auth-header">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <img src="{{ asset('public/web/assets/images/header_logo.png') }}"
                 class="navbar-brand logo-in-auth px-2" alt="Roomeno">

            <div class="px-2 auth-header-actions">
                <a href="#" class="login-btn-in-auth-header">Login</a>
                <a href="#" class="text-white text-decoration-none ms-3 sell-my-room-btn-in-auth">Sell My Room +</a>
            </div>
        </div>
    </header>

    <!-- Content -->
    <div class="auth-content px-2 ">
        <div class="auth-card mt-2 mb-5">

            <h4 class="text-white mb-4">Set Password</h4>

            {{-- Errors --}}
            @if(session('error'))
                <div class="alert alert-danger small">
                    {{ session('error') }}
                </div>
            @endif

            {{-- Success --}}
            @if(session('success'))
                <div class="alert alert-success small">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('reset.password.submit') }}" method="POST">
                @csrf

                {{-- Password --}}
                <div class="mb-3 auth-password-field">
                    <div class="d-flex justify-content-between align-items-center mb-1">
                        <label class="form-label mb-0 text-white">
                            Password <span class="text-danger">*</span>
                        </label>

                        <span class="toggle-password text-white hide-icons"
                              toggle="#password"
                              style="cursor:pointer;">
                            <span class="eye-icon"></span>
                            <span class="mx-1 toggle-text">Hide</span>
                        </span>
                    </div>

                    <input type="password"
                           id="password"
                           name="password"
                           class="form-control auth-input"
                           placeholder="Enter your password"
                           required>
                </div>

                {{-- Confirm Password --}}
                <div class="mb-4 auth-password-field">
                    <div class="d-flex justify-content-between align-items-center mb-1">
                        <label class="form-label mb-0 text-white">
                            Confirm Password <span class="text-danger">*</span>
                        </label>

                        <span class="toggle-password text-white hide-icons"
                              toggle="#password_confirmation"
                              style="cursor:pointer;">
                            <span class="eye-icon"></span>
                            <span class="mx-1 toggle-text">Hide</span>
                        </span>
                    </div>

                    <input type="password"
                           id="password_confirmation"
                           name="password_confirmation"
                           class="form-control auth-input"
                           placeholder="Enter your confirm password"
                           required>
                </div>

                <input type="hidden" name="otp_token" value="{{ $otp_token }}">

                <button type="submit" class="btn auth-login-btn w-100">
                    Continue
                </button>

            </form>

        </div>
    </div>

</div>

@endsection
