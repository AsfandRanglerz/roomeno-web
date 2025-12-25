<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\ReviewSectionOne;
use App\Models\ReviewSectionTwo;
use App\Models\ReviewSectionFour;
use App\Models\ReviewSectionThree;
use App\Http\Controllers\Controller;

class TestimonialController extends Controller
{
    public function reviewOneIndex()
    {
        $reviews = ReviewSectionOne::wherenotNull('image')->get();
        return view('admin.testimonial.reviewsectionone.index', compact('reviews'));
    }

    public function reviewOneEdit($id)
    {
        // Fetch the data based on the ID (dummy data for example)
       $reviews = ReviewSectionOne::findOrFail($id);

        return view('admin.testimonial.reviewsectionone.edit', compact('reviews'));
    }

    public function reviewOneUpdate(Request $request, $id)
    {
        // Validate and update the data based on the ID
        $request->validate([
            'image' => 'required|max:2048',
        ]);
        
        $review = ReviewSectionOne::findOrFail($id);
         if ($request->hasFile('image')) {
        $file = $request->file('image');

        $imageName = time().'_'.uniqid().'.'.$file->getClientOriginalExtension();
        $file->move(public_path('admin/assets/images/'), $imageName);
        $imagePath = 'public/admin/assets/images/'.$imageName;

        // assign new image path
        $review->image = $imagePath;
    }
        $review->save();
        
        return redirect()->route('reviewone.index')->with('success', 'Review section one updated successfully.');
    }

     public function reviewTwoIndex()
    {
        $reviews = ReviewSectionTwo::get();
        return view('admin.testimonial.reviewsectiontwo.index', compact('reviews'));
    }

    public function reviewTwoEdit($id)
    {
        // Fetch the data based on the ID (dummy data for example)
       $reviews = ReviewSectionTwo::findOrFail($id);

        return view('admin.testimonial.reviewsectiontwo.edit', compact('reviews'));
    }

    public function reviewTwoUpdate(Request $request, $id)
    {
        // Validate and update the data based on the ID
        $request->validate([
            'title' => 'required|max:255',
            'subtitle' => 'required|max:255',
            'description' => 'required',
        ],
        [
            'title.required' => 'The name field is reuired.',
            'title.max' => 'The name must not be greater than 255 characters.',
            'subtitle.required' => 'The country field is reuired.',
            'subtitle.max' => 'The country must not be greater than 255 characters.',
            'description.required' => 'The review field is required.',
        ]
        );
        
        $review = ReviewSectionTwo::findOrFail($id);
        $review->title = $request->input('title');
        $review->subtitle = $request->input('subtitle');
        $review->description = $request->input('description');
        $review->save();
        
        return redirect()->route('reviewtwo.index')->with('success', 'Review section two updated successfully.');
    }

    public function reviewThreeIndex()
    {
        $reviews = ReviewSectionThree::get();
        return view('admin.testimonial.reviewsectionthree.index', compact('reviews'));
    }

    public function reviewThreeEdit($id)
    {
        // Fetch the data based on the ID (dummy data for example)
       $reviews = ReviewSectionThree::findOrFail($id);

        return view('admin.testimonial.reviewsectionthree.edit', compact('reviews'));
    }

    public function reviewThreeUpdate(Request $request, $id)
    {
        // Validate and update the data based on the ID
        $request->validate([
            'main_title' => 'required|max:255',
            'title' => 'required|max:255',
            'description' => 'required',
            'image' => 'required|max:2048'
        ],
        [
            'main_title.required' => 'The name field is required.',
            'main_title.max' => 'The name must not be greater than 255 characters.',
            'title.required' => 'The country field is required.',
            'title.max' => 'The country must not be greater than 255 characters.',
            'description.required' => 'The review field is required.',
        ]
        );
        
        $review = ReviewSectionThree::findOrFail($id);
        $review->main_title = $request->input('main_title');
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
        
        return redirect()->route('reviewthree.index')->with('success', 'Review section three updated successfully.');
    }

    public function reviewFourIndex()
    {
        $reviews = ReviewSectionFour::get();
        return view('admin.testimonial.reviewsectionfour.index', compact('reviews'));
    }

    public function reviewFourEdit($id)
    {
        // Fetch the data based on the ID (dummy data for example)
       $reviews = ReviewSectionFour::findOrFail($id);

        return view('admin.testimonial.reviewsectionfour.edit', compact('reviews'));
    }

    public function reviewFourUpdate(Request $request, $id)
    {
        // Validate and update the data based on the ID
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
        ]);
        
        $review = ReviewSectionFour::findOrFail($id);
        $review->title = $request->input('title');
        $review->description = $request->input('description');
        $review->save();
        
        return redirect()->route('reviewfour.index')->with('success', 'Review section four updated successfully.');
    }
}
