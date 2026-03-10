@extends('layouts.public')

@section('content')

    <div
        class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 {{ request()->hasAny(['search', 'category', 'gender']) ? 'py-6' : 'py-12' }}">

        {{-- HEADER --}}
        <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4 mb-6">

            <h1 class="text-2xl md:text-3xl font-bold">
                Artisans Directory
            </h1>

            <a href="/apply"
                class="bg-yellow-500 hover:bg-yellow-600 text-black px-5 py-2 rounded-lg font-semibold text-center w-full md:w-auto transition">
                Register as Artisan
            </a>

        </div>


        {{-- SEARCH + FILTERS --}}
        <form method="GET" class="bg-white shadow-sm border rounded-xl p-4 md:p-5 mb-8">

            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">

                {{-- SEARCH --}}
                <input type="text" name="search" placeholder="Search artisans..." value="{{ request('search') }}"
                    class="border rounded-lg p-3 w-full focus:ring-2 focus:ring-yellow-400 focus:outline-none">

                {{-- CATEGORY --}}
                <select name="category" class="border rounded-lg p-3 w-full focus:ring-2 focus:ring-yellow-400">
                    <option value="">All Categories</option>

                    @foreach($categories as $cat)
                        <option value="{{ $cat }}" {{ request('category') == $cat ? 'selected' : '' }}>
                            {{ $cat }}
                        </option>
                    @endforeach
                </select>

                {{-- GENDER --}}
                <select name="gender" class="border rounded-lg p-3 w-full focus:ring-2 focus:ring-yellow-400">
                    <option value="">Gender</option>
                    <option value="male" {{ request('gender') == 'male' ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ request('gender') == 'female' ? 'selected' : '' }}>Female</option>
                    <option value="other" {{ request('gender') == 'other' ? 'selected' : '' }}>Other</option>
                </select>

                {{-- SEARCH BUTTON --}}
                <button class="bg-black hover:bg-gray-800 text-white rounded-lg p-3 font-semibold transition">
                    Search
                </button>

            </div>

        </form>


        {{-- SEARCH RESULT COUNT --}}
        @if(request()->hasAny(['search', 'category', 'gender']))
            <div class="mb-6 text-sm text-gray-600" id="searchResults">
                Search results:
                <strong class="text-black">{{ $artists->total() }}</strong>
                artisans found
            </div>
        @endif


        {{-- ARTISANS GRID --}}
        <div class="grid grid-cols-1 md:grid-cols-4 lg:grid-cols-4 xl:grid-cols-4 gap-6">

            @foreach($artists as $artist)

                <div
                    class="bg-white shadow-md hover:shadow-xl transition rounded-xl overflow-hidden p-4 xs:p-2 flex flex-col justify-between h-full">

                    {{-- TOP CONTENT --}}
                    <div class="">


                        {{-- IMAGE --}}
                        <div class="flex justify-center mb-4">

                            @php
                                $image = $artist->profile_photo_path
                                    ? asset('storage/' . $artist->profile_photo_path)
                                    : asset('images/placeholder.jpg');
                            @endphp

                            <img src="{{ $image }}" class="w-50 h-50 rounded-full object-cover  ">

                        </div>

                        <div class="text-left">

                            {{-- NAME --}}
                            <h3 class="text-lg font-semibold text-gray-800">
                                {{ $artist->name }}
                            </h3>

                            {{-- SKILLS --}}
                            <div class="flex flex-wrap gap-1 mt-2">
                                @foreach(explode(',', $artist->specialization) as $skill)
                                    <span class="bg-yellow-100 text-yellow-800 text-xs px-2 py-1 rounded-full">
                                        {{ trim($skill) }}
                                    </span>
                                @endforeach
                            </div>

                            {{-- CONTACT --}}
                            <p class="text-xs text-gray-600 mt-3">
                                Contact: {{ $artist->contact }}
                            </p>

                            {{-- GENDER --}}
                            <p class="text-xs text-gray-500 capitalize mt-1">
                                {{ $artist->gender }}
                            </p>

                        </div>

                    </div>

                    {{-- BUTTON AT BOTTOM --}}
                    <a href="{{ route('public.artisan.detail', $artist->id) }}"
                        class="mt-5 w-full text-center bg-yellow-400 hover:bg-yellow-500 text-gray-800 py-2 rounded-lg text-sm font-medium transition">

                        Read Full Details

                    </a>

                </div>

            @endforeach

        </div>


        {{-- PAGINATION --}}
        <div class="mt-12 flex justify-center">
            {{ $artists->withQueryString()->links() }}
        </div>

    </div>
    @include('frontend.footer')
    @if(request()->hasAny(['search', 'category', 'gender']))
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                const results = document.getElementById("searchResults");
                if (results) {
                    results.scrollIntoView({ behavior: "smooth", block: "start" });
                }
            });
        </script>
    @endif
@endsection