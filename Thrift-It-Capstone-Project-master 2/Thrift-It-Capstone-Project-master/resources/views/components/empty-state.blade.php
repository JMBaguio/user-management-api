@props(['icon', 'title', 'message'])

<div class="text-center py-16">
    <div class="mx-auto w-16 h-16 rounded-full bg-gray-100 dark:bg-gray-800 flex items-center justify-center">
        @if($icon === 'magnifying-glass')
            <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
            </svg>
        @elseif($icon === 'search-off')
            <svg class="w-8 h-8 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"/>
            </svg>
        @endif
    </div>
    <h3 class="mt-4 text-lg font-semibold text-gray-900 dark:text-gray-100">{{ $title }}</h3>
    <p class="mt-2 text-sm text-gray-500 dark:text-gray-400 max-w-md mx-auto">{{ $message }}</p>
</div>
