@extends('web.auth.layout.app')
@section('title','Sign Up')

@section('content')

<div class="auth-page">

    <div class="auth-overlay"></div>

    <!-- Header -->
    <header class="auth-header">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <img src="{{ asset('public/web/assets/images/header_logo.png') }}" class="navbar-brand logo-in-auth px-2" alt="Roomeno">

            <div class="px-2 auth-header-actions">
                <a href="#" class="login-btn-in-auth-header">Login</a>
                <a href="#" class="text-white text-decoration-none ms-3 sell-my-room-btn-in-auth">Sell My Room +</a>
            </div>
        </div>
    </header>

    <!-- Sign Up box -->
    <div class="auth-content px-2">
        <div class="auth-card mb-5 m-2 ">

            <h4 class="text-white mb-4">Sign Up</h4>

            {{-- Errors --}}
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0 small">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            {{-- Success --}}
            @if(session('success'))
            <div class="alert alert-success small">
                {{ session('success') }}
            </div>
            @endif

            <form action="{{ route('signup.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label text-white">First Name <span class="text-danger">*</span></label>
                    <input type="text" name="first_name" class="form-control auth-input" value="{{ old('first_name') }}"
                        placeholder="e.g. John" required>
                </div>

                <div class="mb-3">
                    <label class="form-label text-white">Last Name <span class="text-danger">*</span></label>
                    <input type="text" name="last_name" class="form-control auth-input" value="{{ old('last_name') }}"
                        placeholder="e.g. Smith" required>
                </div>

                <div class="mb-3">
                    <label class="form-label text-white">Email <span class="text-danger">*</span></label>
                    <input type="email" name="email" class="form-control auth-input" value="{{ old('email') }}"
                        placeholder="example@gmail.com" required>
                </div>

                <div class="mb-3">
                    <label class="form-label text-white">Phone Number<span class="text-danger"> *</span></label>
                    <input type="number" name="phone" class="form-control auth-input" value="{{ old('phone') }}"
                        placeholder="e.g. 1234567890" required>
                </div>

                <div class="mb-3">
                    <label class="form-label text-white">Country<span class="text-danger"> *</span></label>
                    <input type="text" name="country" class="form-control auth-input" value="{{ old('country') }}"
                        placeholder="e.g. United States" required>
                </div>

                {{-- Password --}}
                <div class="mb-3 auth-password-field">
                    <div class="d-flex justify-content-between align-items-center mb-1">
                        <label class="form-label mb-0 text-white">
                            Password <span class="text-danger">*</span>
                        </label>

                        <span class="toggle-password text-white hide-icons" toggle="#password" style="cursor:pointer;">
                            <span class="eye-icon"></span>
                            <span class="mx-1 toggle-text">Hide</span>
                        </span>
                    </div>

                    <input type="password" id="password" name="password" class="form-control auth-input"
                        placeholder="Enter your password" required>
                </div>

                {{-- Confirm Password --}}
                <div class="mb-3 auth-password-field">
                    <div class="d-flex justify-content-between align-items-center mb-1">
                        <label class="form-label mb-0 text-white">
                            Confirm Password <span class="text-danger">*</span>
                        </label>

                        <span class="toggle-password text-white hide-icons" toggle="#password_confirmation"
                            style="cursor:pointer;">
                            <span class="eye-icon"></span>
                            <span class="mx-1 toggle-text">Hide</span>
                        </span>
                    </div>

                    <input type="password" id="password_confirmation" name="password_confirmation"
                        class="form-control auth-input mb-3" placeholder="Confirm your password" required>
                    <div class="mb-3">

                        <label class="form-label text-white">Referral Code</label>
                        <input type="text" name="referral_code" class="form-control auth-input"
                            placeholder="Enter your referral code">
                    </div>



                    {{-- Terms --}}
                    <div class="d-flex align-items-center mb-3">
                        <label class="text-white small remember-checkbox">
                            <input type="checkbox" required>
                            <span>I agree to the Terms & Privacy Policy</span>
                        </label>
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <label class="text-white small remember-checkbox">
                            <input type="checkbox" required>
                            <span>I want to receive notifications about travel deals and other marketing
                                communications</span>
                        </label>
                    </div>

                    <button type="submit" class="btn auth-login-btn w-100">
                        Sign Up
                    </button>

                    <div class="text-center mt-3">
                        <span class="text-light small">
                            Have an account?
                            <a href="#" class="auth-link">Login</a>
                        </span>
                    </div>

            </form>

        </div>
    </div>

</div>

@endsection