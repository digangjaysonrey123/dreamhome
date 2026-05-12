<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DreamHome</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">

    <nav class="bg-blue-800 text-white px-6 py-4 flex justify-between items-center">
        <div class="text-xl font-bold">🏠 DreamHome</div>
        <div class="flex gap-4 items-center">
            <span>{{ Auth::user()->name }}</span>
            <span class="text-xs bg-blue-600 px-2 py-1 rounded">
                {{ ucfirst(Auth::user()->role) }}
            </span>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="bg-red-500 px-3 py-1 rounded">Logout</button>
            </form>
        </div>
    </nav>

    <div class="flex">
        <aside class="w-64 bg-blue-900 text-white min-h-screen p-4">
            <ul class="space-y-2">
                <li>
                    <a href="/dashboard"
                        class="block px-4 py-2 rounded hover:bg-blue-700 {{ request()->is('dashboard') ? 'bg-blue-700' : '' }}">
                        📊 Dashboard
                    </a>
                </li>

                @if(Auth::user()->role == 'admin')
                <li>
                    <a href="/users"
                        class="block px-4 py-2 rounded hover:bg-blue-700 {{ request()->is('users*') ? 'bg-blue-700' : '' }}">
                        👤 User Management
                    </a>
                </li>
                @endif

                @if(in_array(Auth::user()->role, ['admin', 'manager', 'supervisor', 'assistant']))
                <li>
                    <a href="/properties"
                        class="block px-4 py-2 rounded hover:bg-blue-700 {{ request()->is('properties*') ? 'bg-blue-700' : '' }}">
                        🏠 Properties
                    </a>
                </li>
                @endif

                @if(in_array(Auth::user()->role, ['admin', 'manager', 'supervisor', 'assistant']))
                <li>
                    <a href="/clients"
                        class="block px-4 py-2 rounded hover:bg-blue-700 {{ request()->is('clients*') ? 'bg-blue-700' : '' }}">
                        👥 Clients & Registration
                    </a>
                </li>
                @endif

                @if(in_array(Auth::user()->role, ['admin', 'manager', 'supervisor']))
                <li>
                    <a href="/staff"
                        class="block px-4 py-2 rounded hover:bg-blue-700 {{ request()->is('staff*') ? 'bg-blue-700' : '' }}">
                        👔 Staff & Branch
                    </a>
                </li>
                @endif

                @if(in_array(Auth::user()->role, ['admin', 'manager', 'supervisor', 'assistant']))
                <li>
                    <a href="/rentals"
                        class="block px-4 py-2 rounded hover:bg-blue-700 {{ request()->is('rentals*') ? 'bg-blue-700' : '' }}">
                        🔑 Rentals & Viewing
                    </a>
                </li>
                @endif

                @if(in_array(Auth::user()->role, ['admin', 'manager', 'cashier']))
                <li>
                    <a href="/payments"
                        class="block px-4 py-2 rounded hover:bg-blue-700 {{ request()->is('payments*') ? 'bg-blue-700' : '' }}">
                        💰 Payments & Reports
                    </a>
                </li>
                @endif

            </ul>
        </aside>

        <main class="flex-1 p-6">

            @if(session('success'))
                <div class="bg-green-100 text-green-700 px-4 py-3 rounded mb-4">
                    ✅ {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="bg-red-100 text-red-700 px-4 py-3 rounded mb-4">
                    ❌ {{ session('error') }}
                </div>
            @endif

            @yield('content')
        </main>
    </div>

</body>
</html>