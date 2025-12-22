<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\CancellationGuide;
use App\Models\CancellationPolicy;
use App\Models\UserRolePermission;
use App\Http\Controllers\Controller;
use App\Models\CancellationGuideTwo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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
        $cancelguides = CancellationGuide::wherenotNull('description')->get();
        return view('admin.cancellationguide.show', compact('cancelguides'));
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
        
        return redirect()->route('cancellationguide.show', $id)->with('success', 'Cancellation guide one updated successfully.');
    }

     public function cancellationGuideTwoIndex()
    {
        $data = CancellationGuideTwo::first();
          $sideMenuPermissions = collect();

    // ✅ Check if user is not admin (normal subadmin)
    if (!Auth::guard('admin')->check()) {
        $user =Auth::guard('subadmin')->user()->load('roles');


        // ✅ 1. Get role_id of subadmin
        $roleId = $user->role_id;

        // ✅ 2. Get all permissions assigned to this role
        $permissions = UserRolePermission::with(['permission', 'sideMenue'])
            ->where('role_id', $roleId)
            ->get();

        // ✅ 3. Group permissions by side menu
        $sideMenuPermissions = $permissions->groupBy('sideMenue.name')->map(function ($items) {
            return $items->pluck('permission.name'); // ['view', 'create']
        });
    }


        return view('admin.cancellationguide.cancellationguidetwo.index', compact('data',  'sideMenuPermissions'));
    }


    public function cancellationGuideTwoView()
    {
        $data = CancellationGuideTwo::first();
        return view('admin.cancellationguide.cancellationguidetwo.cancellationguideTwo', compact('data'));
    }

    public function cancellationGuideTwoEdit()
    {
        $data = CancellationGuideTwo::first();
        
        return view('admin.cancellationguide.cancellationguidetwo.edit', compact('data'));
    }

    public function cancellationGuideTwoUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
                'description' => 'required',
            ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }
        $data = CancellationGuideTwo::first();
        if ($data) {
            $data->update($request->all());
        } else {
            CancellationGuideTwo::create($request->all());
        }
        return redirect('/admin/cancellation-guide-two')->with('success', 'Cancellation guide two updated successfully');
    }

    public function cancellationPolicyIndex()
    {
        $data = CancellationPolicy::first();
          $sideMenuPermissions = collect();

        // ✅ Check if user is not admin (normal subadmin)
         if (!Auth::guard('admin')->check()) {
        $user =Auth::guard('subadmin')->user()->load('roles');


        // ✅ 1. Get role_id of subadmin
        $roleId = $user->role_id;

        // ✅ 2. Get all permissions assigned to this role
        $permissions = UserRolePermission::with(['permission', 'sideMenue'])
            ->where('role_id', $roleId)
            ->get();

        // ✅ 3. Group permissions by side menu
        $sideMenuPermissions = $permissions->groupBy('sideMenue.name')->map(function ($items) {
            return $items->pluck('permission.name'); // ['view', 'create']
        });
    }


        return view('admin.cancellationguide.cancellationpolicy.index', compact('data',  'sideMenuPermissions'));
    }


    public function PrivacyPolicyView()
    {
        $data = CancellationPolicy::first();
        return view('admin.privacyPolicy.privacypolicy', compact('data'));
    }

    public function cancellationPolicyEdit()
    {
        $data = CancellationPolicy::first();
        
        return view('admin.cancellationguide.cancellationpolicy.edit', compact('data'));
    }
    public function cancellationPolicyUpdate(Request $request)
    {
         $validator = Validator::make($request->all(), [
        'main_description' => 'required',
        ]);

        if ($validator->fails()) {
        return response()->json([
            'success' => false,
            'errors' => $validator->errors()
        ], 422);
        }
        $data = CancellationPolicy::first();
        // CancellationPolicy::find($data->id)->update($request->all());
        if ($data) {
            $data->update($request->all());
        } else {
            CancellationPolicy::create($request->all());
        }
        return redirect('/admin/cancellation-policy')->with('success', 'Cancellation policy updated successfully');
    }

    public function cancellationPolicyShow($id)
    {
        $cancelpolicys = CancellationPolicy::wherenotNull('title')->wherenotNull('description')->wherenotNull('image')->get();
        return view('admin.cancellationguide.cancellationpolicy.show', compact('cancelpolicys'));
    }

    public function cancellationPolicyShowEdit($id)
    {
        $cancelpolicys = CancellationPolicy::findOrFail($id);
        return view('admin.cancellationguide.cancellationpolicy.editshow', compact('cancelpolicys'));
    }

    public function cancellationPolicyShowUpdate(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|max:2048',

        ]);
        
        $cancelpolicys = CancellationPolicy::findOrFail($id);
        $cancelpolicys->title = $request->input('title');
        $cancelpolicys->description = $request->input('description');
        if ($request->hasFile('image')) {
        $file = $request->file('image');

        $imageName = time().'_'.uniqid().'.'.$file->getClientOriginalExtension();
        $file->move(public_path('admin/assets/images/'), $imageName);
        $imagePath = 'public/admin/assets/images/'.$imageName;

        // assign new image path
        $cancelpolicys->image = $imagePath;
        }
        $cancelpolicys->save();
        
        return redirect()->route('cancellationpolicy.show', $id)->with('success', 'Cancellation policy updated successfully.');
    }




}
