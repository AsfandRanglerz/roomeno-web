@extends('web.auth.layout.app')
@section('title','Login')

@section('content')

<div class="auth-page">

    <!-- background overlay -->
    <div class="auth-overlay"></div>

    <!-- Header -->
    <header class="auth-header">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <img src="{{ asset('public/web/assets/images/header_logo.png') }}" class="navbar-brand logo-in-auth px-2" alt="Roomeno">

            <div class="px-2 auth-header-actions">
                <a href="#" class="login-btn-in-auth-header ">Login</a>
                <a href="#" class="text-white text-decoration-none ms-3 sell-my-room-btn-in-auth">Sell My Room +</a>
            </div>
        </div>
    </header>

    <!-- Login box -->
    <div class="auth-content px-2">
        <div class="auth-card mt-2 mb-5">

            <h4 class="text-white mb-4">Log in</h4>

            <form action="{{ route('login.submit') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label text-white">Email <span class="text-danger">*</span> </label>
                    <input type="email" name="email" class="form-control auth-input" placeholder="example@gmail.com"
                        required>
                </div>

                <div class="d-flex justify-content-between align-items-center mb-1">
                    <label class="form-label mb-0 text-white">Password <span class="text-danger">*</span></label>

                    <span class="toggle-password text-white hide-icons" toggle="#password" style="cursor:pointer;">
                        <span class="eye-icon"></span>
                        <span class="mx-1 toggle-text">Hide</span>
                    </span>
                </div>

                <input type="password" id="password" class="form-control auth-input">


                <div class="d-flex justify-content-between align-items-center mb-3">
                    <label class="text-white mt-1 small remember-checkbox">
                        <input type="checkbox">
                        <span>Remember Me</span>
                    </label>
                </div>


                <button type="submit" class="btn auth-login-btn w-100">
                    Log in
                </button>

                <div class="text-center mt-3">
                    <a href="#" class="auth-link">Forgot your password</a>

                </div>
                <div class="text-center mt-3">

                    <span class="text-light text-small">Don't have an account?<a href="#" class="auth-link">Sign
                            Up</a></span>
                </div>

                <div class="auth-divider my-4">
                    <span>Or continue with</span>
                </div>

                <div class="auth-social text-center">
                    <a href="#" class="auth-social-link">
                        <span class="bi bi-facebook"></span>
                    </a>

                    <a href="#" class="auth-social-link">
                        <span class="bi bi-google"></span>
                    </a>

                    <a href="#" class="auth-social-link">
                        <span class="bi bi-apple"></span>
                    </a>
                </div>


            </form>

        </div>
    </div>

</div>

@endsection