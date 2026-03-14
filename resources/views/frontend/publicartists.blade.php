@extends('layouts.public')

@section('content')

    <section class="relative bg-cover bg-center md:h-[90vh]" style="background-image:url('/images/artisans-hero.png')">

        <!-- overlay -->
        <div class="absolute inset-0 bg-black/50"></div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">

            <!-- HERO TEXT -->
            <div class="text-center text-white max-w-5xl mx-auto">

                <h1 class="text-4xl md:text-5xl font-bold mb-5 leading-tight">
                    Skilled <span class="text-yellow-400">Resource Persons</span> Directory
                </h1>

                <p class="text-lg text-gray-200 leading-relaxed ">
                    You can hire them. SANA has a pool of skilled resource persons in different
                    trades including <strong class="text-yellow-400">Tailoring, Embroidery, Beautification, Cooking and
                        Digital Skills</strong>.
                    All artisans are trained and certified from reputable institutes.
                </p>

            </div>

            <!-- SEARCH CARD -->
            <div class="mt-20 bg-white/75 backdrop-blur-xs rounded-2xl shadow-2xl p-6 md:p-8 max-w-6xl mx-auto ">

                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">

                    <h2 class="text-xl md:text-2xl font-semibold text-gray-800">
                        Find Skilled Resource Person
                    </h2>

                    <a href="/apply"
                        class="bg-yellow-500 hover:bg-yellow-600 text-black px-6 py-3 rounded-lg font-semibold transition text-center shadow-sm">
                        Get Registered
                    </a>

                </div>

                <!-- SEARCH FORM -->
                <form method="GET" action="{{ url('/artisans') }}" id="artisanFilterForm">

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

                        {{-- SEARCH (1/3 WIDTH) --}}
                        <div class="md:col-span-1">
                            <input type="text" name="search" placeholder="Search skilled resource person by name.."
                                value="{{ request('search') }}"
                                class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-yellow-400 focus:outline-none">
                        </div>


                        {{-- FILTERS (2/3 WIDTH) --}}
                        <div class="md:col-span-2 grid grid-cols-1 sm:grid-cols-3 gap-4">

                            <select id="tradeSelect" name="trade"
                                class="border rounded-lg p-3 w-full focus:ring-2 focus:ring-yellow-400">

                                <option value="">All Trades</option>

                                @foreach($trades as $trade)

                                    <option value="{{ $trade }}" {{ request('trade') == $trade ? 'selected' : '' }}>

                                        {{ $trade }}

                                    </option>

                                @endforeach

                            </select>

                            <select id="skillsDropdown" name="skill"
                                class="border rounded-lg p-3 w-full focus:ring-2 focus:ring-yellow-400">

                                <option value="">Select trade first</option>

                            </select>


                            <select name="gender" id="genderSelect"
                                class="border rounded-lg p-3 w-full focus:ring-2 focus:ring-yellow-400">

                                <option value="">Gender</option>

                                <option value="male" {{ request('gender') == 'male' ? 'selected' : '' }}>Male</option>

                                <option value="female" {{ request('gender') == 'female' ? 'selected' : '' }}>Female</option>

                                <option value="other" {{ request('gender') == 'other' ? 'selected' : '' }}>Other</option>

                            </select>

                        </div>

                    </div>


                    {{-- BUTTONS ROW --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">

                        <button type="submit"
                            class="bg-yellow-500/70 hover:bg-yellow-800 text-white rounded-lg p-3 font-semibold transition">

                            Search Name

                        </button>

                        <a href="{{ url('/artisans') }}"
                            class="bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-lg p-3 text-center font-semibold transition">

                            Clear Filters

                        </a>

                    </div>

                </form>

            </div>

        </div>

    </section>


    <!-- ARTISANS SECTION -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        @if(request()->hasAny(['search', 'trade', 'skill', 'gender']))
            <div class="mt-2 p-5 w-full flex text-sm text-gray-600" id="searchResults">
                Search results:
                <span class="text-black font-semibold ml-1">{{ $artists->total() }}</span>
                <span class="ml-1"> skilled resource persons found</span>
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

                        <div class="flex flex-col items-center text-center">
                            {{-- Trade --}}

                            <p class="text-sm font-semibold p-2 rounded-xl text-gray-800 text-center">
                                <span class="text-yellow-500">{{ $artist->trade }}</span>
                            </p>

                            <!-- SKILLS -->
                            <p class="text-sm font-semibold text-gray-400 text-center mt-0 p-2">
                                Skills
                            </p>


                            <div class="flex flex-wrap justify-center gap-1 mt-0">

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
                        </div>

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

    @if(true)
        <script>

            const tradeSkills = {

                "Tailoring": [
                    "Tailoring",
                    "Embroidery",
                    "Clothing Design",
                    "Alterations",
                    "Pattern Making"
                ],

                "Beautification": [
                    "Haircut",
                    "Makeup",
                    "Manicure",
                    "Pedicure",
                    "Facial",
                    "Hair Styling"
                ],

                "Cooking": [
                    "Cooking",
                    "Baking",
                    "Food Preparation",
                    "Catering",
                    "Kitchen Management"
                ],

                "Digital Skills": [
                    "Web Development",
                    "Graphic Design",
                    "Digital Marketing",
                    "SEO",
                    "Video Editing",
                    "Content Writing",
                    "Social Media Management",
                    "Photography",
                    "WordPress Development",
                    "React Development",
                    "Laravel Development"
                ]

            };


            const tradeSelect = document.getElementById("tradeSelect")
            const skillsDropdown = document.getElementById("skillsDropdown")
            const genderSelect = document.getElementById("genderSelect")
            const form = document.getElementById("artisanFilterForm")


            function loadSkills(trade) {

                skillsDropdown.innerHTML = ''

                if (!trade) {

                    let option = document.createElement("option")
                    option.value = ""
                    option.textContent = "Select trade first"

                    skillsDropdown.appendChild(option)

                    return

                }

                let defaultOption = document.createElement("option")
                defaultOption.value = ""
                defaultOption.textContent = "All Skills"

                skillsDropdown.appendChild(defaultOption)


                if (tradeSkills[trade]) {

                    tradeSkills[trade].forEach(skill => {

                        let option = document.createElement("option")

                        option.value = skill
                        option.textContent = skill

                        if (skill === "{{ request('skill') }}") {
                            option.selected = true
                        }

                        skillsDropdown.appendChild(option)

                    })

                }

            }
            // load skills if trade already selected
            document.addEventListener("DOMContentLoaded", function () {

                if (tradeSelect.value) {
                    loadSkills(tradeSelect.value)
                }

            })


            // TRADE CHANGE → AUTO SEARCH
            tradeSelect.addEventListener("change", function () {

                loadSkills(this.value)
                form.submit()

            })


            // SKILL CHANGE → AUTO SEARCH
            skillsDropdown.addEventListener("change", function () {

                form.submit()

            })


            // GENDER CHANGE → AUTO SEARCH
            genderSelect.addEventListener("change", function () {

                form.submit()

            })
            document.addEventListener("DOMContentLoaded", function () {

                if (tradeSelect.value) {
                    loadSkills(tradeSelect.value)
                } else {
                    loadSkills('')
                }

            })



            // SCROLL TO RESULTS AFTER FILTER
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