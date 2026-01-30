<?php

namespace App\Http\Controllers\Admin;

use App\Models\Buying;
use App\Models\Selling;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HowItWorksController extends Controller
{
    public function sellingMain()
    {
        $sellings = Selling::wherenotNull('main_title')->get();
        return view('admin.howitworks.Selling.index', compact('sellings'));
    }

    public function edit($id)
    {
        $selling = Selling::findOrFail($id);
        return view('admin.howitworks.Selling.edit', compact('selling'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'maintitle' => 'required|max:255',
        ]);

        $selling = Selling::findOrFail($id);
        $selling->main_title = $request->input('maintitle');
        $selling->save();

        return redirect()->route('selling.index')->with('success', 'Selling updated successfully');
    }

    public function show($id)
    {
        $sellings = Selling::whereNotNull('title')->whereNotNull('description')->get();
        return view('admin.howitworks.Selling.show', compact('sellings'));
    }

    public function editsellingshow($id)
    {
        $selling = Selling::findOrFail($id);
        return view('admin.howitworks.Selling.editshow', compact('selling'));
    }
    public function updatesellingshow(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
        ]);

        $selling = Selling::findOrFail($id);
        $selling->title = $request->input('title');
        $selling->description = $request->input('description');
        $selling->save();

        return redirect()->route('selling.show', $selling->id)->with('success', 'Selling details updated successfully.');
    }

    public function buyingMain()
    {
        $buyings = Buying::wherenotNull('main_title')->get();
        return view('admin.howitworks.buying.index', compact('buyings'));
    }

    public function editbuying($id)
    {
        $buying = Buying::findOrFail($id);
        return view('admin.howitworks.buying.edit', compact('buying'));
    }

    public function updatebuying(Request $request, $id)
    {
        $request->validate([
            'maintitle' => 'required|max:255',
        ],
        [
            'maintitle.required' => 'The main title field is required.',
        ]
    );

        $buying = Buying::findOrFail($id);
        $buying->main_title = $request->input('maintitle');
        $buying->save();

        return redirect()->route('buying.index')->with('success', 'Buying updated successfully');
    }

    public function showbuying($id)
    {
        $buyings = Buying::whereNotNull('title')->whereNotNull('description')->get();
        return view('admin.howitworks.buying.show', compact('buyings'));
    }

    public function editbuyingshow($id)
    {
        $buying = Buying::findOrFail($id);
        return view('admin.howitworks.buying.editshow', compact('buying'));
    }

    public function updatebuyingshow(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
        ]);

        $buying = Buying::findOrFail($id);
        $buying->title = $request->input('title');
        $buying->description = $request->input('description');
        $buying->save();

        return redirect()->route('buying.show', $buying->id)->with('success', 'Buying details updated successfully.');
    }

    public function questionsIndex()
    {
        $questions = Question::latest()->get();
        return view('admin.howitworks.questions.index', compact('questions'));
    }

    public function questionsEdit($id)
    {
        $question = Question::findOrFail($id);
        return view('admin.howitworks.questions.edit', compact('question'));
    }

    public function questionsUpdate(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
        ]);

        $question = Question::findOrFail($id);
        $question->title = $request->input('title');
        $question->description = $request->input('description');
        $question->save();

        return redirect()->route('questions.index')->with('success', 'Questions updated successfully');
    }


}
