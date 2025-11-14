<x-app-layout>
    <x-slot name="header">
           <div class="flex items-center justify-between">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Reports Management') }}
        </h2>
       <a href="{{ route('admin.dashboard') }}"
                class="px-4 py-2 bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-100 rounded-md hover:bg-gray-300 dark:hover:bg-gray-600">
                ← Back to Dashboard
        </a>
           </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">


            <div
                class="bg-white/20 dark:bg-gray-900/30 backdrop-blur-xl border border-white/10 dark:border-gray-700 rounded-2xl shadow-lg overflow-hidden">
                <div class="p-6">



                    {{-- Reports Table --}}
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-white/10">
                            <thead>
                                <tr class="text-gray-400 dark:text-gray-300">
                                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                        Reporter</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                        Reported User</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Reason
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Status
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Date
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-white/10">
                                @forelse($reports as $report)
                                    <tr
                                        class="bg-white/10 dark:bg-gray-800/30 hover:bg-white/20 dark:text-gray-200 dark:hover:bg-gray-700/50 transition-colors">
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">
                                            {{ $report->reporter->fname }} {{ $report->reporter->lname }}
                                        </td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">
                                            {{ $report->reportedUser->fname }} {{ $report->reportedUser->lname }}
                                        </td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">
                                            {{ $report->reason }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span
                                                class="px-2 py-0.5 inline-flex text-xs font-semibold rounded-full 
                                            {{ $report->status === 'pending'
                                                ? 'bg-yellow-100 text-yellow-800'
                                                : ($report->status === 'resolved'
                                                    ? 'bg-green-100 text-green-800'
                                                    : 'bg-red-100 text-red-800') }}">
                                                {{ ucfirst($report->status) }}
                                            </span>
                                        </td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                            {{ $report->created_at->format('M d, Y') }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium flex space-x-4">
                                            <a href="{{ route('admin.reports.show', $report) }}"
                                                class="text-indigo-600 hover:text-indigo-900 dark:text-indigo-400 dark:hover:text-indigo-300">
                                                View
                                            </a>
                                            <form action="{{ route('admin.reports.destroy', $report) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300"
                                                    onclick="return confirm('Are you sure you want to delete this report?')">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center py-6 text-gray-500 dark:text-gray-400">
                                            No reports found.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        {{ $reports->links() }}
                    </div>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>
