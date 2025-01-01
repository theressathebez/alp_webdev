<?php

namespace App\Http\Controllers;

use App\Models\Leader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class LeaderAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login'); // Show the login form
    }

    public function login(Request $request)
    {
        $request->validate([
            'leader_email' => 'required|email',
            'leader_password' => 'required|string|min:8',
        ]);

        $leader = Leader::where('leader_email', $request->leader_email)->first();

        if (!$leader || !Hash::check($request->leader_password, $leader->leader_password)) {
            return back()->withErrors([
                'leader_email' => 'The provided credentials do not match our records.',
            ]);
        }

        Auth::login($leader); // Log the leader in
        return redirect()->route('leader.dashboard'); // Redirect after login
    }

    public function logout()
    {
        Auth::logout(); // Logout the user
        return redirect()->route('login'); // Redirect to login page
    }
}
