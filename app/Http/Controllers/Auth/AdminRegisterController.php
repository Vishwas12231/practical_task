<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\VerificationCodeMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AdminRegisterController extends Controller
{
    public function showForm()
    {
        return view('auth.admin_register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name'  => 'required|string|max:100',
            'email'      => 'required|email|unique:users,email',
            'password'   => 'required|string|min:6|confirmed',
        ]);

        $verificationCode = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'email'      => $request->email,
            'password'   => Hash::make($request->password),
            'role'       => 'admin',
            'verification_code' => $verificationCode,
            'is_verified' => false,
        ]);

        // Send verification code via email
        Mail::to($user->email)->send(new VerificationCodeMail($verificationCode, $user->first_name));

        return redirect()->route('verify.form')->with('success', 'Admin registration successful. Check your email for the verification code.');
    }
}