<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        try {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
            ]);
            return redirect('/users')->with('success', 'User created successfully!');
        } catch (\Exception $e) {
            return redirect('/users')->with('error', 'Failed to create user!');
        }
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        try {
            $user = User::findOrFail($id);
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'role' => $request->role,
            ]);
            return redirect('/users')->with('success', 'User updated successfully!');
        } catch (\Exception $e) {
            return redirect('/users')->with('error', 'Failed to update user!');
        }
    }

    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);
            $user->delete();
            return redirect('/users')->with('success', 'User deleted successfully!');
        } catch (\Exception $e) {
            return redirect('/users')->with('error', 'Failed to delete user!');
        }
    }
}