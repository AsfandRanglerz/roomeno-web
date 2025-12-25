<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\ReviewSectionOne;
use App\Http\Controllers\Controller;

class TestimonialController extends Controller
{
    public function reviewOneIndex()
    {
        $reviews = ReviewSectionOne::wherenotNull('image')->get();
        return view('admin.sellerprotection.introduction.index', compact('reviews'));
    }

    public function reviewOneEdit($id)
    {
        // Fetch the data based on the ID (dummy data for example)
       $reviews = ReviewSectionOne::findOrFail($id);

        return view('admin.sellerprotection.introduction.edit', compact('reviews'));
    }

    public function reviewOneUpdate(Request $request, $id)
    {
        // Validate and update the data based on the ID
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'image' => 'required|max:2048',
        ]);
        
        $review = ReviewSectionOne::findOrFail($id);
        $review->title = $request->input('title');
        $review->description = $request->input('description');
         if ($request->hasFile('image')) {
        $file = $request->file('image');

        $imageName = time().'_'.uniqid().'.'.$file->getClientOriginalExtension();
        $file->move(public_path('admin/assets/images/'), $imageName);
        $imagePath = 'public/admin/assets/images/'.$imageName;

        // assign new image path
        $review->image = $imagePath;
    }
        $review->save();
        
        return redirect()->route('sellerprotectionintro.index')->with('success', 'Introduction updated successfully.');
    }
}
