<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\EmailOtp;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class WebAuthController extends Controller
{
    

    public function showSignupForm()
    {
        return view('web.auth.sign-up');
    }

    public function storeSignup(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'email'      => 'required|email|unique:users,email',
            'phone'      => 'required',
            'country'    => 'required',
            'password'   => 'required|min:8|confirmed',
            'referral_code' => 'nullable',
            
        ]);

        User::create([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'email'      => $request->email,
            'phone'      => $request->phone,
            'country'    => $request->country,
            'password'   => Hash::make($request->password),
            'referral_code' => $request->referral_code,
        ]);

        return redirect()->route('login.form')->with('success', 'Signup successful! Please login.');
    }

    
    public function showLoginForm()
    {
        return view('web.auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        
        $user = User::where('email', $request->email)->first();

        if ($user->toggle == 0) {
        return back()->with('error', 'Your account is disabled');
        }

        if ($user && Hash::check($request->password, $user->password)) {
            auth()->login($user, $request->filled('remember'));
            return redirect()->route('index');
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('login.form');
    }

    
    public function sendOtpForm()
    {
        return view('web.auth.send-otp');
    }

    public function sendOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);
        $userExists = User::where('email', $request->email)->exists();
        if (!$userExists) {
            return back()->with('error', 'Email does not exist!');
        }
        $otpUser = EmailOtp::firstOrCreate(
            ['email' => $request->email],
            ['verified' => 0]
        );

        $otp = rand(100000, 999999);
        $token = Str::uuid();

        $otpUser->update([
            'otp'       => $otp,
            'otp_token' => $token,
            'verified'  => 0,
            'updated_at'=> Carbon::now(),
        ]);

        return redirect()->route('verify.otp.form', $token)
                         ->with('success', 'OTP sent successfully!');
    }

    public function verifyOtpForm($token)
    {
        $otpUser = EmailOtp::where('otp_token', $token)->firstOrFail();
        return view('web.auth.verify-otp', compact('otpUser'));
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp'       => 'required',
            'otp_token' => 'required'
        ]);

        $otpUser = EmailOtp::where('otp_token', $request->otp_token)
                           ->where('otp', $request->otp)
                           ->first();

        if (!$otpUser) {
            return back()->with('error', 'Invalid OTP!');
        }

        return redirect()->route('reset.password.form', $otpUser->otp_token);
    }
    public function resendOtp(Request $request)
    {
        $otpUser = EmailOtp::where('otp_token', $request->otp_token)->firstOrFail();

        $otpUser->otp = rand(100000, 999999);
        $otpUser->save();

        return back()->with('success', 'OTP resent successfully!');
    }

    public function showResetPasswordForm($token)
    {
        $otpUser = EmailOtp::where('otp_token', $token)->firstOrFail();
        return view('web.auth.reset-password', ['otp_token' => $token]);
    }

    public function resetPasswordSubmit(Request $request)
    {
        $request->validate([
            'password' => 'required|min:6|confirmed',
            'otp_token' => 'required'
        ]);

        $otpUser = EmailOtp::where('otp_token', $request->otp_token)->first();

        if (!$otpUser) {
            return back()->with('error', 'Invalid token!');
        }

        $user = User::where('email', $otpUser->email)->first();
        if (!$user) {
            return back()->with('error', 'User not found!');
        }

        $user->password = Hash::make($request->password);
        $user->save();

        $otpUser->delete();

        return redirect()->route('login.form')->with('success', 'Password updated successfully! Please login.');
    }
}
