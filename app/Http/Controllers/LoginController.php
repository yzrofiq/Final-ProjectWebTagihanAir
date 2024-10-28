<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Usermodel; // Import the correct model

class LoginController extends Controller
{
    /**
     * Show the login form.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('auth.login'); // Return the login view
    }

    /**
     * Handle a login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        // Validate the input
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Attempt to find the user
        $user = Usermodel::where('username', $request->username)->first();

        // Check if the user exists
        if (!$user) {
            return back()->withErrors([
                'username' => 'Username not found.',
            ])->withInput($request->only('username', 'remember'));
        }

        // Check if the password matches
        if ($user->password !== $request->password) {
            return back()->withErrors([
                'password' => 'The password is incorrect.',
            ])->withInput($request->only('username', 'remember'));
        }

        // Store user information in the session
        $request->session()->put('user', [
            'id_user' => $user->id_user,
            'nama_user' => $user->nama_user,
            'level' => $user->level,
        ]);

        $userLevel = trim($user->level); // Menghapus spasi di awal dan akhir

        // Redirect based on user level using if-else
        if ($userLevel === 'Admin') {
            return redirect()->intended('/admin/dashboard')->with('success', 'Welcome, Admin!');
        } elseif ($userLevel === 'opt') {
            return redirect()->intended('/opt/dashboard')->with('success', 'Welcome, Operator!');
        } elseif ($userLevel === 'pelanggan') {
            return redirect()->intended('/pelanggan/dashboard')->with('success', 'Welcome, Customer!');
        } else {
            return redirect('/login')->withErrors(['level' => 'Invalid user level.']);
        }
    }

    /**
     * Log the user out.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        // Clear the session
        $request->session()->forget('user');
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'You have been logged out successfully');
    }
}
