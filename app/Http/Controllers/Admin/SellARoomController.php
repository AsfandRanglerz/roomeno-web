<?php

namespace App\Http\Controllers\Admin;

use App\Models\SellARoom;
use Illuminate\Http\Request;
use App\Models\UserRolePermission;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SellARoomController extends Controller
{
    public function sellARoomIndex()
    {
        $data = SellARoom::first();
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


        return view('admin.sellroom.index', compact('data',  'sideMenuPermissions'));
    }


    public function sellARoomView()
    {
        $data = SellARoom::first();
        return view('admin.sellroom.sellRoom', compact('data'));
    }

    public function sellARoomEdit()
    {
        $data = SellARoom::first();
        
        return view('admin.sellroom.edit', compact('data'));
    }
    public function sellARoomUpdate(Request $request)
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




        $data = SellARoom::first();
        if ($data) {
            $data->update($request->all());
        } else {
            SellARoom::create($request->all());
        }
        return redirect('/admin/sell-a-room')->with('success', 'Sell A Room updated successfully');
    }
}
