@extends('layouts.app')
@section('content')

<div class="mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Add New Viewing</h1>
</div>

<div class="bg-white rounded-lg shadow p-6">
    <form action="/rentals/viewing" method="POST">
        @csrf
        <div class="grid grid-cols-2 gap-4">

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
                <label class="block text-sm text-gray-600 mb-1">View Date</label>
                <input type="date" name="viewDate" class="w-full border rounded px-3 py-2" required>
            </div>

            <div class="col-span-2">
                <label class="block text-sm text-gray-600 mb-1">Comments</label>
                <textarea name="comments" class="w-full border rounded px-3 py-2" rows="3"></textarea>
            </div>

        </div>

        <div class="mt-4 flex gap-3">
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">Save Viewing</button>
            <a href="/rentals" class="bg-gray-300 text-gray-700 px-6 py-2 rounded hover:bg-gray-400">Cancel</a>
        </div>
    </form>
</div>

@endsection
