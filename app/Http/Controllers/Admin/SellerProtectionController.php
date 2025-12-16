<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SellerProtectionIntroduction;

class SellerProtectionController extends Controller
{
    public function sellerProtectionIntroIndex()
    {
        $intros = SellerProtectionIntroduction::first();
        return view('admin.sellerprotection.introduction.index', ['intros' => $intros]);
    }

    public function sellerProtectionIntroEdit($id)
    {
        // Fetch the data based on the ID (dummy data for example)
       $intros = SellerProtectionIntroduction::findOrFail($id);

        return view('admin.sellerprotection.introduction.edit', compact('intros'));
    }

    public function sellerProtectionIntroUpdate(Request $request, $id)
    {
        // Validate and update the data based on the ID
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'image' => 'required|max:2048',
        ]);
        
        $intro = SellerProtectionIntroduction::findOrFail($id);
        $intro->title = $request->input('title');
        $intro->description = $request->input('description');
         if ($request->hasFile('image')) {
        $file = $request->file('image');

        $imageName = time().'_'.uniqid().'.'.$file->getClientOriginalExtension();
        $file->move(public_path('admin/assets/images/'), $imageName);
        $imagePath = 'public/admin/assets/images/'.$imageName;

        // assign new image path
        $intro->image = $imagePath;
    }
        $intro->save();
        
        return redirect()->route('sellerprotectionintro.index')->with('success', 'Introduction updated successfully.');
    }
}
