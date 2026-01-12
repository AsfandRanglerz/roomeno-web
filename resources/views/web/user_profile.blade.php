@extends('web.layout.app')
@section('title','User Profile')
@section('content')

<div class="container-fluid py-5 main-container-div-for-user-profile">
    <div class="row px-0">
        
        <!-- Profile Section -->
        <div class="col-12 d-flex px-sm-5 px-1 user-profile-main-div">
            <img src="{{asset('public/web/assets/images/user-profile-image.png')}}"
                 alt="User Profile"
                 class="user-profile-placeholder-img me-4">

            <div class="user-profile-text">
                <h2 class="user-name-heading">MrAlex546583</h2>
                <p class="user-detail-paragraph px-1 pt-2">
                    Vibhati Sharma ▪️Creating moments that inspire travel. ▪️Follow the journey. Find your escape
                </p>

                <div class="share-btn-div d-flex align-items-center pt-2">
                    <button class="share-btn-in-index d-flex align-items-center">
                        Share
                        <img src="https://img.icons8.com/ios/50/reply-arrow.png"
                             alt="share icon"
                             class="share-icon-img">
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Stories Section -->
    <div class="row px-0 px-sm-5 px-1 g-3 mt-1">
        <h3 class="py-3">Top Hotels</h3>

        <!-- Card 1 -->
        <div class="col-md-4 col-sm-6 p-0 px-3 mt-4 story-video-wrapper">

            <!-- ONLY video related content -->
            <div style="position: relative;">
                <video class="story-video"
                       src="{{asset('public/web/assets/images/video1.mp4')}}"
                       autoplay muted loop preload="none"></video>

                <button class="speaker-btn speaker-btn-in-user-profile mx-3"
                       
                        id="speakerToggle">
                    <i class="bi bi-volume-mute"></i>
                </button>
                <button class="btn  share-btn-in-user-profile">
                    <span>
                        <img src="{{asset('public/web/assets/images/share-icon.png')}}" alt="">
                    </span>
                </button>

                <a href="#" class="text-decoration-none"><span class="view-detail-span">
                    View Detail
                </span></a>
            </div>

            <!-- Heading stays AFTER video -->
            <div class="py-2 profile-bottom-heading-div">
                <h6>Royal Hotel<span>★ ★ ★ ★ ★</span></h6>
                <p><img src="{{asset('public/web/assets/images/location-vector.png')}}" alt=""> Strasbourg France <span class="rating-span-in-profile-bottom-div">6.2</span> <span>200 Reviews</span></p>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="col-md-4 col-sm-6 p-0 px-3 mt-4 story-video-wrapper">

            <div style="position: relative;">
                <video class="story-video"
                       src="{{asset('public/web/assets/images/video2.mp4')}}"
                       autoplay muted loop preload="none"></video>

                <button class="speaker-btn speaker-btn-in-user-profile mx-3"
                       
                        id="#">
                    <i class="bi bi-volume-mute"></i>
                </button>
                <button class="btn  share-btn-in-user-profile">
                    <span>
                        <img src="{{asset('public/web/assets/images/share-icon.png')}}" alt="">
                    </span>
                </button>

                <a href="#" class="text-decoration-none"><span class="view-detail-span">
                    View Detail
                </span></a>
            </div>

            <div class="py-2 profile-bottom-heading-div">
                <h6>Royal Hotel<span>★ ★ ★ ★ ★</span></h6>
                <p><img src="{{asset('public/web/assets/images/location-vector.png')}}" alt=""> Strasbourg France <span class="rating-span-in-profile-bottom-div">6.2</span> <span>200 Reviews</span></p>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="col-md-4 col-sm-6 p-0 px-3 mt-4 story-video-wrapper">

            <div style="position: relative;">
                <video class="story-video"
                       src="{{asset('public/web/assets/images/video3.mp4')}}"
                       autoplay muted loop preload="none"></video>

                <button class="speaker-btn speaker-btn-in-user-profile mx-3"
                       
                        id="#">
                    <i class="bi bi-volume-mute"></i>
                </button>
                <button class="btn  share-btn-in-user-profile">
                    <span>
                        <img src="{{asset('public/web/assets/images/share-icon.png')}}" alt="">
                    </span>
                </button>

                <a href="#" class="text-decoration-none"><span class="view-detail-span">
                    View Detail
                </span></a>
            </div>

            <div class="py-2 profile-bottom-heading-div">
                <h6>Royal Hotel<span>★ ★ ★ ★ ★</span></h6>
                <p><img src="{{asset('public/web/assets/images/location-vector.png')}}" alt=""> Strasbourg France <span class="rating-span-in-profile-bottom-div">6.2</span> <span>200 Reviews</span></p>
            </div>
        </div>

    </div>
</div>

@endsection
