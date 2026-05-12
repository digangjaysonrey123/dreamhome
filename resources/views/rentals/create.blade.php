@extends('layouts.app')
@section('content')

<div class="mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Add New Lease</h1>
</div>

<div class="bg-white rounded-lg shadow p-6">
    <form action="/rentals" method="POST">
        @csrf
        <div class="grid grid-cols-2 gap-4">

            <div>
                <label class="block text-sm text-gray-600 mb-1">Lease No</label>
                <input type="text" name="leaseNo" class="w-full border rounded px-3 py-2" required>
            </div>

            <div>
                <label class="block text-sm text-gray-600 mb-1">Property</label>
                <select name="propertyNo" class="w-full border rounded px-3 py-2">
                    @foreach($properties as $property)
                    <option value="{{ $property->propertyNo }}">{{ $property->propertyNo }} - {{ $property->street }}, {{ $property->city }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-sm text-gray-600 mb-1">Renter</label>
                <select name="renterNo" class="w-full border rounded px-3 py-2">
                    @foreach($renters as $renter)
                    <option value="{{ $renter->renterNo }}">{{ $renter->renterNo }} - {{ $renter->fName }} {{ $renter->lName }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-sm text-gray-600 mb-1">Staff</label>
                <select name="staffNo" class="w-full border rounded px-3 py-2">
                    @foreach($staff as $member)
                    <option value="{{ $member->staffNo }}">{{ $member->staffNo }} - {{ $member->fName }} {{ $member->lName }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-sm text-gray-600 mb-1">Rent Start</label>
                <input type="date" name="rentStart" class="w-full border rounded px-3 py-2" required>
            </div>

            <div>
                <label class="block text-sm text-gray-600 mb-1">Rent Finish</label>
                <input type="date" name="rentFinish" class="w-full border rounded px-3 py-2" required>
            </div>

            <div>
                <label class="block text-sm text-gray-600 mb-1">Monthly Rent</label>
                <input type="number" name="monthlyRent" class="w-full border rounded px-3 py-2" required>
            </div>

            <div>
                <label class="block text-sm text-gray-600 mb-1">Rental Deposit</label>
                <input type="number" name="rentalDeposit" class="w-full border rounded px-3 py-2">
            </div>

            <div>
                <label class="block text-sm text-gray-600 mb-1">Deposit Paid</label>
                <select name="depositPaid" class="w-full border rounded px-3 py-2">
                    <option value="N">No</option>
                    <option value="Y">Yes</option>
                </select>
            </div>

            <div>
                <label class="block text-sm text-gray-600 mb-1">Payment Method</label>
                <select name="paymentMethod" class="w-full border rounded px-3 py-2">
                    <option value="Cash">Cash</option>
                    <option value="Cheque">Cheque</option>
                    <option value="Direct Debit">Direct Debit</option>
                    <option value="Standing Order">Standing Order</option>
                </select>
            </div>

            <div>
                <label class="block text-sm text-gray-600 mb-1">Status</label>
                <select name="status" class="w-full border rounded px-3 py-2">
                    <option value="Active">Active</option>
                    <option value="Expired">Expired</option>
                </select>
            </div>

        </div>

        <div class="mt-4 flex gap-3">
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">Save Lease</button>
            <a href="/rentals" class="bg-gray-300 text-gray-700 px-6 py-2 rounded hover:bg-gray-400">Cancel</a>
        </div>
    </form>
</div>

@endsection
