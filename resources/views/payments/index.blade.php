@extends('layouts.app')

@section('content')

<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Payments & Reports</h1>
    @if(in_array(Auth::user()->role, ['admin', 'manager', 'cashier']))
    <a href="/payments/create" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
        + Record Payment
    </a>
    @endif
</div>

<div class="grid grid-cols-4 gap-4 mb-6">
    <div class="bg-white rounded-lg shadow p-4 border-l-4 border-blue-500">
        <p class="text-gray-500 text-sm">Total Rent Collected</p>
        <p class="text-2xl font-bold text-blue-600">£{{ number_format($totalRent, 2) }}</p>
    </div>
    <div class="bg-white rounded-lg shadow p-4 border-l-4 border-green-500">
        <p class="text-gray-500 text-sm">Active Leases</p>
        <p class="text-2xl font-bold text-green-600">{{ $activeLeases }}</p>
    </div>
    <div class="bg-white rounded-lg shadow p-4 border-l-4 border-yellow-500">
        <p class="text-gray-500 text-sm">Total Deposits</p>
        <p class="text-2xl font-bold text-yellow-600">£{{ number_format($totalDeposits, 2) }}</p>
    </div>
    <div class="bg-white rounded-lg shadow p-4 border-l-4 border-red-500">
        <p class="text-gray-500 text-sm">Unpaid Deposits</p>
        <p class="text-2xl font-bold text-red-600">{{ $unpaidDeposits }}</p>
    </div>
</div>

<div class="bg-white rounded-lg shadow p-6 mb-6">
    <h2 class="text-lg font-bold text-gray-700 mb-4">Payment Records</h2>
    <table class="w-full text-sm">
        <thead>
            <tr class="bg-gray-100 text-left">
                <th class="px-4 py-2">Payment ID</th>
                <th class="px-4 py-2">Lease No</th>
                <th class="px-4 py-2">Date</th>
                <th class="px-4 py-2">Amount</th>
                <th class="px-4 py-2">Type</th>
                <th class="px-4 py-2">Method</th>
                <th class="px-4 py-2">Status</th>
                <th class="px-4 py-2">Received By</th>
                @if(in_array(Auth::user()->role, ['admin', 'manager', 'cashier']))
                <th class="px-4 py-2">Actions</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach($payments as $payment)
            <tr class="border-t hover:bg-gray-50">
                <td class="px-4 py-2">{{ $payment->paymentID }}</td>
                <td class="px-4 py-2">{{ $payment->leaseNo }}</td>
                <td class="px-4 py-2">{{ $payment->paymentDate }}</td>
                <td class="px-4 py-2">£{{ $payment->amount }}</td>
                <td class="px-4 py-2">{{ $payment->paymentType }}</td>
                <td class="px-4 py-2">{{ $payment->paymentMethod }}</td>
                <td class="px-4 py-2">
                    <span class="px-2 py-1 rounded text-xs bg-green-100 text-green-700">
                        {{ $payment->status }}
                    </span>
                </td>
                <td class="px-4 py-2">{{ $payment->receivedBy }}</td>
                @if(in_array(Auth::user()->role, ['admin', 'manager', 'cashier']))
                <td class="px-4 py-2 flex gap-2">
                    <a href="/payments/{{ $payment->paymentID }}/edit"
                        class="text-blue-600 hover:underline">Edit</a>
                    <form action="/payments/{{ $payment->paymentID }}" method="POST"
                        onsubmit="return confirm('Are you sure?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline">Delete</button>
                    </form>
                </td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="grid grid-cols-2 gap-6 mb-6">
    <div class="bg-white rounded-lg shadow p-6">
        <h2 class="text-lg font-bold text-gray-700 mb-4">Revenue by Branch</h2>
        <table class="w-full text-sm">
            <thead>
                <tr class="bg-gray-100 text-left">
                    <th class="px-4 py-2">Branch</th>
                    <th class="px-4 py-2">Total Rent</th>
                    <th class="px-4 py-2">Properties</th>
                </tr>
            </thead>
            <tbody>
                @foreach($revenueByBranch as $branch)
                <tr class="border-t hover:bg-gray-50">
                    <td class="px-4 py-2">{{ $branch->branchNo }}</td>
                    <td class="px-4 py-2">£{{ number_format($branch->totalRent, 2) }}</td>
                    <td class="px-4 py-2">{{ $branch->totalProperties }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <h2 class="text-lg font-bold text-gray-700 mb-4">Client Report</h2>
        <table class="w-full text-sm">
            <thead>
                <tr class="bg-gray-100 text-left">
                    <th class="px-4 py-2">Renter</th>
                    <th class="px-4 py-2">Branch</th>
                    <th class="px-4 py-2">Max Rent</th>
                </tr>
            </thead>
            <tbody>
                @foreach($clientReport as $client)
                <tr class="border-t hover:bg-gray-50">
                    <td class="px-4 py-2">{{ $client->fName }} {{ $client->lName }}</td>
                    <td class="px-4 py-2">{{ $client->branchNo }}</td>
                    <td class="px-4 py-2">£{{ $client->maxRent }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@if(in_array(Auth::user()->role, ['admin', 'manager']))
<div class="bg-white rounded-lg shadow p-6">
    <h2 class="text-lg font-bold text-gray-700 mb-4">Staff Performance Report</h2>
    <table class="w-full text-sm">
        <thead>
            <tr class="bg-gray-100 text-left">
                <th class="px-4 py-2">Staff No</th>
                <th class="px-4 py-2">Name</th>
                <th class="px-4 py-2">Position</th>
                <th class="px-4 py-2">Branch</th>
                <th class="px-4 py-2">Salary</th>
                <th class="px-4 py-2">Car Allowance</th>
                <th class="px-4 py-2">Bonus</th>
            </tr>
        </thead>
        <tbody>
            @foreach($staffReport as $member)
            <tr class="border-t hover:bg-gray-50">
                <td class="px-4 py-2">{{ $member->staffNo }}</td>
                <td class="px-4 py-2">{{ $member->fName }} {{ $member->lName }}</td>
                <td class="px-4 py-2">{{ $member->position }}</td>
                <td class="px-4 py-2">{{ $member->branchNo }}</td>
                <td class="px-4 py-2">£{{ $member->salary }}</td>
                <td class="px-4 py-2">{{ $member->carAllowance ? '£'.$member->carAllowance : 'N/A' }}</td>
                <td class="px-4 py-2">{{ $member->bonusPayment ? '£'.$member->bonusPayment : 'N/A' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endif

@endsection