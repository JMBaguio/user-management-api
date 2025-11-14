@props(['user'])

<x-modal name="report-modal" maxWidth="lg" focusable>
    <div class="p-6">
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100">Report User</h3>
            <button type="button"
                    x-on:click="$dispatch('close-modal', 'report-modal')"
                    class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        <p class="text-gray-600 dark:text-gray-400 mb-4">You are reporting: 
            <span class="font-medium text-gray-900 dark:text-gray-100">{{ $user->fname }} {{ $user->lname }}</span>
        </p>

        <form action="{{ route('reports.store', $user) }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label for="reason" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Reason for Report</label>
                <select id="reason" name="reason" required
                        class="mt-1 block w-full rounded-lg border border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200 px-3 py-2">
                    <option value="">Select a reason</option>
                    <option value="Inappropriate Behavior">Inappropriate Behavior</option>
                    <option value="Scam or Fraud">Scam or Fraud</option>
                    <option value="Harassment">Harassment</option>
                    <option value="Fake Account">Fake Account</option>
                    <option value="Other">Other</option>
                </select>
                @error('reason')
                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Additional Details</label>
                <textarea id="description" name="description" rows="4"
                          placeholder="Please provide any additional details about your report..."
                          class="mt-1 block w-full rounded-lg border border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200 px-3 py-2"></textarea>
                @error('description')
                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-end space-x-3 pt-4 border-t border-gray-200 dark:border-gray-600">
                <button type="button"
                        x-on:click="$dispatch('close-modal', 'report-modal')"
                        class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 rounded-lg transition-colors">
                    Cancel
                </button>
                <button type="submit"
                        class="inline-flex items-center px-6 py-2 bg-red-600 border border-transparent rounded-lg font-semibold text-sm text-white hover:bg-red-700 focus:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition">
                    Submit Report
                </button>
            </div>
        </form>
    </div>
</x-modal>


