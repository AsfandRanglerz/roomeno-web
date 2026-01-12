@extends('web.layout.app')
@section('title','Booking Confirmation')

@section('content')
<div class="container my-5">
    <div class="row g-4">

        <div class="col-md-8 order-md-1 order-2">
            <div class="card border shadow-sm">
                <img src="{{ asset('public/web/assets/images/hotel2.webp') }}" class="card-img-top"
                    style="height:230px; object-fit:cover;" alt="Hotel Image">

                <div class="card-body px-4 py-3">

                    <!-- Hotel Name -->
                    <h5 class="fw-bold mb-2">Hotel Norrebro</h5>

                    <p class="text-muted mb-3">
                        3-star hotel located in the heart of Copenhagen
                    </p>

                    <hr class="my-3">

                    <!-- Trip Start -->
                    <p class="mb-3">
                        Your trip starts
                        <strong>Friday, 09 December 2022</strong>
                    </p>

                    <!-- Check-in -->
                    <div class="d-flex align-items-center mb-2">
                        <span class="bi bi-calendar-check text-muted me-2"></span>

                        <div class="d-flex justify-content-between w-100 small">
                            <strong class="me-2">Check-in</strong>
                            <span class="text-muted text-end">
                                Friday, 09 December 2022, from 3 PM
                            </span>
                        </div>
                    </div>

                    <!-- Check-out -->
                    <div class="d-flex align-items-center mb-3">
                        <span class="bi bi-calendar-x text-muted me-2"></span>

                        <div class="d-flex justify-content-between w-100 small">
                            <strong class="me-2">Check-out</strong>
                            <span class="text-muted text-end">
                                Monday, 12 December 2022, until 11 AM
                            </span>
                        </div>
                    </div>


                    <hr class="my-3">

                    <div class="mb-3">

                        <!-- Address -->
                        <div class="d-flex justify-content-between align-items-start mb-2 small">
                            <span class="fw-semibold me-3">Hotel address</span>
                            <span class="text-muted text-end">
                                Norrebrogade 9, 10178 Copenhagen, Denmark
                            </span>
                        </div>

                        <!-- Email -->
                        <div class="d-flex justify-content-between align-items-center mb-2 small">
                            <span class="fw-semibold me-3">E-mail</span>
                            <span class="text-muted text-end">
                                example@mail.com
                            </span>
                        </div>

                        <!-- Phone -->
                        <div class="d-flex justify-content-between align-items-center small">
                            <span class="fw-semibold me-3">Phone Number</span>
                            <span class="text-muted text-end">
                                00112324324
                            </span>
                        </div>

                    </div>
                    <hr class="my-3">

                    <!-- Price -->
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div>
                            <strong>Total price:</strong>
                            <span class="ms-1">$xxx</span>
                            <span class="badge bg-success ms-2">Paid</span>
                        </div>
                    </div>

                    <!-- Buttons -->
                    <div class="d-flex gap-3 mt-2">
                        <a href="#" class="btn btn-success px-4">
                            View Details
                        </a>
                        <a href="#" class="btn btn-outline-secondary px-4">
                            Cancel Reservation
                        </a>
                    </div>

                </div>
            </div>
        </div>

        <!-- RIGHT: Confirmation Tick -->
        <div class="col-md-4 order-md-2 order-1">
            <div class="card border shadow-sm text-center p-4 h-100
                  d-flex justify-content-center">

                <div class="mb-3">
                    <div class="rounded-circle bg-success
                      d-inline-flex align-items-center justify-content-center" style="width:90px;height:90px;">
                        <span class="bi bi-check-lg text-white fs-1"></span>
                    </div>
                </div>

                <h6 class="fw-bold mt-2">
                    Your booking is now confirmed!
                </h6>

            </div>
        </div>

    </div>
</div>
@endsection