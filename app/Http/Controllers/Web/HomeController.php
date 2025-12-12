<?php

namespace App\Http\Controllers\web;

use App\Models\HotelInfo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('web.index');
    }
    public function hotelinfo(){
        return view('web.hotel');
    }
    public function hotelDetails(){
        return view('web.hotelinfo');
    }

    public function hotelstore(Request $request)
    {
        // Insert into database
        $hotel = HotelInfo::create([
            'name'          => $request->name,
            'board_name'    => $request->board_name,
            'check_in'      => date('Y-m-d', strtotime($request->check_in)),
            'check_out'     => date('Y-m-d', strtotime($request->check_out)),
            'people_number' => $request->people_number,
        ]);

        return redirect()->route('hotel.details')->with('success', 'Hotel information saved successfully!');
    }

    public function reservationinfocreate()
    {
        return view('web.resrervationinfo');
    }

    public function reservationinfostore(Request $request)
    {
        HotelInfo::create([
            'first_name'       => $request->first_name,
            'last_name'        => $request->last_name,
            'country'          => $request->country,
            'phone_number'     => $request->phone_number,
            'email'            => $request->email,
            'place_of_booking' => $request->place_of_booking,
            'confirm_no'       => $request->confirm_no,
        ]);

        return redirect()->route('reservation.create')->with('success', 'Reservation info saved successfully!');
    }

    public function paymentInfoCreate($reservationId)
{
    return view('web.paymentinfo', ['reservation_id' => $reservationId]);
}

public function paymentInfoStore(Request $request)
{

    // Find reservation
    $reservation = HotelInfo::findOrFail($request->reservation_id);

    // Update payment info
    $reservation->update([
        'asking_price'   => $request->asking_price,
        'paid_type'      => $request->paid_type,
        'card_number'    => $request->card_number,
        'cardholder_name'=> $request->cardholder_name,
    ]);

    return redirect()
        ->route('payment.create', $reservation->id)
        ->with('success', 'Payment information saved successfully!');
}

}
