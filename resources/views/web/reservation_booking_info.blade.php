@extends('web.layout.app')
@section('title','Reservation Booking Information')
@section('content')

<div class="container-fluid reservation-booking-wrapper px-0">

    <!-- HERO -->
    <div class="container-fluid reservation-booking-hero d-flex flex-column align-items-center text-center">

        <h3 class="reservation-booking-title text-white mb-3">
            Booking info
        </h3>

        <!-- STEPS -->
        <div class="reservation-steps-card mb-4">
            <div class="reservation-step completed">
                <span class="step-circle">1</span>
                <span class="step-text">Hotel Info</span>
            </div>

            <span class="step-arrow">→</span>

            <div class="reservation-step active">
                <span class="step-circle">2</span>
                <span class="step-text">Reservation Info</span>
            </div>
        </div>

        <!-- FORM CARD -->
        <div class="reservation-booking-card mb-5">

            <!-- HOTEL SUMMARY -->
            <div class="reservation-hotel-summary mb-3">
                <img src="{{ asset('public/web/assets/images/hotel2.webp') }}" class="hotel-thumb" alt="">
                <div class="hotel-summary-text text-start">
                    <h6 class="mb-1">Hotel gulberg grand</h6>
                    <p class="mb-0">Dec 5, 2025 – Jan 6, 2026 (32 nights)</p>
                    <small>1 adult</small>
                </div>
            </div>

            <!-- FORM -->
            <form class="row g-3">

                <div class="col-md-6">
                    <input type="text" class="form-control" placeholder="First name*">
                </div>

                <div class="col-md-6">
                    <input type="text" class="form-control" placeholder="Last name*">
                </div>

                <div class="col-md-6">
                    <select class="form-select">
                        <option selected disabled>Country/Region*</option>
                        <option>Pakistan</option>
                        <option>UAE</option>
                    </select>
                </div>

                <div class="col-md-6">
                    <input type="text" class="form-control" placeholder="Phone Number*">
                </div>

                <div class="col-md-6">
                    <input type="email" class="form-control" placeholder="Email address*">
                </div>

                <div class="col-md-6">
                    <select class="form-select">
                        <option selected disabled>Type of booking*</option>
                        <option>Refundable</option>
                        <option>Non-Refundable</option>
                    </select>
                </div>

                <div class="col-md-6">
                    <input type="text" class="form-control" placeholder="Confirmation Number*">
                </div>

                <!-- BUTTONS -->
                <div class="col-12 d-flex justify-content-between mt-3">
                    <button type="button" class="btn btn-back">
                        ← Back
                    </button>
                    <button type="submit" class="btn btn-finish">
                        Finish
                    </button>
                </div>

            </form>
        </div>
        <div class="row g-4 roomeno-how-work-row mb-5">

            <!-- CARD 1 -->
            <div class="col-md-4">
                <div class="roomeno-work-card">
                    <span class="roomeno-work-icon">📝</span>
                    <h6 class="roomeno-card-title">
                        How Does Roomeno Work?
                    </h6>
                    <p class="roomeno-card-text">
                        Post your reservation for sale on Roomeno including the details and total asking price for your
                        reservation. We recommend listing the reservation for 50% off to increase the chances it will
                        sell.
                    </p>
                </div>
            </div>

            <!-- CARD 2 -->
            <div class="col-md-4">
                <div class="roomeno-work-card">
                    <span class="roomeno-work-icon">✔️</span>
                    <h6 class="roomeno-card-title">
                        Reservation Approval
                    </h6>
                    <p class="roomeno-card-text">
                        After posting your reservation our team will confirm the reservation details. If everything
                        looks
                        accurate your listing will be approved and showcased on our site and app.
                    </p>
                </div>
            </div>

            <!-- CARD 3 -->
            <div class="col-md-4">
                <div class="roomeno-work-card">
                    <span class="roomeno-work-icon">💳</span>
                    <h6 class="roomeno-card-title">
                        Reservation Transfer and Payment
                    </h6>
                    <p class="roomeno-card-text">
                        Once sold, you'll be contacted to change the name on the listing. In certain cases, our team may
                        step
                        in to perform the name change. The amount will be credited to your roomeno account within 10
                        days
                        after checkout.
                    </p>
                </div>
            </div>

        </div>
    </div>
</div>


@endsection