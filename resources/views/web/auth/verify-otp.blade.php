@extends('web.auth.layout.app')
@section('title','OTP Verification')

@section('content')

<div class="auth-page">

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

    <!-- OTP box -->
    <div class="auth-content px-2">
        <div class="auth-card mt-2 mb-5">

            <h4 class="text-white mb-4">OTP Verification</h4>

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

            <form action="{{ route('verify.otp') }}" method="POST">
                @csrf

                <div class="mb-2">
                    <label class="form-label text-white">OTP</label>
                    <input type="text"
                           name="otp"
                           class="form-control auth-input"
                           placeholder="Enter your 4 digit OTP"
                           required>

                    <input type="hidden" name="otp_token" value="{{ $otpUser->otp_token }}">
                </div>

                <!-- Resend link -->
                <div class="text-end mb-4">
                    <form action="{{ route('resend.otp') }}" method="POST">
                        @csrf
                        <input type="hidden" name="otp_token" value="{{ $otpUser->otp_token }}">

                        <button type="submit"
                                class="btn p-0 border-0 bg-transparent auth-link resend-otp-btn">
                            Resend
                        </button>
                    </form>
                </div>

                <button type="submit" class="btn auth-login-btn w-100">
                    Next
                </button>

            </form>

        </div>
    </div>

</div>

@endsection
