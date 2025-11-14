{{-- resources/views/profile/partials/_tab_works.blade.php --}}
<div id="works" class="hidden mb-8">
    <div class="flex items-center justify-between mb-6">
        <div>
            <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-2 flex items-center gap-2">
                <svg class="w-6 h-6 text-[#B59F84]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
                Upcycled Artworks
            </h3>
            <p class="text-gray-600 dark:text-gray-400 text-sm max-w-2xl">
                Showcase of creative upcycled art pieces made from waste materials.
            </p>
        </div>
        <div class="text-right">
            <div class="text-lg font-bold text-[#B59F84]">{{ $works->count() ?? 0 }}</div>
            <div class="text-sm text-gray-500 dark:text-gray-400">Total Works</div>
        </div>
    </div>

    @if ($works && $works->count() > 0)
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4">
            @foreach ($works as $work)
                <a href="{{ route('works.show', $work->id ?? '#') }}"
                   class="group block bg-white dark:bg-gray-800 rounded-xl shadow-sm hover:shadow-md transition-all duration-300 border border-[#D9D9D9] dark:border-gray-700 overflow-hidden">
                    <div class="relative aspect-square overflow-hidden">
                        @if ($work->images && $work->images->first() && $work->images->first()->image)
                            <img src="{{ Storage::disk('s3')->url($work->images->first()->image) }}"
                                 alt="{{ $work->title ?? 'Untitled' }}"
                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        @else
                            <div class="w-full h-full bg-gray-200 dark:bg-gray-700 flex items-center justify-center">
                                <span class="text-gray-500 text-sm">No Image</span>
                            </div>
                        @endif
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    </div>
                    <div class="p-3">
                        <h4 class="font-semibold text-gray-900 dark:text-white text-sm line-clamp-1 group-hover:text-[#B59F84] transition">
                            {{ $work->title ?? 'Untitled' }}
                        </h4>
                        <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                            {{ $work->approval_status ? ucfirst($work->approval_status) : 'Pending' }}
                        </p>
                    </div>
                </a>
            @endforeach
        </div>
    @else
        <div class="text-center py-12 bg-[#F8F4EC] dark:bg-gray-700 rounded-2xl border border-[#E9DFC7] dark:border-gray-600">
            <div class="w-16 h-16 bg-white dark:bg-gray-600 rounded-full flex items-center justify-center mx-auto mb-4 shadow-lg">
                <svg class="w-8 h-8 text-[#B59F84]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
            </div>
            <h4 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-2">No Works Yet</h4>
            <p class="text-gray-600 dark:text-gray-400 text-sm mb-4 max-w-md mx-auto">
                This upcycler hasn't uploaded any artwork yet.
            </p>
            @if (Auth::id() === $user->id)
                <a href="{{ route('works.create') ?? '#' }}"
                   class="inline-flex items-center bg-[#B59F84] hover:bg-[#9C8770] text-white px-6 py-2 rounded-lg transition-colors gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Upload First Work
                </a>
            @endif
        </div>
    @endif
</div>
