<?php

namespace App\Http\Controllers;

use App\Models\Renter;
use App\Models\Staff;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Renter::all();
        return view('clients.index', compact('clients'));
    }

    public function create()
    {
        $branches = DB::table('Branch')->get();
        $staff = Staff::all();
        return view('clients.create', compact('branches', 'staff'));
    }

    public function store(Request $request)
    {
        try {
            Renter::create($request->all());
            return redirect('/clients')->with('success', 'Client added successfully!');
        } catch (\Exception $e) {
            return redirect('/clients')->with('error', 'Failed to add client. Please try again!');
        }
    }

    public function edit($id)
    {
        $client = Renter::findOrFail($id);
        $branches = DB::table('Branch')->get();
        $staff = Staff::all();
        return view('clients.edit', compact('client', 'branches', 'staff'));
    }

    public function update(Request $request, $id)
    {
        try {
            $client = Renter::findOrFail($id);
            $client->update($request->all());
            return redirect('/clients')->with('success', 'Client updated successfully!');
        } catch (\Exception $e) {
            return redirect('/clients')->with('error', 'Failed to update client. Please try again!');
        }
    }

    public function destroy($id)
    {
        try {
            $client = Renter::findOrFail($id);
            $client->delete();
            return redirect('/clients')->with('success', 'Client deleted successfully!');
        } catch (\Exception $e) {
            return redirect('/clients')->with('error', 'Cannot delete this client. They may have active lease records!');
        }
    }
}