<?php

namespace App\Http\Controllers\Api;

use App\Models\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function guestinfo(Request $request)
    {
        try {
            $user = Auth::user();

            $bookinginfo = Booking::create([
                'user_id'    => $user->id,
                'first_name' => $request->first_name,
                'last_name'  => $request->last_name,
                'email'      => $request->email,
                'country_code'     => $request->country_code,
                'phone'      => $request->phone,
            ]);

            return response()->json([
                'message' => 'Guest info submitted successfully',
                'data' => [
                    'id'         => $bookinginfo->id,
                    'first_name' => $bookinginfo->first_name,
                    'last_name'  => $bookinginfo->last_name,
                    'email'      => $bookinginfo->email,
                    'country_code'     => $bookinginfo->country_code,
                    'phone_number'      => $bookinginfo->phone,
                ]
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Something went wrong',
                'error'   => $e->getMessage(),
            ], 500);
        }
    }

    public function specialrequest(Request $request, $id)
    {
        try {
            $user = Auth::user();
            $booking = Booking::findOrFail($id);
            $booking->request = $request->input('request');
            $booking->save();

            return response()->json([
                'message' => 'Special request added successfully',
                'data' => [
                    'special_request' => $booking->request,
                ]
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Something went wrong',
                'error'   => $e->getMessage(),
            ], 500);
        }
    }

    public function paymentinfo(Request $request, $id)
    {
        try {
             $booking = Booking::where('id', $id)
            ->where('user_id', Auth::id())
            ->first();

            if (! $booking) {
            return response()->json([
                'message' => 'Booking record not found'
            ], 404);
            }

            $booking->update([
            'payment_type'          => $request->payment_type,
            'card_number'           => $request->card_number,
            'expiration_date'       => $request->expiration_date,
            'security_code'        => $request->security_code,
            'country'               => $request->country,
        ]);

            return response()->json([
                'message' => 'Payment info added successfully',
                'data' => [
                    'payment_type' => $booking->payment_type,
                    'card_number' => $booking->card_number,
                    'expiration_date' => $booking->expiration_date,
                    'security_code' => $booking->security_code,
                    'country' => $booking->country,
                ]
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Something went wrong',
                'error'   => $e->getMessage(),
            ], 500);
        }
    }
}
