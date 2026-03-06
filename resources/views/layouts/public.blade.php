<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>SANA </title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50 font-sans">

    <!-- Top Navbar -->
    <header class="bg-white shadow">

        <div class="max-w-7xl mx-auto px-6">

            <div class="flex items-center justify-between h-16">

                {{-- LOGO --}}
                <a href="https://sanaartisan.com/" class="flex items-center">
                    <img src="{{ asset('images/sana-logo.jpeg') }}" class="h-10 w-auto">
                </a>


                {{-- DESKTOP MENU --}}
                <nav class="hidden lg:flex items-center gap-6 text-sm font-medium">

                    <a href="/" class="text-gray-700 hover:text-black">Home</a>

                    <a href="#" class="text-gray-700 hover:text-black">
                        About Us
                    </a>

                    <a href="#" class="text-gray-700 hover:text-black">
                        Programs
                    </a>

                    <a href="/apply" class="text-gray-700 hover:text-black">
                        Apply for training
                    </a>

                    <a href="#" class="text-gray-700 hover:text-black">
                        Workshops
                    </a>

                    <a href="#" class="text-gray-700 hover:text-black">
                        Events
                    </a>

                    <a href="/artisans"
                        class="px-3 py-1 border border-gray-800 text-gray-800 rounded hover:bg-gray-100">
                        Artisans
                    </a>

                    <a href="#" class="text-gray-700 hover:text-black">
                        Products
                    </a>

                    <a href="#" class="text-gray-700 hover:text-black">
                        Contact
                    </a>

                    {{-- CART --}}
                    <button class="text-xl">
                        🛒
                    </button>

                </nav>


                {{-- MOBILE ICONS --}}
                <div class="flex items-center gap-4 lg:hidden">

                    {{-- CART --}}
                    <button class="text-xl">
                        🛒
                    </button>

                    {{-- MENU BUTTON --}}
                    <button id="menuBtn" class="text-2xl">
                        ☰
                    </button>

                </div>

            </div>

        </div>


        {{-- MOBILE MENU --}}
        <div id="mobileMenu" class="hidden lg:hidden bg-white border-t">

            <div class="px-10 py-6 space-y-3 text-md  ">

                <a href="/" class="block text-slate-700 hover:text-yellow-300">Home</a>

                <a href="#" class="block text-slate-700 hover:text-yellow-300">About Us</a>

                <a href="#" class="block hover:text-black">Programs</a>

                <a href="/apply" class="block text-slate-700 hover:text-yellow-300">
                    Apply for training
                </a>

                <a href="#" class="block text-slate-700 hover:text-yellow-300">Workshops</a>

                <a href="#" class="block text-slate-700 hover:text-yellow-300">Events</a>

                <a href="/artisans" class="block font-semibold text-slate-700 hover:text-yellow-300">
                    Artisans
                </a>

                <a href="#" class="block text-slate-700 hover:text-yellow-300">Products</a>

                <a href="#" class="block text-slate-700 hover:text-yellow-300">Contact</a>

            </div>

        </div>

    </header>

    <main>
        @yield('content')
    </main>


    <script>

        document.getElementById("menuBtn").onclick = function () {

            const menu = document.getElementById("mobileMenu");

            menu.classList.toggle("hidden");

        };

    </script>

</body>

</html>