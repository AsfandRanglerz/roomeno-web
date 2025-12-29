<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\BuyerProtection;
use App\Models\CustomerProtection;
use App\Models\ProtectionQuestion;
use App\Http\Controllers\Controller;

class BuyerProtectionController extends Controller
{
     public function guaranteeProtectionIndex()
    {
        $buyers = BuyerProtection::get();
        return view('admin.buyerprotection.guaranteeprotection.index', compact('buyers'));
    }

    public function guaranteeProtectionEdit($id)
    {
       $buyers = BuyerProtection::findOrFail($id);

        return view('admin.buyerprotection.guaranteeprotection.edit', compact('buyers'));
    }

    public function guaranteeProtectionUpdate(Request $request, $id)
    {
        // Validate and update the data based on the ID
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'image' => 'required|max:2048',
        ]);
        
        $buyer = BuyerProtection::findOrFail($id);
        $buyer->title = $request->input('title');
        $buyer->description = $request->input('description');
         if ($request->hasFile('image')) {
        $file = $request->file('image');

        $imageName = time().'_'.uniqid().'.'.$file->getClientOriginalExtension();
        $file->move(public_path('admin/assets/images/'), $imageName);
        $imagePath = 'public/admin/assets/images/'.$imageName;

        // assign new image path
        $buyer->image = $imagePath;
    }
        $buyer->save();
        
        return redirect()->route('guaranteeprotection.index')->with('success', 'Guarantee protection updated successfully.');
    }

    public function customerProtectionIndex()
    {
        $customers = CustomerProtection::get();
        return view('admin.buyerprotection.serviceguarantees.index', compact('customers'));
    }

    public function customerProtectionEdit($id)
    {
       $customers = CustomerProtection::findOrFail($id);

        return view('admin.buyerprotection.serviceguarantees.edit', compact('customers'));
    }

    public function customerProtectionUpdate(Request $request, $id)
    {
        // Validate and update the data based on the ID
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'image' => 'required|max:2048',
        ]);
        
        $customer = CustomerProtection::findOrFail($id);
        $customer->title = $request->input('title');
        $customer->description = $request->input('description');
         if ($request->hasFile('image')) {
        $file = $request->file('image');

        $imageName = time().'_'.uniqid().'.'.$file->getClientOriginalExtension();
        $file->move(public_path('admin/assets/images/'), $imageName);
        $imagePath = 'public/admin/assets/images/'.$imageName;

        // assign new image path
        $customer->image = $imagePath;
    }
        $customer->save();
        
        return redirect()->route('customerprotection.index')->with('success', 'Service guarantees updated successfully.');
    }

     public function protectionQuestionsIndex()
    {
        $questions = ProtectionQuestion::wherenotNull('image')->get();
        return view('admin.buyerprotection.buyerprotectionquestions.index', compact('questions'));
    }

    public function protectionQuestionsEdit($id)
    {
       $questions = ProtectionQuestion::findOrFail($id);

        return view('admin.buyerprotection.buyerprotectionquestions.edit', compact('questions'));
    }

    public function protectionQuestionsUpdate(Request $request, $id)
    {
        // Validate and update the data based on the ID
        $request->validate([
            'image' => 'required|max:2048',
        ]);
        
        $question = ProtectionQuestion::findOrFail($id);
         if ($request->hasFile('image')) {
        $file = $request->file('image');

        $imageName = time().'_'.uniqid().'.'.$file->getClientOriginalExtension();
        $file->move(public_path('admin/assets/images/'), $imageName);
        $imagePath = 'public/admin/assets/images/'.$imageName;

        // assign new image path
        $question->image = $imagePath;
    }
        $question->save();
        
        return redirect()->route('protectionquestions.index')->with('success', 'Buyer protection questions updated successfully.');
    }

    public function protectionQuestionsShow($id)
    {
        $questions = ProtectionQuestion::wherenotNull('title')->wherenotNull('description')->get();
        return view('admin.buyerprotection.buyerprotectionquestions.show', compact('questions'));
    }

    public function protectionQuestionsShowEdit($id)
    {
       $questions = ProtectionQuestion::findOrFail($id);
        return view('admin.buyerprotection.buyerprotectionquestions.editshow', compact('questions'));
    }

    public function protectionQuestionsShowUpdate(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ],
        [
            'title.required' => 'The question field is required.',
            'description.required' => 'The answer field is required.'
        ]
    );
        
        $question = ProtectionQuestion::findOrFail($id);
        $question->title = $request->input('title');
        $question->description = $request->input('description');
        $question->save();
        
        return redirect()->route('protectionquestions.show', $id)->with('success', 'Buyer protection questions updated successfully.');
    }
}
