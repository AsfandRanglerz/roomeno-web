<?php

namespace App\Http\Controllers\Admin;

use App\Models\Press;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PressController extends Controller
{
     public function pressIndex()
    {
        $presses = Press::get();

        return view('admin.press.index', compact('presses'));
    }

    public function pressEdit($id)
    {
        $press = Press::findOrFail($id);
        return view('admin.press.edit', compact('press'));
    }

    public function pressUpdate(Request $request, $id)
    {
        $request->validate([
            'description' => 'required',
            'image' => 'required|max:2048'
        ]);

        $press = Press::findOrFail($id);
        $press->description = $request->input('description');
          if ($request->hasFile('image')) {
        $file = $request->file('image');

        $imageName = time().'_'.uniqid().'.'.$file->getClientOriginalExtension();
        $file->move(public_path('admin/assets/images/'), $imageName);
        $imagePath = 'public/admin/assets/images/'.$imageName;

        // assign new image path
        $press->image = $imagePath;
        }
        $press->save();

        return redirect()->route('press.index')->with('success', 'Press updated successfully');
    }
}
