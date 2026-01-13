@extends('web.layout.app')
@section('title','Add Inventory')

@section('content')

<div class="container-fluid py-5 main-container-for-user-account">
    <div class="row mx-sm-5 mx-1 px-0 ua-mobile-wrapper">

        <aside class="user-account-sidebar col-sm-3">
            <ul class="list-unstyled ua-menu">

                <li class="border-0">
                    <a href="#" class="ua-link active ">
                        <span class="ua-icon bi bi-plus-square"></span>
                        <span class="ua-text">Add Inventory</span>
                    </a>
                </li>

                <li>
                    <a href="#" class="ua-link">
                        <span class="ua-icon bi bi-speedometer2"></span>
                        <span class="ua-text">Dashboard</span>
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
                        <span class="ua-icon bi bi-shield-check"></span>
                        <span class="ua-text">Privacy Policy</span>
                    </a>
                </li>

                <li>
                    <a href="#" class="ua-link">
                        <span class="ua-icon bi bi-person"></span>
                        <span class="ua-text">Personal Details</span>
                    </a>
                </li>

            </ul>
        </aside>

        <main class="ua-content-area col-sm-9">
            <div class="card border-0 shadow-sm">
                <div class="card-body">

                    <h5 class="mb-4">Add Inventory</h5>

                    <form class="row g-3">

                        <div class="col-md-12">
                            <label class="form-label">Hotel Name <span class="text-danger">* </span> </label>
                            <input type="text" class="form-control" placeholder="Begin typing and select / add the hotel from the list">
                        </div>

                        <div class="col-md-12">
                            <label class="form-label">Hotel Address <span class="text-danger">* </span> </label>
                            <input type="text" class="form-control" placeholder="(e.g. John)">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Room Type <span class="text-danger">* </span> </label>
                            <input type="text" class="form-control" placeholder="(e.g. John)">
                        </div>

                        <div class="col-md-2">
                            <label class="form-label">Rooms <span class="text-danger">* </span> </label>
                            <input type="number" class="form-control" value="1">
                        </div>

                        <div class="col-md-2">
                            <label class="form-label">Adults <span class="text-danger">* </span> </label>
                            <input type="number" class="form-control" value="1">
                        </div>

                        <div class="col-md-2">
                            <label class="form-label">Children <span class="text-danger">* </span> </label>
                            <input type="number" class="form-control" value="0">
                        </div>

                        <div class="col-md-3">
                            <label class="form-label">Check In <span class="text-danger">* </span> </label>
                            <input type="date" class="form-control">
                        </div>

                        <div class="col-md-3">
                            <label class="form-label">Check Out <span class="text-danger">* </span> </label>
                            <input type="date" class="form-control">
                        </div>

                        <div class="col-md-3">
                            <label class="form-label">Publish date</label>
                            <input type="date" class="form-control">
                        </div>

                        <div class="col-md-3">
                            <label class="form-label">Cut Off Date</label>
                            <input type="date" class="form-control">
                        </div>

                        <div class="col-md-3">
                            <label class="form-label">Price/Night <span class="text-danger">* </span> </label>
                            <input type="number" class="form-control" value="0">
                        </div>

                        <div class="col-md-3">
                            <label class="form-label">Discount <span class="text-danger">* </span> </label>
                            <input type="number" class="form-control" value="0">
                        </div>

                        <div class="col-md-3">
                            <label class="form-label">Current Market Price</label>
                            <input type="number" class="form-control" value="0">
                        </div>

                        <div class="col-md-3">
                            <label class="form-label">Source Of Booking <span class="text-danger">* </span> </label>
                            <select class="form-select">
                                <option>Choose...</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Is This Cancellation From A Customer <span class="text-danger">* </span> </label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="cancel" checked>
                                <label class="form-check-label">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="cancel">
                                <label class="form-check-label">No</label>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <label class="form-label">Guest First Name <span class="text-danger">* </span> </label>
                            <input type="text" class="form-control" placeholder="Choose...">
                        </div>

                        <div class="col-md-3">
                            <label class="form-label">Guest Last Name <span class="text-danger">* </span> </label>
                            <input type="text" class="form-control" placeholder="Choose...">
                        </div>

                        <div class="col-md-12">
                            <label class="form-label">Additional Information About The Room</label>
                            <input type="text" class="form-control" placeholder="e.g. Confirmation numbers, breakfast included etc.">
                        </div>

                        <div class="col-md-12 text-end">
                            <button class="btn btn-for-bublish-inventory px-4">Publish</button>
                        </div>

                    </form>

                </div>
            </div>
        </main>

    </div>
</div>

@endsection
