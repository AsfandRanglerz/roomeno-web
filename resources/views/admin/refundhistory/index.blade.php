@extends('admin.layout.app')
@section('title', 'Refund History')

@section('content')
<div class="main-content" style="min-height: 562px;">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Refund History</h4>
                        </div>
                        <div class="card-body table-striped table-bordered table-responsive">
                            <table class="responsive table" id="table_id_events">
                                <thead>
                                    <tr>
                                        <th>Customer Name</th>
                                        <th>Refund Date</th>
                                        <th>Refund Time</th>
                                        <th>Refund Screenshot</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     @foreach ($histories as $history)
                                    <tr>
                                           <td>
                                            {{ 
                                                optional($history->booking)->first_name 
                                                ? $history->booking->first_name . ' ' . $history->booking->last_name 
                                                : '--' 
                                            }}
                                            </td>


                                            <td>
                                                {{ \Carbon\Carbon::parse($history->created_at)->format('M d, Y') }}
                                            </td>

                                            <td>
                                                {{ \Carbon\Carbon::parse($history->created_at)->format('h:i A') }}
                                            </td>
                                            <td>
                                            @if($history->booking && $history->booking->refund_image)
                                                <img src="{{ asset('public/'. $history->booking->refund_image) }}"
                                                    class="img-thumbnail refund-thumb"
                                                    style="height:50px;cursor:pointer"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#imageZoomModal"
                                                    data-image="{{ asset('public/'. $history->booking->refund_image) }}">
                                            @endif
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

<div class="modal fade" id="imageZoomModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content bg-transparent border-0 shadow-none">

            <div class="modal-header border-0">
                <h5 class="modal-title text-white">Refund Screenshot</h5>
                <button type="button"
                        class="btn-close btn-close-white"
                        data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body text-center overflow-auto p-0">

                <img id="zoomImage"
                     src=""
                     class="img-fluid"
                     style="transition: transform 0.3s ease;">

            </div>

        </div>
    </div>
</div>



@endsection

@section('js')

<script>
   $(document).ready(function() {
    $('#table_id_events').DataTable();
       
    });

</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {

    let zoomed = false;

    document.querySelectorAll('.refund-thumb').forEach(img => {
        img.addEventListener('click', function () {
            const modalImg = document.getElementById('zoomImage');
            modalImg.src = this.dataset.image;
            modalImg.style.transform = 'scale(1)';
            zoomed = false;
        });
    });


});
</script>
@endsection