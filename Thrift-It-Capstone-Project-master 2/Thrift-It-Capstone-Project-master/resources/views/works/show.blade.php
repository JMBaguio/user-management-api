<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

        {{-- Main Two-Column Layout --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-12">
            
            {{-- Left: Swiper Gallery (2/3 width on large screens) --}}
            <div class="lg:col-span-2">
                @if ($work->images->count() > 0)
                    <div class="swiper mySwiper rounded-xl overflow-hidden shadow-lg">
                        <div class="swiper-wrapper">
                            @foreach ($work->images as $image)
                                <div class="swiper-slide">
                                    <img src="{{ Storage::disk('s3')->url($image->image) }}"
                                         alt="{{ $work->title }} - Image"
                                         class="w-full h-96 sm:h-[500px] object-cover">
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-button-next text-white"></div>
                        <div class="swiper-button-prev text-white"></div>
                        <div class="swiper-pagination !bottom-4"></div>
                    </div>
                @else
                    <div class="bg-gray-100 dark:bg-gray-800 border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-xl h-96 flex items-center justify-center text-center p-6">
                        <p class="text-gray-500 dark:text-gray-400 text-lg">No images uploaded yet.</p>
                    </div>
                @endif

                {{-- Work Title - Below Swiper on Mobile, Above on Desktop --}}
                <h1 class="text-2xl sm:text-3xl font-extrabold text-gray-900 dark:text-white mt-6 lg:mt-0 lg:hidden">
                    {{ $work->title ?? 'Untitled Work' }}
                </h1>
            </div>

            {{-- Right: User Profile Card (1/3 width on large screens) --}}
            <div class="flex flex-col">
                {{-- Title - Hidden on Mobile (shown above), Visible on Desktop --}}
                <h1 class="hidden lg:block text-3xl font-extrabold text-gray-900 dark:text-white mb-6">
                    {{ $work->title ?? 'Untitled Work' }}
                </h1>

                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden flex flex-col h-full">
                    {{-- Cover Image --}}
                    <div class="relative h-32 bg-cover bg-center"
                         style="background-image: url('{{ asset('images/Rectangle 99.png') }}');">
                        <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black/40"></div>
                    </div>

                    <div class="relative flex-1 p-6 bg-[#E1D5B6] dark:bg-gray-800">
                        {{-- Profile Avatar --}}
                        <div class="absolute -top-12 left-1/2 -translate-x-1/2 w-24 h-24 rounded-full border-4 border-white dark:border-gray-800 overflow-hidden shadow-xl z-10">
                            <img src="{{ $work->user->profileImageUrl() }}"
                                 alt="{{ $work->user->name }}'s profile"
                                 class="w-full h-full object-cover">
                        </div>

                        <div class="pt-14 text-center lg:text-left">
                            <div class="mb-3">
                                <x-user-name-badge :user="$work->user" />
                            </div>

                            <div class="flex items-center justify-center lg:justify-start gap-2 text-yellow-500 mb-5">
                                <span>★★★★★</span>
                                <span class="text-sm text-gray-600 dark:text-gray-400">(5)</span>
                            </div>

                            {{-- Action Buttons --}}
                            <div class="flex flex-col gap-3">
                                @if(Auth::check() && Auth::id() !== $work->user->id)
                                    <a href="{{ route('private.chat', $work->user->id) }}"
                                       class="w-full text-center px-4 py-2.5 bg-white dark:bg-gray-700 text-[#B59F84] dark:text-[#E1D5B6] rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600 transition-all duration-300 text-sm font-medium">
                                        Message
                                    </a>
                                @endif
                                <a href="{{ route('profile.show', $work->user->id) }}"
                                   class="w-full text-center px-4 py-2.5 bg-white dark:bg-gray-700 text-[#B59F84] dark:text-[#E1D5B6] rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600 transition-all duration-300 text-sm font-medium">
                                    Visit Profile
                                </a>
                            </div>

                            {{-- Report User --}}
                            @if(Auth::check() && Auth::id() !== $work->user_id)
                                <div class="mt-6 pt-5 border-t border-gray-300 dark:border-gray-700">
                                    <a href="{{ route('reports.create', $work->user->id) }}"
                                       class="inline-flex items-center justify-center lg:justify-start gap-2 text-sm text-gray-600 dark:text-gray-400 hover:text-red-600 dark:hover:text-red-400 transition">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                  d="M12 9v2m0 4h.01M5.455 4.455a2.836 2.836 0 012-1.455h9.09a2.836 2.836 0 012 1.455l3.182 5.455a2.836 2.836 0 010 2.182L18.545 17.09a2.836 2.836 0 01-2 1.455H7.455a2.836 2.836 0 01-2-1.455L2.273 12.09a2.836 2.836 0 010-2.182L5.455 4.455z" />
                                        </svg>
                                        Report User
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- More Works by User - Full Width Below --}}
        @if($moreWorks->count() > 0)
            <div class="mt-12">
                <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6">
                    More Works by {{ $work->user->name }}
                </h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    @foreach($moreWorks as $moreWork)
                        <a href="{{ route('works.show', $moreWork->id) }}"
                           class="group block bg-white dark:bg-gray-800 rounded-xl shadow-md overflow-hidden hover:shadow-xl transition-all duration-300">
                            <div class="relative overflow-hidden">
                                @if($moreWork->images->first())
                                    <img src="{{ Storage::disk('s3')->url($moreWork->images->first()->image) }}"
                                         alt="{{ $moreWork->title }}"
                                         class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                                @else
                                    <div class="w-full h-48 bg-gray-200 dark:bg-gray-700 flex items-center justify-center">
                                        <span class="text-gray-500 text-sm">No Image</span>
                                    </div>
                                @endif
                            </div>
                            <div class="p-4">
                                <h3 class="font-semibold text-gray-800 dark:text-white line-clamp-1 group-hover:text-[#B59F84] transition">
                                    {{ $moreWork->title ?? 'Untitled' }}
                                </h3>
                                <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                                    {{ ucfirst($moreWork->approval_status) }}
                                </p>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        @endif
    </div>

    {{-- Swiper Styles & Scripts --}}
    @push('styles')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
        <style>
            .swiper-button-next, .swiper-button-prev {
                background: rgba(0, 0, 0, 0.5);
                width: 40px;
                height: 40px;
                border-radius: 50%;
                backdrop-filter: blur(4px);
            }
            .swiper-button-next:after, .swiper-button-prev:after {
                font-size: 16px;
            }
            .swiper-pagination-bullet {
                background: white;
                opacity: 0.7;
            }
            .swiper-pagination-bullet-active {
                background: #B59F84;
                opacity: 1;
            }
        </style>
    @endpush

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                new Swiper(".mySwiper", {
                    slidesPerView: 1,
                    spaceBetween: 20,
                    loop: $work->images->count() > 1,
                    navigation: {
                        nextEl: ".swiper-button-next",
                        prevEl: ".swiper-button-prev",
                    },
                    pagination: {
                        el: ".swiper-pagination",
                        clickable: true,
                    },
                    autoplay: {
                        delay: 5000,
                        disableOnInteraction: false,
                    },
                    effect: 'fade',
                    fadeEffect: { crossFade: true },
                    speed: 800,
                });
            });
        </script>
    @endpush
</x-app-layout>