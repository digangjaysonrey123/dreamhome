@extends('layouts.app')
@section('content')

<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Staff & Branch</h1>
    <div class="flex gap-2">
        <a href="/branch/create" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">+ Add Branch</a>
        <a href="/staff/create" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">+ Add Staff</a>
    </div>
</div>

<div class="grid grid-cols-3 gap-4 mb-6">
    @foreach($branches as $branch)
    <div class="bg-white rounded-lg shadow p-4 border-l-4 border-blue-500">
        <p class="font-bold text-gray-700">Branch {{ $branch->branchNo }}</p>
        <p class="text-sm text-gray-500">{{ $branch->street }}, {{ $branch->city }}</p>
        <p class="text-sm text-gray-500">{{ $branch->telNo }}</p>
    </div>
    @endforeach
</div>
<div class="bg-white rounded-lg shadow p-6">
    <table class="w-full text-sm">
        <thead>
            <tr class="bg-gray-100 text-left">
                <th class="px-4 py-2">Branch No</th>
                <th class="px-4 py-2">Street</th>
                <th class="px-4 py-2">Area</th>
                <th class="px-4 py-2">City</th>
                <th class="px-4 py-2">Postcode</th>
                <th class="px-4 py-2">Telephone</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($branches as $branch)
            <tr class="border-t hover:bg-gray-50">
                <td class="px-4 py-2">{{ $branch->branchNo }}</td>
                <td class="px-4 py-2">{{ $branch->street }}</td>
                <td class="px-4 py-2">{{ $branch->area }}</td>
                <td class="px-4 py-2">{{ $branch->city }}</td>
                <td class="px-4 py-2">{{ $branch->postcode }}</td>
                <td class="px-4 py-2">{{ $branch->telNo }}</td>
                <td class="px-4 py-2 flex gap-2">
                    <a href="/staff/{{ $branch->branchNo }}/edit" class="text-blue-600 hover:underline">Edit</a>
                    <form action="/staff/{{ $branch->branchNo }}" method="POST" onsubmit="return confirm('Are you sure?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection