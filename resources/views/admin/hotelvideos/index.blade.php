@extends('admin.layout.app')
@section('title', 'Hotel Videos')

@section('content')
<div class="main-content" style="min-height: 562px;">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Hotel Videos</h4>
                        </div>
                        <div class="card-body table-striped table-bordered table-responsive">
                            <table class="responsive table" id="table_id_events">
                                <thead>
                                    <tr>
                                        <th>Sr.</th>
                                        <th>Title</th>
                                        <th>Hotel Name</th>
                                        <th>Video</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     @foreach ($hotelVideos as $hotelVideo)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $hotelVideo->title ?? '--' }}</td>
                                        <td>{{ $hotelVideo->hotel?? '--' }}</td>
                                        <td>
                                            @php
                                                $videos = [];

                                                if (!empty($hotelVideo->video)) {
                                                    $decoded = json_decode($hotelVideo->video, true);

                                                    $videos = is_array($decoded)
                                                        ? $decoded
                                                        : [$hotelVideo->video];
                                                }

                                                $media = [];

                                                foreach ($videos as $vid) {
                                                    $media[] = [
                                                        'type' => 'video',
                                                        'src' => asset('public/'. $vid), // or asset('storage/'.$vid)
                                                    ];
                                                }
                                            @endphp

                                            @if(count($media))
                                                @php $first = $media[0]; @endphp

                                                <video width="60" height="50"
                                                    preload="metadata"
                                                    muted
                                                    playsinline
                                                    style="cursor:pointer; object-fit:cover;"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#imageModal"
                                                    data-media='@json($media)'
                                                    data-start-index="0">
                                                    <source src="{{ $first['src'] }}" type="video/mp4">
                                                </video>
                                            @else
                                                <span class="text-muted">No Media</span>
                                            @endif
                                            </td>

                                       
                                            <td>
                                                    @php
                                                        $status = (int) $hotelVideo->status;
                                                        $statusText = match ($status) {
                                                            0 => 'Pending',
                                                            1 => 'Approved',
                                                            2 => 'Rejected',
                                                            default => 'Unknown',
                                                        };

                                                        $buttonClass = match ($status) {
                                                            0 => 'btn-warning',
                                                            1 => 'btn-success',
                                                            2 => 'btn-danger',
                                                            default => 'btn-secondary',
                                                        };
                                                    @endphp

                                                    <div class="dropdown">
                                                        <button class="btn btn-sm dropdown-toggle {{ $buttonClass }}"
                                                            type="button" data-toggle="dropdown">
                                                            {{ $statusText }}
                                                        </button>

                                                        <div class="dropdown-menu">
                                                            @if ($status == 1)
                                                                {{-- Show only Reject --}}
                                                                <form method="POST"
                                                                    action="{{ route('hotelvideos.reject', $hotelVideo->id) }}">
                                                                    @csrf
                                                                    <button type="submit"
                                                                        class="dropdown-item text-danger">Reject</button>
                                                                </form>
                                                            @elseif ($status == 2)
                                                                {{-- Show only Approve --}}
                                                                <form method="POST"
                                                                    action="{{ route('hotelvideos.approve', $hotelVideo->id) }}">
                                                                    @csrf
                                                                    <button type="submit"
                                                                        class="dropdown-item text-success">Approve</button>
                                                                </form>
                                                            @elseif ($status == 0)
                                                                {{-- Show both Approve and Reject --}}
                                                                <form method="POST"
                                                                    action="{{ route('hotelvideos.approve', $hotelVideo->id) }}">
                                                                    @csrf
                                                                    <button type="submit"
                                                                        class="dropdown-item text-success">Approve</button>
                                                                </form>
                                                                <form method="POST"
                                                                    action="{{ route('hotelvideos.reject', $hotelVideo->id) }}">
                                                                    @csrf
                                                                    <button type="submit"
                                                                        class="dropdown-item text-danger">Reject</button>
                                                                </form>
                                                            @endif
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

 <!-- Modal Structure -->
   <div id="imageModal" class="modal fade" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content bg-transparent shadow-none border-0">
            <div class="modal-header border-0">
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center">
                <div id="imageCarousel" class="carousel slide" data-bs-interval="false">
                    <div class="carousel-inner" id="carouselImages">
                        <!-- Images injected by JS -->
                    </div>
                    {{-- <button class="carousel-control-prev" type="button" data-bs-target="#imageCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#imageCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </button> --}}
                </div>
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

    document.addEventListener("DOMContentLoaded", function () {
    var imageModal = document.getElementById('imageModal');
    var carouselInner = document.getElementById('carouselImages');

    imageModal.addEventListener('show.bs.modal', function (event) {
        var trigger = event.relatedTarget;
        var mediaList = JSON.parse(trigger.getAttribute('data-media'));
        var startIndex = parseInt(trigger.getAttribute('data-start-index'), 10);

        carouselInner.innerHTML = '';

        mediaList.forEach((item, index) => {
            var div = document.createElement('div');
            div.classList.add('carousel-item');
            if (index === startIndex) div.classList.add('active');

             if (item.type === "video") {
                div.innerHTML = `
                    <video controls class="w-100" 
                           style="max-height:65vh; max-width:85%; object-fit:contain;">
                        <source src="${item.src}" type="video/mp4">
                    </video>
                `;
            }

            carouselInner.appendChild(div);
        });

        var carousel = new bootstrap.Carousel(document.getElementById('imageCarousel'), {
            interval: false,
            ride: false
        });

        carousel.to(startIndex);
    });
});
</script>


@endsection