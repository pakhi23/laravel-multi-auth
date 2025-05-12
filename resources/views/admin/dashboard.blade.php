<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .sidebar {
            transition: width 0.3s ease;
        }
        .content-fade-in {
            animation: fadeIn 0.5s ease-in-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
    </style>
</head>
<body class="bg-gray-100 min-h-screen flex">
    <!-- Sidebar -->
    <aside class="sidebar bg-gray-800 text-white w-64 min-h-screen p-4">
        <div class="mb-8">
            <h1 class="text-2xl font-bold">Admin Portal</h1>
        </div>
        
        <nav>
            <ul class="space-y-2">
                <li>
                    <a href="{{ route('admin.dashboard') }}" class="block py-2.5 px-4 rounded transition duration-200 bg-blue-600 hover:bg-blue-700">
                        Dashboard
                    </a>
                </li>
              
                <li class="mt-10">
                    <form method="POST" action="{{ route('admin.logout') }}">
                        @csrf
                        <button type="submit" class="w-full text-left block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">
                            Logout
                        </button>
                    </form>
                </li>
            </ul>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-8 content-fade-in">
        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-2xl font-semibold mb-4">Welcome, {{ $admin->name }}!</h2>
            <p class="text-gray-600 mb-6">This is your admin dashboard. You're logged in as an administrator.</p>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-blue-50 p-6 rounded-lg border border-blue-100">
                    <h3 class="text-lg font-semibold text-blue-700 mb-2">Admin Info</h3>
                    <p class="text-gray-600">Email: {{ $admin->email }}</p>
                    <p class="text-gray-600">Role: {{ $admin->role }}</p>
                </div>
                
                <div class="bg-green-50 p-6 rounded-lg border border-green-100">
                    <h3 class="text-lg font-semibold text-green-700 mb-2">System Status</h3>
                    <p class="text-gray-600">Status: <span class="text-green-600 font-medium">Online</span></p>
                    <p class="text-gray-600">Last Login: {{ now()->format('M d, Y H:i') }}</p>
                </div>
                
                <div class="bg-purple-50 p-6 rounded-lg border border-purple-100">
                    <h3 class="text-lg font-semibold text-purple-700 mb-2">Quick Actions</h3>
                    <div class="space-y-2 mt-4">
                        <a href="#" class="block text-center py-2 px-4 bg-purple-600 text-white rounded hover:bg-purple-700 transition">
                            View Reports
                        </a>
                        <a href="#" class="block text-center py-2 px-4 bg-purple-600 text-white rounded hover:bg-purple-700 transition">
                            Manage Users
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>