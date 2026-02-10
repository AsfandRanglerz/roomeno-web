<?php

namespace App\Http\Controllers\Api;

use App\Models\HotelInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ListingController extends Controller
{
    public function getlistings()
    {
        try {
            $user = Auth::user();
            $listings = HotelInfo::where('user_id', $user->id)
            ->get();

            return response()->json([
                'message' => 'Listings retrieved successfully',
                'data' => $listings
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
