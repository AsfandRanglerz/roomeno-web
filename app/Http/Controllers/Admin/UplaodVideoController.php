<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UplaodVideoController extends Controller
{
    public function uploadVideo(Request $request)
{
    
    // Upload video
    if ($request->hasFile('video')) {
        $file = $request->file('video');

        $videoName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('uploads/videos'), $videoName);

        $videoPath = 'uploads/videos/' . $videoName;
    }

    // Save in DB
    Video::create([
        'video_title'      => $request->video_title,
        'video_path' => $videoPath,
    ]);

    return redirect()->back()->with('success', 'Video uploaded successfully');
}
}
