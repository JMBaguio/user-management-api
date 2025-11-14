{{-- resources/views/profile/partials/_empty_state.blade.php --}}
@props([
    'icon'   => 'M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z',
    'title'  => 'No Items',
    'message'=> 'There is nothing to show here yet.',
    'button' => null   // ['text' => '…', 'url' => '…']
])

<div class="text-center py-12 bg-[#F8F4EC] dark:bg-gray-700 rounded-2xl border border-[#E9DFC7] dark:border-gray-600">
    <div class="w-16 h-16 bg-white dark:bg-gray-600 rounded-full flex items-center justify-center mx-auto mb-4 shadow-lg">
        <svg class="w-8 h-8 text-[#B59F84]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $icon }}"></path>
        </svg>
    </div>

    <h4 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-2">{{ $title }}</h4>
    <p class="text-gray-600 dark:text-gray-400 text-sm mb-4 max-w-md mx-auto">{{ $message }}</p>

    @if ($button)
        <a href="{{ $button['url'] }}"
           class="inline-flex items-center bg-[#B59F84] hover:bg-[#9C8770] text-white px-6 py-2 rounded-lg transition-colors gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
            </svg>
            {{ $button['text'] }}
        </a>
    @endif
</div>