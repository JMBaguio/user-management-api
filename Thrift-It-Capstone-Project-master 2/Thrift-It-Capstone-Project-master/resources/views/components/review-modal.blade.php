@props(['user'])

<x-modal name="review-modal" maxWidth="lg" focusable>
    <div class="p-6">
        <!-- Modal Header -->
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100">
                Write a Review for {{ $user->fname }} {{ $user->lname }}
            </h3>
            <button type="button" 
                    x-on:click="$dispatch('close-modal', 'review-modal')"
                    class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
            
        </div>

        <!-- Review Form -->
        <form action="{{ route('reviews.store', $user) }}" method="POST" class="space-y-6">
            @csrf

            <!-- Rating Section -->
            <div>
                <label for="rating" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-3">
                    Rating <span class="text-red-500">*</span>
                </label>
                <div class="flex items-center space-x-2">
                    <select id="rating" name="rating" required 
                            class="flex-1 rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 px-3 py-2 focus:ring-2 focus:ring-[#B59F84] focus:border-[#B59F84] transition-colors">
                        <option value="">Select rating</option>
                        @for ($i = 5; $i >= 1; $i--)
                            <option value="{{ $i }}" {{ old('rating') == $i ? 'selected' : '' }}>
                                {{ $i }} Star{{ $i > 1 ? 's' : '' }}
                            </option>
                        @endfor
                    </select>
                </div>
                @error('rating') 
                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p> 
                @enderror
            </div>

            <!-- Comment Section -->
            <div>
                <label for="comment" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-3">
                    Comment (optional)
                </label>
                <textarea id="comment" 
                          name="comment" 
                          rows="4" 
                          placeholder="Share your experience with this user..."
                          class="w-full rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 px-3 py-2 focus:ring-2 focus:ring-[#B59F84] focus:border-[#B59F84] transition-colors resize-none">{{ old('comment') }}</textarea>
                @error('comment') 
                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p> 
                @enderror
            </div>

            <!-- Action Buttons -->
            <div class="flex items-center justify-end space-x-3 pt-4 border-t border-gray-200 dark:border-gray-600">
                <button type="button" 
                        x-on:click="$dispatch('close-modal', 'review-modal')"
                        class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 rounded-lg transition-colors">
                    Cancel
                </button>
                <button type="submit" 
                        class="px-6 py-2 text-sm font-medium text-white bg-[#B59F84] hover:bg-[#9C8770] rounded-lg transition-colors focus:outline-none focus:ring-2 focus:ring-[#B59F84] focus:ring-offset-2">
                    Submit Review
                </button>
            </div>
        </form>
    </div>
</x-modal>
