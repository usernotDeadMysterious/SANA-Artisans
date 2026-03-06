<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-gray-100">

    <!-- MOBILE HEADER -->
    <div class="lg:hidden flex items-center justify-between bg-gray-900 text-white px-4 py-3">
        <h2 class="font-bold">Admin Panel</h2>

        <button onclick="toggleSidebar()" class="text-2xl">
            ☰
        </button>
    </div>


    <div class="flex min-h-screen">

        <!-- SIDEBAR -->
        @auth
            <aside id="sidebar" class="fixed lg:static inset-y-0 left-0 z-40
                                w-64 bg-gray-900 text-white p-6 space-y-6
                                transform -translate-x-full lg:translate-x-0
                                transition duration-200 ease-in-out">

                <h2 class="text-xl font-bold border-b border-gray-700 pb-4">
                    Admin Panel
                </h2>

                <nav class="space-y-2">

                    <a href="{{ route('dashboard') }}" class="block px-4 py-2 rounded-lg hover:bg-gray-800 transition">
                        Dashboard
                    </a>

                    <a href="{{ route('artists.index') }}" class="block px-4 py-2 rounded-lg hover:bg-gray-800 transition">
                        Artists
                    </a>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="w-full text-left px-4 py-2 rounded-lg hover:bg-red-600 transition">
                            Logout
                        </button>
                    </form>

                </nav>

            </aside>
        @endauth


        <!-- PAGE CONTENT -->
        <main class="flex-1 pt-8 lg:m-2">

            {{ $slot }}

        </main>

    </div>


    <!-- MOBILE OVERLAY -->
    <div id="overlay" onclick="toggleSidebar()" class="fixed inset-0 bg-black/40 hidden z-30 lg:hidden">
    </div>


    <script>

        function toggleSidebar() {

            const sidebar = document.getElementById('sidebar')
            const overlay = document.getElementById('overlay')

            sidebar.classList.toggle('-translate-x-full')
            overlay.classList.toggle('hidden')

        }

    </script>

</body>

</html>