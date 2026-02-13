<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\PromoCode;
use App\Models\PromoCodeUsage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PromoCodeController extends Controller
{
    public function createPromo()
{
    $user = Auth::user();
    $code = 'REF' . strtoupper(Str::random(6));

    $promo = PromoCode::create([
        'user_id' => $user->id,
        'code' => $code,
        'reward_amount' => 15
    ]);

    return response()->json([
        'message' => 'Promo code created',
        'promo_code' => $promo->code
    ]);
}

public function applyPromo(Request $request)
{
    

    $promo = PromoCode::where('code', $request->promo_code)
        ->where('is_active', 1)
        ->first();

    if (!$promo) {
        return response()->json(['message' => 'Invalid promo code'], 400);
    }

    // Check first booking
    $hasBooking = Booking::where('user_id', Auth::id())->exists();

    if ($hasBooking) {
        return response()->json([
            'message' => 'Promo code valid only on first booking'
        ], 400);
    }

    // Check already used
    $used = PromoCodeUsage::where('promo_code_id', $promo->id)
        ->where('used_by', Auth::id())
        ->exists();

    if ($used) {
        return response()->json(['message' => 'Promo code already used'], 400);
    }

    PromoCodeUsage::create([
        'promo_code_id' => $promo->id,
        'used_by' => Auth::id(),
        'receiver_rewarded' => true
    ]);

    return response()->json([
        'message' => 'Promo applied successfully',
        'data' => [
            'promo_code_id' => $promo->id,
            'discount' => 15
        ]
    ]);
}





}
