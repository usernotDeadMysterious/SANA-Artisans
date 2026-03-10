<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SANA - Skills Academy for Needy Aspirants</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50 font-sans">

    <!-- Top Navbar -->
    <header class="bg-white shadow">

        <div class="w-full h-35 mx-auto px-6">

            <div class="flex items-center justify-between h-[140px] ">

                {{-- LOGO --}}
                <a href="https://sanaartisan.com/" class="flex items-center">
                    <img src="{{ asset('images/sana-logo.png') }}" class="h-[100px] w-[auto] mb-2">
                </a>


                {{-- DESKTOP MENU --}}
                <nav class="hidden lg:flex items-center gap-10 text-md font-normal  ">

                    <a href="https://sanaartisan.com" class="text-gray-700 hover:text-black">Home</a>

                    <a href="https://sanaartisan.com/about/" class="text-gray-700 hover:text-black">
                        About Us
                    </a>

                    <a href="https://sanaartisan.com/team/" class="text-gray-700 hover:text-black">
                        Team
                    </a>



                    <a href="https://sanaartisan.com/programs/" class="text-gray-700 hover:text-black">
                        Programs
                    </a>

                    <a href="https://sanaartisan.com/apply-for-training/" class="text-gray-700 hover:text-black">
                        Training
                    </a>

                    <a href="https://sanaartisan.com/workshops/" class="text-gray-700 hover:text-black">
                        Workshops
                    </a>

                    <a href="https://sanaartisan.com/events/" class="text-gray-700 hover:text-black">
                        Events
                    </a>

                    <a href="https://jobs.sanaartisan.com/artisans" class="  text-gray-800 rounded hover:bg-gray-100">
                        Artisans
                    </a>

                    <a href="https://sanaartisan.com/products/" class="text-gray-700 hover:text-black">
                        Products
                    </a>

                    <a href="https://sanaartisan.com/contact/" class="text-gray-700 hover:text-black">
                        Contact
                    </a>

                    {{-- CART --}}
                    <a href="https://sanaartisan.com/cart/" class="text-xl">
                        <img src="{{ asset('images/cart.svg') }}" alt="" class="w-6 h-6">
                    </a>

                </nav>


                {{-- MOBILE ICONS --}}
                <div class="flex items-center gap-8 lg:hidden">

                    {{-- CART --}}
                    <a href="https://sanaartisan.com/cart/" class="text-xl">
                        <img src="{{ asset('images/cart.svg') }}" alt="" class="w-6 h-6">
                    </a>

                    {{-- MENU BUTTON --}}
                    <button id="menuBtn" class="text-2xl">
                        ☰
                    </button>

                </div>

            </div>

        </div>


        {{-- MOBILE MENU --}}
        <div id="mobileMenu" class="hidden lg:hidden bg-white border-t">

            <div class="px-10 py-6 space-y-6 text-md font-medium ">

                <a href="https://sanaartisan.com" class="block text-slate-700 hover:text-yellow-300 ">Home</a>

                <a href="https://sanaartisan.com/about/" class="block text-slate-700 hover:text-yellow-300">About Us</a>

                <a href="https://sanaartisan.com/programs/" class="block hover:text-black">Programs</a>

                <a href="https://sanaartisan.com/apply-for-training/"
                    class="block text-slate-700 hover:text-yellow-300">
                    Training
                </a>

                <a href="https://sanaartisan.com/workshops/"
                    class="block text-slate-700 hover:text-yellow-300">Workshops</a>

                <a href="https://sanaartisan.com/events/" class="block text-slate-700 hover:text-yellow-300">Events</a>

                <a href="https://jobs.sanaartisan.com/artisans"
                    class="block font-semibold text-slate-700 hover:text-yellow-300 border p-2  rounded-md shadow-sm">
                    Artisans
                </a>

                <a href="https://sanaartisan.com/products/"
                    class="block text-slate-700 hover:text-yellow-300">Products</a>

                <a href="https://sanaartisan.com/contact/"
                    class="block text-slate-700 hover:text-yellow-300">Contact</a>

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