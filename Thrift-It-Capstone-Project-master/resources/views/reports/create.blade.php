<x-app-layout>
    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h2 class="text-2xl font-semibold text-gray-900 dark:text-gray-100 mb-6">Report User</h2>
                    
                    <div class="mb-6">
                        <p class="text-gray-600 dark:text-gray-400">You are reporting: <span class="font-medium text-gray-900 dark:text-gray-100">{{ $user->name }}</span></p>
                    </div>

                    <form action="{{ route('reports.store', $user) }}" method="POST">
                        @csrf
                        
                        <div class="mb-6">
                            <label for="reason" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Reason for Report</label>
                            <select id="reason" name="reason" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300" required>
                                <option value="">Select a reason</option>
                                <option value="Inappropriate Behavior">Inappropriate Behavior</option>
                                <option value="Scam or Fraud">Scam or Fraud</option>
                                <option value="Harassment">Harassment</option>
                                <option value="Fake Account">Fake Account</option>
                                <option value="Other">Other</option>
                            </select>
                            @error('reason')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Additional Details</label>
                            <textarea id="description" name="description" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300" placeholder="Please provide any additional details about your report..."></textarea>
                            @error('description')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-end">
                            <a href="{{ url()->previous() }}" class="mr-4 text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100">Cancel</a>
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 focus:bg-red-700 active:bg-red-900 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                Submit Report
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 