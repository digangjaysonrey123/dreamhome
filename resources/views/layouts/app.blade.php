<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DreamHome</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">

    <!-- Navbar -->
    <nav class="bg-blue-800 text-white px-6 py-4 flex justify-between items-center">
        <div class="text-xl font-bold">🏠 DreamHome</div>
        <div class="flex gap-4 items-center">
            <span>{{ Auth::user()->name }}</span>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="bg-red-500 px-3 py-1 rounded">Logout</button>
            </form>
        </div>
    </nav>

    <div class="flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-blue-900 text-white min-h-screen p-4">
            <ul class="space-y-2">
                <li>
                    <a href="/dashboard"
                        class="block px-4 py-2 rounded hover:bg-blue-700 {{ request()->is('dashboard') ? 'bg-blue-700' : '' }}">
                        📊 Dashboard
                    </a>
                </li>
                <li>
                    <a href="/properties"
                        class="block px-4 py-2 rounded hover:bg-blue-700 {{ request()->is('properties*') ? 'bg-blue-700' : '' }}">
                        🏠 Properties
                    </a>
                </li>
                <li>
                    <a href="/clients"
                        class="block px-4 py-2 rounded hover:bg-blue-700 {{ request()->is('clients*') ? 'bg-blue-700' : '' }}">
                        👥 Clients & Registration
                    </a>
                </li>
                <li>
                    <a href="/staff"
                        class="block px-4 py-2 rounded hover:bg-blue-700 {{ request()->is('staff*') ? 'bg-blue-700' : '' }}">
                        👔 Staff & Branch
                    </a>
                </li>
                <li>
                    <a href="/rentals"
                        class="block px-4 py-2 rounded hover:bg-blue-700 {{ request()->is('rentals*') ? 'bg-blue-700' : '' }}">
                        🔑 Rentals & Viewing
                    </a>
                </li>
                <li>
                    <a href="/payments"
                        class="block px-4 py-2 rounded hover:bg-blue-700 {{ request()->is('payments*') ? 'bg-blue-700' : '' }}">
                        💰 Payments & Reports
                    </a>
                </li>
            </ul>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6">

            <!-- Success Message -->
            @if(session('success'))
                <div class="bg-green-100 text-green-700 px-4 py-3 rounded mb-4">
                    ✅ {{ session('success') }}
                </div>
            @endif

            <!-- Error Message -->
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