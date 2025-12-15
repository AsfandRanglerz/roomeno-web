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
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     @foreach ($bookings as $booking)
                                    <tr>
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

@endsection

@section('js')

<script>
   $(document).ready(function() {
    $('#table_id_events').DataTable();
       
    });
</script>
@endsection