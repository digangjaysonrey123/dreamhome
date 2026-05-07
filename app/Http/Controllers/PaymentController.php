<?php

namespace App\Http\Controllers;

use App\Models\Lease;
use App\Models\Staff;
use App\Models\Renter;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $leases = Lease::all();
        $totalRent = Lease::sum('monthlyRent');
        $totalDeposits = Lease::sum('rentalDeposit');
        $activeLeases = Lease::where('status', 'Active')->count();
        $unpaidDeposits = Lease::where('depositPaid', 'N')->count();
        $staffReport = Staff::all();
        $clientReport = Renter::all();
        $revenueByBranch = DB::table('PropertyForRent')
            ->select('branchNo',
                DB::raw('SUM(monthlyRent) as totalRent'),
                DB::raw('COUNT(*) as totalProperties'))
            ->groupBy('branchNo')
            ->get();

        return view('payments.index', compact(
            'leases',
            'totalRent',
            'totalDeposits',
            'activeLeases',
            'unpaidDeposits',
            'staffReport',
            'clientReport',
            'revenueByBranch'
        ));
    }
}