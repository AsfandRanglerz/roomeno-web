@extends('admin.layout.app')
@section('title', 'Hotels')
@section('content')

<div class="main-content" style="min-height: 562px;">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="col-12">
                                <h4>Hotels</h4>
                            </div>
                        </div>
                        <div class="card-body table-striped table-bordered table-responsive">
                            <div class="clearfix">
                                <div class="create-btn">
                                    @if (Auth::guard('admin')->check() ||
                                        ($sideMenuPermissions->has('Hotels') && $sideMenuPermissions['Hotels']->contains('create')))
                                        <a class="btn btn-primary mb-3 text-white"
                                            href="{{ route('hotels.create') }}">Create</a>
                                    @endif
                                </div>
                            </div>

                            <table class="table" id="table_id_hotels">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Sr.</th>
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th>Description</th>
                                        <th>Location</th>
                                        <th>City</th>
                                        <th>Country</th>
                                        <th>Images</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="sortable-hotels">
                                    @foreach ($hotels as $hotel)
                                        <tr data-id="{{ $hotel->id }}">
                                            <td class="sort-handler" style="cursor: move; text-align: center;">
                                                <i class="fas fa-th"></i>
                                            </td>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $hotel->name }}</td>
                                            <td>{{ $hotel->slug }}</td>
                                            <td title="{{ strip_tags($hotel->description) }}">
                                                {{ \Illuminate\Support\Str::limit(strip_tags($hotel->description), 100, '...') }}
                                            </td>
                                            <td>{{ $hotel->location }}</td>
                                            <td>{{ $hotel->city }}</td>
                                            <td>{{ $hotel->country }}</td>
                                            <td>
                                                @if($hotel->images)
                                                    @php
                                                        $images = json_decode($hotel->images);
                                                    @endphp
                                                    @foreach($images as $img)
                                                        <img src="{{ asset($img) }}" width="50" height="50" class="mr-1 mb-1" />
                                                    @endforeach
                                                @else
                                                    <span>No Images</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    @if (Auth::guard('admin')->check() ||
                                                        ($sideMenuPermissions->has('Hotels') && $sideMenuPermissions['Hotels']->contains('edit')))
                                                        <a href="{{ route('hotels.edit', $hotel->id) }}"
                                                            class="btn btn-primary mr-1">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                    @endif

                                                    @if (Auth::guard('admin')->check() ||
                                                        ($sideMenuPermissions->has('Hotels') && $sideMenuPermissions['Hotels']->contains('delete')))
                                                        <form id="delete-form-{{ $hotel->id }}"
                                                            action="{{ route('hotels.destroy', $hotel->id) }}"
                                                            method="POST" style="display:inline-block;">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                        <button class="show_confirm btn"
                                                            style="background-color: #08113B;"
                                                            data-form="delete-form-{{ $hotel->id }}" type="button">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    @endif
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
    $(document).ready(function() {
        // Initialize DataTable
        if ($.fn.DataTable.isDataTable('#table_id_hotels')) {
            $('#table_id_hotels').DataTable().destroy();
        }
        $('#table_id_hotels').DataTable();

        // SweetAlert2 delete confirmation
        $('.show_confirm').click(function(event) {
            event.preventDefault();
            var formId = $(this).data("form");
            var form = document.getElementById(formId);

            Swal.fire({
                title: "Are you sure you want to delete this record?",
                text: "If you delete this hotel record, it will be gone forever.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: form.action,
                        type: 'POST',
                        data: {
                            _method: 'DELETE',
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            Swal.fire({
                                title: "Success!",
                                text: "Record deleted successfully.",
                                icon: "success",
                                timer: 2000,
                                showConfirmButton: false
                            }).then(() => {
                                location.reload();
                            });
                        },
                        error: function() {
                            Swal.fire("Error!", "Failed to delete record.", "error");
                        }
                    });
                }
            });
        });

        // Drag and Drop Reordering
       
    });
</script>
@endsection
