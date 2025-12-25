@extends('admin.layout.app')
@section('title', 'Partners')

@section('content')
<div class="main-content" style="min-height: 562px;">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Partners</h4>
                        </div>

                        <div class="card-body table-striped table-bordered table-responsive">

                            {{-- Create Button --}}
                            <a class="btn btn-primary mb-3" href="{{ route('partner.create') }}">
                                Create
                            </a>

                            <table class="table" id="table_id_partners">
                                <thead>
                                    <tr>
                                        <th>Sr.</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Status</th> {{-- Status Column --}}
                                        <th>Actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($partners as $partner)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $partner->first_name }} {{ $partner->last_name }}</td>
                                            <td>
                                                <a href="mailto:{{ $partner->email }}">{{ $partner->email }}</a>
                                            </td>

                                            {{-- Status Toggle --}}
                                            <td>
                                                <label class="custom-switch">
                                                    <input type="checkbox" class="custom-switch-input toggle-status"
                                                           data-id="{{ $partner->id }}"
                                                           {{ $partner->status ? 'checked' : '' }}>
                                                    <span class="custom-switch-indicator"></span>
                                                    <span class="custom-switch-description">
                                                        {{ $partner->status ? 'Active' : 'Inactive' }}
                                                    </span>
                                                </label>
                                            </td>

                                            <td>
                                                <div class="d-flex">

                                                    {{-- Edit --}}
                                                    <a href="{{ route('partner.edit', $partner->id) }}"
                                                       class="btn btn-primary mr-1">
                                                        <i class="fa fa-edit"></i>
                                                    </a>

                                                    {{-- Delete --}}
                                                    <form id="delete-form-{{ $partner->id }}"
                                                          action="{{ route('partner.destroy', $partner->id) }}"
                                                          method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>

                                                    <button class="show_confirm btn"
                                                            style="background-color:#08113B"
                                                            data-form="delete-form-{{ $partner->id }}"
                                                            type="button">
                                                        <i class="fa fa-trash text-white"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@section('js')
<script>
$(document).ready(function () {

    // DataTable Initialization
    if ($.fn.DataTable.isDataTable('#table_id_partners')) {
        $('#table_id_partners').DataTable().destroy();
    }
    $('#table_id_partners').DataTable();

    // Delete Confirmation
    $(document).on('click', '.show_confirm', function (e) {
        e.preventDefault();

        let formId = $(this).data('form');
        let form = document.getElementById(formId);

        Swal.fire({
            title: 'Are you sure?',
            text: "This record will be deleted permanently!",
            icon: 'warning',
            showCancelButton: true,
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
                    success: function (response) {
                        if(response.success){
                            Swal.fire({
                                icon: 'success',
                                title: 'Deleted!',
                                text: response.message,
                                timer: 2000,
                                showConfirmButton: false
                            }).then(() => location.reload());
                        } else {
                            Swal.fire('Error!', response.message, 'error');
                        }
                    },
                    error: function () {
                        Swal.fire('Error!', 'Failed to delete the record.', 'error');
                    }
                });
            }
        });
    });

    // ✅ Status Toggle
    $(document).on('change', '.toggle-status', function () {
        let partnerId = $(this).data('id');
        let status = $(this).is(':checked') ? 1 : 0;
        let $switch = $(this).closest('.custom-switch');
        let $desc = $switch.find('.custom-switch-description');

        $.ajax({
            url: "{{ route('partner.toggleStatus') }}",
            method: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                id: partnerId,
                status: status
            },
            success: function(response){
                if(response.success){
                    toastr.success(response.message);
                    $desc.text(status ? 'Active' : 'Inactive');
                } else {
                    toastr.error(response.message || 'Failed to update status');
                }
            },
            error: function(){
                toastr.error('Something went wrong!');
            }
        });
    });

});
</script>
@endsection
