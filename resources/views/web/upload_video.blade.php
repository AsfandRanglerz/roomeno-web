@extends('web.layout.app')
@section('title','Upload Video')
@section('content')

<div class="container-fluid py-4">
  <div class="row justify-content-center">
    <div class="col-12 p-sm-5 p-2">
      <h3 class="lh-base">
        Showcase Your Hotel Experience: Upload Your Review Video and Let It Be Featured on Your Profile For Everyone to See!
      </h3>
      <div class="card p-4 shadow-sm">

        <h3 class="pb-4">Upload Video</h3>
        <form>
          <div class="mb-3">
            <label class="form-label  fw-bold">Upload Video</label>
            <input type="file" class="form-control form-input-for-upload-video" accept="video/*">
          </div>
          <div class="mb-3">
            <label class="form-label  fw-bold">Hotel Name</label>
            <select class="form-select form-input-for-upload-video">
              <option selected>Select Hotel</option>
              <option>Hotel A</option>
              <option>Hotel B</option>
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label fw-bold">Video Title</label>
            <input type="text" class="form-control form-input-for-upload-video" placeholder="Enter Title">
          </div>
          <div class="text-end">
            <button type="submit" class="btn publish-btn px-4">
              Publish
            </button>
          </div>
        </form>

      </div>

      <!-- End Paragraph -->
      <p class="mt-3  small">
        Once your review video is uploaded, it will be published on your profile for everyone to see.
        When viewers watch your video and click the booking link to reserve the hotel, you'll earn a
        commission for each successful booking. Share your experience, help travelers, and start earning today!
      </p>

    </div>
  </div>
</div>


@endsection
