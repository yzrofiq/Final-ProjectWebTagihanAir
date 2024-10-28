<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class CustomerAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.customer_login');
    }

    public function login(Request $request)
    {
        // Validate input with custom messages
        $request->validate([
            'no_rek' => 'required|string',
        ], [
            'no_rek.required' => 'Customer ID is required.',
            'no_rek.string' => 'Customer ID must be a string.',
        ]);

        // Attempt to find the user by no_rek
        $user = User::where('no_rek', $request->no_rek)->first();

        if ($user) {
            // Store user data in the session
            Session::put('ses_id', $user->id);
            Session::put('ses_nama', $user->nama_user);
            Session::put('ses_username', $user->username);
            Session::put('ses_rek', $user->no_rek);
            Session::put('ses_level', $user->level);

            return redirect()->intended('/')->with('success', 'Login Berhasil');
        }

        // If user is not found, return back with an error
        return back()->withErrors([
            'no_rek' => 'Login Gagal. Please check your customer ID.',
        ])->withInput(); // Include input so the user can re-enter their ID
    }

    public function logout(Request $request)
    {
        Session::flush(); // Clear all session data
        return redirect('/login')->with('success', 'Logout Berhasil');
    }
}
