<?php

namespace App\Http\Controllers;

use App\Models\Lease;
use App\Models\Staff;
use App\Models\Renter;
use App\Models\Payment;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $leases = Lease::all();
        $payments = Payment::all();
        $totalRent = Payment::where('paymentType', 'Monthly Rent')->sum('amount');
        $totalDeposits = Payment::where('paymentType', 'Deposit')->sum('amount');
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
            'leases', 'payments',
            'totalRent', 'totalDeposits',
            'activeLeases', 'unpaidDeposits',
            'staffReport', 'clientReport', 'revenueByBranch'
        ));
    }

    public function create()
    {
        $leases = Lease::all();
        $staff = Staff::all();
        return view('payments.create', compact('leases', 'staff'));
    }

    public function store(Request $request)
    {
        try {
            Payment::create($request->all());
            return redirect('/payments')->with('success', 'Payment recorded successfully!');
        } catch (\Exception $e) {
            return redirect('/payments')->with('error', 'Failed to record payment!');
        }
    }

    public function edit($id)
    {
        $payment = Payment::findOrFail($id);
        $leases = Lease::all();
        $staff = Staff::all();
        return view('payments.edit', compact('payment', 'leases', 'staff'));
    }

    public function update(Request $request, $id)
    {
        try {
            $payment = Payment::findOrFail($id);
            $payment->update($request->all());
            return redirect('/payments')->with('success', 'Payment updated successfully!');
        } catch (\Exception $e) {
            return redirect('/payments')->with('error', 'Failed to update payment!');
        }
    }

    public function destroy($id)
    {
        try {
            $payment = Payment::findOrFail($id);
            $payment->delete();
            return redirect('/payments')->with('success', 'Payment deleted successfully!');
        } catch (\Exception $e) {
            return redirect('/payments')->with('error', 'Failed to delete payment!');
        }
    }
}