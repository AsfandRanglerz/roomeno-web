@extends('admin.layout.app')
@section('title', 'Review Section Three')

@section('content')
<div class="main-content" style="min-height: 562px;">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Review Section Three</h4>
                        </div>
                        <div class="card-body table-striped table-bordered table-responsive">
                            <table class="responsive table" id="table_id_events">
                                <thead>
                                    <tr>
                                        <th>Sr.</th>
                                        <th>Name</th>
                                        <th>Country</th>
                                        <th>Review</th>
                                        <th>Image</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($reviews as $review)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $review->main_title }}</td>
                                        <td>{{ $review->title }}</td>
                                        <td>{{ $review->description }}</td>
                                        <td>@if($review && $review->image)
                                            <img src="{{ asset($review->image) }}" alt="" height="50"
                                                        width="50" class="image">
                                            @else
                                            <span>--</span>
                                            @endif
                                        </td>
                                        <td style="vertical-align: middle;">
                                            <div class="d-flex align-items-center" style="gap: 6px;">
                                                @if (Auth::guard('admin')->check() ||
                                                ($sideMenuPermissions->has('Review Section Three') && $sideMenuPermissions['Review Section Three']->contains('edit')))
                                                <a href="{{ route('reviewthree.edit', $review->id) }}"
                                                    class="btn btn-primary p-2"
                                                    style="background-color: #cb84fe;">
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

@endsection

@section('js')

<script>
   $(document).ready(function() {
    $('#table_id_events').DataTable();
       
    });
</script>
@endsection