<?php

namespace App\Http\Controllers;

use App\Models\PropertyForRent;
use App\Models\Staff;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index()
    {
        $properties = PropertyForRent::all();
        return view('properties.index', compact('properties'));
    }

    public function create()
    {
        $branches = DB::table('Branch')->get();
        $staff = Staff::all();
        return view('properties.create', compact('branches', 'staff'));
    }

    public function store(Request $request)
    {
        try {
            PropertyForRent::create($request->all());
            return redirect('/properties')->with('success', 'Property added successfully!');
        } catch (\Exception $e) {
            return redirect('/properties')->with('error', 'Failed to add property. Please try again!');
        }
    }

    public function edit($id)
    {
        $property = PropertyForRent::findOrFail($id);
        $branches = DB::table('Branch')->get();
        $staff = Staff::all();
        return view('properties.edit', compact('property', 'branches', 'staff'));
    }

    public function update(Request $request, $id)
    {
        try {
            $property = PropertyForRent::findOrFail($id);
            $property->update($request->all());
            return redirect('/properties')->with('success', 'Property updated successfully!');
        } catch (\Exception $e) {
            return redirect('/properties')->with('error', 'Failed to update property. Please try again!');
        }
    }

    public function destroy($id)
    {
        try {
            $property = PropertyForRent::findOrFail($id);
            $property->delete();
            return redirect('/properties')->with('success', 'Property deleted successfully!');
        } catch (\Exception $e) {
            return redirect('/properties')->with('error', 'Cannot delete this property. 3-year retention period has not passed yet!');
        }
    }
}