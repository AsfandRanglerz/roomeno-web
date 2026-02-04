@extends('admin.layout.app')
@section('title', 'Bookings')

@section('content')
<div class="main-content" style="min-height: 562px;">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Bookings</h4>
                        </div>
                        <div class="card-body table-striped table-bordered table-responsive">
                            <table class="responsive table" id="table_id_events">
                                <thead>
                                    <tr>
                                        <th>Sr.</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Country Code</th>
                                        <th>Phone</th>
                                        <th>Card Number</th>
                                        <th>Cardholder Name</th>
                                        <th>Country</th>
                                        <th>Original Price</th>
                                        <th>Discounted Price</th>
                                        <th>Total Price</th>
                                        <th>Request</th>
                                        <th>Payment</th>
                                        <th>Refund</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     @foreach ($bookings as $booking)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $booking->first_name?? '--' }}</td>
                                        <td>{{ $booking->last_name?? '--' }}</td>
                                        <td><a href="mailto:{{ $booking->email }}">{{ $booking->email?? '--' }}</a></td>
                                        <td>{{ $booking->country_code?? '--' }}</td>
                                        <td>{{ $booking->phone?? '--' }}</td>
                                        <td>{{ $booking->card_number?? '--' }}</td>
                                        <td>{{ $booking->cardholder_name?? '--' }}</td>
                                        <td>{{ $booking->country?? '--' }}</td>
                                        <td>{{ $booking->original_price?? '--' }}</td>
                                        <td>{{ $booking->discounted_price?? '--' }}</td>
                                        <td>{{ $booking->total_price?? '--' }}</td>
                                        <td>{{ $booking->request?? '--' }}</td>
                                         <td>
                                            <button 
                                            class="btn btn-primary btn-sm"
                                            data-bs-toggle="modal"
                                            data-bs-target="#paymentModal{{ $booking->id }}">
                                            Pay Seller
                                            </button>

                                        </td>
                                        <td>
                                            <button 
                                            class="btn btn-primary btn-sm"
                                            data-bs-toggle="modal"
                                            data-bs-target="#refundModal{{ $booking->id }}">
                                            Refund
                                            </button>

                                        </td>

                                         <td>
                                                    @php
                                                        $status = (int) $booking->status;
                                                        $statusText = match ($status) {
                                                            0 => 'Pending',
                                                            1 => 'Approved',
                                                            2 => 'Rejected',
                                                            default => 'Unknown',
                                                        };

                                                        $buttonClass = match ($status) {
                                                            0 => 'btn-warning',
                                                            1 => 'btn-success',
                                                            2 => 'btn-danger',
                                                            default => 'btn-secondary',
                                                        };
                                                    @endphp

                                                    <div class="dropdown">
                                                        <button class="btn btn-sm dropdown-toggle {{ $buttonClass }}"
                                                            type="button" data-toggle="dropdown">
                                                            {{ $statusText }}
                                                        </button>

                                                        <div class="dropdown-menu">
                                                            @if ($status == 1)
                                                                {{-- Show only Reject --}}
                                                                <form method="POST"
                                                                    action="{{ route('booking.reject', $booking->id) }}">
                                                                    @csrf
                                                                    <button type="submit"
                                                                        class="dropdown-item text-danger">Reject</button>
                                                                </form>
                                                            @elseif ($status == 2)
                                                                {{-- Show only Approve --}}
                                                                <form method="POST"
                                                                    action="{{ route('booking.approve', $booking->id) }}">
                                                                    @csrf
                                                                    <button type="submit"
                                                                        class="dropdown-item text-success">Approve</button>
                                                                </form>
                                                            @elseif ($status == 0)
                                                                {{-- Show both Approve and Reject --}}
                                                                <form method="POST"
                                                                    action="{{ route('booking.approve', $booking->id) }}">
                                                                    @csrf
                                                                    <button type="submit"
                                                                        class="dropdown-item text-success">Approve</button>
                                                                </form>
                                                                <form method="POST"
                                                                    action="{{ route('booking.reject', $booking->id) }}">
                                                                    @csrf
                                                                    <button type="submit"
                                                                        class="dropdown-item text-danger">Reject</button>
                                                                </form>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </td>
                                    </tr>
                                    
                                    @endforeach
                                </tbody>
                            </table>
                        </div> <!-- /.card-body -->
                    </div> <!-- /.card -->
                </div> <!-- /.col -->
            </div> <!-- /.row -->
        </div> <!-- /.section-body -->
    </section>
</div>

@foreach($bookings as $booking)

<div class="modal fade" id="paymentModal{{ $booking->id }}" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">

      <form method="POST"
            action="{{ route('booking.payment', $booking->id) }}"
            enctype="multipart/form-data"
            class="paymentForm">
        @csrf
        
        <div class="modal-header">
          <h5 class="modal-title">Payment — Booking #{{ $booking->id }}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <div class="modal-body">

          <label class="mb-2">Payment Screenshot</label>

          <input type="file"
                 name="payment_image"
                 class="form-control refundInput"
                 data-preview="preview{{ $booking->id }}"
                 accept="image/*"
                 {{ $booking->is_paid ? 'disabled' : 'required' }}>

          {{-- Show stored image if already paid --}}
          <img id="preview{{ $booking->id }}"
               class="img-thumbnail mt-3 {{ $booking->payment_image ? '' : 'd-none' }}"
               style="max-height:250px;"
               src="{{ $booking->payment_image ? asset('public/'.$booking->payment_image) : '' }}">
        </div>

        <div class="modal-footer">

          <button type="button"
                  class="btn btn-secondary"
                  data-bs-dismiss="modal">
            Close
          </button>

          <button type="submit"
                  class="btn btn-success paymentBtn"
                  {{ $booking->is_paid ? 'disabled' : '' }}>
            {{ $booking->is_paid ? 'Paid' : 'Confirm Payment' }}
          </button>

        </div>

      </form>

    </div>
  </div>
</div>

<div class="modal fade" id="refundModal{{ $booking->id }}" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">

      <form method="POST"
            action="{{ route('booking.refund', $booking->id) }}"
            enctype="multipart/form-data"
            class="refundForm">
        @csrf
        
        <div class="modal-header">
          <h5 class="modal-title">Refund — Booking #{{ $booking->id }}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <div class="modal-body">

          <label class="mb-2">Refund Screenshot</label>

          <input type="file"
                 name="refund_image"
                 class="form-control refundInput"
                 data-preview="preview{{ $booking->id }}"
                 accept="image/*"
                 {{ $booking->is_refunded ? 'disabled' : 'required' }}>

          {{-- Show stored image if already refunded --}}
          <img id="preview{{ $booking->id }}"
               class="img-thumbnail mt-3 {{ $booking->refund_image ? '' : 'd-none' }}"
               style="max-height:250px;"
               src="{{ $booking->refund_image ? asset('public/'.$booking->refund_image) : '' }}">
        </div>

        <div class="modal-footer">

          <button type="button"
                  class="btn btn-secondary"
                  data-bs-dismiss="modal">
            Close
          </button>

          <button type="submit"
                  class="btn btn-success refundBtn"
                  {{ $booking->is_refunded ? 'disabled' : '' }}>
            {{ $booking->is_refunded ? 'Refunded' : 'Confirm Refund' }}
          </button>

        </div>

      </form>

    </div>
  </div>
</div>

@endforeach
@endsection

@section('js')

<script>
   $(document).ready(function() {
    $('#table_id_events').DataTable();
       
    });
</script>
<script>
document.addEventListener("DOMContentLoaded", function() {

    // === IMAGE PREVIEW ===
    document.querySelectorAll(".refundInput").forEach(input => {

        input.addEventListener("change", function(e) {

            const file = this.files[0];
            const previewId = this.getAttribute("data-preview");
            const img = document.getElementById(previewId);

            if (file) {
                img.src = URL.createObjectURL(file);
                img.classList.remove("d-none");
            }
        });
    });


    // === DISABLE BUTTON AFTER SUBMIT ===
    document.querySelectorAll(".refundForm").forEach(form => {

        form.addEventListener("submit", function() {

            const btn = this.querySelector(".refundBtn");
            btn.innerText = "Processing...";
            btn.disabled = true;

        });
    });

});

document.addEventListener("DOMContentLoaded", function() {

    // === IMAGE PREVIEW ===
    document.querySelectorAll(".paymentInput").forEach(input => {

        input.addEventListener("change", function(e) {

            const file = this.files[0];
            const previewId = this.getAttribute("data-preview");
            const img = document.getElementById(previewId);

            if (file) {
                img.src = URL.createObjectURL(file);
                img.classList.remove("d-none");
            }
        });
    });


    // === DISABLE BUTTON AFTER SUBMIT ===
    document.querySelectorAll(".paymentForm").forEach(form => {

        form.addEventListener("submit", function() {

            const btn = this.querySelector(".paymentBtn");
            btn.innerText = "Processing...";
            btn.disabled = true;

        });
    });

});
</script>

@endsection