<x-app-layout>

    <div class="space-y-10">

        <h1 class="text-3xl font-bold">Dashboard</h1>

        <!-- Stats Cards -->
        <div class="grid grid-cols-4 gap-6">

            <div class="bg-white p-6 rounded shadow">
                <p class="text-gray-500">Total Artists</p>
                <h2 class="text-3xl font-bold mt-2">{{ $total }}</h2>
            </div>

            <div class="bg-yellow-100 p-6 rounded shadow">
                <p class="text-gray-600">Pending</p>
                <h2 class="text-3xl font-bold mt-2">{{ $pending }}</h2>
            </div>

            <div class="bg-green-100 p-6 rounded shadow">
                <p class="text-gray-600">Approved</p>
                <h2 class="text-3xl font-bold mt-2">{{ $approved }}</h2>
            </div>

            <div class="bg-red-100 p-6 rounded shadow">
                <p class="text-gray-600">Rejected</p>
                <h2 class="text-3xl font-bold mt-2">{{ $rejected }}</h2>
            </div>

        </div>

        <!-- Current Status Breakdown -->
        <div class="grid grid-cols-3 gap-6">

            <div class="bg-white p-6 rounded shadow">
                <p class="text-gray-500">Own Business</p>
                <h2 class="text-2xl font-bold mt-2">{{ $own_business }}</h2>
            </div>

            <div class="bg-white p-6 rounded shadow">
                <p class="text-gray-500">Employee</p>
                <h2 class="text-2xl font-bold mt-2">{{ $employee }}</h2>
            </div>

            <div class="bg-white p-6 rounded shadow">
                <p class="text-gray-500">Other</p>
                <h2 class="text-2xl font-bold mt-2">{{ $other_status }}</h2>
            </div>

        </div>

        <!-- Recent Artists -->
        <div class="bg-white rounded shadow p-6">

            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-bold">Recently Added Artists</h2>

                <a href="{{ route('artists.index') }}" class="text-blue-600 underline">
                    View All
                </a>
            </div>

            <table class="w-full text-sm">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="p-3 text-left">Name</th>
                        <th class="p-3">Status</th>
                        <th class="p-3">Approval</th>
                        <th class="p-3">Created</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($recent as $artist)
                        <tr class="border-t">
                            <td class="p-3">{{ $artist->name }}</td>
                            <td class="p-3 text-center">
                                {{ str_replace('_', ' ', $artist->current_status) }}
                            </td>
                            <td class="p-3 text-center">

                                @if($artist->approval_status == 'approved')
                                    <span class="bg-green-500 text-black px-2 py-1 text-xs rounded">
                                        Approved
                                    </span>
                                @elseif($artist->approval_status == 'pending')
                                    <span class="bg-yellow-500 text-white px-2 py-1 text-xs rounded">
                                        Pending
                                    </span>
                                @else
                                    <span class="bg-red-500 text-white px-2 py-1 text-xs rounded">
                                        Rejected
                                    </span>
                                @endif

                            </td>
                            <td class="p-3 text-center">
                                {{ $artist->created_at->diffForHumans() }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="p-4 text-center text-gray-500">
                                No artists yet.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>

    </div>

</x-app-layout>