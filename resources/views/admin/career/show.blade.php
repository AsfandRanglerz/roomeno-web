@extends('admin.layout.app')
@section('title', 'Career')

@section('content')
<div class="main-content" style="min-height: 562px;">
    <section class="section">
        <div class="section-body">
            <a class="btn btn-primary mb-3" href="{{ route('career.index')}}">Back</a>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Career</h4>
                        </div>
                        <div class="card-body table-striped table-bordered table-responsive">
                            <table class="responsive table" id="table_id_events">
                                <thead>
                                    <tr>
                                        <th>Sr.</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     @foreach ($careers as $career)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $career->title ?? '--' }}</td>
                                        <td>{{ $career->description_two ?? '--' }}</td>
                                        <td style="vertical-align: middle;">
                                            <div class="d-flex align-items-center" style="gap: 6px;">
                                                @if (Auth::guard('admin')->check() ||
                                                ($sideMenuPermissions->has('Career') && $sideMenuPermissions['Career']->contains('edit')))
                                                <a href="{{ route('career.showedit', $career->id) }}"
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