<div id="products" class="mb-8">
    <div class="flex items-center justify-between mb-6">
        <div>
            <h3 class="text-2xl font-bold text-gray-900 dark:text-white flex items-center gap-2">
                <svg class="w-6 h-6 text-[#B59F84]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                </svg>
                Product Inventory
            </h3>
            <p class="text-gray-600 dark:text-gray-400 text-sm">Manage your sustainable products...</p>
        </div>
        <div class="flex gap-4 text-right">
            <div>
                <div class="text-lg font-bold text-[#B59F84]">{{ $availableProducts->count() }}</div>
                <div class="text-sm text-gray-500 dark:text-gray-400">Available</div>
            </div>
        </div>
    </div>

    <!-- Available Products -->
    <div class="mb-8">
        <div class="flex items-center gap-3 mb-4">
            <div class="p-2 bg-[#F1E9D2] dark:bg-[#9C8770] rounded-lg">
                <svg class="w-5 h-5 text-[#B59F84] dark:text-[#F1E9D2]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"></path>
                </svg>
            </div>
            <div>
                <h3 class="text-lg font-bold text-gray-900 dark:text-white">Available Products</h3>
                <p class="text-sm text-gray-600 dark:text-gray-400">Active listings ready for purchase or donation</p>
            </div>
        </div>

        @if ($availableProducts->count() > 0)
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4">
                @foreach ($availableProducts as $product)
                    @include('profile.partials._product_card', ['product' => $product, 'sold' => false])
                @endforeach
            </div>
        @else
            @include('profile.partials._empty_state', [
                'icon' => 'M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4',
                'title' => 'No Active Products',
                'message' => 'Start your sustainable journey by listing your first upcycled product!',
                'button' => ['text' => 'Create First Product', 'url' => route('products.create')]
            ])
        @endif
    </div>

    <!-- Sold Products -->
    <div>
        <div class="flex items-center gap-3 mb-4">
            <div class="p-2 bg-[#F1E9D2] dark:bg-[#8A7560] rounded-lg">
                <svg class="w-5 h-5 text-[#8A7560] dark:text-[#F1E9D2]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            <div>
                <h3 class="text-lg font-bold text-gray-900 dark:text-white">Sold Products</h3>
                <p class="text-sm text-gray-600 dark:text-gray-400">Your successful sales and donations history</p>
            </div>
        </div>

        @if ($soldProducts->count() > 0)
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4">
                @foreach ($soldProducts as $product)
                    @include('profile.partials._product_card', ['product' => $product, 'sold' => true])
                @endforeach
            </div>
        @else
            @include('profile.partials._empty_state', [
                'icon' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z',
                'title' => 'No Sales Yet',
                'message' => 'Your sold products will appear here'
            ])
        @endif
    </div>
</div>