@extends('layouts.app')
@section('content')
<div class="mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Edit Branch</h1>
</div>
<div class="bg-white rounded-lg shadow p-6">
    <form action="/branch/{{ $branch->branchNo }}" method="POST">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-2 gap-4">
            <div><label class="block text-sm text-gray-600 mb-1">Branch Number</label>
                <input type="text" value="{{ $branch->branchNo }}" class="w-full border rounded px-3 py-2 bg-gray-100" disabled></div>
            <div><label class="block text-sm text-gray-600 mb-1">Street</label>
                <input type="text" value="{{ $branch->street }}" name="street" class="w-full border rounded px-3 py-2"></div>
            <div><label class="block text-sm text-gray-600 mb-1">Area</label>
                <input type="text" value="{{ $branch->area }}" name="area" class="w-full border rounded px-3 py-2"></div>
            <div><label class="block text-sm text-gray-600 mb-1">City</label>
                <input type="text" value="{{ $branch->city }}" name="city" class="w-full border rounded px-3 py-2"></div>
            <div><label class="block text-sm text-gray-600 mb-1">Postcode</label>
                <input type="text" value="{{ $branch->postcode }}" name="postcode" class="w-full border rounded px-3 py-2"></div>
            <div><label class="block text-sm text-gray-600 mb-1">Telephone</label>
                <input type="text" value="{{ $branch->telNo }}" name="telNo" class="w-full border rounded px-3 py-2"></div>
        </div>
        <div class="mt-4 flex gap-3">
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">Update Branch</button>
            <a href="/staff" class="bg-gray-300 text-gray-700 px-6 py-2 rounded hover:bg-gray-400">Cancel</a>
        </div>
    </form>
</div>
@endsection
