@extends('layouts.app')
@section('content')
<div class="mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Add New Staff</h1>
</div>
<div class="bg-white rounded-lg shadow p-6">
    <form action="/staff" method="POST">
        @csrf
        <div class="grid grid-cols-2 gap-4">
            <div><label class="block text-sm text-gray-600 mb-1">Staff No</label>
                <input type="text" name="staffNo" class="w-full border rounded px-3 py-2" required></div>
            <div><label class="block text-sm text-gray-600 mb-1">First Name</label>
                <input type="text" name="fName" class="w-full border rounded px-3 py-2" required></div>
            <div><label class="block text-sm text-gray-600 mb-1">Last Name</label>
                <input type="text" name="lName" class="w-full border rounded px-3 py-2" required></div>
            <div><label class="block text-sm text-gray-600 mb-1">Position</label>
                <select name="position" id="position" onchange="toggleFields()" class="w-full border rounded px-3 py-2">
                    <option value="Manager">Manager</option>
                    <option value="Supervisor">Supervisor</option>
                    <option value="Secretary">Secretary</option>
                    <option value="PropStaff">Property Staff</option>
                </select></div>
            <div><label class="block text-sm text-gray-600 mb-1">Sex</label>
                <select name="sex" class="w-full border rounded px-3 py-2">
                    <option value="M">Male</option><option value="F">Female</option>
                </select></div>
            <div><label class="block text-sm text-gray-600 mb-1">Date of Birth</label>
                <input type="date" name="DOB" class="w-full border rounded px-3 py-2"></div>
            <div><label class="block text-sm text-gray-600 mb-1">NIN</label>
                <input type="text" name="NIN" class="w-full border rounded px-3 py-2"></div>
            <div><label class="block text-sm text-gray-600 mb-1">Telephone</label>
                <input type="number" name="telNo" class="w-full border rounded px-3 py-2"></div>
            <div><label class="block text-sm text-gray-600 mb-1">Street</label>
                <input type="text" name="street" class="w-full border rounded px-3 py-2"></div>
            <div><label class="block text-sm text-gray-600 mb-1">City</label>
                <input type="text" name="city" class="w-full border rounded px-3 py-2"></div>
            <div><label class="block text-sm text-gray-600 mb-1">Salary</label>
                <input type="number" name="salary" class="w-full border rounded px-3 py-2"></div>
            <div><label class="block text-sm text-gray-600 mb-1">Date Started</label>
                <input type="date" name="dateStart" class="w-full border rounded px-3 py-2"></div>
            <div id="typingSpeedField"><label class="block text-sm text-gray-600 mb-1">Typing Speed (Secretary only)</label>
                <input type="number" name="typingSpeed" class="w-full border rounded px-3 py-2"></div>
            <div id="carAllowanceField"><label class="block text-sm text-gray-600 mb-1">Car Allowance (Manager only)</label>
                <input type="number" name="carAllowance" class="w-full border rounded px-3 py-2"></div>
            <div id="bonusPaymentField"><label class="block text-sm text-gray-600 mb-1">Bonus Payment (Manager only)</label>
                <input type="number" name="bonusPayment" class="w-full border rounded px-3 py-2"></div>
            <div><label class="block text-sm text-gray-600 mb-1">Branch</label>
                <select name="branchNo" class="w-full border rounded px-3 py-2">
                    @foreach($branches as $branch)
                    <option value="{{ $branch->branchNo }}">{{ $branch->branchNo }} - {{ $branch->city }}</option>
                    @endforeach
                </select></div>

            <div id="supervisorField">
                <label class="block text-sm text-gray-600 mb-1">Supervisor</label>
                <select name="supervisorNo" id="supervisorNo" class="w-full border rounded px-3 py-2">
                    <option value="">-- Select Supervisor --</option>
                    @foreach($supervisors as $supervisor)
                    <option value="{{ $supervisor->staffNo }}" 
                            data-position="{{ $supervisor->position }}">
                        {{ $supervisor->staffNo }} - {{ $supervisor->fName }} {{ $supervisor->lName }} ({{ $supervisor->position }})
                    </option>
                    @endforeach
                </select>
            </div>

        </div>
        <div class="mt-4 flex gap-3">
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">Save Staff</button>
            <a href="/staff" class="bg-gray-300 text-gray-700 px-6 py-2 rounded hover:bg-gray-400">Cancel</a>
        </div>
    </form>
</div>



<script>

const ranks = {
    'Manager': 3,
    'Supervisor': 2,
    'Secretary': 1,
    'Assistant': 1,
};

const currentStaffNo = "{{ $staff->staffNo ?? '' }}";

function toggleFields() {
    const position = document.getElementById('position').value;
    const currentRank = ranks[position] || 0;

    const typingSpeed = document.getElementById('typingSpeedField');
    typingSpeed.style.display = position === 'Secretary' ? 'block' : 'none';
    typingSpeed.querySelector('input').disabled = position !== 'Secretary';

    const carAllowance = document.getElementById('carAllowanceField');
    carAllowance.style.display = position === 'Manager' ? 'block' : 'none';
    carAllowance.querySelector('input').disabled = position !== 'Manager';

    const bonusPayment = document.getElementById('bonusPaymentField');
    bonusPayment.style.display = position === 'Manager' ? 'block' : 'none';
    bonusPayment.querySelector('input').disabled = position !== 'Manager';

    const supervisorField = document.getElementById('supervisorField');
    supervisorField.style.display = position === 'Manager' ? 'none' : 'block';

    const options = document.querySelectorAll('#supervisorNo option');
    options.forEach(option => {
        if (option.value === '') return;
        const optionRank = ranks[option.getAttribute('data-position')] || 0;
        const isSelf = option.value === currentStaffNo;
        option.style.display = (optionRank > currentRank && !isSelf) ? 'block' : 'none';
    });

    document.getElementById('supervisorNo').value = '';
}

toggleFields();
</script>
@endsection