<?php

namespace App\Http\Controllers;

use App\Models\PropertyForRent;
use App\Models\Staff;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index() {
        $properties = PropertyForRent::all();
        return view('properties.index', compact('properties'));
    }
    public function create() {
        $branches = DB::table('Branch')->get();
        $staff = Staff::all();
        return view('properties.create', compact('branches', 'staff'));
    }
    public function store(Request $request) {
        try {
            PropertyForRent::create($request->all());
            return redirect('/properties')->with('success', 'Property added!');
        } catch (\Exception $e) {
            return redirect('/properties')->with('error', 'Failed to add property!');
        }
    }
    public function edit($id) {
        $property = PropertyForRent::findOrFail($id);
        $branches = DB::table('Branch')->get();
        $staff = Staff::all();
        return view('properties.edit', compact('property', 'branches', 'staff'));
    }
    public function update(Request $request, $id) {
        try {
            $property = PropertyForRent::findOrFail($id);
            $property->update($request->all());
            return redirect('/properties')->with('success', 'Property updated!');
        } catch (\Exception $e) {
            return redirect('/properties')->with('error', 'Failed to update!');
        }
    }
    public function destroy($id) {
        try {
            $property = PropertyForRent::findOrFail($id);
            $property->delete();
            return redirect('/properties')->with('success', 'Property deleted!');
        } catch (\Exception $e) {
            return redirect('/properties')->with('error', 'Cannot delete. 3-year rule applies!');
        }
    }
}