@extends('layouts.app')

@section('content')

<h1 class="text-2xl font-bold text-gray-800 mb-6">Dashboard</h1>

<div class="grid grid-cols-4 gap-6 mb-8">

    <div class="bg-white rounded-lg shadow p-6 border-l-4 border-blue-500">
        <p class="text-gray-500 text-sm">Total Properties</p>
        <p class="text-3xl font-bold text-blue-600">{{ $totalProperties }}</p>
    </div>

    <div class="bg-white rounded-lg shadow p-6 border-l-4 border-green-500">
        <p class="text-gray-500 text-sm">Total Staff</p>
        <p class="text-3xl font-bold text-green-600">{{ $totalStaff }}</p>
    </div>

    <div class="bg-white rounded-lg shadow p-6 border-l-4 border-yellow-500">
        <p class="text-gray-500 text-sm">Total Renters</p>
        <p class="text-3xl font-bold text-yellow-600">{{ $totalRenters }}</p>
    </div>

    <div class="bg-white rounded-lg shadow p-6 border-l-4 border-red-500">
        <p class="text-gray-500 text-sm">Active Leases</p>
        <p class="text-3xl font-bold text-red-600">{{ $activeLeases }}</p>
    </div>

</div>

<div class="bg-white rounded-lg shadow p-6 mb-6">
    <h2 class="text-lg font-bold text-gray-700 mb-4">Recent Properties</h2>
    <table class="w-full text-sm">
        <thead>
            <tr class="bg-gray-100 text-left">
                <th class="px-4 py-2">Property No</th>
                <th class="px-4 py-2">Address</th>
                <th class="px-4 py-2">Type</th>
                <th class="px-4 py-2">Rent</th>
                <th class="px-4 py-2">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($recentProperties as $property)
            <tr class="border-t">
                <td class="px-4 py-2">{{ $property->propertyNo }}</td>
                <td class="px-4 py-2">{{ $property->street }}, {{ $property->city }}</td>
                <td class="px-4 py-2">{{ $property->type }}</td>
                <td class="px-4 py-2">£{{ $property->monthlyRent }}</td>
                <td class="px-4 py-2">
                    <span class="px-2 py-1 rounded text-xs
                        {{ $property->status == 'Active' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                        {{ $property->status }}
                    </span>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection