@extends('admin.layout.app')
@section('title', 'We Protect Our Buyers')

@section('content')
<div class="main-content" style="min-height: 562px;">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>We Protect Our Buyers</h4>
                        </div>
                        <div class="card-body table-striped table-bordered table-responsive">
                            <table class="responsive table" id="table_id_events">
                                <thead>
                                    <tr>
                                        <th>Sr.</th>
                                        <th>Image</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>@if($protect && $protect->image)
                                            <img src="{{ asset($protect->image) }}" alt="" height="50"
                                                        width="50" class="image">
                                            @else
                                            <span>--</span>
                                            @endif
                                        </td>
                                        <td style="vertical-align: middle;">
                                            <div class="d-flex align-items-center" style="gap: 6px;">
                                                @if (Auth::guard('admin')->check() ||
                                                ($sideMenuPermissions->has('Protect our buyers') && $sideMenuPermissions['Protect our buyers']->contains('edit')))
                                                <a href="{{ route('protectbuyer.edit', $protect->id) }}"
                                                    class="btn btn-primary p-2"
                                                    style="background-color: #cb84fe;">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                @endif
                                                <div class="d-flex align-items-center" style="gap: 6px;">
                                                    @if (Auth::guard('admin')->check() ||
                                                    ($sideMenuPermissions->has('Protect our buyers') && $sideMenuPermissions['Protect our buyers']->contains('show')))
                                                    <a href="{{ route('protectbuyer.show', $protect->id) }}"
                                                        class="btn btn-primary p-2"
                                                        style="background-color: #cb84fe;">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                    @endif
                                            </div>

                                        </td>
                                        
                                        </div>
                                        </div>
                                        </td>
                                    </tr>
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