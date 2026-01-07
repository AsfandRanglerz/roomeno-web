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
                                        <th>Seller Name</th>
                                        <th>Payment Date</th>
                                        <th>Payment Time</th>
                                        <th>Payment</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     @foreach ($bookings as $booking)
                                    <tr>
                                        <td>{{ $booking->seller_name?? '--' }}</td>
                                        <td>{{ $booking->created_at ?? '--' }}</td>
                                        <td>{{ $booking->payment?? '--' }}</td>
                                        
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