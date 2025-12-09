@extends('web.layout.app')
@section('title','Book This Hotel')
@section('content')
<div class="container-fluid main-div-for-hotel-page">
    <div class="row px-0 main-div-for-hotel-info-content">
        <div class="col-md-8">
            <h1 class="hotel-title-with-stars">
                Royal Hotel
                <span class="rating-star-in-hotel-page">
                    ★★★★★
                </span>
            </h1>
            <div class="d-flex align-items-center gap-1 pt-3 content-location-reviews-div-in-hotel-page">
                <span class="bi bi-geo-alt me-1 location-icon-in-hotel-page-top"></span>

                <span><a href="#">Via Torino 6, Rome, Italy</a></span>

                <!-- Dot (•) before 6.7 -->
                <span class="dot-span-in-hotel-page px-2">•</span>

                <span>6.7 <a href="#" class="review-anchor-in-hotel-top-div">2557 Reviews</a></span>
            </div>



        </div>
        <div class="col-md-4 pt-md-0 pt-3 btn-div-in-hotel">
            <button class="share-btn-in-index d-flex align-items-center">Share <img
                    src="https://img.icons8.com/ios/50/reply-arrow.png" alt="share icon" class="share-icon-img">
            </button>
            <button class="reserve-btn-in-index">Reserve Room</button>
        </div>

    </div>
    <div class="row px-0 g-3 pt-sm-5 pt-2 d-flex align-items-stretch main-image-container-div-in-hotel">


        <div class="col-md-7">
            <img src="{{asset('public/web/assets/images/hotel1.webp')}}" class="big-image img-fluid h-100 w-100">
        </div>


        <div class="col-md-5">
            <div class="row px-0 g-3">

                <div class="col-6">
                    <img src="{{asset('public/web/assets/images/hotel1.webp')}}" class="small-image img-fluid w-100">
                </div>

                <div class="col-6">
                    <img src="{{asset('public/web/assets/images/hotel1.webp')}}" class="small-image img-fluid w-100">
                </div>

                <div class="col-6">
                    <img src="{{asset('public/web/assets/images/hotel1.webp')}}" class="small-image img-fluid w-100">
                </div>

                <div class="col-6">
                    <img src="{{asset('public/web/assets/images/hotel1.webp')}}" class="small-image img-fluid w-100">
                </div>

                <div class="col-6">
                    <img src="{{asset('public/web/assets/images/hotel1.webp')}}" class="small-image img-fluid w-100">
                </div>

                <!-- 6th image with overlay -->
                <div class="col-6 position-relative">
                    <img src="{{asset('public/web/assets/images/hotel1.webp')}}" class="small-image img-fluid w-100">
                    <span class="d-block remaining-badge-img">
                        12Photos
                    </span>
                </div>

            </div>
        </div>

    </div>
    <div class="row px-0 g-5 pt-sm-5 pt-2 amenities-hotel-section">

        <!-- LEFT COLUMN -->
        <div class="col-md-6">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="mb-0">Top Amenities</h4>
                <a href="#" class="show-more-link">Show More (4) ></a>
            </div>

            <!-- Amenities Card -->
            <div class="card-div-for-amenities amenities-card mt-sm-3 mt-1">
                <div class="row p-2 text-center">
                    <div class="col-3 amenity-item">Parking</div>
                    <div class="col-3 amenity-item">WiFi</div>
                    <div class="col-3 amenity-item">Room Service</div>
                    <div class="col-3 amenity-item">Air Conditioning</div>
                </div>

            </div>

            <!-- Hotel Info -->
            <h4 class="mt-sm-4 mt-3">Hotel Info</h4>

            <div class="hotel-info-card mt-sm-3 mt-1">

                <p class="text-content-for-hotel-info mb-0">
                    Featuring a shared rooftop terrace, The Hive Hotel is 984 feet from Santa Maria Maggiore
                    Basilica. The hotel provides free WiFi throughout and air-conditioned rooms. All rooms at this
                    property have a modern-style décor, and come with a flat-screen TV. Each room has a private
                    bathroom with slippers, toiletries and a hairdryer, while some also include a seating area. An
                    extensive sweet and savory breakfast buffet is available daily. Guests can also find a bar and a
                    restaurant serving Italian and Chinese cuisine. Domus Aurea is 0.6 mi from the hotel, while
                    Quirinale is a 20-minute walk away. Fiumicino International Airport is 19 mi from The Hive.
                    Important Information: If you would like an invoice, please enter your company
                </p>

                <button href="#" class="read-more-btn mt-1">Read More></button>

            </div>
            <div class="zoom-image-card mt-3 position-relative">
                <div class="img-wrapper position-relative">
                    <iframe id="zoom-target"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d107579.8268201856!2d71.47293277629642!3d32.583001864945096!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39271820c5ae398d%3A0x93a7da7672fc2613!2sMianwali%2C%20Pakistan!5e0!3m2!1sen!2s!4v1764664191558!5m2!1sen!2s"
                        class="zoomable-img" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>

                <div class="d-flex flex-column position-absolute">
                    <span class="span-for-zoom-in-out-btn">
                        <button id="zoom-in">+</button>
                        <button id="zoom-out">−</button>
                    </span>
                </div>
            </div>


        </div>

        <!-- RIGHT COLUMN -->
        <div class="col-md-6">

            <!-- Price Card -->
            <div class="card price-card px-2">
                <div class="card-body">

                    <!-- Price Row -->
                    <div class="d-flex justify-content-between  pb-2 mb-3">
                        <span class="text-span-in-hotel-info-page">Per Night</span>

                        <div class="text-end">
                            <span class="text-decoration-line-through old-price">$120</span>
                            <span class="new-price ms-2">$99</span>
                        </div>
                    </div>

                    <!-- Total Price -->
                    <div class="d-flex justify-content-between border-bottom pb-2 mb-3">
                        <span class="text-span-in-hotel-info-page">Total Price (7 nights)</span>

                        <div class="text-end">
                            <span class="text-decoration-line-through old-price">$840</span>
                            <span class="new-price ms-2">$690</span>
                        </div>
                    </div>

                    <div class="d-flex gap-2 mb-3 check-in-out-div-in-hotel-info" style="width:100%;">

                        <div class="check-btn-wrapper flex-fill position-relative">
                            <button class="simple-select w-100">
                                Check-In
                            </button>

                            <span class="date-text">12 Jan 2025</span>

                            <!-- Dropdown Icon -->
                            <span class="icon-outline dropdown-icon drop-down-in-hotel-info"></span>
                        </div>

                        <div class="check-btn-wrapper flex-fill position-relative">
                            <button class="simple-select w-100">
                                Check-Out
                            </button>

                            <span class="date-text">14 Jan 2025</span>

                            <!-- Dropdown Icon -->
                            <span class="icon-outline dropdown-icon drop-down-in-hotel-info"></span>
                        </div>

                    </div>




                    <div class="mb-3 div-for-adult-section">
                            <span>2 Adults</span>
                    </div>

                    <button class="btn btn-primary w-100 select-room-btn">Select Room</button>

                </div>
            </div>

            <!-- Compare Prices Section -->
            <div class="card compare-card mb-4">
                <div class="card-body">

                    <h5 class="mb-3">Compare Prices</h5>

                    <div class="d-flex align-items-center mb-3">
                        <img src="hotel-thumb.jpg" class="compare-img me-3">

                        <div class="flex-grow-1">
                            <h6 class="mb-1">Roomer</h6>
                            <span>$57 / night</span>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <span class="view-all-btn">View All ></span>
                    </div>

                </div>
            </div>

        </div>

    </div>



</div>
@endsection