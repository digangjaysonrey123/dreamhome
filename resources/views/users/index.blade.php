@extends('layouts.app')

@section('content')

<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold text-gray-800">User Management</h1>
    <a href="/users/create" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
        + Add User
    </a>
</div>

<div class="bg-white rounded-lg shadow p-6">
    <table class="w-full text-sm">
        <thead>
            <tr class="bg-gray-100 text-left">
                <th class="px-4 py-2">Name</th>
                <th class="px-4 py-2">Email</th>
                <th class="px-4 py-2">Role</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr class="border-t hover:bg-gray-50">
                <td class="px-4 py-2">{{ $user->name }}</td>
                <td class="px-4 py-2">{{ $user->email }}</td>
                <td class="px-4 py-2">
                    <span class="px-2 py-1 rounded text-xs
                        @if($user->role == 'admin') bg-red-100 text-red-700
                        @elseif($user->role == 'manager') bg-purple-100 text-purple-700
                        @elseif($user->role == 'supervisor') bg-blue-100 text-blue-700
                        @elseif($user->role == 'secretary') bg-yellow-100 text-yellow-700
                        @else bg-green-100 text-green-700
                        @endif">
                        {{ ucfirst($user->role) }}
                    </span>
                </td>
                <td class="px-4 py-2 flex gap-2">
                    <a href="/users/{{ $user->id }}/edit"
                        class="text-blue-600 hover:underline">Edit</a>
                    <form action="/users/{{ $user->id }}" method="POST"
                        onsubmit="return confirm('Are you sure?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection