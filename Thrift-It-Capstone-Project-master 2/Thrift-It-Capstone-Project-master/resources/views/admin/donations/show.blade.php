<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-100 leading-tight">
                {{ __('Donation Details') }}
            </h2>
            <a href="{{ route('admin.donations.index') }}"
                class="px-4 py-2 text-sm font-medium rounded-lg bg-white/20 dark:bg-gray-800/40 border border-white/10
                       text-gray-800 dark:text-gray-100 backdrop-blur-md hover:bg-white/30 dark:hover:bg-gray-700/50
                       transition duration-200 shadow-md">
                ← Back to Donations
            </a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div
                class="grid grid-cols-1 lg:grid-cols-2 gap-6 rounded-2xl backdrop-blur-xl bg-white/15 dark:bg-gray-900/30 border border-white/10 shadow-xl overflow-hidden">
                {{-- LEFT: Swiper Gallery --}}
                <div class="relative swiper mySwiper h-[34rem] rounded-r-2xl overflow-hidden">
                    <div class="swiper-wrapper h-full">
                        @if ($donation->donationImages && $donation->donationImages->count() > 0)
                            @foreach ($donation->donationImages as $image)
                                <div class="swiper-slide">
                                    <img src="{{ Storage::disk('s3')->url($image->image) }}" alt="{{ $donation->name }}"
                                        class="w-full h-full object-cover transition-transform duration-500 ease-out hover:scale-105">
                                </div>
                            @endforeach
                        @else
                            <div class="swiper-slide flex items-center justify-center bg-gray-100 dark:bg-gray-700">
                                <img src="{{ asset('images/default-placeholder.png') }}" alt="No image"
                                    class="w-full h-full object-cover">
                            </div>
                        @endif
                    </div>
                    <div class="swiper-pagination absolute bottom-3 left-1/2 transform -translate-x-1/2 z-10"></div>
                    <div class="swiper-button-next !text-white text-lg"></div>
                    <div class="swiper-button-prev !text-white text-lg"></div>
                </div>

                {{-- RIGHT: Donation details + seller + comments --}}
                <div class="flex flex-col justify-between p-6 space-y-4">
                    {{-- Donation Title and Meta --}}
                    <div>
                        <div class="flex items-start justify-between">
                            <h3 class="text-2xl font-semibold text-gray-900 dark:text-gray-100 leading-tight">
                                {{ $donation->name }}
                            </h3>
                            <span
                                class="px-3 py-1 text-xs rounded-md bg-gray-100/30 dark:bg-gray-700/40 border border-white/10 text-gray-800 dark:text-gray-200">
                                {{ $donation->category->name }}
                            </span>
                        </div>

                        <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                            Posted {{ $donation->created_at->diffForHumans() }}
                        </p>

                        @if ($donation->description)
                            <p class="mt-3 text-sm leading-relaxed text-gray-700 dark:text-gray-300">
                                {{ $donation->description }}
                            </p>
                        @endif
                    </div>

                    {{-- Donor Info --}}
                    <div class="border-t border-white/10 pt-3 mt-3 text-sm text-gray-800 dark:text-gray-300">
                        <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-1">
                            <p>
                                <span class="font-medium text-gray-900 dark:text-gray-100">Donor:</span>
                                {{ $donation->user->fname ?? $donation->user->first_name }}
                                {{ $donation->user->lname ?? $donation->user->last_name }}
                            </p>
                            <p>
                                <span class="font-medium text-gray-900 dark:text-gray-100">Email:</span>
                                {{ $donation->user->email }}
                            </p>
                        </div>
                    </div>

                    {{-- Scrollable Comments Section --}}
                    <div class="mt-4 border-t border-white/10 pt-3 flex-1 overflow-y-auto max-h-[16rem] custom-scroll">
                        <h4 class="text-lg font-semibold mb-2 text-gray-900 dark:text-gray-100">Comments</h4>

                        @forelse($donation->comments as $comment)
                            <div class="pb-3 mb-3 border-b border-white/10 last:border-none last:mb-0 last:pb-0">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <p class="font-medium text-gray-900 dark:text-gray-100">
                                            {{ $comment->user->fname ?? $comment->user->first_name }}
                                            {{ $comment->user->lname ?? $comment->user->last_name }}
                                        </p>
                                        <p class="text-xs text-gray-500 dark:text-gray-400">
                                            {{ $comment->created_at->diffForHumans() }}
                                        </p>
                                    </div>
                                </div>
                                <p class="mt-2 text-sm text-gray-700 dark:text-gray-300 leading-relaxed">
                                    {{ $comment->content }}
                                </p>
                            </div>
                        @empty
                            <p class="text-center text-sm text-gray-500 dark:text-gray-400 py-6">
                                No comments yet — be the first to share your thoughts.
                            </p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Optional scrollbar style --}}
    <style>
        .custom-scroll::-webkit-scrollbar {
            width: 6px;
        }

        .custom-scroll::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.2);
            border-radius: 3px;
        }

        .custom-scroll::-webkit-scrollbar-thumb:hover {
            background: rgba(255, 255, 255, 0.35);
        }
    </style>
</x-app-layout>
