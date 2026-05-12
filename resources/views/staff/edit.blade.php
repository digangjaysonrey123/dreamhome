@extends('layouts.app')
@section('content')

<div class="mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Edit Staff</h1>
</div>
<div class="bg-white rounded-lg shadow p-6">
    <form action="/staff/{{ $member->staffNo }}" method="POST">
        @csrf @method('PUT')
        <div class="grid grid-cols-2 gap-4">
            <div><label class="block text-sm text-gray-600 mb-1">Staff No</label>
                <input type="text" value="{{ $member->staffNo }}" class="w-full border rounded px-3 py-2 bg-gray-100" disabled></div>
            <div><label class="block text-sm text-gray-600 mb-1">First Name</label>
                <input type="text" name="fName" value="{{ $member->fName }}" class="w-full border rounded px-3 py-2" required></div>
            <div><label class="block text-sm text-gray-600 mb-1">Last Name</label>
                <input type="text" name="lName" value="{{ $member->lName }}" class="w-full border rounded px-3 py-2" required></div>
            <div><label class="block text-sm text-gray-600 mb-1">Position</label>
                <select name="position" id="position" onchange="toggleFields()" class="w-full border rounded px-3 py-2">
                    <option value="Manager"    {{ $member->position == 'Manager'    ? 'selected' : '' }}>Manager</option>
                    <option value="Supervisor" {{ $member->position == 'Supervisor' ? 'selected' : '' }}>Supervisor</option>
                    <option value="Secretary"  {{ $member->position == 'Secretary'  ? 'selected' : '' }}>Secretary</option>
                    <option value="PropStaff"  {{ $member->position == 'PropStaff'  ? 'selected' : '' }}>Property Staff</option>
                </select>
            </div>
            <div><label class="block text-sm text-gray-600 mb-1">Salary</label>
                <input type="number" name="salary" value="{{ $member->salary }}" class="w-full border rounded px-3 py-2"></div>
            <div><label class="block text-sm text-gray-600 mb-1">Branch</label>
                <select name="branchNo" class="w-full border rounded px-3 py-2">
                    @foreach($branches as $branch)
                    <option value="{{ $branch->branchNo }}" {{ $member->branchNo == $branch->branchNo ? 'selected' : '' }}>
                        {{ $branch->branchNo }} - {{ $branch->city }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div id="supervisorField">
                <label class="block text-sm text-gray-600 mb-1">Supervisor</label>
                <select name="supervisorNo" id="supervisorNo" class="w-full border rounded px-3 py-2">
                    <option value="">-- Select Supervisor --</option>
                    @foreach($supervisors as $supervisor)
                        <option value="{{ $supervisor->staffNo }}"
                                data-position="{{ $supervisor->position }}"
                                {{ $member->supervisorNo == $supervisor->staffNo ? 'selected' : '' }}>
                            {{ $supervisor->staffNo }} - {{ $supervisor->fName }} {{ $supervisor->lName }} ({{ $supervisor->position }})
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="mt-4 flex gap-3">
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">Update Staff</button>
            <a href="/staff" class="bg-gray-300 text-gray-700 px-6 py-2 rounded hover:bg-gray-400">Cancel</a>
        </div>
    </form>
</div>

<script>
const ranks = {
    'Manager': 3,
    'Supervisor': 2,
    'Secretary': 1,
    'PropStaff': 1,
};

const currentStaffNo = "{{ $member->staffNo }}";

function toggleFields() {
    const position = document.getElementById('position').value;
    const currentRank = ranks[position] || 0;

    const supervisorField = document.getElementById('supervisorField');
    supervisorField.style.display = position === 'Manager' ? 'none' : 'block';

    const options = document.querySelectorAll('#supervisorNo option');
    options.forEach(option => {
        if (option.value === '') return;
        const optionRank = ranks[option.getAttribute('data-position')] || 0;
        const isSelf = option.value === currentStaffNo;
        option.style.display = (optionRank > currentRank && !isSelf) ? 'block' : 'none';
    });
}

toggleFields();
</script>

@endsection