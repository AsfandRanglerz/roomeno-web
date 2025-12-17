<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\CancellationGuide;
use App\Http\Controllers\Controller;

class CancellationGuideController extends Controller
{
    public function cancellationGuideIndex()
    {
        $cancelguides = CancellationGuide::wherenotNull('title')->wherenotNull('image')->first();
        return view('admin.cancellationguide.index', ['cancelguides' => $cancelguides]);
    }

    public function cancellationGuideEdit($id)
    {
        $cancelguide = CancellationGuide::findOrFail($id);
        return view('admin.cancellationguide.edit', compact('cancelguide'));
    }

    public function cancellationGuideUpdate(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'image' => 'required|max:2048',
        ]);
        
        $cancelguide = CancellationGuide::findOrFail($id);
        $cancelguide->title = $request->input('title');
         if ($request->hasFile('image')) {
        $file = $request->file('image');

        $imageName = time().'_'.uniqid().'.'.$file->getClientOriginalExtension();
        $file->move(public_path('admin/assets/images/'), $imageName);
        $imagePath = 'public/admin/assets/images/'.$imageName;

        // assign new image path
        $cancelguide->image = $imagePath;
    }
        $cancelguide->save();
        
        return redirect()->route('cancellationguide.index')->with('success', 'Cancellation guide one updated successfully.');
    }

    public function cancellationGuideShow($id)
    {
        $cancelguide = CancellationGuide::wherenotNull('description')->get();
        return view('admin.cancellationguide.show', compact('cancelguide'));
    }

    public function cancellationGuideShowEdit($id)
    {
        $cancelguide = CancellationGuide::findOrFail($id);
        return view('admin.cancellationguide.editshow', compact('cancelguide'));
    }

    public function cancellationGuideShowUpdate(Request $request, $id)
    {
        $request->validate([
            'description' => 'required',
        ]);
        
        $cancelguide = CancellationGuide::findOrFail($id);
        $cancelguide->description = $request->input('description');
        $cancelguide->save();
        
        return redirect()->route('cancellationguide.show')->with('success', 'Cancellation guide one updated successfully.');
    }
}
