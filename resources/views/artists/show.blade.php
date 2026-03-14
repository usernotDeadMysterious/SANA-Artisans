<x-app-layout>

    <div class="max-w-5xl mx-auto py-8">

        <h1 class="text-2xl font-bold mb-6">
            Artist Details
        </h1>

        <div class="grid md:grid-cols-3 gap-6">

            <!-- PROFILE CARD -->
            <div class="bg-white shadow rounded-xl p-6 text-center">

                @if($artist->profile_photo_path)
                    <img src="{{ asset('storage/' . $artist->profile_photo_path) }}"
                        class="w-60 h-60 mx-auto rounded-full mb-2 border">
                @else
                    <img src="{{ asset('images/placeholder.jpg')  }}"
                        class="w-60 h-60 mx-auto rounded-full object-cover mb-4 border">
                @endif

                <h2 class="text-lg font-semibold">{{ $artist->name }}</h2>
                <p class="text-gray-500 text-sm">{{ ucfirst($artist->gender) }}</p>

                <div class="mt-4 text-sm text-gray-600 flex flex-col items-start gap-3">
                    <p><strong>Trade: </strong>{{ $artist->trade }}</p>
                    <p><strong>Age:</strong> {{ $artist->age }}</p>
                    <p><strong>Contact:</strong> {{ $artist->contact }}</p>
                </div>

            </div>


            <!-- DETAILS CARD -->
            <div class="md:col-span-2 bg-white shadow rounded-xl p-6 space-y-5">



                <!-- SKILLS -->
                <div>
                    <p class="font-semibold mb-2">Skills</p>

                    <div class="flex flex-wrap gap-2">

                        @foreach(explode(',', $artist->specialization ?? '') as $skill)

                            @if(trim($skill) != '')
                                <span class="bg-indigo-100 text-indigo-700 text-xs px-3 py-1 rounded-full">
                                    {{ trim($skill) }}
                                </span>
                            @endif

                        @endforeach

                    </div>
                </div>



                <div class="flex flex-col gap-2">
                    <p class="font-semibold">Certifications</p>
                    @foreach($artist->certifications as $cert)

                        <p class="text-sm px-3 py-1 rounded-full flex w-full gap-2">
                            <span>{{ $cert->certification_name }}</span> -
                            <span>{{ $cert->certification_year }}</span>
                        </p>

                    @endforeach

                </div>
                <div>
                    <p class="font-semibold">Experience</p>
                    <p class="text-gray-600">
                        {{ $artist->experience }}
                    </p>
                </div>

                {{-- district --}}
                <div>
                    <p class="font-semibold">District</p>
                    <p class="text-gray-600">
                        {{ $artist->district }}
                    </p>
                </div>
                {{-- address --}}

                <div>
                    <p class="font-semibold">Address</p>
                    <p class="text-gray-600">
                        {{ $artist->address }}
                    </p>
                </div>


                <!-- CV ACTIONS -->
                @if($artist->cv_path)

                    <div class="pt-4 border-t">

                        <p class="font-semibold mb-2">CV</p>

                        <div class="flex gap-3">

                            <a href="{{ asset('storage/' . $artist->cv_path) }}" target="_blank"
                                class="bg-gray-700 text-white px-4 py-2 rounded-lg text-sm hover:bg-gray-800 transition">
                                View CV
                            </a>

                            <a href="{{ route('artists.cv', $artist) }}"
                                class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-blue-700 transition">
                                Download CV
                            </a>

                        </div>

                    </div>

                @endif

            </div>

        </div>

    </div>

</x-app-layout>