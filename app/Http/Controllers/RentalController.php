<?php

namespace App\Http\Controllers;

use App\Models\Lease;
use App\Models\Staff;
use App\Models\Renter;
use App\Models\PropertyForRent;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class RentalController extends Controller
{
    public function index()
    {
        $leases = Lease::all();
        $viewings = DB::table('Viewing')->get();
        $activeCount = Lease::where('status', 'Active')->count();
        $expiredCount = Lease::where('status', 'Expired')->count();
        $viewingCount = DB::table('Viewing')->count();
        return view('rentals.index', compact(
            'leases', 'viewings',
            'activeCount', 'expiredCount', 'viewingCount'
        ));
    }

    public function create()
    {
        $properties = PropertyForRent::where('status', 'Active')->get();
        $renters = Renter::all();
        $staff = Staff::all();
        return view('rentals.create', compact('properties', 'renters', 'staff'));
    }

    public function store(Request $request)
    {
        try {
            Lease::create($request->all());
            return redirect('/rentals')->with('success', 'Lease added successfully!');
        } catch (\Exception $e) {
            return redirect('/rentals')->with('error', 'Failed to add lease. Please check the dates (min 3 months, max 1 year)!');
        }
    }

    public function edit($id)
    {
        $lease = Lease::findOrFail($id);
        $properties = PropertyForRent::all();
        $renters = Renter::all();
        $staff = Staff::all();
        return view('rentals.edit', compact('lease', 'properties', 'renters', 'staff'));
    }

    public function update(Request $request, $id)
    {
        try {
            $lease = Lease::findOrFail($id);
            $lease->update($request->all());
            return redirect('/rentals')->with('success', 'Lease updated successfully!');
        } catch (\Exception $e) {
            return redirect('/rentals')->with('error', 'Failed to update lease. Please check the dates!');
        }
    }

    public function destroy($id)
    {
        try {
            $lease = Lease::findOrFail($id);
            $lease->delete();
            return redirect('/rentals')->with('success', 'Lease deleted successfully!');
        } catch (\Exception $e) {
            return redirect('/rentals')->with('error', 'Cannot delete this lease. 3-year retention period has not passed yet!');
        }
    }

    public function createViewing()
    {
        $properties = PropertyForRent::where('status', 'Active')->get();
        $renters = Renter::all();
        return view('rentals.viewing_create', compact('properties', 'renters'));
    }

    public function storeViewing(Request $request)
    {
        try {
            DB::table('Viewing')->insert([
                'propertyNo' => $request->propertyNo,
                'renterNo' => $request->renterNo,
                'viewDate' => $request->viewDate,
                'comments' => $request->comments,
            ]);
            return redirect('/rentals')->with('success', 'Viewing added successfully!');
        } catch (\Exception $e) {
            return redirect('/rentals')->with('error', 'Failed to add viewing. Please try again!');
        }
    }
}