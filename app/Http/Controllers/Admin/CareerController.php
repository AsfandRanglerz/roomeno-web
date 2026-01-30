<?php

namespace App\Http\Controllers\Admin;

use App\Models\Career;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CareerController extends Controller
{
    public function careerIndex()
    {
        $careers = Career::wherenotNull('description_one')->first();
        return view('admin.career.index', ['careers' => $careers]);
    }

    public function careerEdit($id)
    {
        $career = Career::findOrFail($id);
        return view('admin.career.edit', compact('career'));
    }

    public function careerUpdate(Request $request, $id)
    {
        $request->validate([
            'description_one' => 'required',
        ],
        [
            'description_one.required' => 'The description field is required.'
        ]
    );
        
        $career = Career::findOrFail($id);
        $career->description_one = $request->input('description_one');
        $career->save();
        
        return redirect()->route('career.index')->with('success', 'Career updated successfully');
    }

    public function careerShow($id)
    {
        $careers = Career::wherenotNull('title')->wherenotNull('description_two')->get();
        return view('admin.career.show', compact('careers'));
    }

    public function careerShowEdit($id)
    {
        $career = Career::findOrFail($id);
        return view('admin.career.editshow', compact('career'));
    }

    public function careerShowUpdate(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description_two' => 'required',
        ],
        [
           'description_two.required' => 'The description field is required.' 
        ]
    );
        
        $career = Career::findOrFail($id);
        $career->title = $request->input('title');
        $career->description_two = $request->input('description_two');
        $career->save();
        
        return redirect()->route('career.show', $id)->with('success', 'Career updated successfully');
    }
}
