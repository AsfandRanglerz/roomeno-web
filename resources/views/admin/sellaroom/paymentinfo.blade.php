@extends('admin.layout.app')
@section('title', 'Payment Info')

@section('content')
<div class="main-content" style="min-height: 562px;">
    <section class="section">
        <div class="section-body">
            <a class="btn btn-primary mb-3" href="{{ route('reservationinfo.index')}}">Back</a>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Payment Info</h4>
                        </div>
                        <div class="card-body table-striped table-bordered table-responsive">
                            <table class="responsive table" id="table_id_events">
                                <thead>
                                    <tr>
                                        <th>Asking Price</th>
                                        <th>Payment Type</th>
                                        <th>Card Number</th>
                                        <th>Cardholder Name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $payment->asking_price ?? '--' }}</td>
                                        <td>{{ $payment->paid_type ?? '--' }}</td>
                                        <td>{{ $payment->card_number ?? '--' }}</td>
                                        <td>{{ $payment->cardholder_name ?? '--' }}</td>
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