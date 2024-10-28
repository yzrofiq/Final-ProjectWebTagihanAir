<?php

// app/Http/Controllers/AdminController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Import User model if needed

class AdminController extends Controller
{
    public function __construct()
    {
        // Apply middleware to restrict access to admin users only
        $this->middleware('auth:admin'); // Ensure you have this middleware set up
    }

    public function home()
    {
        // Fetch any necessary data for the dashboard, if applicable
        $activeUsersCount = User::where('active', true)->count();
        $inactiveUsersCount = User::where('active', false)->count();

        return view('admin.dashboard', [
            'dashboard_content' => 'admin.home',
            'activeUsersCount' => $activeUsersCount,
            'inactiveUsersCount' => $inactiveUsersCount,
        ]);
    }
}
