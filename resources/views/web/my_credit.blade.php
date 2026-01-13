@extends('web.layout.app')
@section('title','My Credit')

@section('content')
<div class="container-fluid py-5 main-container-for-user-account">

    <div class="row mx-sm-5 mx-1 px-0 ua-mobile-wrapper">

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
        <!-- Content -->
        <main class="ua-content-area col-sm-9">
            <div class="card border-0 shadow-sm">
                <div class="card-body">

                    <!-- Heading -->
                    <h4 class="mb-4">Bookings</h4>

                    <!-- Credit Info Card -->
                    <!-- Credit Info Card -->
                    <div class="card border-0  p-4 mx-sm-5 mx-0 booking-card-in-credit">

                        <!-- Top Info -->
                        <div class="d-flex align-items-center gap-3 mb-3">

                            <!-- Wallet Icon -->
                            <span class="bi bi-wallet2 bg-light p-1 span-for-wallet-price"><span class="px-1">$xx</span></span>

                            <!-- Text -->
                            <div>
                                
                            <span>You can spend Roomeno $xx for bookings on the Roomeno service.</span>
                            </div>

                        </div>

                        <hr>

                        <!-- How to get credit -->
                        <div>
                            <h6 class="mb-2">How to get Roomeno Credit?</h6>
                            <ol class="mb-0 ps-3">
                                <li>Sign up and get $XX.</li>
                                <li>Sell your reservation (Sell Your Room).</li>
                                <li>Download the Roomeno App and post your hotel videos.</li>
                            </ol>
                        </div>

                    </div>


                    <!-- Used Credit -->
                    <div class="mt-3 mx-sm-5 mx-2">
                        <span class="text-danger fw-semibold">Used Credit: xx</span>
                    </div>

                </div>
            </div>
        </main>


    </div>
</div>

<div class="ua-overlay"></div>
@endsection