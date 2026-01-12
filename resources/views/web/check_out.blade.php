@extends('web.layout.app')
@section('title','Check Out')

@section('content')
<div class="container-fluid py-5">
    <div class="row px-0 px-sm-5 px-1 main-row-div-check-out">
        <h2 class="mb-4">Checkout</h2>

        <!-- LEFT SIDE -->
        <div class="col-md-6">
            <h3 class="mb-4">Your Detail</h3>

            <div class="row">
                <!-- First Name -->
                <div class="col-md-6 mb-3">
                    <div class="check-out-detail-form">
                        <span class="field-title">
                            First Name <span class="text-danger">*</span>
                        </span>
                        <input type="text" class="form-control" placeholder="(e.g. John)">
                    </div>
                </div>

                <!-- Last Name -->
                <div class="col-md-6 mb-3">
                    <div class="check-out-detail-form">
                        <span class="field-title">
                            Last Name <span class="text-danger">*</span>
                        </span>
                        <input type="text" class="form-control" placeholder="(e.g. Doe)">
                    </div>
                </div>

                <!-- Email -->
                <div class="col-12 mb-3">
                    <div class="check-out-detail-form">
                        <span class="field-title">
                            Email <span class="text-danger">*</span>
                        </span>
                        <input type="text" class="form-control" placeholder="(example@email.com)">
                    </div>
                    <span class="text-muted" style="font-size:0.8rem;">To receive confirmation email.</span>
                </div>

                <!-- Country / Region -->
                <div class="col-md-6 mb-3">
                    <div class="check-out-detail-form">
                        <span class="field-title">
                            Country / Region <span class="text-danger">*</span>
                        </span>
                        <select class="form-control select2-country">
                            <option value="" disabled selected>Select Country</option>
                            <option value="PK">Pakistan</option>
                            <option value="IN">India</option>
                            <option value="US">United States</option>
                            <option value="UK">United Kingdom</option>
                        </select>
                    </div>
                    <span class="text-muted" style="font-size:0.8rem;">So the property can contact you.</span>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="check-out-detail-form">
                        <span class="field-title">
                            Phone Number <span class="text-danger">*</span>
                        </span>
                        <input type="number" class="form-control" placeholder="(e.g. 03089797699)">
                    </div>
                </div>
                <div class="col-12 mb-3">
                    <h4 class="heading-in-detail-form-for-special-request">Any Special Request?</h4>
                    <div class="check-out-detail-form">
                        <input type="text" class="form-control"
                            placeholder="The property will do its best to meet your needs.">
                    </div>
                </div>

            </div>

            <h4 class="mb-3">Payment details</h4>

            <!-- Pay With Stripe Button -->
            <button type="button" class="btn border w-100 d-flex align-items-center mb-3">
                <span class="fa fa-credit-card me-2"></span> Pay With Stripe
            </button>

            <!-- Card Number -->
            <div class="mb-3 position-relative">
                <input type="text" class="form-control" placeholder="Card Number">
                <span class="card-info text-muted position-absolute"
                    style="top:0.6rem; right:0.75rem; font-size:0.875rem;">
                    MM / YY &nbsp; CC
                </span>
            </div>

            <!-- Cardholder Name & Country -->
            <div class="row mb-3">
                <!-- Cardholder Name -->
                <div class="col-md-6 mb-3 mb-md-0">
                    <div class="check-out-detail-form">
                        <span class="field-title">
                            Cardholder Name <span class="text-danger">*</span>
                        </span>
                        <input type="text" class="form-control" placeholder="First and Last Name">
                    </div>
                </div>

                <!-- Country -->
                <div class="col-md-6">
                    <div class="check-out-detail-form">
                        <span class="field-title">
                            Country <span class="text-danger">*</span>
                        </span>
                        <select class="form-control select2-country">
                            <option value="" disabled selected>Pakistan</option>
                            <option value="PK">Pakistan</option>
                            <option value="IN">India</option>
                            <option value="US">United States</option>
                            <option value="UK">United Kingdom</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Cancellation Policy -->
            <div class="cancellation-policy border rounded p-3  mb-3">
                <strong>Cancellation policy</strong>
                <ul class="mb-0 mt-1" style="font-size:0.875rem;">
                    <li>Non-Refundable</li>
                    <li>If you cancel your reservation, you will still be charged for the full reservation amount.</li>
                    <li>We’re unable to refund any payment for no-shows or early check out.</li>
                </ul>
            </div>
            <div class="col-12 mb-3">
                <button class="btn btn-complete-booking w-100 p-3">Complete Booking</button>
                <span class="text-muted" style="font-size:0.8rem;">By clicking on the button above, I confirm I have read the <a class="text-decoration-none text-black fw-bold" href="#">Privacy Statement</a>, and have read and accept the <a class="text-decoration-none text-black fw-bold" href="#">Terms of Service</a></span>
            </div>
        </div>


        <!-- RIGHT SIDE -->
        <div class="col-md-6">

            <div class="card shadow-sm booking-card">
                <div class="card-body">

                    <!-- Hotel Info -->
                    <div class="row mb-3 align-items-center">

                        <!-- Image -->
                        <div class="col-md-6">
                            <img src="{{ asset('public/web/assets/images/hotel2.webp') }}" class="img-fluid rounded w-100"
                                alt="Hotel Image">
                        </div>

                        <!-- Details -->
                        <div class="col-md-6">
                            <div class="text-black small mb-1">★★★★★</div>
                            <h6 class="fw-bold mb-1">Madame C – Hôtel Particulier</h6>

                           
                            <div class="mb-1">
                                <span class="badge bg-light text-dark border">6.2</span>
                                <small class="text-muted ms-1">Very Good · 200 Reviews</small>
                            </div>

                            <small class="text-muted d-block">
                                351 Edgware Road, London, United Kingdom
                            </small>
                        </div>

                    </div>

                    <hr>

                    <!-- Booking Details -->
                    <h6 class="fw-bold">Your booking details</h6>

                    <div class="row g-2 mb-2">
                        <div class="col-6">
                            <div class="border rounded p-2 text-center">
                                <small class="text-muted">Check In</small>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="border rounded p-2 text-center">
                                <small class="text-muted">Check Out</small>
                            </div>
                        </div>
                    </div>

                    <small class="text-muted">Total length of stay</small>
                    <span class="float-end fw-bold">3 nights</span>

                    <hr>

                    <p class="fw-bold mb-1">
                        Double Studio Lower Ground floor No Windows, 2 Adults
                    </p>

                    <small class="text-muted">
                        <span class="bi bi-wifi"></span> Free Wi-Fi
                    </small>

                    <div class="bg-light p-2 rounded mt-3">
                        <small class="text-muted">Policy</small><br>
                        <strong>Non-Refundable</strong>
                    </div>

                    <hr>

                    <!-- Price Details -->
                    <h6 class="fw-bold">Price details</h6>

                    <div class="d-flex justify-content-between">
                        <small>$90 × 3 nights</small>
                        <small>$xxx</small>
                    </div>

                    <div class="d-flex justify-content-between">
                        <small>Taxes and fees</small>
                        <small>$xx</small>
                    </div>
                    <div class="d-flex justify-content-between">
                        <small>Original price</small>
                        <small>$xx</small>
                    </div>

                    <div class="d-flex justify-content-between">
                        <small>Discount</small>
                        <small>- $xxx</small>
                    </div>

                    <hr>

                    <div class="d-flex justify-content-between fw-bold">
                        <span>Total price</span>
                        <span>$xxx</span>
                    </div>

                </div>
            </div>


        </div>

    </div>
</div>
@endsection