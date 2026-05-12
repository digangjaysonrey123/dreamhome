@extends('layouts.app')
@section('content')
<div class="mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Edit Property</h1>
</div>

<div class="bg-white rounded-lg shadow p-6">
    <form action="/properties/{{ $property->propertyNo }}" method="POST">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm text-gray-600 mb-1">Property No</label>
                <input type="text" value="{{ $property->propertyNo }}" class="w-full border rounded px-3 py-2 bg-gray-100" disabled>
            </div>

            <div>
                <label class="block text-sm text-gray-600 mb-1">Type</label>
                <select name="type" class="w-full border rounded px-3 py-2">
                    <option value="Flat" {{ $property->type == 'Flat' ? 'selected' : '' }}>Flat</option>
                    <option value="House" {{ $property->type == 'House' ? 'selected' : '' }}>House</option>
                </select>
            </div>

            <div>
                <label class="block text-sm text-gray-600 mb-1">Street</label>
                <input type="text" name="street" value="{{ $property->street }}" class="w-full border rounded px-3 py-2" required>
            </div>

            <div>
                <label class="block text-sm text-gray-600 mb-1">Area</label>
                <input type="text" name="area" value="{{ $property->area }}" class="w-full border rounded px-3 py-2">
            </div>

            <div>
                <label class="block text-sm text-gray-600 mb-1">City</label>
                <input type="text" name="city" value="{{ $property->city }}" class="w-full border rounded px-3 py-2" required>
            </div>

            <div>
                <label class="block text-sm text-gray-600 mb-1">Postcode</label>
                <input type="text" name="postcode" value="{{ $property->postcode }}" class="w-full border rounded px-3 py-2">
            </div>

            <div>
                <label class="block text-sm text-gray-600 mb-1">Rooms</label>
                <input type="number" name="rooms" value="{{ $property->rooms }}" class="w-full border rounded px-3 py-2" required>
            </div>

            <div>
                <label class="block text-sm text-gray-600 mb-1">Monthly Rent</label>
                <input type="number" name="monthlyRent" value="{{ $property->monthlyRent }}" class="w-full border rounded px-3 py-2" required>
            </div>

            <div>
                <label class="block text-sm text-gray-600 mb-1">Status</label>
                <select name="status" class="w-full border rounded px-3 py-2">
                    <option value="Active" {{ $property->status == 'Active' ? 'selected' : '' }}>Active</option>
                    <option value="Withdrawn" {{ $property->status == 'Withdrawn' ? 'selected' : '' }}>Withdrawn</option>
                </select>
            </div>

            <div>
                <label class="block text-sm text-gray-600 mb-1">Branch</label>
                <select name="branchNo" class="w-full border rounded px-3 py-2">
                    @foreach($branches as $branch)
                    <option value="{{ $branch->branchNo }}" {{ $property->branchNo == $branch->branchNo ? 'selected' : '' }}>
                        {{ $branch->branchNo }} - {{ $branch->city }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-sm text-gray-600 mb-1">Assign Staff</label>
                <select name="staffNo" class="w-full border rounded px-3 py-2">
                    <option value="">-- Select Staff --</option>
                    @foreach($staff as $member)
                    <option value="{{ $member->staffNo }}" {{ $property->staffNo == $member->staffNo ? 'selected' : '' }}>
                        {{ $member->staffNo }} - {{ $member->fName }} {{ $member->lName }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-sm text-gray-600 mb-1">Withdraw Date</label>
                <input type="date" name="withdrawDate" value="{{ $property->withdrawDate }}" class="w-full border rounded px-3 py-2">
            </div>
        </div>

        <div class="mt-4 flex gap-3">
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">Update Property</button>
            <a href="/properties" class="bg-gray-300 text-gray-700 px-6 py-2 rounded hover:bg-gray-400">Cancel</a>
        </div>

    </form>
</div>
@endsection