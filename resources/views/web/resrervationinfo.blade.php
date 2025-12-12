@extends('web.layout.app')

@section('content')
<div class="container">

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <h3 class="mb-4">Reservation Info</h3>

    <form action="{{ route('reservation.store') }}" method="POST">
        @csrf

        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">First name *</label>
                <input type="text" name="first_name" class="form-control" required>
            </div>

            <div class="col-md-6">
                <label class="form-label">Last name *</label>
                <input type="text" name="last_name" class="form-control" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">Country/Region *</label>
                <input type="text" name="country" class="form-control" placeholder="PK +92" required>
            </div>

            <div class="col-md-6">
                <label class="form-label">Phone number *</label>
                <input type="text" name="phone_number" class="form-control" required>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Email address *</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">Place of booking *</label>
                <select name="place_of_booking" class="form-control" required>
                    <option value="">Select</option>
                    <option value="Agoda">Agoda</option>
                    <option value="Booking.com">Booking.com</option>
                    <option value="Hotels.com">Hotels.com</option>
                    <option value="Expedia">Expedia</option>
                </select>
            </div>

            <div class="col-md-6">
                <label class="form-label">Confirmation No *</label>
                <input type="text" name="confirm_no" class="form-control" required placeholder="e.g. 32890">
            </div>
        </div>

        <button type="submit" class="btn btn-primary px-4">Next →</button>
    </form>

</div>
@endsection
