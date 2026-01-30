<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SellerProtectionSectionOne;
use App\Models\SellerProtectionSectionTwo;
use App\Models\SellerProtectionIntroduction;
use App\Models\SellerProtectionSectionThree;

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
        
        return redirect()->route('sellerprotectionintro.index')->with('success', 'Introduction updated successfully');
    }

    public function sellerProtectionSectionOneIndex()
    {
        $sectionOne = SellerProtectionSectionOne::wherenotNull('main_title')->wherenotNull('image')->first();
        return view('admin.sellerprotection.sellerprotectionsectionone.index', ['sectionOne' => $sectionOne]);
    }

    public function sellerProtectionSectionOneEdit($id)
    {
       $sectionOne = SellerProtectionSectionOne::findOrFail($id);
        return view('admin.sellerprotection.sellerprotectionsectionone.edit', compact('sectionOne'));
    }

    public function sellerProtectionSectionOneUpdate(Request $request, $id)
    {
        $request->validate([
            'main_title' => 'required|max:255',
            'image' => 'required|max:2048',
        ]);
        
        $sectionOne = SellerProtectionSectionOne::findOrFail($id);
        $sectionOne->main_title = $request->input('main_title');
         if ($request->hasFile('image')) {
        $file = $request->file('image');

        $imageName = time().'_'.uniqid().'.'.$file->getClientOriginalExtension();
        $file->move(public_path('admin/assets/images/'), $imageName);
        $imagePath = 'public/admin/assets/images/'.$imageName;

        // assign new image path
        $sectionOne->image = $imagePath;
    }
        $sectionOne->save();
        
        return redirect()->route('sellerprotectionsectionone.index')->with('success', 'Seller protection section one updated successfully.');
    }

    public function sellerProtectionSectionOneShow($id)
    {
        $sectionOnes = SellerProtectionSectionOne::wherenotNull('title')->wherenotNull('description')->orderBy('id', 'desc')->get();
        return view('admin.sellerprotection.sellerprotectionsectionone.show', compact('sectionOnes'));
    }

    public function sellerProtectionSectionOneShowEdit($id)
    {
       $sectionOnes = SellerProtectionSectionOne::findOrFail($id);
        return view('admin.sellerprotection.sellerprotectionsectionone.editshow', compact('sectionOnes'));
    }

    public function sellerProtectionSectionOneShowUpdate(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
        ]);
        
        $sectionOne = SellerProtectionSectionOne::findOrFail($id);
        $sectionOne->title = $request->input('title');
        $sectionOne->description = $request->input('description');
        $sectionOne->save();
        
        return redirect()->route('sellerprotectionsectionone.show', $id)->with('success', 'Seller protection section one updated successfully.');
    }

    public function sellerProtectionSectionTwoIndex()
    {
        $sectiontwo = SellerProtectionSectionTwo::wherenotNull('main_title')->wherenotNull('main_description')->wherenotNull('image')->first();
        return view('admin.sellerprotection.sellerprotectionsectiontwo.index', ['sectiontwo' => $sectiontwo]);
    }

    public function sellerProtectionSectionTwoEdit($id)
    {
       $sectiontwo = SellerProtectionSectionTwo::findOrFail($id);
        return view('admin.sellerprotection.sellerprotectionsectiontwo.edit', compact('sectiontwo'));
    }

    public function sellerProtectionSectionTwoUpdate(Request $request, $id)
    {
        $request->validate([
            'main_title' => 'required|max:255',
            'main_description' => 'required',
            'image' => 'required|max:2048',
        ]);
        
        $sectiontwo = SellerProtectionSectionTwo::findOrFail($id);
        $sectiontwo->main_title = $request->input('main_title');
        $sectiontwo->main_description = $request->input('main_description');
         if ($request->hasFile('image')) {
        $file = $request->file('image');

        $imageName = time().'_'.uniqid().'.'.$file->getClientOriginalExtension();
        $file->move(public_path('admin/assets/images/'), $imageName);
        $imagePath = 'public/admin/assets/images/'.$imageName;

        // assign new image path
        $sectiontwo->image = $imagePath;
    }
        $sectiontwo->save();
        
        return redirect()->route('sellerprotectionsectiontwo.index')->with('success', 'Seller protection section two updated successfully.');
}

    public function sellerProtectionSectionTwoShow($id)
    {
        $sectiontwos = SellerProtectionSectionTwo::wherenotNull('title')->wherenotNull('description')->orderBy('id', 'asc')->get();
        return view('admin.sellerprotection.sellerprotectionsectiontwo.show', compact('sectiontwos'));
    }

    public function sellerProtectionSectionTwoShowEdit($id)
    {
       $sectiontwos = SellerProtectionSectionTwo::findOrFail($id);
        return view('admin.sellerprotection.sellerprotectionsectiontwo.editshow', compact('sectiontwos'));
    }

    public function sellerProtectionSectionTwoShowUpdate(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
        ]);
        
        $sectiontwo = SellerProtectionSectionTwo::findOrFail($id);
        $sectiontwo->title = $request->input('title');
        $sectiontwo->description = $request->input('description');
        $sectiontwo->save();
        
        return redirect()->route('sellerprotectionsectiontwo.show', $id)->with('success', 'Seller protection section two updated successfully.');
    }

    public function sellerProtectionSectionThreeIndex()
    {
        $sectionthree = SellerProtectionSectionThree::wherenotNull('image')->first();
        return view('admin.sellerprotection.sellerprotectionsectionthree.index', ['sectionthree' => $sectionthree]);
    }

    public function sellerProtectionSectionThreeEdit($id)
    {
       $sectionthree = SellerProtectionSectionThree::findOrFail($id);
        return view('admin.sellerprotection.sellerprotectionsectionthree.edit', compact('sectionthree'));
    }

    public function sellerProtectionSectionThreeUpdate(Request $request, $id)
    {
        $request->validate([
            'image' => 'required|max:2048',
        ]);
        
        $sectionthree = SellerProtectionSectionThree::findOrFail($id);
         if ($request->hasFile('image')) {
        $file = $request->file('image');

        $imageName = time().'_'.uniqid().'.'.$file->getClientOriginalExtension();
        $file->move(public_path('admin/assets/images/'), $imageName);
        $imagePath = 'public/admin/assets/images/'.$imageName;

        // assign new image path
        $sectionthree->image = $imagePath;
    }
        $sectionthree->save();
        
        return redirect()->route('sellerprotectionsectionthree.index')->with('success', 'Questions updated successfully');
}

public function sellerProtectionSectionThreeShow($id)
    {
        $sectionthrees = SellerProtectionSectionThree::wherenotNull('title')->wherenotNull('description')->latest()->get();
        return view('admin.sellerprotection.sellerprotectionsectionthree.show', compact('sectionthrees'));
    }

    public function sellerProtectionSectionThreeShowEdit($id)
    {
       $sectionthrees = SellerProtectionSectionThree::findOrFail($id);
        return view('admin.sellerprotection.sellerprotectionsectionthree.editshow', compact('sectionthrees'));
    }

    public function sellerProtectionSectionThreeShowUpdate(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
        ]);
        
        $sectionthree = SellerProtectionSectionThree::findOrFail($id);
        $sectionthree->title = $request->input('title');
        $sectionthree->description = $request->input('description');
        $sectionthree->save();
        
        return redirect()->route('sellerprotectionsectionthree.show', $id)->with('success', 'Questions updated successfully');
    }

}
