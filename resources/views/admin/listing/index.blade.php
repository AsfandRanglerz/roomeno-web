@extends('admin.layout.app')
@section('title', 'Listings')

@section('content')
<div class="main-content" style="min-height: 562px;">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Listings</h4>
                        </div>
                        <div class="card-body table-striped table-bordered table-responsive">
                            <table class="responsive table" id="table_id_events">
                                <thead>
                                    <tr>
                                        <th>Sr.</th>
                                        <th>Customer Name</th>
                                        <th>Hotel Name</th>
                                        <th>Board Name</th>
                                        <th>Check In</th>
                                        <th>Check Out</th>
                                        <th>Number of People</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Country Code</th>
                                        <th>Phone Number</th>
                                        <th>Email</th>
                                        <th>Place of Booking</th>
                                        <th>Confirmation No</th>
                                        {{-- <th>Payment Info</th> --}}
                                        <th>Asking Price</th>
                                        <th>Payment Type</th>
                                        <th>Card Number</th>
                                        <th>Cardholder Name</th>
                                        <th>Feature</th>
                                        <th>Toggle</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($listings as $listing)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $listing->customer_name ?? '--' }}</td>
                                        <td>{{ $listing->name ?? '--' }}</td>
                                        <td>{{ $listing->board_name ?? '--' }}</td>
                                        <td>{{ $listing->check_in ? \Carbon\Carbon::parse($listing->check_in)->format('M d, Y') : '--' }}</td>
                                        <td>{{ $listing->check_out ? \Carbon\Carbon::parse($listing->check_out)->format('M d, Y') : '--' }}</td>
                                        <td>{{ $listing->people_number ?? '--' }} </td>
                                        <td>{{ $listing->first_name ?? '--' }}</td>
                                        <td>{{ $listing->last_name ?? '--' }}</td>
                                        <td>{{ $listing->country ?? '--' }}</td>
                                        <td>{{ $listing->phone_number ?? '--' }}</td>
                                        <td><a href="mailto:{{ $listing->email }}">{{ $listing->email ?? '--' }}</a></td>
                                        <td>{{ $listing->place_of_booking ?? '--' }}</td>
                                        <td>{{ $listing->confirm_no ?? '--' }}</td>
                                        {{-- <td>{{ $listing->payment_info ?? '--' }}</td> --}}
                                        <td>{{ $listing->asking_price ?? '--' }}</td>
                                        <td>{{ $listing->paid_type ?? '--' }}</td>
                                        <td>{{ $listing->card_number ?? '--' }}</td>
                                        <td>{{ $listing->cardholder_name ?? '--' }}</td>
                                         <td>
                                            <label class="custom-switch">
                                                <input type="checkbox" class="custom-switch-input toggle-feature"
                                                    data-id="{{ $listing->id }}"
                                                    {{ $listing->is_featured ? 'checked' : '' }}>
                                                <span class="custom-switch-indicator"></span>
                                                <span class="custom-switch-description">
                                                    {{ $listing->is_featured ? 'Featured' : 'Not Featured' }}
                                                </span>
                                            </label>
                                        </td>
                                        <td>
                                            <label class="custom-switch">
                                                <input type="checkbox" class="custom-switch-input toggle-status"
                                                    data-id="{{ $listing->id }}"
                                                    {{ $listing->toggle ? 'checked' : '' }}>
                                                <span class="custom-switch-indicator"></span>
                                                <span class="custom-switch-description">
                                                    {{ $listing->toggle ? 'Activated' : 'Deactivated' }}
                                                </span>
                                            </label>
                                        </td>
                                         <td style="vertical-align: middle;">
                                            <div class="d-flex align-items-center" style="gap: 6px;">
                                                @if (Auth::guard('admin')->check() ||
                                                ($sideMenuPermissions->has('Listings') && $sideMenuPermissions['Listings']->contains('edit')))
                                                <a href="{{ route('listing.edit', $listing->id) }}"
                                                    class="btn btn-primary p-2"
                                                    style="background-color: #0F1142;">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                @endif
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

<!-- Deactivation Modal -->
<div class="modal fade" id="deactivationModal" tabindex="-1" role="dialog" aria-labelledby="deactivationModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Deactivation Reason</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="deactivationForm">
                    @csrf
                    <input type="hidden" name="user_id" id="deactivatingUserId">
                    <div class="form-group">
                        <label>Reason for deactivation:</label>
                        <textarea class="form-control" id="deactivationReason" name="reason" rows="3"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="confirmDeactivation">Submit</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')

<script>
   $(document).ready(function() {
    $('#table_id_events').DataTable();

    let currentToggle = null;
    let currentUserId = null;

    // ✅ Event delegation for dynamically loaded rows
    $(document).on('change', '.toggle-status', function() {
        let status = $(this).is(':checked') ? 1 : 0;
        currentToggle = $(this);
        currentUserId = $(this).data('id');

        if (status === 0) {
            $('#deactivatingUserId').val(currentUserId);
            $('#deactivationModal').modal('show');
        } else {
            updateUserStatus(currentUserId, 1);
        }
    });

    $('#confirmDeactivation').click(function() {
        let reason = $('#deactivationReason').val();
        if (reason.trim() === '') {
            toastr.error('Please provide a deactivation reason');
            setTimeout(() => location.reload(), 800);
            return;
        }

        $('#deactivationModal').modal('hide');
        $('#deactivationReason').val('');
        updateUserStatus(currentUserId, 0, reason);
    });

    $('#deactivationModal').on('hidden.bs.modal', function() {
        if ($('#deactivationReason').val().trim() === '') {
            setTimeout(() => location.reload(), 500);
        }
    });

    function updateUserStatus(userId, status, reason = null) {
        let $descriptionSpan = currentToggle.siblings('.custom-switch-description');
        $.ajax({
            url: "{{ route('listing.toggle-status') }}",
            type: "POST",
            data: {
                _token: '{{ csrf_token() }}',
                id: userId,
                status: status,
                reason: reason
            },
            success: function(res) {
                if (res.success) {
                    $descriptionSpan.text(res.new_status);
                    toastr.success(res.message);
                    location.reload();
                } else {
                    currentToggle.prop('checked', !status);
                    toastr.error(res.message);
                }
            },
            error: function() {
                currentToggle.prop('checked', !status);
                toastr.error('Error updating status');
            }
        });
    }

   $(document).on('change', '.toggle-feature', function () {

    let id = $(this).data('id');
    let checkbox = $(this);

    // Disable checkbox while processing
    checkbox.prop('disabled', true);

    $.ajax({
        url: "{{ route('listing.toggle-feature') }}",
        type: "POST",
        data: {
            _token: "{{ csrf_token() }}",
            id: id
        },
        success: function(response) {

            if(response.status === 'success') {

                // Toastr message
                if(response.is_featured == 1){
                    toastr.success('Listing marked as featured');
                } else {
                    toastr.success('Listing removed from featured');
                }

                // Reload after short delay
                setTimeout(function(){
                    location.reload();
                }, 800);
            }
        },
        error: function() {

            toastr.error('Something went wrong');

            // Revert UI
            checkbox.prop('checked', !checkbox.prop('checked'));
        },
        complete: function(){
            checkbox.prop('disabled', false);
        }
    });
});



        //reset listing counter to 0

    $(document).ready(function() {

    $.ajax({
        url: "{{ route('listing.reset-counter') }}",
        type: 'POST',
        data: {
            _token: "{{ csrf_token() }}"
        },
        success: function(response) {
            // After marking as read, refresh counter
            updatelistingCounter();
        }
    });

});

       
    });
</script>
@endsection