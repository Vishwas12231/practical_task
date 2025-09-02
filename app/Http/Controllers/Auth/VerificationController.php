<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    public function showForm()
    {
        return view('auth.verify');
    }

    public function verify(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'code'  => 'required|string',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'User not found'])->withInput();
        }

        if ($user->is_verified) {
            return redirect()->route('admin.login.form')->with('success', 'Your account is already verified. Please login.');
        }

        if ($user->verification_code === $request->code) {
            $user->is_verified = true;
            $user->verification_code = null;
            $user->save();

            return redirect()->route('admin.login.form')->with('success', 'Account verified. You can now login.');
        }

        return back()->withErrors(['code' => 'Invalid verification code'])->withInput();
    }
}