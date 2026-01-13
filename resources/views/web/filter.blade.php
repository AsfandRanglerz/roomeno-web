@extends('web.layout.app')
@section('title','Filter Hotels')

@section('content')

<div class="container-fluid ">
    <div class="row px-0 align-items-center">

        <!-- Banner + Search -->
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

<!-- TOP FILTER BAR -->
<div class="container my-3">
    <div class="row g-2 align-items-center hotel-top-filters">

        <div class="col-auto">
            <input type="text" class="form-control form-control-sm" placeholder="e.g Four Seasons">
        </div>

        <div class="col-auto">
            <button class="btn btn-light btn-sm d-flex align-items-center gap-1">
                <i class="bi bi-sliders"></i> Filters
            </button>
        </div>

        <div class="col-auto">
            <button class="btn btn-light btn-sm">Price</button>
        </div>

        <div class="col-auto">
            <button class="btn btn-light btn-sm">4 Stars+</button>
        </div>

        <div class="col-auto">
            <button class="btn btn-light btn-sm">Guest Rating 8+</button>
        </div>

        <div class="col-auto">
            <button class="btn btn-light btn-sm">Free Cancellation</button>
        </div>

        <div class="col-auto">
            <button class="btn btn-light btn-sm">Breakfast Included</button>
        </div>

        <div class="col-auto">
            <button class="btn btn-light btn-sm">Pet Friendly</button>
        </div>

        <div class="col ms-auto text-end">
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
</div>

@endsection
