<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hotel;

class HotelController extends Controller
{
    public function index()
    {
        $hotels = Hotel::latest()->get();
        return view('admin.hotel.index', compact('hotels'));
    }

    public function create()
    {
        return view('admin.hotel.create');
    }

    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'description' => 'required',
            'location' => 'required',
            'city' => 'required',
            'country' => 'required',
            'images.*' => 'nullable|image|max:5120',
        ]);

        // Store Multiple Images
        $images = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $img) {
                $name = time() . '-' . uniqid() . '.' . $img->extension();
                $img->move('uploads/hotel/', $name);
                $images[] = 'uploads/hotel/'.$name;
            }
        }

        Hotel::create([
            'name'        => $request->name,
            'slug'        => $request->slug,
            'description' => $request->description,
            'location'    => $request->location,
            'city'        => $request->city,
            'country'     => $request->country,
            'images'      => json_encode($images),
        ]);

        return redirect()->route('hotels.index')->with('success', 'Hotel Added!');
    }


    public function edit($id)
    {
        $hotel = Hotel::findOrFail($id);
        return view('admin.hotel.edit', compact('hotel'));
    }


    public function update(Request $request, $id)
    {
        $hotel = Hotel::findOrFail($id);

        $images = json_decode($hotel->images, true);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $img) {
                $name = time() . '-' . uniqid() . '.' . $img->extension();
                $img->move('uploads/hotel/', $name);
                $images[] = 'uploads/hotel/'.$name;
            }
        }

        $hotel->update([
            'name'        => $request->name,
            'slug'        => $request->slug,
            'description' => $request->description,
            'location'    => $request->location,
            'city'        => $request->city,
            'country'     => $request->country,
            'images'      => json_encode($images),
        ]);

        return redirect()->route('hotels.index')->with('success', 'Hotel Updated!');
    }


    public function destroy($id)
    {
        $hotel = Hotel::findOrFail($id);
        $hotel->delete();
        return response()->json(['status' => 'success']);
    }
}
