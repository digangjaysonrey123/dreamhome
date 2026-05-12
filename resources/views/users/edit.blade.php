@extends('layouts.app')

@section('content')

<div class="mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Edit User</h1>
</div>

<div class="bg-white rounded-lg shadow p-6">
    <form action="/users/{{ $user->id }}" method="POST">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-2 gap-4">

            <div>
                <label class="block text-sm text-gray-600 mb-1">Name</label>
                <input type="text" name="name" value="{{ $user->name }}"
                    class="w-full border rounded px-3 py-2" required>
            </div>

            <div>
                <label class="block text-sm text-gray-600 mb-1">Email</label>
                <input type="email" name="email" value="{{ $user->email }}"
                    class="w-full border rounded px-3 py-2" required>
            </div>

            <div>
                <label class="block text-sm text-gray-600 mb-1">Role</label>
                <select name="role" class="w-full border rounded px-3 py-2">
                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="manager" {{ $user->role == 'manager' ? 'selected' : '' }}>Manager</option>
                    <option value="supervisor" {{ $user->role == 'supervisor' ? 'selected' : '' }}>Supervisor</option>
                    <option value="assistant" {{ $user->role == 'assistant' ? 'selected' : '' }}>Assistant</option>
                    <option value="secretary" {{ $user->role == 'secretary' ? 'selected' : '' }}>Secretary</option>
                    <option value="cashier" {{ $user->role == 'cashier' ? 'selected' : '' }}>Cashier</option>
                </select>
            </div>

        </div>

        <div class="mt-4 flex gap-3">
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">
                Update User
            </button>
            <a href="/users" class="bg-gray-300 text-gray-700 px-6 py-2 rounded hover:bg-gray-400">
                Cancel
            </a>
        </div>
    </form>
</div>

@endsection