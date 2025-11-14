<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Review Detail') }}
        </h2>
    </x-slot>

    <div class="py-6 max-w-2xl mx-auto bg-white dark:bg-gray-800 p-6 rounded shadow">
        <div class="mb-2">
            <p class="text-gray-600 dark:text-gray-300">From: <strong>{{ $review->reviewer->lname }}</strong></p>
            <p class="text-gray-600 dark:text-gray-300">To: <strong>{{ $review->reviewedUser->fname }}</strong></p>
            <p class="text-sm text-gray-500 dark:text-gray-400">
                Reviewed on {{ $review->created_at?->format('F j, Y') ?? 'Date not available' }}
            </p>
                    </div>

        <div class="flex items-center mb-4">
            @for ($i = 1; $i <= 5; $i++)
                <svg class="w-5 h-5 {{ $i <= $review->rating ? 'text-yellow-400' : 'text-gray-300 dark:text-gray-500' }}" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l..." />
                </svg>
            @endfor
        </div>

        @if ($review->comment)
            <p class="text-gray-800 dark:text-gray-200">{{ $review->comment }}</p>
        @endif
    </div>
</x-app-layout>
