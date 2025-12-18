<?php

namespace App\Http\Controllers\Admin;

use Log;
use Exception;
use App\Models\HotelInfo;
use App\Models\RoomenoWorks;
use Illuminate\Http\Request;
use App\Models\SellReservation;
use App\Models\WeProtectSeller;
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
        $reservations = HotelInfo::latest()->get();
        return view('admin.sellaroom.reservationinfo',compact('reservations'));
    }

    public function paymentInfoIndex($reservationId)
    {
        $payments = HotelInfo::findOrFail($reservationId);
        return view('admin.sellaroom.paymentinfo', ['payment' => $payments]);
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

public function sellReservationIndex()
    {
        $reservations = SellReservation::first();
        return view('admin.sellreservation.changedtravelplans.index', ['reservations' => $reservations]);
    }

    public function sellReservationEdit($id)
    {
        $reservation = SellReservation::findOrFail($id);
        return view('admin.sellreservation.changedtravelplans.edit', compact('reservation'));
    }
    public function sellReservationUpdate(Request $request, $id)
    {
        $request->validate([
            'description' => 'required',
        ]);
        $reservation = SellReservation::findOrFail($id);
        $reservation->description = $request->input('description');
        $reservation->save();
        return redirect()->route('sellreservation.index')->with('success', 'Reservation updated successfully.');
    }

    public function roomenoWorksIndex()
    {
        $works = RoomenoWorks::wherenotNull('main_title')->first();
        return view('admin.sellreservation.howroomenoworks.index', ['works' => $works]);
    }

    public function roomenoWorksEdit($id)
    {
        $work = RoomenoWorks::findOrFail($id);
        return view('admin.sellreservation.howroomenoworks.edit', compact('work'));
    }

    public function roomenoWorksUpdate(Request $request, $id)
    {
        $request->validate([
            'main_title' => 'required',
        ]);
        $work = RoomenoWorks::findOrFail($id);
        $work->main_title = $request->input('main_title');
        $work->save();
        return redirect()->route('roomenoworks.index')->with('success', 'How roomeno works updated successfully.');
    }

    public function roomenoWorksShow($id)
    {
        $works = RoomenoWorks::wherenotNull('title')->wherenotNull('description')->get();
        return view('admin.sellreservation.howroomenoworks.show', compact('works'));
    }

    public function roomenoWorksShowEdit($id)
    {
        $work = RoomenoWorks::findOrFail($id);
        return view('admin.sellreservation.howroomenoworks.editshow', compact('work'));
    }

    public function roomenoWorksShowUpdate(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
        $work = RoomenoWorks::findOrFail($id);
        $work->title = $request->input('title');
        $work->description = $request->input('description');
        $work->save();
        return redirect()->route('roomenoworks.show', ['id' => $work->id])->with('success', 'How roomeno works updated successfully.');
    }

    public function protectSellersIndex()
    {
        $sellers = WeProtectSeller::wherenotNull('main_title')->first();
        return view('admin.sellreservation.weprotectoursellers.index', ['sellers' => $sellers]);
    }

    public function protectSellersEdit($id)
    {
        $seller = WeProtectSeller::findOrFail($id);
        return view('admin.sellreservation.weprotectoursellers.edit', compact('seller'));
    }

    public function protectSellerUpdate(Request $request, $id)
    {
        $request->validate([
            'main_title' => 'required',
        ]);
        $seller = WeProtectSeller::findOrFail($id);
        $seller->main_title = $request->input('main_title');
        $seller->save();
        return redirect()->route('protectsellers.index')->with('success', 'We protect our sellers updated successfully.');
    }

    public function protectSellersShow($id)
    {
        $sellers = WeProtectSeller::wherenotNull('title')->wherenotNull('description')->get();
        return view('admin.sellreservation.weprotectoursellers.show', compact('sellers'));
    }

    public function protectSellersShowEdit($id)
    {
        $seller = WeProtectSeller::findOrFail($id);
        return view('admin.sellreservation.weprotectoursellers.editshow', compact('seller'));
    }

    public function protectSellersShowUpdate(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
        $seller = WeProtectSeller::findOrFail($id);
        $seller->title = $request->input('title');
        $seller->description = $request->input('description');
        $seller->save();
        return redirect()->route('protectsellers.show', ['id' => $seller->id])->with('success', 'We protect our sellers updated successfully.');
    }

}
