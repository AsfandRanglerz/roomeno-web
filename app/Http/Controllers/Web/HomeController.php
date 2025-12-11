<?php

namespace App\Http\Controllers\web;

use App\Models\HotelInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(){
        return view('web.index');
    }
    public function hotelinfo(){
        return view('web.hotel');
    }
    public function hotelDetails(){
        return view('web.hotelinfo');
    }

    public function hotelstore(Request $request)
    {
        // Insert into database
        $hotel = HotelInfo::create([
            'name'          => $request->name,
            'board_name'    => $request->board_name,
            'check_in'      => date('Y-m-d', strtotime($request->check_in)),
            'check_out'     => date('Y-m-d', strtotime($request->check_out)),
            'people_number' => $request->people_number,
        ]);

        return redirect()->route('hotel.details')->with('success', 'Hotel information saved successfully!');
    }
}
