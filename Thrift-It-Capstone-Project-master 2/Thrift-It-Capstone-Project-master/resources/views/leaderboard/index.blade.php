<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-gray-800 dark:text-gray-200">
            Leaderboard
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto bg-white dark:bg-gray-800 shadow-lg rounded-lg p-6">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-100 dark:bg-gray-700">
                        <th class="py-3 px-4">Rank</th>
                        <th class="py-3 px-4">User</th>
                        <th class="py-3 px-4">Total Donations</th>
                        <th class="py-3 px-4">Points</th> {{-- ✅ Added Points Column --}}
                    </tr>
                </thead>
                <tbody>
                    @forelse($leaders as $index => $leader)
                        <tr class="{{ $index % 2 === 0 ? 'bg-gray-50 dark:bg-gray-900' : '' }}">
                            <td class="py-3 px-4 font-bold">{{ $index + 1 }}</td>
                            <td class="py-3 px-4 flex items-center gap-3">
                                <img 
                                    src="https://ui-avatars.com/api/?name={{ urlencode($leader->fname . ' ' . $leader->lname) }}&background=random" 
                                    class="w-8 h-8 rounded-full border"
                                    alt="Avatar"
                                >
                                {{ $leader->fname }} {{ $leader->lname }}
                            </td>
                            <td class="py-3 px-4">{{ $leader->donations_count ?? 0 }}</td>
                            <td class="py-3 px-4">
                                {{ $leader->points_sum ?? $leader->points ?? 0 }} {{-- ✅ Works for withSum or points column --}}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="py-4 text-center text-gray-500">
                                No data available.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
