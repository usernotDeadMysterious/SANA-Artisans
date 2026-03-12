@extends('layouts.public')

@section('content')

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">


        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">

            {{-- PROFILE CARD --}}
            <div class="bg-white shadow-xl rounded-2xl p-8 text-center h-fit">

                <div class="flex justify-center mb-6">
                    @if($artist->profile_photo_path)
                        <img src="{{ asset('storage/' . $artist->profile_photo_path) }}"
                            class="w-60 h-60 mx-auto rounded-full object-cover mb-4 border">
                    @else
                        <img src="{{ asset('images/placeholder.jpg')  }}"
                            class="w-60 h-60 mx-auto rounded-full object-cover mb-4 border">
                    @endif
                </div>

                <h2 class="text-2xl font-bold text-gray-800">
                    {{ $artist->name }}
                </h2>

                {{-- Trade --}}
                <div class="flex flex-wrap justify-center gap-2 mt-4">

                    Trade

                </div>

                <div class="mt-6 text-sm text-gray-600 space-y-2">

                    <p>
                        <span class="font-semibold">Contact:</span>
                        {{ $artist->contact }}
                    </p>

                    <p>
                        <span class="font-semibold">Email:</span>
                        {{ $artist->email }}
                    </p>

                    <p class="capitalize">
                        <span class="font-semibold">Gender:</span>
                        {{ $artist->gender }}
                    </p>

                </div>

                @if($artist->cv_path)

                    <div class="mt-6 space-y-3">

                        <a href="{{ asset('storage/' . $artist->cv_path) }}" target="_blank"
                            class="block bg-gray-700 hover:bg-gray-800 text-white py-2 rounded-lg font-medium transition">

                            View CV

                        </a>

                        <a href="{{ route('artists.cv', $artist) }}"
                            class="block bg-yellow-500 hover:bg-yellow-600 text-black py-2 rounded-lg font-semibold transition">

                            Download CV

                        </a>

                    </div>

                @endif

            </div>


            {{-- DETAILS CARD --}}
            <div class="lg:col-span-2 bg-white shadow-xl rounded-2xl p-10">

                <h3 class="text-2xl font-bold mb-8 border-b pb-4">
                    Artisan Details
                </h3>

                <div class="grid md:grid-cols-2 gap-6">

                    {{-- Qualification --}}
                    <div class="bg-gray-50 rounded-lg p-4">
                        <p class="text-gray-400 text-xs uppercase tracking-wide">
                            Qualification
                        </p>

                        <p class="text-gray-800 text-lg font-semibold mt-1">
                            {{ $artist->qualification }}
                        </p>
                    </div>


                    {{-- Current Status --}}
                    {{-- <div class="bg-gray-50 rounded-lg p-4">
                        <p class="text-gray-400 text-xs uppercase tracking-wide">
                            Current Status
                        </p>

                        <p class="text-gray-800 text-lg font-semibold mt-1 capitalize">
                            {{ str_replace('_', ' ', $artist->current_status) }}
                        </p>
                    </div> --}}



                    {{-- Skills --}}
                    <div class="bg-gray-50 rounded-lg p-4">
                        <p class="text-gray-400 text-xs uppercase tracking-wide">
                            Skills
                        </p>
                        @foreach(explode(',', $artist->specialization) as $skill)

                            <ul class="text-black text-xs  py-1 rounded-full  ">
                                {{ trim($skill) }}
                            </ul>

                        @endforeach
                    </div>
                    {{-- Certifications --}}
                    <div class="bg-gray-50 rounded-lg p-4">

                        <p class="text-gray-400 text-xs uppercase tracking-wide">
                            Certifications
                        </p>

                        <div class="flex flex-wrap gap-2 mt-2">

                            @if($artist->certification)

                                @foreach($artist->certification as $cert)

                                    <span class="bg-gray-200 text-gray-700 text-xs px-3 py-1 rounded-full">
                                        {{ $cert }}
                                    </span>

                                @endforeach

                            @endif

                        </div>

                    </div>

                    {{-- District --}}
                    <div class="bg-gray-50 rounded-lg p-4">
                        <p class="text-gray-400 text-xs uppercase tracking-wide">
                            District
                        </p>

                        <p class="text-gray-800 text-lg font-semibold mt-1">
                            {{ $artist->address }}
                        </p>
                    </div>

                    {{-- Address --}}
                    <div class="bg-gray-50 rounded-lg p-4">
                        <p class="text-gray-400 text-xs uppercase tracking-wide">
                            Address
                        </p>

                        <p class="text-gray-800 text-lg font-semibold mt-1">
                            {{ $artist->address }}
                        </p>
                    </div>

                </div>


                {{-- EXPERIENCE --}}
                {{-- <div class="mt-8 bg-gray-50 rounded-lg p-6">

                    <p class="text-gray-400 text-xs uppercase tracking-wide mb-2">
                        Experience
                    </p>

                    <p class="text-gray-700 leading-relaxed">
                        {{ $artist->experience }}
                    </p>

                </div> --}}

            </div>

        </div>

    </div>

    @include('frontend.footer')

@endsection