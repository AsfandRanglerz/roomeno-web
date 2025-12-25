<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class WebPartnerController extends Controller
{
  
    // Show partner signup form
    public function showSignup()
    {
        return view('web.partner.signup');
    }

    // Store partner signup
    public function signup(Request $request)
    {
        $request->validate([
            'first_name'       => 'required|string|max:100',
            'last_name'        => 'required|string|max:100',
            'email'            => 'required|email|unique:partners,email',
            'phone_number'     => 'required|string|max:20',
            'company_name'     => 'required|string|max:150',
            'company_address'  => 'required|string',
            'password'         => 'required|min:8|confirmed',
        ]);

        Partner::create([
            'first_name'      => $request->first_name,
            'last_name'       => $request->last_name,
            'email'           => $request->email,
            'phone_number'    => $request->phone_number,
            'company_name'    => $request->company_name,
            'company_address' => $request->company_address,
            'password'        => Hash::make($request->password),
            'status'          => 0, // Pending (Admin approval required)
        ]);

        return redirect()->back()->with(
            'success',
            'Signup successful. Please wait for admin approval.'
        );
    }


     // Show login form
    public function showLogin()
    {
        return view('web.partner.login');
    }

    // Handle login
    public function loginSubmit(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|min:8',
        ]);

        $partner = Partner::where('email', $request->email)->first();

        if(!$partner){
            return back()->withErrors(['email' => 'Email not registered']);
        }

        if(!Hash::check($request->password, $partner->password)){
            return back()->withErrors(['password' => 'Incorrect password']);
        }

        if($partner->status == 0){
            return back()->withErrors(['status' => 'Your account is not active. Please wait for admin approval.']);
        }

        // Login the partner using session
        session(['partner_id' => $partner->id, 'partner_name' => $partner->first_name]);

        return redirect()->route('partner.dashboard'); // Example dashboard route
    }

    public function index()
    {
        $partners = Partner::latest()->get();
        return view('admin.partner.index', compact('partners'));
    }
    public function toggleStatus(Request $request)
{
    $partner = Partner::find($request->id);

    if(!$partner){
        return response()->json([
            'success' => false,
            'message' => 'Partner not found'
        ]);
    }

    $partner->status = $request->status;
    $partner->save();

    return response()->json([
        'success' => true,
        'message' => $partner->status ? 'Partner activated' : 'Partner deactivated'
    ]);
}

    public function destroy($id)
{
    $partner = Partner::find($id);

    if (!$partner) {
        return response()->json([
            'success' => false,
            'message' => 'Partner not found'
        ], 404);
    }

    $partner->delete();

    return response()->json([
        'success' => true,
        'message' => 'Partner deleted successfully'
    ]);
}

}
