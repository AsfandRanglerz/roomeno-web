@extends('admin.layout.app')
@section('title', 'Reservation Info')

@section('content')
<div class="main-content" style="min-height: 562px;">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Reservation Info</h4>
                        </div>
                        <div class="card-body table-striped table-bordered table-responsive">
                            <table class="table" id="table_id_events">
                                <thead>
                                    <tr>
                                        <th>Sr.</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Country</th>
                                        <th>Phone Number</th>
                                        <th>Email</th>
                                        <th>Place of booking</th>
                                        <th>Confirmation Number</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($reservations as $reservation)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $reservation->first_name }}</td>
                                        <td>{{ $reservation->last_name }}</td>
                                        <td>{{ $reservation->country }}</td>
                                        <td>{{ $reservation->phone_number }}</td>
                                        <td><a href="mailto:{{ $reservation->email }}">{{ $reservation->email ?? '-' }}</a>
                                        </td>
                                        <td>{{ $reservation->place_of_booking }}</td>
                                        <td>{{ $reservation->confirm_no }}</td>
                                        
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
