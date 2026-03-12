@extends('layouts.public')

@section('content')

    <section class="relative bg-cover bg-center md:h-[90vh]" style="background-image:url('/images/artisans-hero.png')">

        <!-- overlay -->
        <div class="absolute inset-0 bg-black/70"></div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">

            <!-- HERO TEXT -->
            <div class="text-center text-white max-w-3xl mx-auto">

                <h1 class="text-4xl md:text-5xl font-bold mb-5 leading-tight">
                    Skilled Artisans Directory
                </h1>

                <p class="text-lg text-gray-200 leading-relaxed">
                    You can hire them. SANA has a pool of skilled resource persons in different
                    trades including <strong>Tailoring, Embroidery, Beautification, Cooking and Digital Skills</strong>.
                    All artisans are trained and certified from reputable institutes.
                </p>

            </div>

            <!-- SEARCH CARD -->
            <div class="mt-20 bg-white rounded-2xl shadow-2xl p-6 md:p-8 max-w-6xl mx-auto ">

                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">

                    <h2 class="text-xl md:text-2xl font-semibold text-gray-800">
                        Find Skilled Artisans
                    </h2>

                    <a href="/apply"
                        class="bg-yellow-500 hover:bg-yellow-600 text-black px-6 py-3 rounded-lg font-semibold transition text-center shadow-sm">
                        Register as Artisan
                    </a>

                </div>

                <!-- SEARCH FORM -->
                <form method="GET">

                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">

                        <input type="text" name="search" placeholder="Search artisans..." value="{{ request('search') }}"
                            class="border rounded-lg p-3 w-full focus:ring-2 focus:ring-yellow-400 focus:outline-none">

                        <select name="category" class="border rounded-lg p-3 w-full focus:ring-2 focus:ring-yellow-400">

                            <option value="">All Categories</option>

                            @foreach($categories as $cat)
                                <option value="{{ $cat }}" {{ request('category') == $cat ? 'selected' : '' }}>
                                    {{ $cat }}
                                </option>
                            @endforeach

                        </select>

                        <select name="gender" class="border rounded-lg p-3 w-full focus:ring-2 focus:ring-yellow-400">

                            <option value="">Gender</option>

                            <option value="male" {{ request('gender') == 'male' ? 'selected' : '' }}>Male</option>
                            <option value="female" {{ request('gender') == 'female' ? 'selected' : '' }}>Female</option>
                            <option value="other" {{ request('gender') == 'other' ? 'selected' : '' }}>Other</option>

                        </select>

                        <button class="bg-black hover:bg-gray-800 text-white rounded-lg p-3 font-semibold transition">
                            Search
                        </button>

                    </div>

                </form>



            </div>

        </div>

    </section>


    <!-- ARTISANS SECTION -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        @if(request()->hasAny(['search', 'category', 'gender']))
            <div class="mt-2 p-5 w-full flex text-sm text-gray-600" id="searchResults">
                Search results: <strong class="text-black">{{  $artists->total() }} </strong> artisans found
            </div>
        @endif

        <!-- GRID -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">

            @foreach($artists as $artist)

                <div
                    class="bg-white rounded-2xl shadow-md hover:shadow-xl transition duration-300 overflow-hidden flex flex-col">

                    <div class="p-6 flex flex-col flex-grow">

                        <!-- IMAGE -->
                        <div class="flex justify-center mb-5">

                            @php
                                $image = $artist->profile_photo_path
                                    ? asset('storage/' . $artist->profile_photo_path)
                                    : asset('images/placeholder.jpg');
                            @endphp

                            <img src="{{ $image }}"
                                class="w-28 h-28 rounded-full object-cover border-4 border-yellow-100 shadow-sm">

                        </div>

                        <!-- NAME -->
                        <h3 class="text-lg font-semibold text-gray-800 text-center">
                            {{ $artist->name }}
                        </h3>

                        <!-- SKILLS -->
                        <div class="flex flex-wrap justify-center gap-1 mt-3">

                            @foreach(explode(',', $artist->specialization) as $skill)

                                <span class="bg-yellow-100 text-yellow-800 text-xs px-2 py-1 rounded-full">
                                    {{ trim($skill) }}
                                </span>

                            @endforeach

                        </div>

                        <!-- CONTACT -->
                        <p class="text-sm text-gray-600 text-center mt-4">
                            Contact: {{ $artist->contact }}
                        </p>

                        <!-- GENDER -->
                        <p class="text-xs text-gray-500 text-center capitalize mt-1">
                            {{ $artist->gender }}
                        </p>

                        <!-- BUTTON -->
                        <a href="{{ route('public.artisan.detail', $artist->id) }}"
                            class="mt-6 text-center bg-yellow-400 hover:bg-yellow-500 text-gray-800 py-2 rounded-lg text-sm font-medium transition">

                            Read Full Details

                        </a>

                    </div>

                </div>

            @endforeach

        </div>

        <!-- PAGINATION -->
        <div class="mt-16 flex justify-center">
            {{ $artists->withQueryString()->links() }}
        </div>

    </section>

    @include('frontend.footer')

    @if(request()->hasAny(['search', 'category', 'gender']))
        <script>
            document.addEventListener("DOMContentLoaded", function () {

                const results = document.getElementById("searchResults");

                if (results) {
                    results.scrollIntoView({
                        behavior: "smooth",
                        block: "start"
                    });
                }

            });
        </script>
    @endif

@endsection