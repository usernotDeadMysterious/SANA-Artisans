<x-app-layout>
    <div class="w-full max-w-7xl mx-auto py-8 px-4">

        <div class="flex justify-between mb-6">
            <h1 class="text-2xl font-bold">Artists</h1>

            <a href="{{ route('artists.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">
                + Create Artist
            </a>
        </div>

        {{-- for search bar and search filters --}}
        <form method="GET" action="{{ route('artists.index') }}"
            class="bg-white shadow-md rounded-lg p-4 mb-4 border flex flex-col md:flex-row md:items-center gap-3">

            <!-- Search -->
            <input type="text" name="search" placeholder="Search by name..." value="{{ request('search') }}"
                class="border rounded px-3 py-2 w-full md:w-1/3 focus:outline-none focus:ring focus:border-blue-300">

            <!-- Approval Filter -->
            <select name="approval"
                class="border rounded px-3 py-2 w-full md:w-1/4 focus:outline-none focus:ring focus:border-blue-300">
                <option value="">All Approval</option>
                <option value="pending" {{ request('approval') == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="approved" {{ request('approval') == 'approved' ? 'selected' : '' }}>Approved</option>
                <option value="rejected" {{ request('approval') == 'rejected' ? 'selected' : '' }}>Rejected</option>
            </select>

            <!-- Gender Filter -->
            <select name="gender"
                class="border rounded px-3 py-2 w-full md:w-1/4 focus:outline-none focus:ring focus:border-blue-300">
                <option value="">All Gender</option>
                <option value="male" {{ request('gender') == 'male' ? 'selected' : '' }}>Male</option>
                <option value="female" {{ request('gender') == 'female' ? 'selected' : '' }}>Female</option>
                <option value="other" {{ request('gender') == 'other' ? 'selected' : '' }}>Other</option>
            </select>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Filter
            </button>
            <a href="{{ route('artists.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                Reset
            </a>

        </form>


        @if(session('success'))
            <div class="bg-green-200 p-3 mb-4 rounded">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white shadow-lg rounded-xl overflow-x-auto border">
            <table class="min-w-full text-sm">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="p-3">ID</th>
                        <th class="p-3 text-left">Name</th>
                        <th class="p-3">Age</th>
                        <th class="p-3">Gender</th>
                        <th class="p-3">Contact</th>
                        <th class="p-3">Status</th>
                        <th class="p-3">Approval</th>
                        <th class="p-3">CV</th>
                        <th class="p-3">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($artists as $artist)
                        <tr class="border-t hover:bg-gray-50 transition">
                            <td class="p-3 text-center">{{ $artist->id }}</td>
                            <td class="p-3">{{ $artist->name }}</td>
                            <td class="p-3 text-center">{{ $artist->age }}</td>
                            <td class="p-3 text-center">{{ ucfirst($artist->gender) }}</td>
                            <td class="p-3 text-center">{{ $artist->contact }}</td>
                            <td class="p-3 text-center">
                                {{ str_replace('_', ' ', $artist->current_status) }}
                            </td>

                            <!-- Approval Badge -->
                            <td class="p-3 text-center">
                                @if($artist->approval_status == 'approved')
                                    <span class="bg-green-500 text-black px-2 py-1 rounded text-xs">
                                        Approved
                                    </span>
                                @elseif($artist->approval_status == 'pending')
                                    <span class="bg-yellow-500 text-black px-2 py-1 rounded text-xs">
                                        Pending
                                    </span>
                                @else
                                    <span class="bg-red-500 text-black px-2 py-1 rounded text-xs">
                                        Rejected
                                    </span>
                                @endif
                            </td>

                            <!-- CV -->
                            <td class="p-3 text-center">
                                @if($artist->cv_path)

                                    <a href="{{ route('artists.cv', $artist) }}"
                                        class="inline-block px-3 py-1 text-xs font-medium text-white bg-purple-600 rounded hover:bg-purple-700 transition">
                                        Download CV
                                    </a>

                                @else
                                    <span class="text-gray-400 text-xs">No CV</span>
                                @endif
                            </td>

                            <!-- Actions -->
                            <td class="p-3 text-center">
                                <div class="flex flex-wrap md:flex-nowrap justify-center gap-2">

                                    <!-- VIEW -->
                                    <a href="{{ route('artists.show', $artist) }}"
                                        class="px-3 py-1 text-xs font-medium text-white bg-indigo-600 rounded hover:bg-indigo-700 transition">
                                        View
                                    </a>

                                    <!-- EDIT -->
                                    <a href="{{ route('artists.edit', $artist) }}"
                                        class="px-3 py-1 text-xs font-medium text-white bg-blue-600 rounded hover:bg-blue-700 transition">
                                        Edit
                                    </a>

                                    <!-- DELETE -->
                                    <form action="{{ route('artists.destroy', $artist) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('Delete artist?')"
                                            class="px-3 py-1 text-xs font-medium text-white bg-red-600 rounded hover:bg-red-700 transition">
                                            Delete
                                        </button>
                                    </form>

                                    @if($artist->approval_status == 'pending')

                                        <!-- APPROVE -->
                                        <form method="POST" action="{{ route('artists.approve', $artist) }}">
                                            @csrf
                                            @method('PATCH')
                                            <button
                                                class="px-3 py-1 text-xs font-medium text-white bg-green-600 rounded hover:bg-green-700 transition">
                                                Approve
                                            </button>
                                        </form>

                                        <!-- REJECT -->
                                        <form method="POST" action="{{ route('artists.reject', $artist) }}">
                                            @csrf
                                            @method('PATCH')
                                            <button
                                                class="px-3 py-1 text-xs font-medium text-white bg-yellow-500 rounded hover:bg-yellow-600 transition">
                                                Reject
                                            </button>
                                        </form>

                                    @endif

                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            {{ $artists->withQueryString()->links() }}
        </div>

    </div>
    {{--
    <script>
        document.addEventListener("DOMContentLoaded", function () {

            const searchInput = document.getElementById("searchInput");
            const approvalFilter = document.getElementById("approvalFilter");
            const genderFilter = document.getElementById("genderFilter");

            const rows = document.querySelectorAll("tbody tr");

            function filterTable() {
                const search = searchInput.value.toLowerCase();
                const approval = approvalFilter.value.toLowerCase();
                const gender = genderFilter.value.toLowerCase();

                rows.forEach(row => {

                    const name = row.children[1].innerText.toLowerCase();
                    const rowGender = row.children[3].innerText.toLowerCase();
                    const rowApproval = row.children[6].innerText.toLowerCase();

                    const matchSearch = name.includes(search);
                    const matchGender = gender === "" || rowGender.includes(gender);
                    const matchApproval = approval === "" || rowApproval.includes(approval);

                    if (matchSearch && matchGender && matchApproval) {
                        row.style.display = "";
                    } else {
                        row.style.display = "none";
                    }

                });
            }

            searchInput.addEventListener("keyup", filterTable);
            approvalFilter.addEventListener("change", filterTable);
            genderFilter.addEventListener("change", filterTable);

        });
    </script> --}}
</x-app-layout>