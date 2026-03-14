@extends('layouts.public')

@section('content')

    {{-- images rendering --}}
    @php
        $tradeImages = [
            'Beautification' => 'images/trades/Beautification.png',
            'Cooking' => 'images/trades/Cooking.png',
            'Tailoring' => 'images/trades/Tailoring.png',
            'Digital Skills' => 'images/trades/digiskills.png',
        ];

        $tradeImage = $tradeImages[$artist->trade] ?? null;
    @endphp

    <div class="w-full min-h-screen mx-auto px-4 sm:px-6 lg:px-8 py-14" style="
                                                                @if($tradeImage)
                                                                    background-image: url('{{ asset($tradeImage) }}');
                                                                    background-size: cover;
                                                                    background-position: center;
                                                                    background-repeat: no-repeat;
                                                                    background-attachment: fixed;
                                                                @endif
                                                            ">

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">

            {{-- PROFILE CARD --}}
            <div class=" backdrop-blur-xs bg-yellow-50/90  shadow-lg rounded-2xl p-8 text-center h-fit">

                <div class="flex justify-center mb-6">
                    @if($artist->profile_photo_path)
                        <img src="{{ asset('storage/' . $artist->profile_photo_path) }}"
                            class="w-56 h-56 rounded-full object-cover border-4 border-gray-500 bg-none shadow-md">

                    @else
                        <img src="{{ asset('images/placeholder.jpg') }}"
                            class="w-56 h-56 rounded-full object-cover border-4 border-yellow-200 shadow-lg bg-none">
                    @endif
                </div>

                <h2 class="text-2xl font-bold text-slate-800">
                    {{ $artist->name }}
                </h2>

                {{-- TRADE --}}
                <div class="mt-2  rounded-xl p-2 font-bold ">
                    <p class="text-sm text-black">
                        Trade - <span class="bg-yellow-100 text-yellow-800 px-4 py-1 rounded-full font-semibold">
                            {{ $artist->trade }}
                        </span>
                    </p>

                </div>

                <div class="mt-2 text-sm text-slate-900 space-y-2">

                    <p>
                        <span class="font-semibold text-gray-700">Contact:</span>
                        {{ $artist->contact }}
                    </p>

                    <p>
                        <span class="font-semibold text-gray-700">Email:</span>
                        {{ $artist->email }}
                    </p>

                    <p class="capitalize">
                        <span class="font-semibold text-gray-700">Gender:</span>
                        {{ $artist->gender }}
                    </p>

                    <p>
                        <span class="font-semibold text-gray-700">District:</span>
                        {{ $artist->district }}
                    </p>

                </div>

                {{-- CV BUTTONS --}}
                @if($artist->cv_path)

                    <div class="mt-6 space-y-3">

                        <a href="{{ asset('storage/' . $artist->cv_path) }}" target="_blank"
                            class="block bg-gray-800 hover:bg-gray-900 text-white py-2 rounded-lg font-medium transition">

                            View CV
                        </a>

                        <a href="{{ route('artists.cv', $artist) }}"
                            class="block bg-yellow-500 hover:bg-yellow-600 text-black py-2 rounded-lg font-semibold transition">

                            Download CV
                        </a>

                    </div>

                @endif

            </div>



            {{-- DETAILS SECTION --}}
            <div class="lg:col-span-2 shadow-lg rounded-2xl p-10 bg-yellow-50/90 backdrop-blur-xs">


                <h3 class="text-2xl  font-bold mb-4 border-b pb-2 text-yellow-900">
                    Details
                </h3>

                <div class="grid md:grid-cols-2 gap-6">

                    {{-- QUALIFICATION --}}
                    <div
                        class="bg-yellow-50/50 rounded-xl p-3 shadow-lg hover:backdrop-blur-xl hover:shadow-yellow-300 hover:shadow-md">
                        <p class="text-yellow-700 text-xs uppercase tracking-wide">
                            Qualification
                        </p>

                        <p class="text-gray-800 text-sm  p-2">
                            {{ $artist->qualification }}
                        </p>
                    </div>


                    {{-- Trade --}}
                    <div
                        class="bg-yellow-50/50 rounded-xl p-3 shadow-lg hover:backdrop-blur-xl hover:shadow-yellow-300 hover:shadow-md">
                        <p class="text-yellow-700 text-xs uppercase tracking-wide">
                            Trade
                        </p>

                        <p class="text-gray-800 text-sm p-2 capitalize">
                            {{ str_replace('_', ' ', $artist->trade) }}
                        </p>
                    </div>


                    {{-- SKILLS --}}
                    <div
                        class="bg-yellow-50/50 shadow-lg  rounded-xl p-3 hover:backdrop-blur-xl hover:shadow-yellow-300 hover:shadow-md">
                        <p class="text-yellow-600 text-xs uppercase tracking-wide ">
                            Skilled in
                        </p>

                        <div class="flex flex-col gap-2 mt-2">

                            @foreach(explode(',', $artist->specialization) as $skill)

                                <p class="  text-xs px-2 py-0 rounded-full m-0 ">
                                    {{ trim($skill) }}
                                </p>

                            @endforeach

                        </div>
                    </div>


                    {{-- CERTIFICATIONS --}}
                    <div
                        class=" rounded-xl p-3 bg-yellow-50/50 shadow-lg hover:backdrop-blur-xl hover:shadow-yellow-300 hover:shadow-md">

                        <p class="text-yellow-700 text-xs uppercase tracking-wide mb-2">
                            Certifications
                        </p>

                        @if($artist->certifications->count())

                            <div class="space-y-2">

                                @foreach($artist->certifications as $cert)

                                    <div class="flex justify-between p-2 rounded-lg ">

                                        <span class="text-sm ">
                                            {{ $cert->certification_name }}
                                        </span>

                                        <span class="text-gray-600">
                                            {{ $cert->certification_year }}
                                        </span>

                                    </div>

                                @endforeach

                            </div>

                        @else

                            <p class="text-gray-400 text-sm">
                                No certifications listed
                            </p>

                        @endif

                    </div>


                    {{-- DISTRICT --}}
                    <div
                        class=" rounded-xl p-3 bg-yellow-50/50 shadow-lg hover:backdrop-blur-xl hover:shadow-yellow-300 hover:shadow-md">
                        <p class="text-yellow-700 text-xs uppercase tracking-wide">
                            District
                        </p>

                        <p class=" text-sm p-2">
                            {{ $artist->district }}
                        </p>
                    </div>


                    {{-- ADDRESS --}}
                    <div
                        class="bg-yellow-50/50 rounded-xl p-3 shadow-lg hover:backdrop-blur-xl hover:shadow-yellow-300 hover:shadow-md">
                        <span class="text-yellow-700 text-xs uppercase tracking-wide">
                            Address
                        </span>

                        <p class="text-gray-800 text-sm  mt-1">
                            {{ $artist->address }}
                        </p>
                    </div>

                </div>


                {{-- EXPERIENCE --}}
                {{-- @if($artist->experience)

                <div class="mt-10 bg-gray-50 rounded-xl p-6">

                    <p class="text-gray-400 text-xs uppercase tracking-wide mb-2">
                        Experience
                    </p>

                    <p class="text-gray-700 leading-relaxed">
                        {{ $artist->experience }}
                    </p>

                </div>

                @endif --}}

            </div>

        </div>


        {{-- Back Button --}}
        <div class="w-full flex justify-end  p-4">
            <a href="https://jobs.sanaartisan.com/artisans"
                class="text-sm font-medium  bg-yellow-200 p-2 rounded-lg hover:text-yellow-800 hover:underline transition">
                ← Back to Artisans Directory
            </a>
        </div>

    </div>

    @include('frontend.footer')

@endsection