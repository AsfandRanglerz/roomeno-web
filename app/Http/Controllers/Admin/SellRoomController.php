<?php

namespace App\Http\Controllers\Admin;

use Log;
use Exception;
use App\Models\HotelInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class SellRoomController extends Controller
{
    public function hotelInfoIndex()
    {
        $hotels = HotelInfo::latest()->get();
        return view('admin.sellaroom.hotelinfo', compact('hotels'));
    }

    public function reservationInfoIndex()
    {
        $reservations = HotelInfo::select(['first_name','last_name', 'country', 'phone_number', 'email', 'place_of_booking', 'confirm_no'])->latest()->get();
        return view('admin.sellaroom.reservationinfo',compact('reservations'));
    }

    public function toggleStatus(Request $request)
{
    $hotel = HotelInfo::find($request->id);
    
    if ($hotel) {
        $hotel->toggle = $request->status;
        $hotel->save();
        
        // If deactivating and reason provided
        if ($request->status == 0 && $request->reason) {

            // Send email notification
            $this->sendDeactivationEmail($hotel, $request->reason);
        }
        
        return response()->json([
            'success' => true,
            'message' => 'Status updated successfully',
            'new_status' => $hotel->toggle ? 'Activated' : 'Deactivated'
        ]);
    }
    
    return response()->json([
        'success' => false,
        'message' => 'User not found'
    ], 404);
}

protected function sendDeactivationEmail($hotel, $reason)
{
    $data = [
        'name' => $hotel->name,
        'email' => $hotel->email,
        'reason' => $reason
    ];
    
    try {
        Mail::send('emails.user_deactivated', $data, function($message) use ($hotel) {
            $message->to($hotel->email, $hotel->name)
                    ->subject('Account Deactivation Notification');
        });
    } catch (Exception $e) {
        Log::error("Failed to send deactivation email: " . $e->getMessage());
    }
}

}
