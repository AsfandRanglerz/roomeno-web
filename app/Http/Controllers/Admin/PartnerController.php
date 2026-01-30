<?php

namespace App\Http\Controllers\Admin;

use App\Models\HelpHotel;
use App\Models\HelpAgency;
use Illuminate\Http\Request;
use App\Models\RoomenoSolution;
use App\Models\PartnerIntroduction;
use App\Http\Controllers\Controller;

class PartnerController extends Controller
{
    public function partnerIntroductionIndex()
    {
        $intros = PartnerIntroduction::get();

        return view('admin.partnerwithus.introduction.index', compact('intros'));
    }

    public function partnerIntroductionEdit($id)
    {
        $intro = PartnerIntroduction::findOrFail($id);
        return view('admin.partnerwithus.introduction.edit', compact('intro'));
    }

    public function partnerIntroductionUpdate(Request $request, $id)
    {
        $request->validate([
            'description' => 'required',
            'image' => 'required|max:2048'
        ]);

        $intro = PartnerIntroduction::findOrFail($id);
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

        return redirect()->route('partnerintroduction.index')->with('success', 'Introduction updated successfully');
    }

    public function helpHotelIndex()
    {
        $helps = HelpHotel::wherenotNull('main_title')->first();
        return view('admin.partnerwithus.roomenohelpshotels.index', ['helps' => $helps]);
    }

    public function helpHotelEdit($id)
    {
       $helps = HelpHotel::findOrFail($id);

        return view('admin.partnerwithus.roomenohelpshotels.edit', compact('helps'));
    }

    public function helpHotelUpdate(Request $request, $id)
    {
        // Validate and update the data based on the ID
        $request->validate([
            'main_title' => 'required|max:255',
        ]);
        
        $help = HelpHotel::findOrFail($id);
        $help->main_title = $request->input('main_title');
        $help->save();
        
        return redirect()->route('helphotel.index')->with('success', 'Roomeno helps hotels updated successfully.');
    }

    public function helpHotelShow($id)
    {
        $helps = HelpHotel::wherenotNull('title')->wherenotNull('description')->get();
        return view('admin.partnerwithus.roomenohelpshotels.show', compact('helps'));
    }

    public function helpHotelShowEdit($id)
    {
       $helps = HelpHotel::findOrFail($id);
        return view('admin.partnerwithus.roomenohelpshotels.editshow', compact('helps'));
    }

    public function helpHotelShowUpdate(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
        ]);
        
        $help = HelpHotel::findOrFail($id);
        $help->title = $request->input('title');
        $help->description = $request->input('description');
        $help->save();
        
        return redirect()->route('helphotel.show', $id)->with('success', 'Roomeno helps hotels updated successfully.');
    }

    public function helpAgencyIndex()
    {
        $helps = HelpAgency::wherenotNull('main_title')->first();
        return view('admin.partnerwithus.roomenohelpsagencies.index', ['helps' => $helps]);
    }

    public function helpAgencyEdit($id)
    {
       $helps = HelpAgency::findOrFail($id);

        return view('admin.partnerwithus.roomenohelpsagencies.edit', compact('helps'));
    }

    public function helpAgencyUpdate(Request $request, $id)
    {
        // Validate and update the data based on the ID
        $request->validate([
            'main_title' => 'required|max:255',
        ]);
        
        $help = HelpAgency::findOrFail($id);
        $help->main_title = $request->input('main_title');
        $help->save();
        
        return redirect()->route('helpagency.index')->with('success', 'Roomeno helps agencies updated successfully.');
    }

    public function helpAgencyShow($id)
    {
        $helps = HelpAgency::wherenotNull('title')->wherenotNull('description')->get();
        return view('admin.partnerwithus.roomenohelpsagencies.show', compact('helps'));
    }

    public function helpAgencyShowEdit($id)
    {
       $helps = HelpAgency::findOrFail($id);
        return view('admin.partnerwithus.roomenohelpsagencies.editshow', compact('helps'));
    }

    public function helpAgencyShowUpdate(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
        ]);
        
        $help = HelpAgency::findOrFail($id);
        $help->title = $request->input('title');
        $help->description = $request->input('description');
        $help->save();
        
        return redirect()->route('helpagency.show', $id)->with('success', 'Roomeno helps agencies updated successfully.');
    }

    public function roomenoSolutionIndex()
    {
        $solutions = RoomenoSolution::wherenotNull('main_title')->first();
        return view('admin.partnerwithus.roomenosolution.index', ['solutions' => $solutions]);
    }

    public function roomenoSolutionEdit($id)
    {
       $solutions = RoomenoSolution::findOrFail($id);

        return view('admin.partnerwithus.roomenosolution.edit', compact('solutions'));
    }

    public function roomenoSolutionUpdate(Request $request, $id)
    {
        // Validate and update the data based on the ID
        $request->validate([
            'main_title' => 'required|max:255',
        ]);
        
        $solutions = RoomenoSolution::findOrFail($id);
        $solutions->main_title = $request->input('main_title');
        $solutions->save();
        
        return redirect()->route('roomenosolution.index')->with('success', 'Roomeno solutions updated successfully.');
    }

    public function roomenoSolutionShow($id)
    {
        $solutions = RoomenoSolution::wherenotNull('title')->wherenotNull('description')->wherenotNull('image')->get();
        return view('admin.partnerwithus.roomenosolution.show', compact('solutions'));
    }

    public function roomenoSolutionShowEdit($id)
    {
       $solutions = RoomenoSolution::findOrFail($id);
        return view('admin.partnerwithus.roomenosolution.editshow', compact('solutions'));
    }

    public function roomenoSolutionShowUpdate(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'image' => 'required|max:2048',
        ]);
        
        $solutions = RoomenoSolution::findOrFail($id);
        $solutions->title = $request->input('title');
        $solutions->description = $request->input('description');
        if ($request->hasFile('image')) {
        $file = $request->file('image');

        $imageName = time().'_'.uniqid().'.'.$file->getClientOriginalExtension();
        $file->move(public_path('admin/assets/images/'), $imageName);
        $imagePath = 'public/admin/assets/images/'.$imageName;

        // assign new image path
        $solutions->image = $imagePath;
    }
        $solutions->save();
        
        return redirect()->route('roomenosolution.show', $id)->with('success', 'Roomeno solutions updated successfully.');
    }
}
