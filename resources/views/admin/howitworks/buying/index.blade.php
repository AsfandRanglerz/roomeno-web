@extends('admin.layout.app')
@section('title', 'Buying')

@section('content')
<div class="main-content" style="min-height: 562px;">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Buying</h4>
                        </div>
                        <div class="card-body table-striped table-bordered table-responsive">
                            <table class="responsive table" id="table_id_events">
                                <thead>
                                    <tr>
                                        <th>Sr.</th>
                                        <th>Main Title</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     @foreach ($buyings as $buying)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $buying->main_title ?? '--' }}</td>
                                        <td style="vertical-align: middle;">
                                            <div class="d-flex align-items-center" style="gap: 6px;">
                                                @if (Auth::guard('admin')->check() ||
                                                ($sideMenuPermissions->has('Buying') && $sideMenuPermissions['Buying']->contains('edit')))
                                                <a href="{{ route('buying.edit', $buying->id) }}"
                                                    class="btn btn-primary p-2"
                                                    style="background-color: #0F1142;">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                @endif

                                                 <div class="d-flex align-items-center" style="gap: 6px;">
                                                @if (Auth::guard('admin')->check() ||
                                                ($sideMenuPermissions->has('Buying') && $sideMenuPermissions['Buying']->contains('show')))
                                                <a href="{{ route('buying.show', $buying->id) }}"
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