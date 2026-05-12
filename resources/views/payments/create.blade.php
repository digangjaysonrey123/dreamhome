@extends('layouts.app')

@section('content')

<div class="mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Record New Payment</h1>
</div>

<div class="bg-white rounded-lg shadow p-6">
    <form action="/payments" method="POST">
        @csrf
        <div class="grid grid-cols-2 gap-4">

            <div>
                <label class="block text-sm text-gray-600 mb-1">Lease No</label>
                <select name="leaseNo" class="w-full border rounded px-3 py-2">
                    @foreach($leases as $lease)
                    <option value="{{ $lease->leaseNo }}">{{ $lease->leaseNo }} - {{ $lease->propertyNo }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-sm text-gray-600 mb-1">Payment Date</label>
                <input type="date" name="paymentDate" class="w-full border rounded px-3 py-2" required>
            </div>

            <div>
                <label class="block text-sm text-gray-600 mb-1">Amount</label>
                <input type="number" name="amount" class="w-full border rounded px-3 py-2" required>
            </div>

            <div>
                <label class="block text-sm text-gray-600 mb-1">Payment Type</label>
                <select name="paymentType" class="w-full border rounded px-3 py-2">
                    <option value="Monthly Rent">Monthly Rent</option>
                    <option value="Deposit">Deposit</option>
                    <option value="Late Fee">Late Fee</option>
                    <option value="Other">Other</option>
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
                    <option value="Paid">Paid</option>
                    <option value="Pending">Pending</option>
                    <option value="Overdue">Overdue</option>
                </select>
            </div>

            <div>
                <label class="block text-sm text-gray-600 mb-1">Received By</label>
                <select name="receivedBy" class="w-full border rounded px-3 py-2">
                    @foreach($staff as $member)
                    <option value="{{ $member->staffNo }}">{{ $member->staffNo }} - {{ $member->fName }} {{ $member->lName }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-span-2">
                <label class="block text-sm text-gray-600 mb-1">Notes</label>
                <textarea name="notes" class="w-full border rounded px-3 py-2" rows="3"></textarea>
            </div>

        </div>

        <div class="mt-4 flex gap-3">
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">
                Record Payment
            </button>
            <a href="/payments" class="bg-gray-300 text-gray-700 px-6 py-2 rounded hover:bg-gray-400">
                Cancel
            </a>
        </div>
    </form>
</div>

@endsection