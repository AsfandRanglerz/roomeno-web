@extends('web.layout.app')
@section('title','User Account Detail')

@section('content')
<div class="container-fluid py-5 main-container-for-user-account">

    <!-- Bootstrap row added -->
    <div class="row mx-sm-5 mx-1 px-0 ua-mobile-wrapper">

        <!-- Sidebar -->
        <aside class="user-account-sidebar col-sm-3">

            <div class="ua-user-box text-center mb-4">
                <h6 class="mb-0">Adam Smith</h6>
                <span>example@gmail.com</span>
                <div class="ua-credit m-2"> <span>Roomeno Credit:50$</span></div>
            </div>

            <ul class="list-unstyled ua-menu">
                <li>
                    <span class="ua-icon bi bi-person"></span>
                    <span class="ua-text">Personal Details</span>
                </li>
                <li class="active">
                    <span class="ua-icon bi bi-calendar"></span>
                    <span class="ua-text">My Bookings</span>
                </li>
                <li>
                    <span class="ua-icon bi bi-house"></span>
                    <span class="ua-text">My Listings</span>
                </li>
                <li>
                    <span class="ua-icon bi bi-wallet2"></span>
                    <span class="ua-text">My Wallet</span>
                </li>



                <li>
                    <span class="ua-icon bi bi-file-text"></span>
                    <span class="ua-text">Terms & Conditions</span>
                </li>
                <li>
                    <span class="ua-icon bi bi-x-circle"></span>
                    <span class="ua-text">Cancellation Guide</span>
                </li>

                <li>
                    <span class="ua-icon bi bi-question-circle"></span>
                    <span class="ua-text">Support & FAQs</span>
                </li>
                <li>
                    <span class="ua-icon bi bi-box-arrow-right"></span>
                    <span class="ua-text">Logout</span>
                </li>

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
                    <h5 class="mb-4">Personal Data</h5>

                    <form class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">First name</label>
                            <input type="text" class="form-control" placeholder="John">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Last name</label>
                            <input type="text" class="form-control" placeholder="Smith">
                        </div>

                        <div class="col-12">
                            <label class="form-label">Email Address</label>
                            <input type="email" class="form-control">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Country / Region</label>
                            <select class="form-select">
                                <option>Pakistan</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Phone Number</label>
                            <input type="text" class="form-control">
                        </div>

                        <h5 class="mt-4">Billing Address</h5>

                        <div class="col-md-6 mt-0">
                            <label class="form-label">Country</label>
                            <select class="form-select">
                                <option>Pakistan</option>
                            </select>
                        </div>

                        <div class="col-md-6 mt-0">
                            <label class="form-label">City</label>
                            <input type="text" class="form-control">
                        </div>

                        <div class="col-12">
                            <label class="form-label">Street Address</label>
                            <input type="text" class="form-control">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">ZIP Code</label>
                            <input type="text" class="form-control">
                        </div>

                        <div class="col-12">
                            <button class="btn btn-success px-4">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </main>

    </div>
</div>

<div class="ua-overlay"></div>
@endsection