<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        // Check if the user is logged in and their role matches
        $user = $request->session()->get('user');

        if ($user && $user['level'] === $role) {
            return $next($request);
        }

        // If the role does not match, redirect to login with an error
        return redirect('/login')->withErrors(['error' => 'You do not have access to this page.']);
    }
}
