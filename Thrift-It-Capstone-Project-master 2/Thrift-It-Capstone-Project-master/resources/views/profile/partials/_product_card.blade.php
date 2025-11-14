@props(['product', 'sold' => false])

<div {{ $attributes->merge(['class' => 'group relative bg-white dark:bg-gray-800 rounded-xl overflow-hidden shadow-sm hover:shadow-md transition border border-[#D9D9D9] dark:border-gray-700']) }}>
    <a href="{{ route('products.show', $product->id) }}" class="block h-full">
        @if($sold)
            <div class="absolute top-1 left-1 z-20 bg-[#8A7560] text-white text-xs px-2 py-1 rounded-full font-semibold">Sold</div>
        @endif
        @if($product->listingtype === 'for donation')
            <div class="absolute top-1 {{ $sold ? 'right-1' : 'left-1' }} z-10 bg-[#D9D9D9] text-gray-700 text-xs px-2 py-1 rounded-full">
                Donation
            </div>
        @endif

        <div class="relative aspect-square overflow-hidden">
            <img src="{{ optional($product->images->first())->image
                ? Storage::disk('s3')->url($product->images->first()->image)
                : asset('images/no-image.png') }}"
                 alt="{{ $product->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform">
            <div class="absolute inset-0 bg-gray-800 bg-opacity-20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                <span class="bg-white text-gray-800 px-2 py-0.5 rounded-full text-xs font-medium">
                    {{ $sold ? 'View Archive' : 'Quick view' }}
                </span>
            </div>
        </div>

        <div class="p-3">
            <div class="flex justify-between items-start">
                <h3 class="text-sm font-bold text-gray-900 dark:text-white truncate max-w-[70%]">{{ $product->name }}</h3>
                <span class="text-xs font-medium px-1 py-0.5 bg-[#D9D9D9] dark:bg-gray-700 rounded text-gray-700 dark:text-gray-300">
                    {{ $product->size ?? 'L' }}
                </span>
            </div>
            <p class="text-gray-500 dark:text-gray-400 text-xs mt-0.5 truncate">
                {{ $product->category->name ?? 'No Category' }}
            </p>
            <p class="text-gray-500 dark:text-gray-400 text-xs mt-0.5 truncate">
                <i>{{ $product->barangay->name ?? 'N/A' }}, Cebu City</i>
            </p>
            <div class="flex justify-between items-center mt-1">
                <p class="text-sm font-bold {{ $product->listingtype === 'for donation' ? 'text-red-600' : '' }}">
                    {{ $product->listingtype === 'for donation' ? ($sold ? 'Donated' : 'For Donation') : '₱' . number_format($product->price, 2) }}
                </p>
                <button class="favorite-btn text-gray-400 hover:text-red-500 transition" data-id="{{ $product->id }}">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                    </svg>
                </button>
            </div>
        </div>
    </a>
</div>