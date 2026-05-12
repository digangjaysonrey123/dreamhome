@extends('layouts.app')

@section('content')

<div class="mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Edit Payment</h1>
</div>

<div class="bg-white rounded-lg shadow p-6">
    <form action="/payments/{{ $payment->paymentID }}" method="POST">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-2 gap-4">

            <div>
                <label class="block text-sm text-gray-600 mb-1">Lease No</label>
                <select name="leaseNo" class="w-full border rounded px-3 py-2">
                    @foreach($leases as $lease)
                    <option value="{{ $lease->leaseNo }}" {{ $payment->leaseNo == $lease->leaseNo ? 'selected' : '' }}>
                        {{ $lease->leaseNo }} - {{ $lease->propertyNo }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-sm text-gray-600 mb-1">Payment Date</label>
                <input type="date" name="paymentDate" value="{{ $payment->paymentDate }}"
                    class="w-full border rounded px-3 py-2" required>
            </div>

            <div>
                <label class="block text-sm text-gray-600 mb-1">Amount</label>
                <input type="number" name="amount" value="{{ $payment->amount }}"
                    class="w-full border rounded px-3 py-2" required>
            </div>

            <div>
                <label class="block text-sm text-gray-600 mb-1">Payment Type</label>
                <select name="paymentType" class="w-full border rounded px-3 py-2">
                    <option value="Monthly Rent" {{ $payment->paymentType == 'Monthly Rent' ? 'selected' : '' }}>Monthly Rent</option>
                    <option value="Deposit" {{ $payment->paymentType == 'Deposit' ? 'selected' : '' }}>Deposit</option>
                    <option value="Late Fee" {{ $payment->paymentType == 'Late Fee' ? 'selected' : '' }}>Late Fee</option>
                    <option value="Other" {{ $payment->paymentType == 'Other' ? 'selected' : '' }}>Other</option>
                </select>
            </div>

            <div>
                <label class="block text-sm text-gray-600 mb-1">Payment Method</label>
                <select name="paymentMethod" class="w-full border rounded px-3 py-2">
                    <option value="Cash" {{ $payment->paymentMethod == 'Cash' ? 'selected' : '' }}>Cash</option>
                    <option value="Cheque" {{ $payment->paymentMethod == 'Cheque' ? 'selected' : '' }}>Cheque</option>
                    <option value="Direct Debit" {{ $payment->paymentMethod == 'Direct Debit' ? 'selected' : '' }}>Direct Debit</option>
                    <option value="Standing Order" {{ $payment->paymentMethod == 'Standing Order' ? 'selected' : '' }}>Standing Order</option>
                </select>
            </div>

            <div>
                <label class="block text-sm text-gray-600 mb-1">Status</label>
                <select name="status" class="w-full border rounded px-3 py-2">
                    <option value="Paid" {{ $payment->status == 'Paid' ? 'selected' : '' }}>Paid</option>
                    <option value="Pending" {{ $payment->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                    <option value="Overdue" {{ $payment->status == 'Overdue' ? 'selected' : '' }}>Overdue</option>
                </select>
            </div>

            <div>
                <label class="block text-sm text-gray-600 mb-1">Received By</label>
                <select name="receivedBy" class="w-full border rounded px-3 py-2">
                    @foreach($staff as $member)
                    <option value="{{ $member->staffNo }}" {{ $payment->receivedBy == $member->staffNo ? 'selected' : '' }}>
                        {{ $member->staffNo }} - {{ $member->fName }} {{ $member->lName }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="col-span-2">
                <label class="block text-sm text-gray-600 mb-1">Notes</label>
                <textarea name="notes" class="w-full border rounded px-3 py-2" rows="3">{{ $payment->notes }}</textarea>
            </div>

        </div>

        <div class="mt-4 flex gap-3">
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">
                Update Payment
            </button>
            <a href="/payments" class="bg-gray-300 text-gray-700 px-6 py-2 rounded hover:bg-gray-400">
                Cancel
            </a>
        </div>
    </form>
</div>

@endsection