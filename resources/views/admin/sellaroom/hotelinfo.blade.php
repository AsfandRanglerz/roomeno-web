@extends('admin.layout.app')
@section('title', 'Hotel Info')

@section('content')
<div class="main-content" style="min-height: 562px;">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Hotel Info</h4>
                        </div>
                        <div class="card-body table-striped table-bordered table-responsive">
                            <table class="table" id="table_id_events">
                                <thead>
                                    <tr>
                                        <th>Sr.</th>
                                        <th>Hotel Name</th>
                                        <th>Board Name</th>
                                        <th>Check In</th>
                                        <th>Check Out</th>
                                        <th>Number of People</th>
                                        <th>Toggle</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($hotels as $hotel)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $hotel->name ?? '-' }}</td>
                                       <td>{{ $hotel->board_name ?? '-' }}</td>
                                        <td>{{ $hotel->check_in ?? '-' }}</td>
                                        <td>{{ $hotel->check_out ?? '-' }}</td>
                                        <td>{{ $hotel->people_number ?? '-' }} </td>
                                        <td>
                                            <label class="custom-switch">
                                                <input type="checkbox" class="custom-switch-input toggle-status"
                                                    data-id="{{ $hotel->id }}"
                                                    {{ $hotel->toggle ? 'checked' : '' }}>
                                                <span class="custom-switch-indicator"></span>
                                                <span class="custom-switch-description">
                                                    {{ $hotel->toggle ? 'Activated' : 'Deactivated' }}
                                                </span>
                                            </label>
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
            url: "{{ route('hotel.toggle-status') }}",
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

        //deleting alert

       $(document).on('click', '.show_confirm', function(e) {
                e.preventDefault();
                let formId = $(this).data('form');
                let form = document.getElementById(formId);

                Swal.fire({
                    title: 'Are you sure you want to delete this record?',
                    text: "If you delete this Sub-Admin record, it will be gone forever.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: form.action,
                            method: 'POST',
                            data: {
                                _method: 'DELETE',
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(res) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success!',
                                    text: 'Recored deleted successfully.',
                                    showConfirmButton: false,
                                    timer: 2000
                                }).then(() => location.reload());
                            },
                            error: function() {
                                Swal.fire('Error!', 'Failed to delete the record.',
                                    'error');
                            }
                        });
                    }
                });
            });
    });
</script>
@endsection