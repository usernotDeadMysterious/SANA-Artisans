@extends('layouts.public')

@section('content')

    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white py-16">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <h1 class="text-4xl font-bold mb-4">
                Discover Professional Artists
            </h1>
            <p class="text-lg opacity-90">
                Browse verified and approved artists.
            </p>
        </div>
    </section>

    <!-- Artist Grid -->
    <section class="max-w-7xl mx-auto px-6 py-16">

        @if($artists->count())

            <div class="grid grid-cols-3 gap-8">

                @foreach($artists as $artist)
                    <div class="bg-white rounded-xl shadow hover:shadow-lg transition overflow-hidden">

                        <div class="h-56 bg-gray-200">
                            @if($artist->profile_photo_path)
                                <img src="{{ asset('storage/' . $artist->profile_photo_path) }}" class="w-full h-full object-cover">
                            @else
                                <div class="flex items-center justify-center h-full text-gray-400">
                                    No Image
                                </div>
                            @endif
                        </div>

                        <div class="p-6 space-y-2">
                            <h2 class="text-xl font-semibold">
                                {{ $artist->name }}
                            </h2>

                            <p class="text-gray-600 text-sm">
                                {{ $artist->specialization }}
                            </p>

                            <div class="text-sm text-gray-500 pt-2">
                                {{ str_replace('_', ' ', $artist->current_status) }}
                            </div>
                        </div>

                    </div>
                @endforeach

            </div>

            <div class="mt-12">
                {{ $artists->links() }}
            </div>

        @else

            <div class="text-center text-gray-500 py-20">
                No approved artists available yet.
            </div>

        @endif

    </section>

@endsection