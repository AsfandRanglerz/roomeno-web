<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\HotelInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SellMyRoomController extends Controller
{
    public function hotelInfo(Request $request)
{
    try {
        $user = Auth::user();

        // ✅ Convert date format: "Feb 13, 2026" → Y-m-d
        $checkIn  = Carbon::createFromFormat('M d, Y', $request->check_in)->format('Y-m-d');
        $checkOut = Carbon::createFromFormat('M d, Y', $request->check_out)->format('Y-m-d');

        // ✅ Optional: validate checkout > checkin
        if ($checkOut <= $checkIn) {
            return response()->json([
                'message' => 'Check-out date must be after check-in date'
            ], 422);
        }

        $sellRoom = HotelInfo::create([
            'user_id'    => $user->id,
            'name' => $request->name,
            'board_name' => $request->board_name,
            'check_in'   => $checkIn,
            'check_out'  => $checkOut,
            'people_number'     => $request->people_number, // "1 Adult" or "1 Adult, 1 Child"
        ]);

        return response()->json([
            'message' => 'Hotel info submitted successfully',
            'data' => [
                'id'         => $sellRoom->id,
                'hotel_name' => $sellRoom->name,
                'board_name' => $sellRoom->board_name,
                'check_in'   => Carbon::parse($sellRoom->check_in)->format('M d, Y'),
                'check_out'  => Carbon::parse($sellRoom->check_out)->format('M d, Y'),
                'guests'     => $sellRoom->people_number,
            ]
        ], 200);

    } catch (\Exception $e) {
        return response()->json([
            'message' => 'Something went wrong',
            'error'   => $e->getMessage(),
        ], 500);
    }
}

public function bookingInfo(Request $request, $id)
{
    try {
        

        // ✅ Fetch existing hotel info row
        $booking = HotelInfo::where('id', $id)
            ->where('user_id', Auth::id())
            ->first();

        if (! $booking) {
            return response()->json([
                'message' => 'Record not found'
            ], 404);
        }

        // ✅ Update ONLY booking info columns
        $booking->update([
            'first_name'          => $request->first_name,
            'last_name'           => $request->last_name,
            'country'             => $request->country,
            'phone_number'        => $request->phone_number,
            'email'               => $request->email,
            'place_of_booking'    => $request->place_of_booking,
            'confirm_no'          => $request->confirm_no,
        ]);

        return response()->json([
            'message' => 'Booking info saved successfully',
            'data' => [
                'first_name' => $booking->first_name,
                'last_name'  => $booking->last_name,
                'country_code'    => $booking->country,
                'phone_number'      => $booking->phone_number,
                'email'      => $booking->email,
                'place_of_booking' => $booking->place_of_booking,
                'confirmation_number' => $booking->confirm_no,
            ]
        ], 200);

    } catch (\Exception $e) {
        return response()->json([
            'message' => 'Something went wrong',
            'error' => $e->getMessage()
        ], 500);
    }
}

public function gethotelInfo($id)
{
    try {
        // ✅ Fetch existing hotel info row
        $booking = HotelInfo::where('id', $id)
            ->where('user_id', Auth::id())
            ->first();

        if (! $booking) {
            return response()->json([
                'message' => 'Booking record not found'
            ], 404);
        }

        $checkIn  = Carbon::parse($booking->check_in);
        $checkOut = Carbon::parse($booking->check_out);

        // ✅ Calculate nights
        $nights = $checkIn->diffInDays($checkOut);

        return response()->json([
            'data' => [
                'hotel_name' => $booking->name,
                'check_in'   => $checkIn->format('M d, Y'),
                'check_out'  => $checkOut->format('M d, Y'),
                'nights'     => $nights . ' nights',
                'guests'     => $booking->people_number,
            ]
        ], 200);

    } catch (\Exception $e) {
        return response()->json([
            'message' => 'Something went wrong',
            'error' => $e->getMessage()
        ], 500);
    }
}
}
