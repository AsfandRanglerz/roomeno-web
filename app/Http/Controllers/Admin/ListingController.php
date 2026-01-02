<?php

namespace App\Http\Controllers\Admin;

use Log;
use Exception;

use App\Models\Listing;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class ListingController extends Controller
{
    public function listingCounter()
{
    $count = Listing::where('is_read', false)->count();

    return response()->json(['count' => $count]);
}

public function resetListingCounter()
{
    Listing::where('is_read', false)->update(['is_read' => true]);

    return response()->json(['message' => 'All marked as read']);
}


    public function listingIndex()
    {
        $listings = Listing::latest()->get();
        return view('admin.listing.index', compact('listings'));
    }

    public function listingEdit($id)
    {
        $listing = Listing::findOrFail($id);
        return view('admin.listing.edit', compact('listing'));
    }

    public function listingUpdate(Request $request, $id)
    {
        $listing = Listing::findOrFail($id);
        $listing->customer_name = $request->input('customer_name');
        $listing->name = $request->input('name');
        $listing->board_name = $request->input('board_name');
        $listing->check_in = $request->input('check_in');
        $listing->check_out = $request->input('check_out');
        $listing->people_number = $request->input('people_number');
        $listing->first_name = $request->input('first_name');
        $listing->last_name = $request->input('last_name');
        $listing->country = $request->input('country');
        $listing->phone_number = $request->input('phone_number');
        $listing->email = $request->input('email');
        $listing->place_of_booking = $request->input('place_of_booking');
        $listing->confirm_no = $request->input('confirm_no');
        $listing->asking_price = $request->input('asking_price');
        $listing->paid_type = $request->input('paid_type');
        $listing->card_number = $request->input('card_number');
        $listing->cardholder_name = $request->input('cardholder_name');
        $listing->save();
        return redirect()->route('listing.index')->with('success', 'Listings updated successfully.');
    }

    public function toggleStatus(Request $request)
    {
        $listing = Listing::find($request->id);
        
        if ($listing) {
            $listing->toggle = $request->status;
            $listing->save();
            
            // If deactivating and reason provided
            if ($request->status == 0 && $request->reason) {

                // Send email notification
                $this->sendDeactivationEmail($listing, $request->reason);
            }
            
            return response()->json([
                'success' => true,
                'message' => 'Status updated successfully',
                'new_status' => $listing->toggle ? 'Activated' : 'Deactivated'
            ]);
        }
        
        return response()->json([
            'success' => false,
            'message' => 'User not found'
        ], 404);
    }

    protected function sendDeactivationEmail($listing, $reason)
    {
        $data = [
            'name' => $listing->name,
            'email' => $listing->email,
            'reason' => $reason
        ];
        
        try {
            Mail::send('emails.user_deactivated', $data, function($message) use ($listing) {
                $message->to($listing->email, $listing->name)
                        ->subject('Account Deactivation Notification');
            });
        } catch (Exception $e) {
            Log::error("Failed to send deactivation email: " . $e->getMessage());
        }
    }

public function toggleFeature(Request $request)
{
    $listing = Listing::findOrFail($request->id);

    // toggle
    $listing->is_featured = !$listing->is_featured;
    $listing->save();

    return response()->json([
        'status' => 'success',
        'is_featured' => $listing->is_featured
    ]);
}

}
