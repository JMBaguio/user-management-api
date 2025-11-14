<div class="relative bg-[#E1D5B6] dark:bg-gray-800 px-6 py-5 -mt-16 rounded-b-lg">
    <div class="absolute -top-[60px] left-[100px] -translate-x-1/2 w-[100px] h-[100px]
                rounded-full border-4 border-white dark:border-gray-800 overflow-hidden shadow-lg z-10">
        <img src="{{ $user->profileImageUrl() }}" alt="{{ $user->name }}" class="w-full h-full object-cover">
    </div>

    <div class="max-w-5xl mx-auto pt-6">
        <div class="flex items-start justify-between">
            <div class="flex-1">
                <h3 class="font-semibold text-gray-800 dark:text-gray-200 text-lg">
                    <x-user-name-badge :user="$user" :show-full-name="true" />
                </h3>
                <div class="flex items-center mt-1">
                    <div class="flex text-yellow-500">5 stars</div>
                    <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">(5)</span>
                </div>
            </div>
            <div class="text-center">
                <span class="block text-sm font-medium text-gray-700 dark:text-gray-300">Eco Points</span>
                <span class="text-5xl font-bold text-[#B59F84] dark:text-yellow-400 block mb-4">
                    {{ $user->points ?? 0 }}
                </span>
            </div>
        </div>

        @if (Auth::id() !== $user->id)
            <div class="border-t border-gray-200 dark:border-gray-600 mt-6 pt-4">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-6">
                        <button x-on:click="window.dispatchEvent(new CustomEvent('open-modal', { detail: 'report-modal' }))"
                                class="flex items-center text-red-600 dark:text-red-400 hover:text-red-700 text-sm font-medium transition">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                      d="M12 9v2m0 4h.01M10.29 3.86L1.82 18a1 1 0 00.86 1.5h18.64a1 1 0 00.86-1.5L13.71 3.86a1 1 0 00-1.72 0z" />
                            </svg>
                            Report User
                        </button>
                        <button x-on:click="window.dispatchEvent(new CustomEvent('open-modal', { detail: 'review-modal' }))"
                                class="flex items-center text-yellow-600 dark:text-yellow-400 hover:text-yellow-700 text-sm font-medium transition">
                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                            </svg>
                            Review User
                        </button>
                    </div>
                    <a href="{{ route('private.chat', $user->id) }}"
                       class="flex items-center gap-2 px-5 py-2 bg-[#5C4033] text-white rounded-md text-sm font-medium hover:bg-[#7A5238]
                              dark:bg-[#7A5238] dark:hover:bg-[#8E6542] transition shadow-md">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                  d="M7.5 8.25h9m-9 3h5.25M21 12c0 4.97-4.03 9-9 9-1.5 0-2.91-.36-4.15-1L3 21l1-4.15A8.96 8.96 0 013 12c0-4.97 4.03-9 9-9s9 4.03 9 9z" />
                        </svg>
                        Message
                    </a>
                </div>
            </div>
        @endif
    </div>
</div>