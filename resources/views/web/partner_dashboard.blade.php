@extends('web.partner.layout.app')
@section('title','Dashboard')

@section('content')

<div class="container-fluid py-5 main-container-for-user-account">
    <div class="row mx-sm-5 mx-1 px-0 ua-mobile-wrapper">

        <!-- Sidebar -->
        <aside class="user-account-sidebar col-sm-3">
            <ul class="list-unstyled ua-menu">

                <li class="border-0">
                    <a href="#" class="ua-link">
                        <span class="ua-icon bi bi-plus-square"></span>
                        <span class="ua-text">Add Inventory</span>
                    </a>
                </li>

                <li>
                    <a href="#" class="ua-link active">
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

        <!-- Content -->
        <main class="ua-content-area col-sm-9">
            <div class="card border-0 shadow-sm">
                <div class="card-body">

                    <h2 class="mb-4">Dashboard</h2>

                    <p class="mb-3 fw-semibold">Filter & sort table by:</p>

                    <!-- Filters -->
                    <form class="row g-3 mb-4">

                        <div class="col-md-2">
                            <label class="form-label">Location</label>
                            <input type="text" class="form-control" placeholder="Begin Typing Select From List">
                        </div>

                        <div class="col-md-2">
                            <label class="form-label">Check In</label>
                            <input type="date" class="form-control">
                        </div>

                        <div class="col-md-2">
                            <label class="form-label">Check Out</label>
                            <input type="date" class="form-control">
                        </div>

                        <div class="col-md-2">
                            <label class="form-label">Status</label>
                            <select class="form-select">
                                <option>All statuses</option>
                                <option>Pending</option>
                                <option>Published</option>
                            </select>
                        </div>

                        <div class="col-md-2">
                            <label class="form-label">Sort By</label>
                            <select class="form-select">
                                <option>Choose...</option>
                            </select>
                        </div>

                        <div class="col-md-2 d-flex align-items-end">
                            <button class="btn p-2 btn-search-in-dashboard w-100">Search</button>
                        </div>

                    </form>

                    <!-- Table -->
                    <div class="table-responsive">
                        <table class="table align-middle">
                            <thead>
                                <tr>
                                    <th>Roomeno ID</th>
                                    <th>Hotel Name</th>
                                    <th>Room Type</th>
                                    <th>Location</th>
                                    <th>Dates</th>
                                    <th>Stock</th>
                                    <th>Created at</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="table-warning ">
                                    <td>4520883</td>
                                    <td>The Academy</td>
                                    <td>HOUSE KING SIZE</td>
                                    <td>London, United Kingdom</td>
                                    <td>18–22 Dec 2025</td>
                                    <td>5x</td>
                                    <td>09/12/25<br>21:59</td>
                                    <td>
                                        <span class="badge bg-warning text-dark">Pending</span>
                                    </td>
                                    <td>
                                        <i class="bi bi-pencil-square text-primary me-2"></i>
                                        <i class="bi bi-eye text-success me-2"></i>
                                        <i class="bi bi-trash text-danger"></i>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </main>

    </div>
</div>

@endsection
