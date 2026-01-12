@extends('web.layout.app')

@section('title','Reservation Detail')

@section('content')
<div class="container-fluid px-0 reservation-detail-main-div">

    <!-- HERO CONTENT -->
    <div
        class="container-fluid reservation-detail-hero d-flex flex-column align-items-center justify-content-center text-center">

        <h3 class="text-white fw-bold mb-2">
            Stuck with a hotel reservation you can’t use?
        </h3>

        <h6 class="text-white mb-4">
            Sell it on Roomeno . Someone is willing to pay you for it.
        </h6>

        <!-- STEP + FORM CARD -->
        <div class="reservation-form-wrapper pt-3 pb-5">

            <!-- STEPS -->
            <div class="steps-card mb-3">
                <div class="step active">
                    <span class="step-number">1</span>
                    <span>Hotel Info</span>
                </div>

                <span class="step-arrow">→</span>

                <div class="step">
                    <span class="step-number">2</span>
                    <span>Reservation Info</span>
                </div>
            </div>

            <!-- FORM -->
            <div class="reservation-form-card">
                <form class="row g-3">

                    <div class="col-12">
                        <input type="text" class="form-control" placeholder="Hotel Name, City">
                    </div>

                    <div class="col-12">
                        <select class="form-select">
                            <option selected disabled>Board Name<span class="text-danger">*</span></option>
                            <option>Room Only</option>
                            <option>Breakfast</option>
                        </select>
                    </div>

                    <div class="col-md-4">

                        <input type="text" class="form-control check-in-datepicker" placeholder="Check In" readonly>
                    </div>

                    <div class="col-md-4">

                        <input type="text" class="form-control check-out-datepicker" placeholder="Check Out" readonly>
                    </div>


                    <div class="col-md-4">
                        <select class="form-select">
                            <option>1 Adult</option>
                            <option>2 Adults</option>
                        </select>
                    </div>

                    <div class="col-12 text-start">
                        <button class="btn btn-next-step">
                            Next →
                        </button>
                    </div>

                </form>
            </div>

        </div>

    </div>
</div>
<div class="container-fluid roomeno-info-wrapper py-5">
    <div class="container roomeno-info-container">

        <!-- TOP DESCRIPTION -->
        <p class="roomeno-top-description mb-4">
            Changed your travel plans? Easily resell your hotel reservation on Roomeno – one of 2025’s top travel apps
            and the
            leading resale platform for over a decade. Just fill out a quick form and share it with our global travel
            community.
            It only takes a few minutes.
        </p>

        <!-- HOW IT WORKS TITLE -->
        <h3 class="roomeno-section-title mb-4">
            How Does Roomeno Work?
        </h3>

        <!-- HOW IT WORKS CARDS -->
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

        <!-- WE PROTECT TITLE -->
        <h3 class="roomeno-section-title mb-4">
            We Protect Our Sellers
        </h3>

        <!-- PROTECT SELLERS CARDS -->
        <div class="row g-4 roomeno-protect-row">

            <!-- CARD 1 -->
            <div class="col-md-4">
                <div class="roomeno-protect-card">
                    <span class="roomeno-protect-icon">🔒</span>
                    <h6 class="roomeno-card-title">
                        Privacy Policy
                    </h6>
                    <p class="roomeno-card-text">
                        Roomeno will never use, sell or otherwise make your personal information public.
                    </p>
                </div>
            </div>

            <!-- CARD 2 -->
            <div class="col-md-4">
                <div class="roomeno-protect-card">
                    <span class="roomeno-protect-icon">💰</span>
                    <h6 class="roomeno-card-title">
                        Payment Guarantee
                    </h6>
                    <p class="roomeno-card-text">
                        When someone buys your room, Roomeno ensures that you will get paid, no matter what.
                    </p>
                </div>
            </div>

            <!-- CARD 3 -->
            <div class="col-md-4">
                <div class="roomeno-protect-card">
                    <span class="roomeno-protect-icon">📄</span>
                    <h6 class="roomeno-card-title">
                        Reservation Transfer and Payment
                    </h6>
                    <p class="roomeno-card-text">
                        You have full control over your room, even after you've listed it for sale. You can always
                        change the
                        selling price or remove the listing completely if you need to.
                    </p>
                </div>
            </div>

        </div>

    </div>
</div>

@endsection