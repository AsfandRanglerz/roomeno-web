@extends('web.partner.layout.app')
@section('title','Sign Up as Partner')

@section('content')
<section class="partner-header text-center text-white py-4">
    <img src="{{ asset('public/web/assets/images/handshake.png') }}" height="40" class="mb-2">
    <h4 class="mb-1">Partner with Roomeno</h4>
    <p class="mb-0 small">
        Add, manage and sell hotel rooms on the Roomeno Partner Network
    </p>
</section>
<div class="container-fluid bg-light">

    <!-- Benefits -->
    <section class="container py-5 text-center">
        <div class="row justify-content-center g-4">

            <div class="col-md-3">
                <img src="{{ asset('public/web/assets/images/bulb.png') }}" height="40">
                <p class="mt-2 small">
                    Re-sell otherwise<br>unsalable reservations
                </p>
            </div>

            <div class="col-md-3">
                <img src="{{ asset('public/web/assets/images/tick.png') }}" height="40">
                <p class="mt-2 small">
                    Improve customer<br>satisfaction
                </p>
            </div>

            <div class="col-md-3">
                <img src="{{ asset('public/web/assets/images/dollar.png') }}" height="40">
                <p class="mt-2 small">
                    Retain commissions lost<br>from cancellations
                </p>
            </div>

        </div>
    </section>

    <!-- Login Card -->
    <section class="container pb-5">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <div class="card shadow-sm border-0">

                    <!-- Tabs -->
                    <div class="d-flex text-center">
                        <div class="w-50 py-2 fw-semibold text-success border-bottom border-success">
                            JOIN
                        </div>
                        <div class="w-50 py-2 border-start text-muted">
                            LOGIN
                        </div>
                    </div>

                    <div class="card-body p-4">

                        <h5 class="text-center mb-4">Become a Roomeno Partner</h5>

                        <!-- First Name -->
                        <div class="mb-3">
                            <label class="form-label small">First Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="e.g. John">
                        </div>

                        <!-- Last Name -->
                        <div class="mb-3">
                            <label class="form-label small">Last Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="e.g. Smith">
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label class="form-label small">Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" placeholder="example@gmail.com">
                        </div>

                        <!-- Phone -->
                        <div class="mb-3">
                            <label class="form-label small">Phone Number <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="Enter your phone number">
                        </div>

                        <!-- Company Name -->
                        <div class="mb-3">
                            <label class="form-label small">Company Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="Enter your company name">
                        </div>

                        <!-- Company Address -->
                        <div class="mb-3">
                            <label class="form-label small">Company Address <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="Enter your company address">
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <label class="form-label small">Password <span class="text-danger">*</span></label>
                            <input type="password" class="form-control" placeholder="Enter your password">
                        </div>

                        <!-- Confirm Password -->
                        <div class="mb-3">
                            <label class="form-label small">Confirm Password <span class="text-danger">*</span></label>
                            <input type="password" class="form-control" placeholder="Enter your password">
                        </div>

                        <!-- Terms -->
                        <p class="small text-muted text-center mb-3">
                            By joining you are agreeing to our
                            <a href="#" class="text-decoration-none text-success">Terms of Use</a> &
                            <a href="#" class="text-decoration-none text-success">Privacy Policy</a>
                        </p>

                        <!-- Button -->
                        <button class="btn btn-login-in-oartner w-100 py-2 mb-3">
                            Sign Up
                        </button>

                        <!-- Footer Link -->
                        <div class="text-center small fw-semibold">
                            I'm already a partner
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </section>

    <!-- Description -->
    <section class="container text-center mb-5">
        <p class="small text-muted fw-bold">
            Roomeno partners with hotels, travel agencies, and meeting <br>
            planners to create a better customer experience and <br>
            increase revenues.
            <span class="text-primary fw-semibold">For Free.</span>
        </p>
    </section>

    <!-- Partners Slider -->
    <section class="container pb-5 text-center">
        <h2 class="mb-4">Our Partners</h2>

        <div class="partner-slider d-flex align-items-center justify-content-center gap-4">
            <div class="partner-logo d-flex align-items-center gap-3">
                <img src="{{ asset('public/web/assets/images/partner1.png') }}">
                <img src="{{ asset('public/web/assets/images/partner1.png') }}">
            </div>

        </div>
    </section>

</div>
<!-- END container-fluid -->

@endsection