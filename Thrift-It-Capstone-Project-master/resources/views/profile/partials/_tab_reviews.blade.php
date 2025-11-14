<div id="reviews" class="hidden mb-8">
    <h3 class="text-xl font-bold text-gray-900 dark:text-gray-100 mb-4">Reviews Received</h3>
    @forelse($user->reviewsReceived as $review)
        <div class="mb-6 p-4 border dark:border-gray-700 rounded-lg bg-gray-50 dark:bg-gray-700 shadow-sm">
            <div class="flex justify-between items-center mb-2">
                <div class="text-sm font-semibold text-gray-800 dark:text-gray-200">
                    {{ $review->reviewer->fname ?? 'Anonymous' }}
                </div>
                <div class="flex space-x-1">
                    @for ($i = 1; $i <= 5; $i++)
                        <svg class="w-4 h-4 {{ $i <= $review->rating ? 'text-yellow-400' : 'text-gray-300 dark:text-gray-600' }}"
                             fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.362 4.197a1 1 0 00.95.69h4.417c.969 0 1.371 1.24.588 1.81l-3.58 2.601a1 1 0 00-.364 1.118l1.362 4.197c.3.921-.755 1.688-1.54 1.118L10 14.347l-3.58 2.601c-.784.57-1.838-.197-1.539-1.118l1.362-4.197a1 1 0 00-.364-1.118L2.3 9.624c-.782-.57-.38-1.81.588-1.81h4.418a1 1 0 00.949-.69l1.362-4.197z" />
                        </svg>
                    @endfor
                </div>
            </div>
            @if($review->comment)
                <p class="text-sm text-gray-700 dark:text-gray-300 mt-1">{{ $review->comment }}</p>
            @endif
            <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                Reviewed on {{ $review->created_at->format('F j, Y') }}
            </p>
        </div>
    @empty
        <p class="text-gray-500 dark:text-gray-400">No reviews received yet.</p>
    @endforelse
</div>