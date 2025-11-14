<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Your Submitted Reviews') }}
        </h2>
    </x-slot>

    <div class="py-6 max-w-4xl mx-auto">
        @if($submittedReviews->isEmpty())
            <div class="bg-yellow-100 p-4 rounded-md text-yellow-800">
                No reviews have been submitted yet.
            </div>
        @else
            <div class="space-y-4">
                @foreach ($submittedReviews as $review)
                    <div class="bg-white dark:bg-gray-800 p-4 rounded-lg shadow">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-lg font-semibold text-gray-900 dark:text-gray-100">
                                    Review for: {{ $review->reviewedUser->lname ?? 'User not found' }}
                                   {{ $review->reviewedUser->fname ?? 'User not found' }} 
                                </p>
                                <p class="text-sm text-gray-700 dark:text-gray-300">
                                    Rating: 
                                    <span class="font-semibold text-yellow-500">
                                        {{ $review->rating }} / 5
                                    </span>
                                </p>
                                <p class="text-sm text-gray-600 dark:text-gray-400 mt-2">
                                    "{{ $review->content }}"
                                </p>
                            </div>
                            <div class="ml-4">
                                <a href="{{ route('reviews.show', $review) }}" class="text-indigo-600 hover:text-indigo-800">View Details</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</x-app-layout>
