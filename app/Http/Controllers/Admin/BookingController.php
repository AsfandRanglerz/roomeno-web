<?php

namespace App\Http\Controllers\Admin;

use App\Models\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookingController extends Controller
{
   public function bookingCounter()
{
    $count = Booking::where('status', 0)->count();
    return response()->json(['count' => $count]);
}


    public function bookingIndex()
    {
        $bookings = Booking::latest()->get();
        return view('admin.bookings.index', compact('bookings'));
    }

    public function approve($id)
    {
        $mobile = Booking::findOrFail($id);
        $mobile->status = 1; // 1 = Approved
        $mobile->save();

        return redirect()->route('booking.index')->with('success', 'Booking Approved Successfully');
    }
 
   public function reject($id)
    {
        $mobile = Booking::findOrFail($id);
        $mobile->status = 2; // 2 = Rejected
        $mobile->save();

        return redirect()->route('booking.index')->with('success', 'Booking Rejected Successfully');
    }
}
