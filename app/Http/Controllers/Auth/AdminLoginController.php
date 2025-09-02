<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function showForm()
    {
        return view('auth.admin_login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');

        if (! Auth::attempt($credentials)) {
            return back()->withErrors(['email' => 'Invalid credentials'])->withInput();
        }

        $user = Auth::user();

        // If user is customer -> disallow login from admin login page
        if ($user->role !== 'admin') {
            Auth::logout();
            return back()->withErrors(['email' => 'You are not allowed to login from here'])->withInput();
        }

        // If admin isn't verified
        if (! $user->is_verified) {
            Auth::logout();
            return back()->withErrors(['email' => 'Please verify your account before logging in'])->withInput();
        }

        // successful admin login
        $request->session()->regenerate();
        return redirect()->route('admin.dashboard');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login.form');
    }
}