<?php

namespace App\Http\Controllers\Api;

use Exception;
use App\Models\HotelVideo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HotelVideoController extends Controller
{
    public function upload(Request $request)
{
    try {
       
        $user = Auth::user();

        // Save video
        $videoFile = $request->file('video');
        $videoName = time().'_'.uniqid().'.'.$videoFile->getClientOriginalExtension();
        $videoFile->move(public_path('uploads/videos'), $videoName);

        $video = HotelVideo::create([
            'user_id'    => $user->id,
            'video' => 'uploads/videos/'.$videoName,
            'hotel'   => $request->hotel,
            'title'      => $request->title,
            'status'     => 0, // 👈 important
        ]);

        return response()->json([
            'message' => 'Video uploaded successfully and is waiting for approval',
            'data' => [
                'id'     => $video->id,
                'title'  => $video->title,
                'video'  => asset('public/' . $video->video),
                'status' => $video->status,
            ],
        ], 200);

    } catch (Exception $e) {
        return response()->json([
            'message' => 'Video upload failed',
            'error'   => $e->getMessage(),
        ], 500);
    }
}

public function myVideos(Request $request)
{
    try {
        $user = Auth::user();

        if (! $user) {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }

        $videos = HotelVideo::where('user_id', $user->id)   // 🔐 ONLY logged-in user videos
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(function ($video) {
                return [
                    'id'         => $video->id,
                    'title'      => $video->title,
                    'hotel' => $video->hotel ?? null,
                    'video'  => asset('public/'. $video->video),
                    'status'     => $video->status, // pending / approved / rejected
                    'created_at' => $video->created_at->format('M d, Y'),
                ];
            });

        return response()->json([
            'message' => 'Videos fetched successfully',
            'data'    => $videos,
        ], 200);

    } catch (\Exception $e) {
        return response()->json([
            'message' => 'Something went wrong',
            'error'   => $e->getMessage(),
        ], 500);
    }
}


}
