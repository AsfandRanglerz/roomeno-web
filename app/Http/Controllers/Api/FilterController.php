<?php

namespace App\Http\Controllers\Api;

use Exception;
use App\Models\Hotel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FilterController extends Controller
{
    public function filter(Request $request)
{
    try {
        $query = Hotel::query();
        

        // 🔹 Budget filter
        if ($request->filled('min_price')) {
            $query->where('price', '>=', $request->min_price);
        }

        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }

        // 🔹 Search by hotel name
        if ($request->filled('search')) {
            $query->where('name', 'LIKE', '%' . $request->search . '%');
        }

        // 🔹 Hotel class (stars)
        if ($request->filled('stars')) {
            $query->whereIn('stars', $request->stars);
        }

        // 🔹 Free cancellation
        if ($request->filled('free_cancellation')) {
            $query->where('free_cancellation', 1); // 1 for free cancellation is true
        }

        // 🔹 Guest rating
        if ($request->filled('ratings')) {
            $query->whereIn('rating', $request->ratings);
        }

        // 🔹 Amenities filter (stored as JSON)
        if ($request->filled('amenities')) {
            foreach ($request->amenities as $amenity) {
                $query->whereJsonContains('amenities', $amenity);
            }
        }

        $hotels = $query->get();

        return response()->json([
            'message' => 'Filtered hotels fetched successfully',
            'count'   => $hotels->count(),
            'data'    => $hotels
        ], 200);

    } catch (Exception $e) {
        return response()->json([
            'message' => 'Something went wrong',
            'error'   => $e->getMessage()
        ], 500);
    }
}
}
