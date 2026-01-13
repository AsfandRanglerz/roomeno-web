@extends('web.auth.layout.app')
@section('title','Forgot Password')

@section('content')

<div class="auth-page">

    <!-- background overlay -->
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

    <!-- Forgot Password box -->
    <div class="auth-content px-2">
        <div class="auth-card mt-2 mb-5">

            <h4 class="text-white mb-4">Forgot Password</h4>

            {{-- Error --}}
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

            <form action="{{ route('send.otp') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label class="form-label text-white">
                        Email <span class="text-danger">*</span>
                    </label>
                    <input type="email"
                           name="email"
                           class="form-control auth-input"
                           placeholder="example@gmail.com"
                           required>
                </div>

                <button type="submit" class="btn auth-login-btn w-100">
                    Next
                </button>
            </form>

        </div>
    </div>

</div>

@endsection
