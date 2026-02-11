<?php

namespace App\Http\Controllers\Api;

use Exception;
use Carbon\Carbon;
use App\Models\Hotel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function search(Request $request)
{
    try {

        $query = Hotel::query();

        // 🔍 Location / keyword search
        if ($request->filled('location')) {
            $query->where(function ($q) use ($request) {
                $q->Where('country', 'like', '%' . $request->location . '%');
            });
        }

        // 👥 Guests dropdown (Single, Double, 3 Guests, 4 Guests)
        if ($request->filled('guests')) {
            $guestMap = [
                'Single'   => ['Single', 'Double', '3 Guests', '4 Guests'],
                'Double'   => ['Double', '3 Guests', '4 Guests'],
                '3 Guests' => ['3 Guests', '4 Guests'],
                '4 Guests' => ['4 Guests'],
            ];

            if (isset($guestMap[$request->guests])) {
                $query->whereIn('max_guests', $guestMap[$request->guests]);
            }
        }

        // 📅 Check-in & Check-out
         if ($request->filled('checkin') && $request->filled('checkout')) {

        $checkIn  = Carbon::createFromFormat('M d, Y', $request->checkin)->format('Y-m-d');
        $checkOut = Carbon::createFromFormat('M d, Y', $request->checkout)->format('Y-m-d');

        $query->whereDoesntHave('bookings', function ($q) use ($checkIn, $checkOut) {
            $q->where(function ($subQuery) use ($checkIn, $checkOut) {

                $subQuery->whereBetween('checkin', [$checkIn, $checkOut])
                        ->orWhereBetween('checkout', [$checkIn, $checkOut])
                        ->orWhere(function ($q2) use ($checkIn, $checkOut) {
                            $q2->where('checkin', '<=', $checkIn)
                                ->where('checkout', '>=', $checkOut);
                        });

            });
        });
        }

        $hotels = $query->get();

        return response()->json([
            'message' => 'Search results',
            'data' => $hotels
        ], 200);

    } catch (Exception $e) {
        return response()->json([
            'message' => 'Something went wrong',
            'error' => $e->getMessage()
        ], 500);
    }
}
}
