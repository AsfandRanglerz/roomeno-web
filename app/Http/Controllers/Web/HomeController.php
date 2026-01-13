<?php

namespace App\Http\Controllers\web;

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
     public function userBookingInfo(){
        return view('web.my_booking_detail');
    }
    public function listingInfo(){
        return view('web.my_listing');
    }
    public function creditInfo(){
        return view('web.my_credit');
    }
    public function partnerLogin(){
        return view('web.partner_login');
    }
    public function partnerSignup(){
        return view('web.partner_signup');
    }
    public function partnerJoining(){
        return view('web.partner_joining');
    }
    public function addInventory(){
        return view('web.add_inventory');
    }
    public function partnerDashboard(){
        return view('web.partner_dashboard');
    }
    public function filter(){
        return view('web.filter');
    }

}
