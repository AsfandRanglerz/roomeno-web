<?php

namespace App\Http\Controllers\Admin;

use App\Models\Commision;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ComissionController extends Controller
{
    public function commissionIndex()
    {
        $commisions = Commision::get();
        return view('admin.commission.index', compact('commisions'));
    }

    public function commissionEdit($id)
    {
        $commision = Commision::find($id);
        return view('admin.commission.edit', compact('commision'));
    }

    public function commissionUpdate(Request $request, $id)
    {
        $request->validate([
            'commision' => 'required',
        ],
        [
            'commision.required' => 'The commission field is required.',
        ]);

        $commision = Commision::find($id);
        $commision->commision = $request->input('commision');
        $commision->save();

        return redirect()->route('commissions.index')->with('success', 'Commission updated successfully.');
    }
}
