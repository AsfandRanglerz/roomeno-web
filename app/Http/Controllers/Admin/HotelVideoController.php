<?php

namespace App\Http\Controllers\Admin;

use App\Models\HotelVideo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HotelVideoController extends Controller
{
    public function updatehotelvideosCounter()
    {
        $count = HotelVideo::where('status', 0)->count();
        return response()->json(['count' => $count]);
    }
    public function index()
    {
        $hotelVideos = HotelVideo::latest()->get();
        return view('admin.hotelvideos.index', compact('hotelVideos'));
    }

     public function approve($id)
    {
        $hotelVideos = HotelVideo::findOrFail($id);
        $hotelVideos->status = 1; // 1 = Approved
        $hotelVideos->save();

        return redirect()->route('hotelvideos.index')->with('success', 'Hotel Video Approved Successfully');
    }
 
   public function reject($id)
    {
        $hotelVideos = HotelVideo::findOrFail($id);
        $hotelVideos->status = 2; // 2 = Rejected
        $hotelVideos->save();

        return redirect()->route('hotelvideos.index')->with('success', 'Hotel Video Rejected Successfully');
    }
}
