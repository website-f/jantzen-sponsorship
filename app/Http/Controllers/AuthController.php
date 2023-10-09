<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login() {
        return view('login');
    }

    public function loginFill(Request $request) {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
        ]);

        $user = User::where('email', $request->email)->first();

        if(!$user) {
            return redirect()->back()->withInput()->withErrors(['email' => 'Invalid credentials. Please try again.']);
        }

        // Check if the user has the 'admin' role
        if ($user->role_id === 1) {
            // Redirect admin users to a different login page
            return redirect('/login-admin')->with('email', $request->email); // Change 'admin.login' to the actual route name
        } else {
            // If the user has the 'public' role, proceed without a password check
            Auth::login($user);
            $request->session()->regenerate();
            return redirect()->intended('/sponsorship-tracking');
        }

        return redirect("/login");
    }

    public function loginAdmin() {
        return view('login-admin');
    }

    public function loginAdminFill(Request $request) {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect("/dashboard");
        } else {
            return redirect()->back()->withInput()->withErrors(['password' => 'Invalid credentials. Please try again.']);
        }

        return redirect('/login-admin');
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect("/login");
    }
}
