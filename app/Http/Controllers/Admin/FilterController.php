<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FilterController extends Controller
{
    

public function filter(Request $request)
{
    $query = Hotel::query();

    /* 🔹 Budget filter */
    if ($request->filled('min_price') && $request->filled('max_price')) {
        $query->whereBetween('price_per_night', [
            $request->min_price,
            $request->max_price
        ]);
    }

    /* 🔹 Hotel class (stars) */
    if ($request->filled('hotel_class')) {
        // hotel_class[] = [3,4,5]
        $query->whereIn('hotel_class', $request->hotel_class);
    }

    /* 🔹 Free cancellation */
    if ($request->has('free_cancellation')) {
        $query->where('free_cancellation', 1);
    }

    /* 🔹 Guest rating */
    if ($request->filled('guest_rating')) {
        $query->where('guest_rating', '>=', $request->guest_rating);
    }

    /* 🔹 Amenities */
    if ($request->filled('amenities')) {
        foreach ($request->amenities as $amenity) {
            $query->where($amenity, 1);
        }
    }

    $hotels = $query->paginate(10)->withQueryString();

    return view('web.hotels.index', compact('hotels'));
}

}
