<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AdminLoginController extends Controller
{
   public function showLoginForm()
{
    if (Auth::guard('admin')->check()) {
        return redirect()->route('finance.dashboard');
    }

    return view('auth.admin-login');
}

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        if (Auth::guard('admin')->attempt(
            $credentials,
            $request->boolean('remember')
        )) {
            $request->session()->regenerate();

            return redirect()->intended(
                route('admin.dashboard')
            );
        }

        throw ValidationException::withMessages([
            'email' => 'Admin email অথবা password সঠিক নয়।',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login')
            ->with('success', 'Admin logout সফল হয়েছে।');
    }
}