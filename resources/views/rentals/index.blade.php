@extends('layouts.app')
@section('content')

<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Rentals & Viewing</h1>
    <div class="flex gap-2">
        <a href="/rentals/viewing/create" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">+ Add Viewing</a>
        <a href="/rentals/create" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">+ Add Lease</a>
    </div>
</div>

<div class="grid grid-cols-3 gap-4 mb-6">
    <div class="bg-white rounded-lg shadow p-4 border-l-4 border-green-500">
        <p class="text-gray-500 text-sm">Active Leases</p>
        <p class="text-2xl font-bold text-green-600">{{ $activeCount }}</p>
    </div>
    <div class="bg-white rounded-lg shadow p-4 border-l-4 border-red-500">
        <p class="text-gray-500 text-sm">Expired Leases</p>
        <p class="text-2xl font-bold text-red-600">{{ $expiredCount }}</p>
    </div>
    <div class="bg-white rounded-lg shadow p-4 border-l-4 border-blue-500">
        <p class="text-gray-500 text-sm">Total Viewings</p>
        <p class="text-2xl font-bold text-blue-600">{{ $viewingCount }}</p>
    </div>
</div>

<div class="bg-white rounded-lg shadow p-6 mb-6">
    <h2 class="text-lg font-semibold text-gray-700 mb-4">Leases</h2>
    <table class="w-full text-sm">
        <thead>
            <tr class="bg-gray-100 text-left">
                <th class="px-4 py-2">Lease No</th>
                <th class="px-4 py-2">Property</th>
                <th class="px-4 py-2">Renter</th>
                <th class="px-4 py-2">Start</th>
                <th class="px-4 py-2">Finish</th>
                <th class="px-4 py-2">Monthly Rent</th>
                <th class="px-4 py-2">Deposit Paid</th>
                <th class="px-4 py-2">Status</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($leases as $lease)
            <tr class="border-t hover:bg-gray-50">
                <td class="px-4 py-2">{{ $lease->leaseNo }}</td>
                <td class="px-4 py-2">{{ $lease->propertyNo }}</td>
                <td class="px-4 py-2">{{ $lease->renterNo }}</td>
                <td class="px-4 py-2">{{ $lease->rentStart }}</td>
                <td class="px-4 py-2">{{ $lease->rentFinish }}</td>
                <td class="px-4 py-2">£{{ $lease->monthlyRent }}</td>
                <td class="px-4 py-2">{{ $lease->depositPaid == 'Y' ? 'Yes' : 'No' }}</td>
                <td class="px-4 py-2">
                    <span class="px-2 py-1 rounded text-xs {{ $lease->status == 'Active' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                        {{ $lease->status }}
                    </span>
                </td>
                <td class="px-4 py-2 flex gap-2">
                    <a href="/rentals/{{ $lease->leaseNo }}/edit" class="text-blue-600 hover:underline">Edit</a>
                    <form action="/rentals/{{ $lease->leaseNo }}" method="POST" onsubmit="return confirm('Are you sure?')">
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
    <h2 class="text-lg font-semibold text-gray-700 mb-4">Viewings</h2>
    <table class="w-full text-sm">
        <thead>
            <tr class="bg-gray-100 text-left">
                <th class="px-4 py-2">Property</th>
                <th class="px-4 py-2">Renter</th>
                <th class="px-4 py-2">View Date</th>
                <th class="px-4 py-2">Comments</th>
            </tr>
        </thead>
        <tbody>
            @foreach($viewings as $viewing)
            <tr class="border-t hover:bg-gray-50">
                <td class="px-4 py-2">{{ $viewing->propertyNo }}</td>
                <td class="px-4 py-2">{{ $viewing->renterNo }}</td>
                <td class="px-4 py-2">{{ $viewing->viewDate }}</td>
                <td class="px-4 py-2">{{ $viewing->comments ?? '-' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
