@extends('web.layout.app')

@section('content')

<div class="form-box" style="width: 650px; margin: auto; padding: 25px; border-radius: 20px; background:#fff; box-shadow:0 10px 40px rgba(0,0,0,0.1);">

    <h3 style="margin-bottom:20px;">Payment Information</h3>

    <form action="{{ route('payment.store') }}" method="POST">
        @csrf

        {{-- Hidden Reservation ID --}}
        <input type="hidden" name="reservation_id" value="{{ $reservation_id }}">

        <!-- Asking Price -->
        <label>Total Asking Price *</label>
        <input type="number" step="0.01" name="asking_price" placeholder="Enter price" required>

        <!-- Payment Type -->
        <label>Payment Type *</label>
        <select name="paid_type" required>
            <option value="">Select Payment Type</option>
            <option value="Roomeno Credits">Roomeno Credits</option>
            <option value="Paypal">Paypal</option>
        </select>

        <!-- Card Number -->
        <label>Card Number *</label>
        <input type="text" name="card_number" placeholder="xxxx xxxx xxxx xxxx" required>

        <!-- Cardholder Name -->
        <label>Cardholder Name *</label>
        <input type="text" name="cardholder_name" placeholder="Enter cardholder full name" required>

        <button type="submit" style="width: 150px; padding: 12px; background:#e5f0ff; color:#6c98ff; border:none; border-radius:30px; cursor:pointer; margin-top:20px;">
            Save Payment →
        </button>
    </form>

</div>

@endsection
