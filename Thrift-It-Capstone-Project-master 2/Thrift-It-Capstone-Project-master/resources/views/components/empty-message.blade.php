@props([
    'icon' => 'shopping-cart', // default icon
    'message' => 'No items found',
    'link' => null,
    'buttonText' => 'Add Item',
])

<div class="py-12 text-center bg-[#F4F2ED] dark:bg-gray-800 rounded-2xl border border-[#E1D5B6] shadow-sm">
    <!-- Icon -->
    <div class="w-16 h-16 mx-auto mb-4">
        @switch($icon)
            @case('shopping-cart')
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-[#B59F84]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 
                          0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
                @break

            @case('magnifying-glass')
                <svg class="h-12 w-12 mx-auto text-[#B59F84]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
                @break

            @default
                <svg class="h-12 w-12 mx-auto text-[#B59F84]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
        @endswitch
    </div>

    <!-- Message -->
    <h3 class="mt-4 text-lg font-semibold text-gray-900 dark:text-gray-100">
        {{ $message }}
    </h3>

    <!-- Optional Button -->
    @if($link)
        <p class="mt-2 text-gray-600 dark:text-gray-400">Why not get started?</p>
        <div class="mt-6">
            <a href="{{ $link }}"
               class="inline-flex items-center px-6 py-2 rounded-full font-semibold shadow-md text-white bg-[#B59F84] hover:bg-[#9C8770] transition-colors">
                {{ $buttonText }}
            </a>
        </div>
    @endif
</div>
