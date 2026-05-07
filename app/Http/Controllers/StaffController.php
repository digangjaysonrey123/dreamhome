<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function index()
    {
        $staff = Staff::all();
        $branches = DB::table('Branch')->get();
        return view('staff.index', compact('staff', 'branches'));
    }

    public function create()
    {
        $branches = DB::table('Branch')->get();
        $supervisors = Staff::whereIn('position', ['Manager', 'Supervisor'])->get();
        return view('staff.create', compact('branches', 'supervisors'));
    }

    public function store(Request $request)
    {
        try {
            Staff::create($request->all());
            return redirect('/staff')->with('success', 'Staff added successfully!');
        } catch (\Exception $e) {
            return redirect('/staff')->with('error', 'Failed to add staff. Please try again!');
        }
    }

    public function edit($id)
    {
        $member = Staff::findOrFail($id);
        $branches = DB::table('Branch')->get();
        $supervisors = Staff::whereIn('position', ['Manager', 'Supervisor'])->get();
        return view('staff.edit', compact('member', 'branches', 'supervisors'));
    }

    public function update(Request $request, $id)
    {
        try {
            $member = Staff::findOrFail($id);
            $member->update($request->all());
            return redirect('/staff')->with('success', 'Staff updated successfully!');
        } catch (\Exception $e) {
            return redirect('/staff')->with('error', 'Failed to update staff. Please try again!');
        }
    }

    public function destroy($id)
    {
        try {
            $member = Staff::findOrFail($id);
            $member->delete();
            return redirect('/staff')->with('success', 'Staff deleted successfully!');
        } catch (\Exception $e) {
            return redirect('/staff')->with('error', 'Cannot delete this staff member. They may have active assignments!');
        }
    }
}