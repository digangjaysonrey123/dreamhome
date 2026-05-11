@extends('layouts.app')
@section('content')

<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Properties</h1>
    <a href="/properties/create" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
        + Add Property
    </a>
</div>

<div class="bg-white rounded-lg shadow p-6">
    <table class="w-full text-sm">

        <thead>
            <tr class="bg-gray-100 text-left">
                <th class="px-4 py-2">Property No</th>
                <th class="px-4 py-2">Address</th>
                <th class="px-4 py-2">Type</th>
                <th class="px-4 py-2">Rooms</th>
                <th class="px-4 py-2">Rent</th>
                <th class="px-4 py-2">Branch</th>
                <th class="px-4 py-2">Status</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach($properties as $property)
            <tr class="border-t hover:bg-gray-50">
                <td class="px-4 py-2">{{ $property->propertyNo }}</td>
                <td class="px-4 py-2">{{ $property->street }}, {{ $property->city }}</td>
                <td class="px-4 py-2">{{ $property->type }}</td>
                <td class="px-4 py-2">{{ $property->rooms }}</td>
                <td class="px-4 py-2">£{{ $property->monthlyRent }}</td>
                <td class="px-4 py-2">{{ $property->branchNo }}</td>
                <td class="px-4 py-2">
                    <span class="px-2 py-1 rounded text-xs
                        {{ $property->status == 'Active' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                        {{ $property->status }}
                    </span>
                </td>
                
                <td class="px-4 py-2 flex gap-2">
                    <a href="/properties/{{ $property->propertyNo }}/edit"
                        class="text-blue-600 hover:underline">Edit</a>
                    <form action="/properties/{{ $property->propertyNo }}" method="POST"
                        onsubmit="return confirm('Are you sure?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>

    </table>
</div>
@endsection
