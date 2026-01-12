<?php

namespace App\Http\Controllers\web;

use App\Models\HotelInfo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('web.index');
    }

    public function hotelinfo(){
        return view('web.hotel');
    }
    public function userinfo(){
        return view('web.user_profile');
    }
    public function checkoutinfo(){
        return view('web.check_out');
    }
    public function bookinginfo(){
        return view('web.booking_confirmation');
    }
    public function reservationDetail(){
        return view('web.reservation_detail');
    }
    public function reservationBookingDetail(){
        return view('web.reservation_booking_info');
    }
    public function userProfileInfo(){
        return view('web.user_profile_info');
    }
    public function uploadVideo(){
        return view('web.upload_video');
    }
    public function userAccountInfo(){
        return view('web.user_account_detail');
    }
   

}
