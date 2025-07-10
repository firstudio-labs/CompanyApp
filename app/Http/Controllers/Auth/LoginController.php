<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, $request->remember)) {
            $user = Auth::user();

            Log::info('User logged in', [
                'user_id' => $user->id,
                'email' => $user->email,
                'role' => $user->role
            ]);

            // Redirect admin ke dashboard, user ke home
            return redirect()->route('admin.dashboard');
        }

        Log::warning('Failed login attempt', ['email' => $request->email]);
        return back()->with('error', 'Email atau password salah.')->withInput($request->only('email', 'remember'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home')->with('success', 'Anda berhasil logout.');
    }
}


