<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    public function index() {
        return redirect('/staff');
    }

    public function create() {
        return view('branch.create');
    }

    public function store(Request $request) {
        try {
            DB::table('Branch')->insert([
                'branchNo'  => $request->branchNo,
                'street'    => $request->street,
                'area'      => $request->area,
                'city'      => $request->city,
                'postcode'  => $request->postcode,
                'telNo'     => $request->telNo,
            ]);
            return redirect('/staff')->with('success', 'Branch added!');
        } catch (\Exception $e) {
            return redirect('/staff')->with('error', 'Failed to add branch!');
        }
    }

    public function edit($id) {
        $branch = DB::table('Branch')->where('branchNo', $id)->first();
        return view('branch.edit', compact('branch'));
    }

    public function update(Request $request, $id) {
        try {
            DB::table('Branch')->where('branchNo', $id)->update([
                'street'   => $request->street,
                'area'     => $request->area,
                'city'     => $request->city,
                'postcode' => $request->postcode,
                'telNo'    => $request->telNo,
            ]);
            return redirect('/staff')->with('success', 'Branch updated!');
        } catch (\Exception $e) {
            return redirect('/staff')->with('error', 'Failed to update branch!');
        }
    }

    public function destroy($id) {
        try {
            DB::table('Branch')->where('branchNo', $id)->delete();
            return redirect('/staff')->with('success', 'Branch deleted!');
        } catch (\Exception $e) {
            return redirect('/staff')->with('error', 'Cannot delete branch with existing staff!');
        }
    }
}
