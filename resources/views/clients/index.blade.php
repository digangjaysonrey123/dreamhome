@extends('layouts.app')

@section('content')

<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Clients</h1>
    <a href="/clients/create" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
        + Add Client
    </a>
</div>

<div class="bg-white rounded-lg shadow p-6">
    <table class="w-full text-sm">
        <thead>
            <tr class="bg-gray-100 text-left">
                <th class="px-4 py-2">Renter No</th>
                <th class="px-4 py-2">Name</th>
                <th class="px-4 py-2">Telephone</th>
                <th class="px-4 py-2">Pref Type</th>
                <th class="px-4 py-2">Max Rent</th>
                <th class="px-4 py-2">Branch</th>
                <th class="px-4 py-2">Seen By</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clients as $client)
            <tr class="border-t hover:bg-gray-50">
                <td class="px-4 py-2">{{ $client->renterNo }}</td>
                <td class="px-4 py-2">{{ $client->fName }} {{ $client->lName }}</td>
                <td class="px-4 py-2">{{ $client->telNo }}</td>
                <td class="px-4 py-2">{{ $client->prefType }}</td>
                <td class="px-4 py-2">£{{ $client->maxRent }}</td>
                <td class="px-4 py-2">{{ $client->branchNo }}</td>
                <td class="px-4 py-2">{{ $client->seenBy ?? 'Not Assigned' }}</td>
                <td class="px-4 py-2 flex gap-2">
                    <a href="/clients/{{ $client->renterNo }}/edit"
                        class="text-blue-600 hover:underline">Edit</a>
                    <form action="/clients/{{ $client->renterNo }}" method="POST"
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