@extends('layouts.app')

@section('content')

<div class="mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Add New Client</h1>
</div>

<div class="bg-white rounded-lg shadow p-6">
    <form action="/clients" method="POST">
        @csrf
        <div class="grid grid-cols-2 gap-4">

            <div>
                <label class="block text-sm text-gray-600 mb-1">Renter No</label>
                <input type="text" name="renterNo" class="w-full border rounded px-3 py-2" required>
            </div>

            <div>
                <label class="block text-sm text-gray-600 mb-1">First Name</label>
                <input type="text" name="fName" class="w-full border rounded px-3 py-2" required>
            </div>

            <div>
                <label class="block text-sm text-gray-600 mb-1">Last Name</label>
                <input type="text" name="lName" class="w-full border rounded px-3 py-2" required>
            </div>

            <div>
                <label class="block text-sm text-gray-600 mb-1">Telephone</label>
                <input type="text" name="telNo" class="w-full border rounded px-3 py-2">
            </div>

            <div>
                <label class="block text-sm text-gray-600 mb-1">Street</label>
                <input type="text" name="street" class="w-full border rounded px-3 py-2">
            </div>

            <div>
                <label class="block text-sm text-gray-600 mb-1">Area</label>
                <input type="text" name="area" class="w-full border rounded px-3 py-2">
            </div>

            <div>
                <label class="block text-sm text-gray-600 mb-1">City</label>
                <input type="text" name="city" class="w-full border rounded px-3 py-2">
            </div>

            <div>
                <label class="block text-sm text-gray-600 mb-1">Postcode</label>
                <input type="text" name="postcode" class="w-full border rounded px-3 py-2">
            </div>

            <div>
                <label class="block text-sm text-gray-600 mb-1">Preferred Type</label>
                <select name="prefType" class="w-full border rounded px-3 py-2">
                    <option value="Flat">Flat</option>
                    <option value="House">House</option>
                </select>
            </div>

            <div>
                <label class="block text-sm text-gray-600 mb-1">Max Rent</label>
                <input type="number" name="maxRent" class="w-full border rounded px-3 py-2">
            </div>

            <div>
                <label class="block text-sm text-gray-600 mb-1">Branch</label>
                <select name="branchNo" class="w-full border rounded px-3 py-2">
                    @foreach($branches as $branch)
                    <option value="{{ $branch->branchNo }}">{{ $branch->branchNo }} - {{ $branch->city }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-sm text-gray-600 mb-1">Seen Date</label>
                <input type="date" name="seenDate" class="w-full border rounded px-3 py-2">
            </div>

            <div>
                <label class="block text-sm text-gray-600 mb-1">Assign Staff</label>
                <select name="seenBy" class="w-full border rounded px-3 py-2">
                    <option value="">-- Select Staff --</option>
                    @foreach($staff as $member)
                    <option value="{{ $member->staffNo }}">{{ $member->staffNo }} - {{ $member->fName }} {{ $member->lName }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-span-2">
                <label class="block text-sm text-gray-600 mb-1">General Comment</label>
                <textarea name="generalComment" class="w-full border rounded px-3 py-2" rows="3"></textarea>
            </div>

        </div>

        <div class="mt-4 flex gap-3">
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">
                Save Client
            </button>
            <a href="/clients" class="bg-gray-300 text-gray-700 px-6 py-2 rounded hover:bg-gray-400">
                Cancel
            </a>
        </div>
    </form>
</div>

@endsection