@extends('web.layout.app')
@section('title','Home')
@section('content')
<div class="container-fluid px-0">
    <div class="row px-0 hero-row align-items-center">
        <div class="col-md-6 hero-content">
            <h2>
                Stay Quietly, <br>
                With No Worries
            </h2>
            <p>
                Smarter hotel booking starts here. Get recommendations based on where you are, what you like, and how
                you travel.
            </p>
        </div>
        <div class="banner d-flex align-items-end">
            <div class="container mb-4">
                <div class="row g-3 p-4 search-bar rounded-4 shadow">

                    <div class="col-md">
                        <label class="text-white small mb-2 d-flex align-items-center gap-2">
                            <span class="bi bi-geo-alt"></span>
                            Location
                        </label>
                        <input type="text" class="form-control" placeholder="United State">
                    </div>

                    <div class="col-md">
                        <label class="text-white small mb-2 d-flex align-items-center gap-2">
                            <span class="bi bi-people"></span>
                            Guests
                        </label>
                        <select class="form-select">
                            <option>Single</option>
                            <option>Double</option>
                            <option>3 Guests</option>
                            <option>4 Guests</option>
                        </select>
                    </div>

                    <div class="col-md">
                        <label class="text-white small mb-2 d-flex align-items-center gap-2">
                            <span class="bi bi-calendar-event"></span>
                            Check-in
                        </label>
                        <input type="text" class="form-control checkin" placeholder="Check-in">


                    </div>

                    <div class="col-md">
                        <label class="text-white small mb-2 d-flex align-items-center gap-2">
                            <span class="bi bi-calendar-check"></span>
                            Check-out
                        </label>
                        <input type="text" class="form-control checkout" placeholder="Check-out">
                    </div>

                    <div class="col-md-auto d-flex align-items-end">
                        <button class="btn btn-search px-4 py-2">Search</button>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>
<div class="container-fluid  main-container-for-index-page">


    <div class="row px-0 py-3 content-container-for-stories align-items-center">

        <!-- h3 + arrows row -->
        <div class="col-12 px-0 d-flex justify-content-between align-items-center">
            <h3>Every stay has a story</h3>

            <!-- arrows -->
            <div class="d-flex gap-3">
                <button class="btn btn-slider-for-stories" id="slideLeft">
                    <span class="bi bi-arrow-left"></span>
                </button>

                <button class="btn btn-slider-for-stories" id="slideRight">
                    <span class="bi bi-arrow-right"></span>
                </button>


            </div>
        </div>

        <!-- Stories row -->
        <div class="col-12 px-0 d-flex flex-nowrap gap-3 mt-1" style="overflow-x: auto;">

            <div class="col-md-3 col-8 px-1 mt-4 story-video-wrapper ">
                <video class="story-video" src="{{asset('public/web/assets/images/video1.mp4')}}" autoplay muted loop
                    preload="none"></video>
                <a href="#" class="anchor-for-image-name-for-stories">
                    <img src="{{asset('public/web/assets/images/profile.png')}}" alt="sponsor">
                    <span class="span-in-video-profile-anchor">
                        <p>Recomended by</p>
                        <p>John Doe</p>
                    </span>
                </a>
                <button class="speaker-btn" id="speakerToggle">
                    <i class="bi bi-volume-mute"></i>
                </button>
                <div class="story-bottom-info">
                    <h5 class="story-restaurant-name mb-2">Royal Hotel</h5>
                    <p class="story-location">New York, USA</p>
                </div>
            </div>

            <div class="col-md-3 col-8 px-1 mt-4 story-video-wrapper ">
                <video class="story-video" src="{{asset('public/web/assets/images/video2.mp4')}}" autoplay muted loop
                    preload="none"></video>
                <a href="#" class="anchor-for-image-name-for-stories">
                    <img src="{{asset('public/web/assets/images/profile.png')}}" alt="sponsor">
                    <span class="span-in-video-profile-anchor">
                        <p>Recomended by</p>
                        <p>John Doe</p>
                    </span>
                </a>
                <button class="speaker-btn" id="#">
                    <i class="bi bi-volume-mute"></i>
                </button>
                <div class="story-bottom-info">
                    <h5 class="story-restaurant-name mb-2">Royal Hotel</h5>
                    <p class="story-location">New York, USA</p>
                </div>
            </div>
            <div class="col-md-3 col-8 px-1 mt-4 story-video-wrapper ">
                <video class="story-video" src="{{asset('public/web/assets/images/video3.mp4')}}" autoplay muted loop
                    preload="none"></video>
                <a href="#" class="anchor-for-image-name-for-stories">
                    <img src="{{asset('public/web/assets/images/profile.png')}}" alt="sponsor">
                    <span class="span-in-video-profile-anchor">
                        <p>Recomended by</p>
                        <p>John Doe</p>
                    </span>
                </a>
                <button class="speaker-btn" id="#">
                    <i class="bi bi-volume-mute"></i>
                </button>
                <div class="story-bottom-info">
                    <h5 class="story-restaurant-name mb-2">Royal Hotel</h5>
                    <p class="story-location">New York, USA</p>
                </div>
            </div>
            <div class="col-md-3 col-8 px-1 mt-4 story-video-wrapper ">
                <video class="story-video" src="{{asset('public/web/assets/images/video1.mp4')}}" autoplay muted loop
                    preload="none"></video>
                <a href="#" class="anchor-for-image-name-for-stories">
                    <img src="{{asset('public/web/assets/images/profile.png')}}" alt="sponsor">
                    <span class="span-in-video-profile-anchor">
                        <p>Recomended by</p>
                        <p>John Doe</p>
                    </span>
                </a>
                <button class="speaker-btn" id="#">
                    <i class="bi bi-volume-mute"></i>
                </button>
                <div class="story-bottom-info">
                    <h5 class="story-restaurant-name mb-2">Royal Hotel</h5>
                    <p class="story-location">New York, USA</p>
                </div>
            </div>
            <div class="col-md-3 col-8 px-1 mt-4 story-video-wrapper ">
                <video class="story-video" src="{{asset('public/web/assets/images/video1.mp4')}}" autoplay muted loop
                    preload="none"></video>
                <a href="#" class="anchor-for-image-name-for-stories">
                    <img src="{{asset('public/web/assets/images/profile.png')}}" alt="sponsor">
                    <span class="span-in-video-profile-anchor">
                        <p>Recomended by</p>
                        <p>John Doe</p>
                    </span>
                </a>
                <button class="speaker-btn" id="#">
                    <i class="bi bi-volume-mute"></i>
                </button>
                <div class="story-bottom-info">
                    <h5 class="story-restaurant-name mb-2">Royal Hotel</h5>
                    <p class="story-location">New York, USA</p>
                </div>
            </div>

            <div class="col-md-3 col-8 px-1 mt-4 story-video-wrapper ">
                <video class="story-video" src="{{asset('public/web/assets/images/video3.mp4')}}" autoplay muted loop
                    preload="none"></video>
                <a href="#" class="anchor-for-image-name-for-stories">
                    <img src="{{asset('public/web/assets/images/profile.png')}}" alt="sponsor">
                    <span class="span-in-video-profile-anchor">
                        <p>Recomended by</p>
                        <p>John Doe</p>
                    </span>
                </a>
                <button class="speaker-btn" id="#">
                    <i class="bi bi-volume-mute"></i>
                </button>
                <div class="story-bottom-info">
                    <h5 class="story-restaurant-name mb-2">Royal Hotel</h5>
                    <p class="story-location">New York, USA</p>
                </div>
            </div>

        </div>

    </div>
    <div class="row px-0 justify-content-between align-items-center main-container-div-for-deals">

        <div class="col-12 px-0 pt-3">
            <h3 class="mb-3 top-deals-heading">Top Deals</h3>

            <div class="deals-sort-wrapper d-flex justify-content-between align-items-center flex-wrap">

                <!-- Pills Tabs (Left / Top on mobile) -->
                <ul class="nav nav-pills nav-pills-for-sort-deal mb-2 mb-md-0" id="dealsTab" role="tablist">
                    <li class="nav-item deal-sort-nav-items" role="presentation">
                        <button class="nav-link nav-link-for-sort-deal active" id="all-tab" data-bs-toggle="tab"
                            data-bs-target="#all" type="button" role="tab" aria-controls="all" aria-selected="true">
                            All
                        </button>
                    </li>
                    <li class="nav-item deal-sort-nav-items" role="presentation">
                        <button class="nav-link nav-link-for-sort-deal" id="week-tab" data-bs-toggle="tab"
                            data-bs-target="#week" type="button" role="tab" aria-controls="week" aria-selected="false">
                            This Week
                        </button>
                    </li>
                    <li class="nav-item deal-sort-nav-items" role="presentation">
                        <button class="nav-link nav-link-for-sort-deal" id="month-tab" data-bs-toggle="tab"
                            data-bs-target="#month" type="button" role="tab" aria-controls="month"
                            aria-selected="false">
                            This Month
                        </button>
                    </li>
                </ul>

                <!-- Sort By (Right / Bottom on mobile) -->
                <div class="sortby-all-week-month-div ms-sm-3 ms-0 flex-shrink-0">
                    <div class="input-group deals-custom-select-group">
                        <select class="form-select discount-form-for-filter" id="dealsortBy">
                            <option value="discount" selected>Highest Discount</option>
                            <option value="low_price">Lowest Price</option>
                            <option value="high_price">Highest Price</option>
                            <option value="class">Hotel Class</option>
                        </select>
                    </div>
                </div>

            </div>

        </div>

        <!-- Tabs Content -->
        <div class="tab-content px-0 mt-sm-5 mt-2" id="dealsTabContent">
            <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                <div class="row px-0 main-div-for-all-deals">
                    <div class="col-md-4 col-sm-6 div-for-deals-info mb-4">
                        <div class="card deal-card">

                            <!-- Anchor wrapping card content -->
                            <a href="#" class="text-decoration-none text-dark d-flex flex-column h-100">

                                <!-- Image -->
                                <div class="deal-img d-flex align-items-center justify-content-center">
                                    <img src="{{asset('public/web/assets/images/hotel5.webp')}}" alt="Hotel Image"
                                        class="deal-img-fluid">

                                    <!-- Discount Label overlay -->
                                    <div class="deal-label d-flex justify-content-between align-items-center">
                                        <span>Book and Save</span>
                                        <span class="off-percentage-text">75% Off</span>
                                    </div>
                                </div>

                                <!-- Content -->
                                <div class="deal-content p-3">
                                    <!-- Rating Stars -->
                                    <div class="deal-stars">
                                        <span class="bi bi-star-fill"></span>
                                        <span class="bi bi-star-fill"></span>
                                        <span class="bi bi-star-fill"></span>
                                        <span class="bi bi-star-fill"></span>
                                        <span class="bi bi-star-fill"></span>
                                    </div>

                                    <!-- Hotel Name -->
                                    <span class="deal-hotel-name">Hotel Sunshine</span>

                                    <!-- Location -->
                                    <div class="deal-location d-flex align-items-center mb-0">
                                        <span class="bi bi-geo-alt me-1 location-icon-in-deal"></span>
                                        <span class="hotel-location-name">New York, USA</span>
                                    </div>

                                    <!-- Rating Point Box -->
                                    <div class="deal-rating-box d-flex align-items-center mt-1 ">

                                        <!-- Rating Point -->
                                        <div class="deal-rating-point me-2">
                                            <span>8.6</span>
                                        </div>

                                        <!-- Reviews (Vertical) -->
                                        <div class="deal-reviews d-flex flex-column small">
                                            <span>Good</span>
                                            <span class="deal-reviews-total">1,235 Reviews</span>
                                        </div>

                                    </div>

                                    <!-- Calendar + Date -->
                                    <div class="deal-date d-flex align-items-center mt-2 calender-span-for-deal-div">
                                        <i class="bi bi-calendar-event me-1"></i>
                                        <span>12 Dec - 15 Dec</span>
                                    </div>

                                    <!-- Per Night & Price -->
                                    <div class="deal-price d-flex justify-content-between align-items-center mt-2">

                                        <!-- Left Side -->
                                        <span class="deal-price-title">Per Night</span>

                                        <!-- Right Side Prices -->
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

                            <!-- Anchor wrapping card content -->
                            <a href="#" class="text-decoration-none text-dark d-flex flex-column h-100">

                                <!-- Image -->
                                <div class="deal-img d-flex align-items-center justify-content-center">
                                    <img src="{{asset('public/web/assets/images/hotel6.webp')}}" alt="Hotel Image"
                                        class="deal-img-fluid">

                                    <!-- Discount Label overlay -->
                                    <div class="deal-label d-flex justify-content-between align-items-center">
                                        <span>Book and Save</span>
                                        <span class="off-percentage-text">75% Off</span>
                                    </div>
                                </div>

                                <!-- Content -->
                                <div class="deal-content p-3">
                                    <!-- Rating Stars -->
                                    <div class="deal-stars">
                                        <span class="bi bi-star-fill"></span>
                                        <span class="bi bi-star-fill"></span>
                                        <span class="bi bi-star-fill"></span>
                                        <span class="bi bi-star-fill"></span>
                                        <span class="bi bi-star-fill"></span>
                                    </div>

                                    <!-- Hotel Name -->
                                    <span class="deal-hotel-name">Hotel Sunshine</span>

                                    <!-- Location -->
                                    <div class="deal-location d-flex align-items-center mb-0">
                                        <span class="bi bi-geo-alt me-1 location-icon-in-deal"></span>
                                        <span class="hotel-location-name">New York, USA</span>
                                    </div>

                                    <!-- Rating Point Box -->
                                    <div class="deal-rating-box d-flex align-items-center mt-1 ">

                                        <!-- Rating Point -->
                                        <div class="deal-rating-point me-2">
                                            <span>8.6</span>
                                        </div>

                                        <!-- Reviews (Vertical) -->
                                        <div class="deal-reviews d-flex flex-column small">
                                            <span>Good</span>
                                            <span class="deal-reviews-total">1,235 Reviews</span>
                                        </div>

                                    </div>

                                    <!-- Calendar + Date -->
                                    <div class="deal-date d-flex align-items-center mt-2 calender-span-for-deal-div">
                                        <i class="bi bi-calendar-event me-1"></i>
                                        <span>12 Dec - 15 Dec</span>
                                    </div>

                                    <!-- Per Night & Price -->
                                    <div class="deal-price d-flex justify-content-between align-items-center mt-2">

                                        <!-- Left Side -->
                                        <span class="deal-price-title">Per Night</span>

                                        <!-- Right Side Prices -->
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

                            <!-- Anchor wrapping card content -->
                            <a href="#" class="text-decoration-none text-dark d-flex flex-column h-100">

                                <!-- Image -->
                                <div class="deal-img d-flex align-items-center justify-content-center">
                                    <img src="{{asset('public/web/assets/images/hotel4.webp')}}" alt="Hotel Image"
                                        class="deal-img-fluid">

                                    <!-- Discount Label overlay -->
                                    <div class="deal-label d-flex justify-content-between align-items-center">
                                        <span>Book and Save</span>
                                        <span class="off-percentage-text">75% Off</span>
                                    </div>
                                </div>

                                <!-- Content -->
                                <div class="deal-content p-3">
                                    <!-- Rating Stars -->
                                    <div class="deal-stars">
                                        <span class="bi bi-star-fill"></span>
                                        <span class="bi bi-star-fill"></span>
                                        <span class="bi bi-star-fill"></span>
                                        <span class="bi bi-star-fill"></span>
                                        <span class="bi bi-star-fill"></span>
                                    </div>

                                    <!-- Hotel Name -->
                                    <span class="deal-hotel-name">Hotel Sunshine</span>

                                    <!-- Location -->
                                    <div class="deal-location d-flex align-items-center mb-0">
                                        <span class="bi bi-geo-alt me-1 location-icon-in-deal"></span>
                                        <span class="hotel-location-name">New York, USA</span>
                                    </div>

                                    <!-- Rating Point Box -->
                                    <div class="deal-rating-box d-flex align-items-center mt-1 ">

                                        <!-- Rating Point -->
                                        <div class="deal-rating-point me-2">
                                            <span>8.6</span>
                                        </div>

                                        <!-- Reviews (Vertical) -->
                                        <div class="deal-reviews d-flex flex-column small">
                                            <span>Good</span>
                                            <span class="deal-reviews-total">1,235 Reviews</span>
                                        </div>

                                    </div>

                                    <!-- Calendar + Date -->
                                    <div class="deal-date d-flex align-items-center mt-2 calender-span-for-deal-div">
                                        <i class="bi bi-calendar-event me-1"></i>
                                        <span>12 Dec - 15 Dec</span>
                                    </div>

                                    <!-- Per Night & Price -->
                                    <div class="deal-price d-flex justify-content-between align-items-center mt-2">

                                        <!-- Left Side -->
                                        <span class="deal-price-title">Per Night</span>

                                        <!-- Right Side Prices -->
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

                            <!-- Anchor wrapping card content -->
                            <a href="#" class="text-decoration-none text-dark d-flex flex-column h-100">

                                <!-- Image -->
                                <div class="deal-img d-flex align-items-center justify-content-center">
                                    <img src="{{asset('public/web/assets/images/hotel3.webp')}}" alt="Hotel Image"
                                        class="deal-img-fluid">

                                    <!-- Discount Label overlay -->
                                    <div class="deal-label d-flex justify-content-between align-items-center">
                                        <span>Book and Save</span>
                                        <span class="off-percentage-text">75% Off</span>
                                    </div>
                                </div>

                                <!-- Content -->
                                <div class="deal-content p-3">
                                    <!-- Rating Stars -->
                                    <div class="deal-stars">
                                        <span class="bi bi-star-fill"></span>
                                        <span class="bi bi-star-fill"></span>
                                        <span class="bi bi-star-fill"></span>
                                        <span class="bi bi-star-fill"></span>
                                        <span class="bi bi-star-fill"></span>
                                    </div>

                                    <!-- Hotel Name -->
                                    <span class="deal-hotel-name">Hotel Sunshine</span>

                                    <!-- Location -->
                                    <div class="deal-location d-flex align-items-center mb-0">
                                        <span class="bi bi-geo-alt me-1 location-icon-in-deal"></span>
                                        <span class="hotel-location-name">New York, USA</span>
                                    </div>

                                    <!-- Rating Point Box -->
                                    <div class="deal-rating-box d-flex align-items-center mt-1 ">

                                        <!-- Rating Point -->
                                        <div class="deal-rating-point me-2">
                                            <span>8.6</span>
                                        </div>

                                        <!-- Reviews (Vertical) -->
                                        <div class="deal-reviews d-flex flex-column small">
                                            <span>Good</span>
                                            <span class="deal-reviews-total">1,235 Reviews</span>
                                        </div>

                                    </div>

                                    <!-- Calendar + Date -->
                                    <div class="deal-date d-flex align-items-center mt-2 calender-span-for-deal-div">
                                        <i class="bi bi-calendar-event me-1"></i>
                                        <span>12 Dec - 15 Dec</span>
                                    </div>

                                    <!-- Per Night & Price -->
                                    <div class="deal-price d-flex justify-content-between align-items-center mt-2">

                                        <!-- Left Side -->
                                        <span class="deal-price-title">Per Night</span>

                                        <!-- Right Side Prices -->
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

                            <!-- Anchor wrapping card content -->
                            <a href="#" class="text-decoration-none text-dark d-flex flex-column h-100">

                                <!-- Image -->
                                <div class="deal-img d-flex align-items-center justify-content-center">
                                    <img src="{{asset('public/web/assets/images/hotel3.webp')}}" alt="Hotel Image"
                                        class="deal-img-fluid">

                                    <!-- Discount Label overlay -->
                                    <div class="deal-label d-flex justify-content-between align-items-center">
                                        <span>Book and Save</span>
                                        <span class="off-percentage-text">75% Off</span>
                                    </div>
                                </div>

                                <!-- Content -->
                                <div class="deal-content p-3">
                                    <!-- Rating Stars -->
                                    <div class="deal-stars">
                                        <span class="bi bi-star-fill"></span>
                                        <span class="bi bi-star-fill"></span>
                                        <span class="bi bi-star-fill"></span>
                                        <span class="bi bi-star-fill"></span>
                                        <span class="bi bi-star-fill"></span>
                                    </div>

                                    <!-- Hotel Name -->
                                    <span class="deal-hotel-name">Hotel Sunshine</span>

                                    <!-- Location -->
                                    <div class="deal-location d-flex align-items-center mb-0">
                                        <span class="bi bi-geo-alt me-1 location-icon-in-deal"></span>
                                        <span class="hotel-location-name">New York, USA</span>
                                    </div>

                                    <!-- Rating Point Box -->
                                    <div class="deal-rating-box d-flex align-items-center mt-1 ">

                                        <!-- Rating Point -->
                                        <div class="deal-rating-point me-2">
                                            <span>8.6</span>
                                        </div>

                                        <!-- Reviews (Vertical) -->
                                        <div class="deal-reviews d-flex flex-column small">
                                            <span>Good</span>
                                            <span class="deal-reviews-total">1,235 Reviews</span>
                                        </div>

                                    </div>

                                    <!-- Calendar + Date -->
                                    <div class="deal-date d-flex align-items-center mt-2 calender-span-for-deal-div">
                                        <i class="bi bi-calendar-event me-1"></i>
                                        <span>12 Dec - 15 Dec</span>
                                    </div>

                                    <!-- Per Night & Price -->
                                    <div class="deal-price d-flex justify-content-between align-items-center mt-2">

                                        <!-- Left Side -->
                                        <span class="deal-price-title">Per Night</span>

                                        <!-- Right Side Prices -->
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

                            <!-- Anchor wrapping card content -->
                            <a href="#" class="text-decoration-none text-dark d-flex flex-column h-100">

                                <!-- Image -->
                                <div class="deal-img d-flex align-items-center justify-content-center">
                                    <img src="{{asset('public/web/assets/images/hotel1.webp')}}" alt="Hotel Image"
                                        class="deal-img-fluid">

                                    <!-- Discount Label overlay -->
                                    <div class="deal-label d-flex justify-content-between align-items-center">
                                        <span>Book and Save</span>
                                        <span class="off-percentage-text">75% Off</span>
                                    </div>
                                </div>

                                <!-- Content -->
                                <div class="deal-content p-3">
                                    <!-- Rating Stars -->
                                    <div class="deal-stars">
                                        <span class="bi bi-star-fill"></span>
                                        <span class="bi bi-star-fill"></span>
                                        <span class="bi bi-star-fill"></span>
                                        <span class="bi bi-star-fill"></span>
                                        <span class="bi bi-star-fill"></span>
                                    </div>

                                    <!-- Hotel Name -->
                                    <span class="deal-hotel-name">Hotel Sunshine</span>

                                    <!-- Location -->
                                    <div class="deal-location d-flex align-items-center mb-0">
                                        <span class="bi bi-geo-alt me-1 location-icon-in-deal"></span>
                                        <span class="hotel-location-name">New York, USA</span>
                                    </div>

                                    <!-- Rating Point Box -->
                                    <div class="deal-rating-box d-flex align-items-center mt-1 ">

                                        <!-- Rating Point -->
                                        <div class="deal-rating-point me-2">
                                            <span>8.6</span>
                                        </div>

                                        <!-- Reviews (Vertical) -->
                                        <div class="deal-reviews d-flex flex-column small">
                                            <span>Good</span>
                                            <span class="deal-reviews-total">1,235 Reviews</span>
                                        </div>

                                    </div>

                                    <!-- Calendar + Date -->
                                    <div class="deal-date d-flex align-items-center mt-2 calender-span-for-deal-div">
                                        <i class="bi bi-calendar-event me-1"></i>
                                        <span>12 Dec - 15 Dec</span>
                                    </div>

                                    <!-- Per Night & Price -->
                                    <div class="deal-price d-flex justify-content-between align-items-center mt-2">

                                        <!-- Left Side -->
                                        <span class="deal-price-title">Per Night</span>

                                        <!-- Right Side Prices -->
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
            <div class="tab-pane fade" id="week" role="tabpanel" aria-labelledby="week-tab">
                <div class="row px-0 main-div-for-all-deals">
                    <div class="col-md-4 col-sm-6 div-for-deals-info mb-4">
                        <div class="card deal-card">

                            <!-- Anchor wrapping card content -->
                            <a href="#" class="text-decoration-none text-dark d-flex flex-column h-100">

                                <!-- Image -->
                                <div class="deal-img d-flex align-items-center justify-content-center">
                                    <img src="{{asset('public/web/assets/images/hotel5.webp')}}" alt="Hotel Image"
                                        class="deal-img-fluid">

                                    <!-- Discount Label overlay -->
                                    <div class="deal-label d-flex justify-content-between align-items-center">
                                        <span>Book and Save</span>
                                        <span class="off-percentage-text">75% Off</span>
                                    </div>
                                </div>

                                <!-- Content -->
                                <div class="deal-content p-3">
                                    <!-- Rating Stars -->
                                    <div class="deal-stars">
                                        <span class="bi bi-star-fill"></span>
                                        <span class="bi bi-star-fill"></span>
                                        <span class="bi bi-star-fill"></span>
                                        <span class="bi bi-star-fill"></span>
                                        <span class="bi bi-star-fill"></span>
                                    </div>

                                    <!-- Hotel Name -->
                                    <span class="deal-hotel-name">Hotel Sunshine</span>

                                    <!-- Location -->
                                    <div class="deal-location d-flex align-items-center mb-0">
                                        <span class="bi bi-geo-alt me-1 location-icon-in-deal"></span>
                                        <span class="hotel-location-name">New York, USA</span>
                                    </div>

                                    <!-- Rating Point Box -->
                                    <div class="deal-rating-box d-flex align-items-center mt-1 ">

                                        <!-- Rating Point -->
                                        <div class="deal-rating-point me-2">
                                            <span>8.6</span>
                                        </div>

                                        <!-- Reviews (Vertical) -->
                                        <div class="deal-reviews d-flex flex-column small">
                                            <span>Good</span>
                                            <span class="deal-reviews-total">1,235 Reviews</span>
                                        </div>

                                    </div>

                                    <!-- Calendar + Date -->
                                    <div class="deal-date d-flex align-items-center mt-2 calender-span-for-deal-div">
                                        <i class="bi bi-calendar-event me-1"></i>
                                        <span>12 Dec - 15 Dec</span>
                                    </div>

                                    <!-- Per Night & Price -->
                                    <div class="deal-price d-flex justify-content-between align-items-center mt-2">

                                        <!-- Left Side -->
                                        <span class="deal-price-title">Per Night</span>

                                        <!-- Right Side Prices -->
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

                            <!-- Anchor wrapping card content -->
                            <a href="#" class="text-decoration-none text-dark d-flex flex-column h-100">

                                <!-- Image -->
                                <div class="deal-img d-flex align-items-center justify-content-center">
                                    <img src="{{asset('public/web/assets/images/hotel6.webp')}}" alt="Hotel Image"
                                        class="deal-img-fluid">

                                    <!-- Discount Label overlay -->
                                    <div class="deal-label d-flex justify-content-between align-items-center">
                                        <span>Book and Save</span>
                                        <span class="off-percentage-text">75% Off</span>
                                    </div>
                                </div>

                                <!-- Content -->
                                <div class="deal-content p-3">
                                    <!-- Rating Stars -->
                                    <div class="deal-stars">
                                        <span class="bi bi-star-fill"></span>
                                        <span class="bi bi-star-fill"></span>
                                        <span class="bi bi-star-fill"></span>
                                        <span class="bi bi-star-fill"></span>
                                        <span class="bi bi-star-fill"></span>
                                    </div>

                                    <!-- Hotel Name -->
                                    <span class="deal-hotel-name">Hotel Sunshine</span>

                                    <!-- Location -->
                                    <div class="deal-location d-flex align-items-center mb-0">
                                        <span class="bi bi-geo-alt me-1 location-icon-in-deal"></span>
                                        <span class="hotel-location-name">New York, USA</span>
                                    </div>

                                    <!-- Rating Point Box -->
                                    <div class="deal-rating-box d-flex align-items-center mt-1 ">

                                        <!-- Rating Point -->
                                        <div class="deal-rating-point me-2">
                                            <span>8.6</span>
                                        </div>

                                        <!-- Reviews (Vertical) -->
                                        <div class="deal-reviews d-flex flex-column small">
                                            <span>Good</span>
                                            <span class="deal-reviews-total">1,235 Reviews</span>
                                        </div>

                                    </div>

                                    <!-- Calendar + Date -->
                                    <div class="deal-date d-flex align-items-center mt-2 calender-span-for-deal-div">
                                        <i class="bi bi-calendar-event me-1"></i>
                                        <span>12 Dec - 15 Dec</span>
                                    </div>

                                    <!-- Per Night & Price -->
                                    <div class="deal-price d-flex justify-content-between align-items-center mt-2">

                                        <!-- Left Side -->
                                        <span class="deal-price-title">Per Night</span>

                                        <!-- Right Side Prices -->
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

                            <!-- Anchor wrapping card content -->
                            <a href="#" class="text-decoration-none text-dark d-flex flex-column h-100">

                                <!-- Image -->
                                <div class="deal-img d-flex align-items-center justify-content-center">
                                    <img src="{{asset('public/web/assets/images/hotel4.webp')}}" alt="Hotel Image"
                                        class="deal-img-fluid">

                                    <!-- Discount Label overlay -->
                                    <div class="deal-label d-flex justify-content-between align-items-center">
                                        <span>Book and Save</span>
                                        <span class="off-percentage-text">75% Off</span>
                                    </div>
                                </div>

                                <!-- Content -->
                                <div class="deal-content p-3">
                                    <!-- Rating Stars -->
                                    <div class="deal-stars">
                                        <span class="bi bi-star-fill"></span>
                                        <span class="bi bi-star-fill"></span>
                                        <span class="bi bi-star-fill"></span>
                                        <span class="bi bi-star-fill"></span>
                                        <span class="bi bi-star-fill"></span>
                                    </div>

                                    <!-- Hotel Name -->
                                    <span class="deal-hotel-name">Hotel Sunshine</span>

                                    <!-- Location -->
                                    <div class="deal-location d-flex align-items-center mb-0">
                                        <span class="bi bi-geo-alt me-1 location-icon-in-deal"></span>
                                        <span class="hotel-location-name">New York, USA</span>
                                    </div>

                                    <!-- Rating Point Box -->
                                    <div class="deal-rating-box d-flex align-items-center mt-1 ">

                                        <!-- Rating Point -->
                                        <div class="deal-rating-point me-2">
                                            <span>8.6</span>
                                        </div>

                                        <!-- Reviews (Vertical) -->
                                        <div class="deal-reviews d-flex flex-column small">
                                            <span>Good</span>
                                            <span class="deal-reviews-total">1,235 Reviews</span>
                                        </div>

                                    </div>

                                    <!-- Calendar + Date -->
                                    <div class="deal-date d-flex align-items-center mt-2 calender-span-for-deal-div">
                                        <i class="bi bi-calendar-event me-1"></i>
                                        <span>12 Dec - 15 Dec</span>
                                    </div>

                                    <!-- Per Night & Price -->
                                    <div class="deal-price d-flex justify-content-between align-items-center mt-2">

                                        <!-- Left Side -->
                                        <span class="deal-price-title">Per Night</span>

                                        <!-- Right Side Prices -->
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

                            <!-- Anchor wrapping card content -->
                            <a href="#" class="text-decoration-none text-dark d-flex flex-column h-100">

                                <!-- Image -->
                                <div class="deal-img d-flex align-items-center justify-content-center">
                                    <img src="{{asset('public/web/assets/images/hotel3.webp')}}" alt="Hotel Image"
                                        class="deal-img-fluid">

                                    <!-- Discount Label overlay -->
                                    <div class="deal-label d-flex justify-content-between align-items-center">
                                        <span>Book and Save</span>
                                        <span class="off-percentage-text">75% Off</span>
                                    </div>
                                </div>

                                <!-- Content -->
                                <div class="deal-content p-3">
                                    <!-- Rating Stars -->
                                    <div class="deal-stars">
                                        <span class="bi bi-star-fill"></span>
                                        <span class="bi bi-star-fill"></span>
                                        <span class="bi bi-star-fill"></span>
                                        <span class="bi bi-star-fill"></span>
                                        <span class="bi bi-star-fill"></span>
                                    </div>

                                    <!-- Hotel Name -->
                                    <span class="deal-hotel-name">Hotel Sunshine</span>

                                    <!-- Location -->
                                    <div class="deal-location d-flex align-items-center mb-0">
                                        <span class="bi bi-geo-alt me-1 location-icon-in-deal"></span>
                                        <span class="hotel-location-name">New York, USA</span>
                                    </div>

                                    <!-- Rating Point Box -->
                                    <div class="deal-rating-box d-flex align-items-center mt-1 ">

                                        <!-- Rating Point -->
                                        <div class="deal-rating-point me-2">
                                            <span>8.6</span>
                                        </div>

                                        <!-- Reviews (Vertical) -->
                                        <div class="deal-reviews d-flex flex-column small">
                                            <span>Good</span>
                                            <span class="deal-reviews-total">1,235 Reviews</span>
                                        </div>

                                    </div>

                                    <!-- Calendar + Date -->
                                    <div class="deal-date d-flex align-items-center mt-2 calender-span-for-deal-div">
                                        <i class="bi bi-calendar-event me-1"></i>
                                        <span>12 Dec - 15 Dec</span>
                                    </div>

                                    <!-- Per Night & Price -->
                                    <div class="deal-price d-flex justify-content-between align-items-center mt-2">

                                        <!-- Left Side -->
                                        <span class="deal-price-title">Per Night</span>

                                        <!-- Right Side Prices -->
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

                            <!-- Anchor wrapping card content -->
                            <a href="#" class="text-decoration-none text-dark d-flex flex-column h-100">

                                <!-- Image -->
                                <div class="deal-img d-flex align-items-center justify-content-center">
                                    <img src="{{asset('public/web/assets/images/hotel3.webp')}}" alt="Hotel Image"
                                        class="deal-img-fluid">

                                    <!-- Discount Label overlay -->
                                    <div class="deal-label d-flex justify-content-between align-items-center">
                                        <span>Book and Save</span>
                                        <span class="off-percentage-text">75% Off</span>
                                    </div>
                                </div>

                                <!-- Content -->
                                <div class="deal-content p-3">
                                    <!-- Rating Stars -->
                                    <div class="deal-stars">
                                        <span class="bi bi-star-fill"></span>
                                        <span class="bi bi-star-fill"></span>
                                        <span class="bi bi-star-fill"></span>
                                        <span class="bi bi-star-fill"></span>
                                        <span class="bi bi-star-fill"></span>
                                    </div>

                                    <!-- Hotel Name -->
                                    <span class="deal-hotel-name">Hotel Sunshine</span>

                                    <!-- Location -->
                                    <div class="deal-location d-flex align-items-center mb-0">
                                        <span class="bi bi-geo-alt me-1 location-icon-in-deal"></span>
                                        <span class="hotel-location-name">New York, USA</span>
                                    </div>

                                    <!-- Rating Point Box -->
                                    <div class="deal-rating-box d-flex align-items-center mt-1 ">

                                        <!-- Rating Point -->
                                        <div class="deal-rating-point me-2">
                                            <span>8.6</span>
                                        </div>

                                        <!-- Reviews (Vertical) -->
                                        <div class="deal-reviews d-flex flex-column small">
                                            <span>Good</span>
                                            <span class="deal-reviews-total">1,235 Reviews</span>
                                        </div>

                                    </div>

                                    <!-- Calendar + Date -->
                                    <div class="deal-date d-flex align-items-center mt-2 calender-span-for-deal-div">
                                        <i class="bi bi-calendar-event me-1"></i>
                                        <span>12 Dec - 15 Dec</span>
                                    </div>

                                    <!-- Per Night & Price -->
                                    <div class="deal-price d-flex justify-content-between align-items-center mt-2">

                                        <!-- Left Side -->
                                        <span class="deal-price-title">Per Night</span>

                                        <!-- Right Side Prices -->
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

                            <!-- Anchor wrapping card content -->
                            <a href="#" class="text-decoration-none text-dark d-flex flex-column h-100">

                                <!-- Image -->
                                <div class="deal-img d-flex align-items-center justify-content-center">
                                    <img src="{{asset('public/web/assets/images/hotel1.webp')}}" alt="Hotel Image"
                                        class="deal-img-fluid">

                                    <!-- Discount Label overlay -->
                                    <div class="deal-label d-flex justify-content-between align-items-center">
                                        <span>Book and Save</span>
                                        <span class="off-percentage-text">75% Off</span>
                                    </div>
                                </div>

                                <!-- Content -->
                                <div class="deal-content p-3">
                                    <!-- Rating Stars -->
                                    <div class="deal-stars">
                                        <span class="bi bi-star-fill"></span>
                                        <span class="bi bi-star-fill"></span>
                                        <span class="bi bi-star-fill"></span>
                                        <span class="bi bi-star-fill"></span>
                                        <span class="bi bi-star-fill"></span>
                                    </div>

                                    <!-- Hotel Name -->
                                    <span class="deal-hotel-name">Hotel Sunshine</span>

                                    <!-- Location -->
                                    <div class="deal-location d-flex align-items-center mb-0">
                                        <span class="bi bi-geo-alt me-1 location-icon-in-deal"></span>
                                        <span class="hotel-location-name">New York, USA</span>
                                    </div>

                                    <!-- Rating Point Box -->
                                    <div class="deal-rating-box d-flex align-items-center mt-1 ">

                                        <!-- Rating Point -->
                                        <div class="deal-rating-point me-2">
                                            <span>8.6</span>
                                        </div>

                                        <!-- Reviews (Vertical) -->
                                        <div class="deal-reviews d-flex flex-column small">
                                            <span>Good</span>
                                            <span class="deal-reviews-total">1,235 Reviews</span>
                                        </div>

                                    </div>

                                    <!-- Calendar + Date -->
                                    <div class="deal-date d-flex align-items-center mt-2 calender-span-for-deal-div">
                                        <i class="bi bi-calendar-event me-1"></i>
                                        <span>12 Dec - 15 Dec</span>
                                    </div>

                                    <!-- Per Night & Price -->
                                    <div class="deal-price d-flex justify-content-between align-items-center mt-2">

                                        <!-- Left Side -->
                                        <span class="deal-price-title">Per Night</span>

                                        <!-- Right Side Prices -->
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
            <div class="tab-pane fade" id="month" role="tabpanel" aria-labelledby="month-tab">
                <div class="row px-0 main-div-for-all-deals">
                    <div class="col-md-4 col-sm-6 div-for-deals-info mb-4">
                        <div class="card deal-card">

                            <!-- Anchor wrapping card content -->
                            <a href="#" class="text-decoration-none text-dark d-flex flex-column h-100">

                                <!-- Image -->
                                <div class="deal-img d-flex align-items-center justify-content-center">
                                    <img src="{{asset('public/web/assets/images/hotel5.webp')}}" alt="Hotel Image"
                                        class="deal-img-fluid">

                                    <!-- Discount Label overlay -->
                                    <div class="deal-label d-flex justify-content-between align-items-center">
                                        <span>Book and Save</span>
                                        <span class="off-percentage-text">75% Off</span>
                                    </div>
                                </div>

                                <!-- Content -->
                                <div class="deal-content p-3">
                                    <!-- Rating Stars -->
                                    <div class="deal-stars">
                                        <span class="bi bi-star-fill"></span>
                                        <span class="bi bi-star-fill"></span>
                                        <span class="bi bi-star-fill"></span>
                                        <span class="bi bi-star-fill"></span>
                                        <span class="bi bi-star-fill"></span>
                                    </div>

                                    <!-- Hotel Name -->
                                    <span class="deal-hotel-name">Hotel Sunshine</span>

                                    <!-- Location -->
                                    <div class="deal-location d-flex align-items-center mb-0">
                                        <span class="bi bi-geo-alt me-1 location-icon-in-deal"></span>
                                        <span class="hotel-location-name">New York, USA</span>
                                    </div>

                                    <!-- Rating Point Box -->
                                    <div class="deal-rating-box d-flex align-items-center mt-1 ">

                                        <!-- Rating Point -->
                                        <div class="deal-rating-point me-2">
                                            <span>8.6</span>
                                        </div>

                                        <!-- Reviews (Vertical) -->
                                        <div class="deal-reviews d-flex flex-column small">
                                            <span>Good</span>
                                            <span class="deal-reviews-total">1,235 Reviews</span>
                                        </div>

                                    </div>

                                    <!-- Calendar + Date -->
                                    <div class="deal-date d-flex align-items-center mt-2 calender-span-for-deal-div">
                                        <i class="bi bi-calendar-event me-1"></i>
                                        <span>12 Dec - 15 Dec</span>
                                    </div>

                                    <!-- Per Night & Price -->
                                    <div class="deal-price d-flex justify-content-between align-items-center mt-2">

                                        <!-- Left Side -->
                                        <span class="deal-price-title">Per Night</span>

                                        <!-- Right Side Prices -->
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

                            <!-- Anchor wrapping card content -->
                            <a href="#" class="text-decoration-none text-dark d-flex flex-column h-100">

                                <!-- Image -->
                                <div class="deal-img d-flex align-items-center justify-content-center">
                                    <img src="{{asset('public/web/assets/images/hotel6.webp')}}" alt="Hotel Image"
                                        class="deal-img-fluid">

                                    <!-- Discount Label overlay -->
                                    <div class="deal-label d-flex justify-content-between align-items-center">
                                        <span>Book and Save</span>
                                        <span class="off-percentage-text">75% Off</span>
                                    </div>
                                </div>

                                <!-- Content -->
                                <div class="deal-content p-3">
                                    <!-- Rating Stars -->
                                    <div class="deal-stars">
                                        <span class="bi bi-star-fill"></span>
                                        <span class="bi bi-star-fill"></span>
                                        <span class="bi bi-star-fill"></span>
                                        <span class="bi bi-star-fill"></span>
                                        <span class="bi bi-star-fill"></span>
                                    </div>

                                    <!-- Hotel Name -->
                                    <span class="deal-hotel-name">Hotel Sunshine</span>

                                    <!-- Location -->
                                    <div class="deal-location d-flex align-items-center mb-0">
                                        <span class="bi bi-geo-alt me-1 location-icon-in-deal"></span>
                                        <span class="hotel-location-name">New York, USA</span>
                                    </div>

                                    <!-- Rating Point Box -->
                                    <div class="deal-rating-box d-flex align-items-center mt-1 ">

                                        <!-- Rating Point -->
                                        <div class="deal-rating-point me-2">
                                            <span>8.6</span>
                                        </div>

                                        <!-- Reviews (Vertical) -->
                                        <div class="deal-reviews d-flex flex-column small">
                                            <span>Good</span>
                                            <span class="deal-reviews-total">1,235 Reviews</span>
                                        </div>

                                    </div>

                                    <!-- Calendar + Date -->
                                    <div class="deal-date d-flex align-items-center mt-2 calender-span-for-deal-div">
                                        <i class="bi bi-calendar-event me-1"></i>
                                        <span>12 Dec - 15 Dec</span>
                                    </div>

                                    <!-- Per Night & Price -->
                                    <div class="deal-price d-flex justify-content-between align-items-center mt-2">

                                        <!-- Left Side -->
                                        <span class="deal-price-title">Per Night</span>

                                        <!-- Right Side Prices -->
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

                            <!-- Anchor wrapping card content -->
                            <a href="#" class="text-decoration-none text-dark d-flex flex-column h-100">

                                <!-- Image -->
                                <div class="deal-img d-flex align-items-center justify-content-center">
                                    <img src="{{asset('public/web/assets/images/hotel4.webp')}}" alt="Hotel Image"
                                        class="deal-img-fluid">

                                    <!-- Discount Label overlay -->
                                    <div class="deal-label d-flex justify-content-between align-items-center">
                                        <span>Book and Save</span>
                                        <span class="off-percentage-text">75% Off</span>
                                    </div>
                                </div>

                                <!-- Content -->
                                <div class="deal-content p-3">
                                    <!-- Rating Stars -->
                                    <div class="deal-stars">
                                        <span class="bi bi-star-fill"></span>
                                        <span class="bi bi-star-fill"></span>
                                        <span class="bi bi-star-fill"></span>
                                        <span class="bi bi-star-fill"></span>
                                        <span class="bi bi-star-fill"></span>
                                    </div>

                                    <!-- Hotel Name -->
                                    <span class="deal-hotel-name">Hotel Sunshine</span>

                                    <!-- Location -->
                                    <div class="deal-location d-flex align-items-center mb-0">
                                        <span class="bi bi-geo-alt me-1 location-icon-in-deal"></span>
                                        <span class="hotel-location-name">New York, USA</span>
                                    </div>

                                    <!-- Rating Point Box -->
                                    <div class="deal-rating-box d-flex align-items-center mt-1 ">

                                        <!-- Rating Point -->
                                        <div class="deal-rating-point me-2">
                                            <span>8.6</span>
                                        </div>

                                        <!-- Reviews (Vertical) -->
                                        <div class="deal-reviews d-flex flex-column small">
                                            <span>Good</span>
                                            <span class="deal-reviews-total">1,235 Reviews</span>
                                        </div>

                                    </div>

                                    <!-- Calendar + Date -->
                                    <div class="deal-date d-flex align-items-center mt-2 calender-span-for-deal-div">
                                        <i class="bi bi-calendar-event me-1"></i>
                                        <span>12 Dec - 15 Dec</span>
                                    </div>

                                    <!-- Per Night & Price -->
                                    <div class="deal-price d-flex justify-content-between align-items-center mt-2">

                                        <!-- Left Side -->
                                        <span class="deal-price-title">Per Night</span>

                                        <!-- Right Side Prices -->
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

                            <!-- Anchor wrapping card content -->
                            <a href="#" class="text-decoration-none text-dark d-flex flex-column h-100">

                                <!-- Image -->
                                <div class="deal-img d-flex align-items-center justify-content-center">
                                    <img src="{{asset('public/web/assets/images/hotel3.webp')}}" alt="Hotel Image"
                                        class="deal-img-fluid">

                                    <!-- Discount Label overlay -->
                                    <div class="deal-label d-flex justify-content-between align-items-center">
                                        <span>Book and Save</span>
                                        <span class="off-percentage-text">75% Off</span>
                                    </div>
                                </div>

                                <!-- Content -->
                                <div class="deal-content p-3">
                                    <!-- Rating Stars -->
                                    <div class="deal-stars">
                                        <span class="bi bi-star-fill"></span>
                                        <span class="bi bi-star-fill"></span>
                                        <span class="bi bi-star-fill"></span>
                                        <span class="bi bi-star-fill"></span>
                                        <span class="bi bi-star-fill"></span>
                                    </div>

                                    <!-- Hotel Name -->
                                    <span class="deal-hotel-name">Hotel Sunshine</span>

                                    <!-- Location -->
                                    <div class="deal-location d-flex align-items-center mb-0">
                                        <span class="bi bi-geo-alt me-1 location-icon-in-deal"></span>
                                        <span class="hotel-location-name">New York, USA</span>
                                    </div>

                                    <!-- Rating Point Box -->
                                    <div class="deal-rating-box d-flex align-items-center mt-1 ">

                                        <!-- Rating Point -->
                                        <div class="deal-rating-point me-2">
                                            <span>8.6</span>
                                        </div>

                                        <!-- Reviews (Vertical) -->
                                        <div class="deal-reviews d-flex flex-column small">
                                            <span>Good</span>
                                            <span class="deal-reviews-total">1,235 Reviews</span>
                                        </div>

                                    </div>

                                    <!-- Calendar + Date -->
                                    <div class="deal-date d-flex align-items-center mt-2 calender-span-for-deal-div">
                                        <i class="bi bi-calendar-event me-1"></i>
                                        <span>12 Dec - 15 Dec</span>
                                    </div>

                                    <!-- Per Night & Price -->
                                    <div class="deal-price d-flex justify-content-between align-items-center mt-2">

                                        <!-- Left Side -->
                                        <span class="deal-price-title">Per Night</span>

                                        <!-- Right Side Prices -->
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

                            <!-- Anchor wrapping card content -->
                            <a href="#" class="text-decoration-none text-dark d-flex flex-column h-100">

                                <!-- Image -->
                                <div class="deal-img d-flex align-items-center justify-content-center">
                                    <img src="{{asset('public/web/assets/images/hotel3.webp')}}" alt="Hotel Image"
                                        class="deal-img-fluid">

                                    <!-- Discount Label overlay -->
                                    <div class="deal-label d-flex justify-content-between align-items-center">
                                        <span>Book and Save</span>
                                        <span class="off-percentage-text">75% Off</span>
                                    </div>
                                </div>

                                <!-- Content -->
                                <div class="deal-content p-3">
                                    <!-- Rating Stars -->
                                    <div class="deal-stars">
                                        <span class="bi bi-star-fill"></span>
                                        <span class="bi bi-star-fill"></span>
                                        <span class="bi bi-star-fill"></span>
                                        <span class="bi bi-star-fill"></span>
                                        <span class="bi bi-star-fill"></span>
                                    </div>

                                    <!-- Hotel Name -->
                                    <span class="deal-hotel-name">Hotel Sunshine</span>

                                    <!-- Location -->
                                    <div class="deal-location d-flex align-items-center mb-0">
                                        <span class="bi bi-geo-alt me-1 location-icon-in-deal"></span>
                                        <span class="hotel-location-name">New York, USA</span>
                                    </div>

                                    <!-- Rating Point Box -->
                                    <div class="deal-rating-box d-flex align-items-center mt-1 ">

                                        <!-- Rating Point -->
                                        <div class="deal-rating-point me-2">
                                            <span>8.6</span>
                                        </div>

                                        <!-- Reviews (Vertical) -->
                                        <div class="deal-reviews d-flex flex-column small">
                                            <span>Good</span>
                                            <span class="deal-reviews-total">1,235 Reviews</span>
                                        </div>

                                    </div>

                                    <!-- Calendar + Date -->
                                    <div class="deal-date d-flex align-items-center mt-2 calender-span-for-deal-div">
                                        <i class="bi bi-calendar-event me-1"></i>
                                        <span>12 Dec - 15 Dec</span>
                                    </div>

                                    <!-- Per Night & Price -->
                                    <div class="deal-price d-flex justify-content-between align-items-center mt-2">

                                        <!-- Left Side -->
                                        <span class="deal-price-title">Per Night</span>

                                        <!-- Right Side Prices -->
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

                            <!-- Anchor wrapping card content -->
                            <a href="#" class="text-decoration-none text-dark d-flex flex-column h-100">

                                <!-- Image -->
                                <div class="deal-img d-flex align-items-center justify-content-center">
                                    <img src="{{asset('public/web/assets/images/hotel1.webp')}}" alt="Hotel Image"
                                        class="deal-img-fluid">

                                    <!-- Discount Label overlay -->
                                    <div class="deal-label d-flex justify-content-between align-items-center">
                                        <span>Book and Save</span>
                                        <span class="off-percentage-text">75% Off</span>
                                    </div>
                                </div>

                                <!-- Content -->
                                <div class="deal-content p-3">
                                    <!-- Rating Stars -->
                                    <div class="deal-stars">
                                        <span class="bi bi-star-fill"></span>
                                        <span class="bi bi-star-fill"></span>
                                        <span class="bi bi-star-fill"></span>
                                        <span class="bi bi-star-fill"></span>
                                        <span class="bi bi-star-fill"></span>
                                    </div>

                                    <!-- Hotel Name -->
                                    <span class="deal-hotel-name">Hotel Sunshine</span>

                                    <!-- Location -->
                                    <div class="deal-location d-flex align-items-center mb-0">
                                        <span class="bi bi-geo-alt me-1 location-icon-in-deal"></span>
                                        <span class="hotel-location-name">New York, USA</span>
                                    </div>

                                    <!-- Rating Point Box -->
                                    <div class="deal-rating-box d-flex align-items-center mt-1 ">

                                        <!-- Rating Point -->
                                        <div class="deal-rating-point me-2">
                                            <span>8.6</span>
                                        </div>

                                        <!-- Reviews (Vertical) -->
                                        <div class="deal-reviews d-flex flex-column small">
                                            <span>Good</span>
                                            <span class="deal-reviews-total">1,235 Reviews</span>
                                        </div>

                                    </div>

                                    <!-- Calendar + Date -->
                                    <div class="deal-date d-flex align-items-center mt-2 calender-span-for-deal-div">
                                        <i class="bi bi-calendar-event me-1"></i>
                                        <span>12 Dec - 15 Dec</span>
                                    </div>

                                    <!-- Per Night & Price -->
                                    <div class="deal-price d-flex justify-content-between align-items-center mt-2">

                                        <!-- Left Side -->
                                        <span class="deal-price-title">Per Night</span>

                                        <!-- Right Side Prices -->
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


    </div>
</div>

@endsection