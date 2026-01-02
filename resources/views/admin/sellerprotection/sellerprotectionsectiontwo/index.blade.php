@extends('admin.layout.app')
@section('title', 'Seller Protection Section Two')

@section('content')
<div class="main-content" style="min-height: 562px;">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Seller Protection Section Two</h4>
                        </div>
                        <div class="card-body table-striped table-bordered table-responsive">
                            <table class="responsive table" id="table_id_events">
                                <thead>
                                    <tr>
                                        <th>Sr.</th>
                                        <th>Main Title</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>{{ $sectiontwo->main_title ?? '--' }}</td>
                                        <td>{{ $sectiontwo->main_description ?? '--' }}</td>
                                        <td>@if($sectiontwo && $sectiontwo->image)
                                            <img src="{{ asset($sectiontwo->image) }}" alt="" height="50"
                                                        width="50" class="image">
                                            @else
                                            <span>--</span>
                                            @endif
                                        </td>
                                        <td style="vertical-align: middle;">
                                            <div class="d-flex align-items-center" style="gap: 6px;">
                                                @if (Auth::guard('admin')->check() ||
                                                ($sideMenuPermissions->has('Seller Protection Section Two') && $sideMenuPermissions['Seller Protection Section Two']->contains('edit')))
                                                <a href="{{ route('sellerprotectionsectiontwo.edit', $sectiontwo->id) }}"
                                                    class="btn btn-primary p-2"
                                                    style="background-color: #0F1142;">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                @endif
                                                <div class="d-flex align-items-center" style="gap: 6px;">
                                                    @if (Auth::guard('admin')->check() ||
                                                    ($sideMenuPermissions->has('Seller Protection Section Two') && $sideMenuPermissions['Seller Protection Section Two']->contains('show')))
                                                    <a href="{{ route('sellerprotectionsectiontwo.show', $sectiontwo->id) }}"
                                                        class="btn btn-primary p-2"
                                                        style="background-color: #0F1142;">
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