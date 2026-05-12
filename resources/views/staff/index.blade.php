@extends('layouts.app')
@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Staff & Branch</h1>
    <div class="flex gap-2">
        <a href="/branch/create" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">+ Add Branch</a>
        <a href="/staff/create" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">+ Add Staff</a>
    </div>
</div>


{{-- Branch table --}}
<div class="bg-white rounded-lg shadow p-6 mb-6">
    <h2 class="text-lg font-semibold text-gray-700 mb-4">Branches</h2>
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
                    <a href="/branch/{{ $branch->branchNo }}/edit" class="text-blue-600 hover:underline">Edit</a>
                    <form action="/branch/{{ $branch->branchNo }}" method="POST" onsubmit="return confirm('Are you sure?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>




<div class="bg-white rounded-lg shadow p-6">
    <h2 class="text-lg font-semibold text-gray-700 mb-4">Staff</h2>
    <table class="w-full text-sm">
        <thead>
            <tr class="bg-gray-100 text-left">
                <th class="px-4 py-2">Staff No</th>
                <th class="px-4 py-2">Name</th>
                <th class="px-4 py-2">Position</th>
                <th class="px-4 py-2">Branch</th>
                <th class="px-4 py-2">Telephone</th>
                <th class="px-4 py-2">Salary</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($staff as $member)
            <tr class="border-t hover:bg-gray-50">
                <td class="px-4 py-2">{{ $member->staffNo }}</td>
                <td class="px-4 py-2">{{ $member->fName }} {{ $member->lName }}</td>
                <td class="px-4 py-2">
                    <span class="px-2 py-1 rounded text-xs
                        @if($member->position == 'Manager') bg-purple-100 text-purple-700
                        @elseif($member->position == 'Supervisor') bg-blue-100 text-blue-700
                        @elseif($member->position == 'Secretary') bg-yellow-100 text-yellow-700
                        @else bg-green-100 text-green-700 @endif">
                        {{ $member->position }}
                    </span>
                </td>
                <td class="px-4 py-2">{{ $member->branchNo }}</td>
                <td class="px-4 py-2">{{ $member->telNo }}</td>
                <td class="px-4 py-2">£{{ $member->salary }}</td>
                <td class="px-4 py-2 flex gap-2">
                    <a href="/staff/{{ $member->staffNo }}/edit" class="text-blue-600 hover:underline">Edit</a>
                    <form action="/staff/{{ $member->staffNo }}" method="POST" onsubmit="return confirm('Are you sure?')">
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