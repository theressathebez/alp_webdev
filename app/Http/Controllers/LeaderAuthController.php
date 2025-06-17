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
        return view('login', [
            'title' => 'Leader Login'
        ]);
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'leader_email' => 'required|email',
            'leader_password' => 'required|string|min:8',
        ]);

        $leader = Leader::where('leader_email', $credentials['leader_email'])->first();

        if ($leader && $credentials['leader_password'] === $leader->leader_password) {
            Auth::guard('leader')->login($leader);
            return redirect()->route('home');
        }

        return back()->withErrors(['leader_email' => 'Invalid credentials, please try again.']);
    }



    public function logout()
    {
        Auth::guard('leader')->logout();
        return redirect()->route('leader.login.get');
    }
}
