<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Exception;

class DashboardController extends Controller
{
    public function index(Request $request) // Type hinting for Request
    {
        try {
            // Check if user is logged in and session data exists
            if (!$request->session()->has(['ses_nama', 'ses_level', 'ses_rek'])) {
                return redirect()->route('login')->with('error', 'Please log in to access the dashboard.');
            }

            // Retrieve session data
            $data_nama_lengkap = session('ses_nama');
            $data_level = session('ses_level');
            $data_rek = session('ses_rek');

            // Example data fetching logic (replace with actual queries)
            $unpaidBills = DB::table('bills')->where('status', 'unpaid')->count();
            $paidBills = DB::table('bills')->where('status', 'paid')->count();
            $serviceInfo = DB::table('service_info')->get();
            $paymentDetails = DB::table('payments')->get();
            $activeCustomers = DB::table('customers')->where('status', 'active')->count();
            $inactiveCustomers = DB::table('customers')->where('status', 'inactive')->count();
            $totalUnpaidBills = DB::table('bills')->where('status', 'unpaid')->sum('amount');
            $totalPaidBills = DB::table('bills')->where('status', 'paid')->sum('amount');

            return view('dashboard.index', compact(
                'data_nama_lengkap',
                'data_level',
                'data_rek',
                'unpaidBills',
                'paidBills',
                'serviceInfo',
                'paymentDetails',
                'activeCustomers',
                'inactiveCustomers',
                'totalUnpaidBills',
                'totalPaidBills'
            ));
        } catch (Exception $e) {
            // Log the error with method name
            Log::error('DashboardController@dashboard: ' . $e->getMessage());
            // Redirect to an error page or return a view
            return redirect()->route('error.page')->with('error', 'An error occurred while loading the dashboard. Please try again later.');
        }
    }
}
