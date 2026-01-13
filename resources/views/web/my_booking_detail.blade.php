@extends('web.layout.app')
@section('title','Personal Detail')

@section('content')
<div class="container-fluid p-5 main-container-for-user-account">

    <div class="row px-0 ua-mobile-wrapper">

        <!-- Sidebar -->
        <aside class="user-account-sidebar col-sm-3">

            <div class="ua-user-box text-center mb-4">
                <h6 class="mb-0">Adam Smith</h6>
                <span>example@gmail.com</span>
                <div class="ua-credit m-2">
                    <span>Roomeno Credit:50$</span>
                </div>
            </div>

            <ul class="list-unstyled ua-menu">

                <li>
                    <a href="#" class="ua-link">
                        <span class="ua-icon bi bi-person"></span>
                        <span class="ua-text">Personal Details</span>
                    </a>
                </li>

                <li class="active">
                    <a href="#" class="ua-link">
                        <span class="ua-icon bi bi-calendar"></span>
                        <span class="ua-text">My Bookings</span>
                    </a>
                </li>

                <li>
                    <a href="#" class="ua-link">
                        <span class="ua-icon bi bi-house"></span>
                        <span class="ua-text">My Listings</span>
                    </a>
                </li>

                <li>
                    <a href="#" class="ua-link">
                        <span class="ua-icon bi bi-wallet2"></span>
                        <span class="ua-text">My Wallet</span>
                    </a>
                </li>

                <li>
                    <a href="#" class="ua-link">
                        <span class="ua-icon bi bi-file-text"></span>
                        <span class="ua-text">Terms & Conditions</span>
                    </a>
                </li>

                <li>
                    <a href="#" class="ua-link">
                        <span class="ua-icon bi bi-x-circle"></span>
                        <span class="ua-text">Cancellation Guide</span>
                    </a>
                </li>

                <li>
                    <a href="#" class="ua-link">
                        <span class="ua-icon bi bi-question-circle"></span>
                        <span class="ua-text">Support & FAQs</span>
                    </a>
                </li>

                <!-- NOT anchor -->
                <li>
                    <span class="ua-icon bi bi-box-arrow-right"></span>
                    <span class="ua-text">Logout</span>
                </li>

                <!-- NOT anchor -->
                <li class="text-danger">
                    <span class="ua-icon bi bi-trash"></span>
                    <span class="ua-text">Delete Account</span>
                </li>

            </ul>
        </aside>

        <!-- Content -->
        <main class="ua-content-area col-sm-9">

            <div class="card border-0 shadow-sm">
                <div class="card-body">

                    <h4 class="mb-4">My Bookings</h4>

                    <div class="row">

                        <!-- CARD 1 -->
                        <div class="col-md-4 col-sm-6 div-for-deals-info mb-4">
                            <div class="card deal-card">
                                <a href="#" class="text-decoration-none text-dark d-flex flex-column h-100">

                                    <div class="deal-img d-flex align-items-center justify-content-center">
                                        <img src="{{ asset('public/web/assets/images/hotel6.webp') }}"
                                             alt="Hotel Image"
                                             class="deal-img-fluid">

                                        <div class="deal-label d-flex justify-content-between align-items-center">
                                            <span>Book and Save</span>
                                            <span class="off-percentage-text">75% Off</span>
                                        </div>
                                    </div>

                                    <div class="deal-content p-3">

                                        <div class="deal-stars">
                                            <span class="bi bi-star-fill"></span>
                                            <span class="bi bi-star-fill"></span>
                                            <span class="bi bi-star-fill"></span>
                                            <span class="bi bi-star-fill"></span>
                                            <span class="bi bi-star-fill"></span>
                                        </div>

                                        <span class="deal-hotel-name">Hotel Sunshine</span>

                                        <div class="deal-location d-flex align-items-center mb-0">
                                            <span class="bi bi-geo-alt me-1 location-icon-in-deal"></span>
                                            <span class="hotel-location-name">New York, USA</span>
                                        </div>

                                        <div class="deal-rating-box d-flex align-items-center mt-1">
                                            <div class="deal-rating-point me-2">
                                                <span>8.6</span>
                                            </div>
                                            <div class="deal-reviews d-flex flex-column small">
                                                <span>Good</span>
                                                <span class="deal-reviews-total">1,235 Reviews</span>
                                            </div>
                                        </div>

                                        <div class="deal-date d-flex align-items-center mt-2 calender-span-for-deal-div">
                                            <span class="bi bi-calendar-event me-1"></span>
                                            <span>12 Dec - 15 Dec</span>
                                        </div>

                                        <div class="deal-price d-flex justify-content-between align-items-center mt-2">
                                            <span class="deal-price-title">Per Night</span>
                                            <div class="d-flex justify-content-end price-box">
                                                <span class="actual-price">$120</span>
                                                <span class="offered-price">$87</span>
                                            </div>
                                        </div>

                                    </div>
                                </a>
                            </div>
                        </div>

                        <!-- CARD 2 -->
                        <div class="col-md-4 col-sm-6 div-for-deals-info mb-4">
                            <div class="card deal-card">
                                <a href="#" class="text-decoration-none text-dark d-flex flex-column h-100">

                                    <div class="deal-img d-flex align-items-center justify-content-center">
                                        <img src="{{ asset('public/web/assets/images/hotel6.webp') }}"
                                             alt="Hotel Image"
                                             class="deal-img-fluid">

                                        <div class="deal-label d-flex justify-content-between align-items-center">
                                            <span>Book and Save</span>
                                            <span class="off-percentage-text">75% Off</span>
                                        </div>
                                    </div>

                                    <div class="deal-content p-3">

                                        <div class="deal-stars">
                                            <span class="bi bi-star-fill"></span>
                                            <span class="bi bi-star-fill"></span>
                                            <span class="bi bi-star-fill"></span>
                                            <span class="bi bi-star-fill"></span>
                                            <span class="bi bi-star-fill"></span>
                                        </div>

                                        <span class="deal-hotel-name">Hotel Sunshine</span>

                                        <div class="deal-location d-flex align-items-center mb-0">
                                            <span class="bi bi-geo-alt me-1 location-icon-in-deal"></span>
                                            <span class="hotel-location-name">New York, USA</span>
                                        </div>

                                        <div class="deal-rating-box d-flex align-items-center mt-1">
                                            <div class="deal-rating-point me-2">
                                                <span>8.6</span>
                                            </div>
                                            <div class="deal-reviews d-flex flex-column small">
                                                <span>Good</span>
                                                <span class="deal-reviews-total">1,235 Reviews</span>
                                            </div>
                                        </div>

                                        <div class="deal-date d-flex align-items-center mt-2 calender-span-for-deal-div">
                                            <span class="bi bi-calendar-event me-1"></span>
                                            <span>12 Dec - 15 Dec</span>
                                        </div>

                                        <div class="deal-price d-flex justify-content-between align-items-center mt-2">
                                            <span class="deal-price-title">Per Night</span>
                                            <div class="d-flex justify-content-end price-box">
                                                <span class="actual-price">$120</span>
                                                <span class="offered-price">$87</span>
                                            </div>
                                        </div>

                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 div-for-deals-info mb-4">
                            <div class="card deal-card">
                                <a href="#" class="text-decoration-none text-dark d-flex flex-column h-100">

                                    <div class="deal-img d-flex align-items-center justify-content-center">
                                        <img src="{{ asset('public/web/assets/images/hotel6.webp') }}"
                                             alt="Hotel Image"
                                             class="deal-img-fluid">

                                        <div class="deal-label d-flex justify-content-between align-items-center">
                                            <span>Book and Save</span>
                                            <span class="off-percentage-text">75% Off</span>
                                        </div>
                                    </div>

                                    <div class="deal-content p-3">

                                        <div class="deal-stars">
                                            <span class="bi bi-star-fill"></span>
                                            <span class="bi bi-star-fill"></span>
                                            <span class="bi bi-star-fill"></span>
                                            <span class="bi bi-star-fill"></span>
                                            <span class="bi bi-star-fill"></span>
                                        </div>

                                        <span class="deal-hotel-name">Hotel Sunshine</span>

                                        <div class="deal-location d-flex align-items-center mb-0">
                                            <span class="bi bi-geo-alt me-1 location-icon-in-deal"></span>
                                            <span class="hotel-location-name">New York, USA</span>
                                        </div>

                                        <div class="deal-rating-box d-flex align-items-center mt-1">
                                            <div class="deal-rating-point me-2">
                                                <span>8.6</span>
                                            </div>
                                            <div class="deal-reviews d-flex flex-column small">
                                                <span>Good</span>
                                                <span class="deal-reviews-total">1,235 Reviews</span>
                                            </div>
                                        </div>

                                        <div class="deal-date d-flex align-items-center mt-2 calender-span-for-deal-div">
                                            <span class="bi bi-calendar-event me-1"></span>
                                            <span>12 Dec - 15 Dec</span>
                                        </div>

                                        <div class="deal-price d-flex justify-content-between align-items-center mt-2">
                                            <span class="deal-price-title">Per Night</span>
                                            <div class="d-flex justify-content-end price-box">
                                                <span class="actual-price">$120</span>
                                                <span class="offered-price">$87</span>
                                            </div>
                                        </div>

                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 div-for-deals-info mb-4">
                            <div class="card deal-card">
                                <a href="#" class="text-decoration-none text-dark d-flex flex-column h-100">

                                    <div class="deal-img d-flex align-items-center justify-content-center">
                                        <img src="{{ asset('public/web/assets/images/hotel6.webp') }}"
                                             alt="Hotel Image"
                                             class="deal-img-fluid">

                                        <div class="deal-label d-flex justify-content-between align-items-center">
                                            <span>Book and Save</span>
                                            <span class="off-percentage-text">75% Off</span>
                                        </div>
                                    </div>

                                    <div class="deal-content p-3">

                                        <div class="deal-stars">
                                            <span class="bi bi-star-fill"></span>
                                            <span class="bi bi-star-fill"></span>
                                            <span class="bi bi-star-fill"></span>
                                            <span class="bi bi-star-fill"></span>
                                            <span class="bi bi-star-fill"></span>
                                        </div>

                                        <span class="deal-hotel-name">Hotel Sunshine</span>

                                        <div class="deal-location d-flex align-items-center mb-0">
                                            <span class="bi bi-geo-alt me-1 location-icon-in-deal"></span>
                                            <span class="hotel-location-name">New York, USA</span>
                                        </div>

                                        <div class="deal-rating-box d-flex align-items-center mt-1">
                                            <div class="deal-rating-point me-2">
                                                <span>8.6</span>
                                            </div>
                                            <div class="deal-reviews d-flex flex-column small">
                                                <span>Good</span>
                                                <span class="deal-reviews-total">1,235 Reviews</span>
                                            </div>
                                        </div>

                                        <div class="deal-date d-flex align-items-center mt-2 calender-span-for-deal-div">
                                            <span class="bi bi-calendar-event me-1"></span>
                                            <span>12 Dec - 15 Dec</span>
                                        </div>

                                        <div class="deal-price d-flex justify-content-between align-items-center mt-2">
                                            <span class="deal-price-title">Per Night</span>
                                            <div class="d-flex justify-content-end price-box">
                                                <span class="actual-price">$120</span>
                                                <span class="offered-price">$87</span>
                                            </div>
                                        </div>

                                    </div>
                                </a>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

        </main>

    </div>
</div>
@endsection
