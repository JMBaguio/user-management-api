<x-app-layout> 
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Products in ' . $category->name) }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-100 dark:bg-gray-800 overflow-hidden sm:rounded-md p-6">
                @if($products->count() > 0)
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                        @foreach ($products as $product)
                            <a href="{{ route('products.show', $product->id) }}" class="block bg-white text-black rounded-lg overflow-hidden shadow-md border border-gray-200 hover:shadow-xl transition duration-200 ease-in-out">
                                <!-- Product Image -->
                                <div class="relative group">
                                    <img src="{{ $product->image ? asset('storage/' . $product->image) : asset('images/default-placeholder.png') }}" 
                                         alt="{{ $product->name }}" 
                                         class="w-full h-64 object-cover border-2 border-transparent group-hover:border-blue-500 transition duration-300">
                                </div>

                                <!-- Product Info -->
                                <div class="p-4">
                                    <div class="flex justify-between items-start">
                                        <h3 class="text-lg font-bold truncate w-3/4">{{ $product->name }}</h3>
                                        <span class="text-gray-600 text-sm font-semibold">{{ $product->size ?? 'N/A' }}</span>
                                    </div>
                                    <p class="text-gray-500 text-sm truncate">{{ $product->category->name ?? 'No Category' }}</p>
                                    
                                    <div class="flex justify-between items-center mt-3">
                                        <p class="text-black font-bold text-lg">
                                            {{ $product->listingtype === 'for donation' ? 'For Donation' : '₱' . number_format($product->price, 0) }}
                                        </p>
                                        
                                        <!-- Favorite Button -->
                                        <button class="favorite-btn text-gray-400 hover:text-black-500 transition" data-id="{{ $product->id }}">
                                            🤍
                                        </button>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                @else
                    <p class="text-gray-400 text-center">No products available in this category.</p>
                @endif
            </div>
        </div>
    </div>

    <script>
        document.querySelectorAll('.favorite-btn').forEach(button => {
            button.addEventListener('click', function(event) {
                event.preventDefault();
                this.textContent = this.textContent === '🤍' ? '❤️' : '🤍';
            });
        });
    </script>
</x-app-layout>
