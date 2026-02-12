<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
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

    public function storeBookingInfo(Request $request, $id)
{
    try {
        
        $booking = Booking::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        // Convert date format: Nov 28, 2026 → Y-m-d
        $checkIn  = Carbon::createFromFormat('M d, Y', $request->check_in)->format('Y-m-d');
        $checkOut = Carbon::createFromFormat('M d, Y', $request->check_out)->format('Y-m-d');

        // Save data directly
        $booking->checkin = $checkIn;
        $booking->checkout = $checkOut;
        $booking->people_number = $request->people_number;
        $booking->save();

        return response()->json([
            'message' => 'Booking info saved successfully',
            'data' => [
                'check_in'      => Carbon::parse($checkIn)->format('M d, Y'),
                'check_out'     => Carbon::parse($checkOut)->format('M d, Y'),
                'people_number' => $booking->people_number,
            ],
        ], 200);

    } catch (\Exception $e) {
        return response()->json([
            'message' => 'Something went wrong',
            'error' => $e->getMessage(),
        ], 500);
    }
}

public function getBookingInfo($id)
{
    try {
        $booking = Booking::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        return response()->json([
            'message' => 'Booking info retrieved successfully',
            'data' => [
                'check_in'      => Carbon::parse($booking->checkin)->format('M d, Y'),
                'check_out'     => Carbon::parse($booking->checkout)->format('M d, Y'),
                'people_number' => $booking->people_number,
            ],
        ], 200);

    } catch (\Exception $e) {
        return response()->json([
            'message' => 'Something went wrong',
            'error' => $e->getMessage(),
        ], 500);
    }
}

public function myBookings()
{
    try {
        $bookings = Booking::where('user_id', Auth::id())
            ->with('hotel')
            ->latest()
            ->get();

        $data = $bookings->map(function ($booking) {

            $checkIn  = Carbon::parse($booking->checkin);
            $checkOut = Carbon::parse($booking->checkout);

            return [
                'booking_id' => $booking->id,

                'hotel' => [
                    'name'   => $booking->hotel->name ?? null,
                    'image' => !empty($booking->hotel->images)
                                ? asset($booking->hotel->images[0])
                                : null,
                    'rating' => $booking->hotel->rating ?? null,
                    'reviews'=> $booking->hotel->reviews_count ?? 0,
                    'city'   => $booking->hotel->city ?? null,
                    'country'=> $booking->hotel->country ?? null,
                ],

                'stay_duration' => $checkIn->format('F jS') .
                                   ' - ' .
                                   $checkOut->format('jS'),

                'price' => [
                    'discounted_price' => $booking->discounted_price . '$',
                    'per_night' => $booking->total_price .'$',
                    
                ],

                // 'status' => $booking->status, // confirmed / cancelled
            ];
        });

        return response()->json([
            'message' => 'My bookings fetched successfully',
            'data'    => $data
        ], 200);

    } catch (\Exception $e) {
        return response()->json([
            'message' => 'Something went wrong',
            'error'   => $e->getMessage(),
        ], 500);
    }
}

public function bookingDetail($id)
{
    try {
        $booking = Booking::where('id', $id)
            ->where('user_id', Auth::id())
            ->with('hotel') // relationship required
            ->first();

        if (! $booking) {
            return response()->json([
                'message' => 'Booking not found'
            ], 404);
        }

        // Dates
        $checkIn  = Carbon::parse($booking->checkin);
        $checkOut = Carbon::parse($booking->checkout);
        $nights   = $checkIn->diffInDays($checkOut);

        return response()->json([
            'data' => [
                'hotel' => [
                    'name'        => $booking->hotel->name ?? null,
                    'image'       => !empty($booking->hotel->images)
                                     ? asset($booking->hotel->images[0])
                                     : null,
                    'rating'      => $booking->hotel->rating ?? null,
                    'address'     => $booking->hotel->address ?? null,
                    'description' => $booking->hotel->description ?? null,
                ],

                'trip_info' => [
                    'trip_start' => 'Your trip starts ' . $checkIn->format('l, d F Y'),
                    'check_in'   => [
                        'date' => $checkIn->format('l, d F Y'),
                        // 'time' => '3 PM',
                    ],
                    'check_out'  => [
                        'date' => $checkOut->format('l, d F Y'),
                        // 'time' => '11 AM',
                    ],
                    'nights' => $nights . ' nights',
                ],

                'contact_info' => [
                    'email' => $booking->email ?? null,
                    'phone' => $booking->phone ?? null,
                ],

                'price' => [
                    'total_price' => $booking->total_price . '$',
                    'payment_status' => $booking->is_paid== 1 ? 'Paid' : 'Unpaid',
                ],
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
