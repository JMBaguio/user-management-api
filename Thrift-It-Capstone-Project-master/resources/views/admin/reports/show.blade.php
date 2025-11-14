<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Report Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Reporter Information -->
                        <div class="bg-gray-50 dark:bg-gray-700 p-6 rounded-lg">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4">Reporter Information</h3>
                            <div class="space-y-2">
                                <p><span class="font-medium">Name:</span> {{ $report->reporter->fname }} {{ $report->reporter->lname }}</p>
                                <p><span class="font-medium">Email:</span> {{ $report->reporter->email }}</p>
                                <p><span class="font-medium">Role:</span> {{ $report->reporter->role_name }}</p>
                            </div>
                        </div>

                        <!-- Reported User Information -->
                        <div class="bg-gray-50 dark:bg-gray-700 p-6 rounded-lg">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4">Reported User Information</h3>
                            <div class="space-y-2">
                                <p><span class="font-medium">Name:</span> {{ $report->reportedUser->fname }} {{ $report->reportedUser->lname }}</p>
                                <p><span class="font-medium">Email:</span> {{ $report->reportedUser->email }}</p>
                                <p><span class="font-medium">Role:</span> {{ $report->reportedUser->role_name }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Report Details -->
                    <div class="mt-6 bg-gray-50 dark:bg-gray-700 p-6 rounded-lg">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4">Report Details</h3>
                        <div class="space-y-4">
                            <div>
                                <p class="font-medium">Reason:</p>
                                <p class="mt-1">{{ $report->reason }}</p>
                            </div>
                            <div>
                                <p class="font-medium">Report Date:</p>
                                <p class="mt-1">{{ $report->created_at->format('F j, Y g:i A') }}</p>
                            </div>
                            <div>
                                <p class="font-medium">Current Status:</p>
                                <span class="mt-1 px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                    {{ $report->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : 
                                       ($report->status === 'resolved' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800') }}">
                                    {{ ucfirst($report->status) }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Update Form -->
                    <div class="mt-6">
                        <form action="{{ route('admin.reports.update', $report) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="space-y-4">
                                <div>
                                    <label for="status" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Status</label>
                                    <select name="status" id="status" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
                                        <option value="pending" {{ $report->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="resolved" {{ $report->status === 'resolved' ? 'selected' : '' }}>Resolved</option>
                                        <option value="rejected" {{ $report->status === 'rejected' ? 'selected' : '' }}>Rejected</option>
                                    </select>
                                </div>

                                <div>
                                    <label for="admin_notes" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Admin Notes</label>
                                    <textarea name="admin_notes" id="admin_notes" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">{{ $report->admin_notes }}</textarea>
                                </div>

                                <div class="flex justify-end">
                                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                        Update Report
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 