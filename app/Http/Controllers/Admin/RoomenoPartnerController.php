<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\RoomenoPartner;
use App\Http\Controllers\Controller;

class RoomenoPartnerController extends Controller
{
    public function index(){
        $roomenopartner = RoomenoPartner::all();
        return view('web.partner_signup', compact('roomenopartner'));
    }

    public function store(Request $request){
        // $request->validate([
        //     'first_name' => 'required',
        //     'last_name' => 'required',
        //     'email' => 'required|email|unique:roomeno_partners,email',
        //     'phone' => 'required',
        //     'company_name' => 'required',
        //     'company_address' => 'required',
        //     'password' => 'required|confirmed',
        // ]);

        RoomenoPartner::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'company_name' => $request->company_name,
            'company_address' => $request->company_address,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('partner-signup')->with('success', 'Partner information submitted successfully');
    }

    public function addInventory(Request $request)
{
    // $request->validate([
    //     'hotel_name'              => 'required|string|max:255',
    //     'hotel_address'           => 'required|string|max:255',

    //     'room_type'               => 'required|string|max:100',
    //     'rooms'                   => 'required|integer|min:1',
    //     'adults'                  => 'required|integer|min:1',
    //     'children'                => 'required|integer|min:0',

    //     'check_in'                => 'required|date',
    //     'check_out'               => 'required|date|after:check_in',
    //     'publish_date'            => 'nullable|date',
    //     'cut_off_date'            => 'nullable|date',

    //     'price_per_night'         => 'required|numeric|min:0',
    //     'discount'                => 'nullable|numeric|min:0',
    //     'current_market_price'    => 'nullable|numeric|min:0',

    //     'source_of_booking'       => 'required|string|max:100',
    //     'is_customer_cancellation'=> 'required|boolean',

    //     'guest_first_name'        => 'required|string|max:100',
    //     'guest_last_name'         => 'required|string|max:100',

    //     'additional_info'         => 'nullable|string',
    // ]);

    Inventory::create([
        'hotel_name'               => $request->hotel_name,
        'hotel_address'            => $request->hotel_address,

        'room_type'                => $request->room_type,
        'rooms'                    => $request->rooms,
        'adults'                   => $request->adults,
        'children'                 => $request->children,

        'check_in'                 => $request->check_in,
        'check_out'                => $request->check_out,
        'publish_date'             => $request->publish_date,
        'cut_off_date'             => $request->cut_off_date,

        'price_per_night'          => $request->price_per_night,
        'discount'                 => $request->discount,
        'current_market_price'     => $request->current_market_price,

        'source_of_booking'        => $request->source_of_booking,
        'is_customer_cancellation' => $request->is_customer_cancellation,

        'guest_first_name'         => $request->guest_first_name,
        'guest_last_name'          => $request->guest_last_name,

        'additional_info'          => $request->additional_info,
    ]);

    return redirect()->back()->with('success', 'Inventory added successfully');
}
}
