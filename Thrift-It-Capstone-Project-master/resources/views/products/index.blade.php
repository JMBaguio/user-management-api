<x-app-layout>
    <!-- Hero Section for My Products -->
    <section class="w-full bg-[#F4F2ED] dark:bg-gray-800 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 md:py-16">

            <!-- Mobile Layout -->
            <div class="flex flex-col md:hidden text-center relative font-poppins">
                <!-- Title -->
                <h1 class="text-3xl font-extrabold text-[#634600] leading-tight dark:text-[#B59F84]">
                    My Products
                </h1>
                <p class="mt-2 text-lg text-[#603E14] dark:text-gray-200 mb-6">
                    Manage your sustainable fashion items 🌿
                </p>
                <!-- Stats Box -->
                <div class="bg-white/70 dark:bg-gray-700/60 rounded-lg p-4 shadow-sm mb-6 text-left">
                    <h2 class="text-lg font-semibold text-[#634600] dark:text-white mb-2">
                        Your Sustainable Impact
                    </h2>
                    <p class="text-sm text-gray-700 dark:text-gray-300">
                        By selling pre-loved items, you're extending the life of clothing,
                        reducing fashion waste, and promoting circular fashion. Every item sold makes a difference! ♻️
                    </p>
                </div>

                <!-- Benefits -->
                <div class="bg-white/70 dark:bg-gray-700/60 rounded-lg p-4 shadow-sm text-left">
                    <h3 class="text-md font-medium text-[#634600] dark:text-white mb-2">
                        Why Sell With Us?
                    </h3>
                    <ul class="text-sm text-gray-700 dark:text-gray-300 space-y-2">
                        <li class="flex items-start"><span class="text-[#B59F84] mr-2">✓</span> Earn from your pre-loved
                            fashion</li>
                        <li class="flex items-start"><span class="text-[#B59F84] mr-2">✓</span> Reduce clothing waste
                            and pollution</li>
                        <li class="flex items-start"><span class="text-[#B59F84] mr-2">✓</span> Connect with conscious
                            buyers</li>
                    </ul>
                </div>

                <!-- Quote -->
                <p class="mt-6 italic text-gray-600 dark:text-gray-400 text-sm">
                    "Sustainable fashion isn't a trend - it's the future." 👗
                </p>

                <!-- Tag -->
                <span
                    class="absolute bottom-1 right-1 bg-[#F8EED6] px-2 py-0.5 rounded-full text-xs text-[#634600] font-medium shadow">
                    Circular Fashion
                </span>
            </div>

            <!-- Desktop Layout -->
            <div class="hidden md:flex md:flex-row md:items-center gap-8">
                <!-- Text Content -->
                <div class="md:w-1/2 font-poppins">
                    <h1 class="text-5xl lg:text-6xl font-extrabold text-[#634600] dark:text-[#B59F84] leading-tight">
                        My Products
                    </h1>
                    <p class="mt-4 text-xl text-[#603E14] dark:text-gray-200">
                        Manage your thrift store inventory 🌟
                    </p>

                    <!-- Buttons -->
                    <div class="mt-8 flex flex-wrap gap-4">
                        <a href="{{ route('products.create') }}"
                            class="inline-block border border-[#B59F84] text-[#634600] hover:bg-[#F8EED6] 
                                  dark:border-[#B59F84] dark:text-[#B59F84] dark:hover:bg-gray-700 
                                  font-semibold px-6 py-3 rounded-full shadow-md transition">
                            List New Product
                        </a>

                    </div>


                </div>

                <!-- Images -->
                <div class="md:w-1/2 h-[420px] flex gap-4 relative">
                    <img src="{{ asset('images/thrift-fashion.png') }}" alt="Thrift Fashion"
                        class="w-1/2 h-full object-cover rounded-xl shadow-lg hover:scale-[1.02] transition-transform duration-300">
                    <img src="{{ asset('images/sustainable-style.png') }}" alt="Sustainable Style"
                        class="w-1/2 h-full object-cover rounded-xl shadow-lg hover:scale-[1.02] transition-transform duration-300">
                </div>
            </div>
        </div>
    </section>

    <!-- Existing Products Section -->
    <div class="py-6 bg-white dark:bg-gray-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-2xl font-extrabold tracking-tight text-gray-900 dark:text-gray-100">My Products</h2>

                <!-- Button to list or create product -->
                <a href="{{ route('products.create') }}"
                    class="inline-flex items-center gap-2 px-4 sm:px-5 py-2.5 rounded-full bg-[#B59F84] text-white shadow-sm hover:bg-[#a08e77] active:scale-[.98] transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    <span class="font-semibold">List a Product</span>
                </a>
            </div>

            <div class="rounded-xl shadow-sm overflow-hidden">
                <div class="p-4 sm:p-6">
                    @if ($products->count() > 0)
                        <div
                            class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-2 sm:gap-4 md:gap-6">
                            @foreach ($products as $product)
                                <div
                                    class="group relative bg-white dark:bg-gray-800 rounded-xl overflow-hidden shadow-sm hover:shadow-md transition duration-200 border border-[#D9D9D9] dark:border-gray-700">
                                    <a href="{{ route('products.show', $product->id) }}" class="block h-full">
                                        @if ($product->listingtype === 'for donation')
                                            <div
                                                class="absolute top-1 left-1 z-10 bg-[#D9D9D9] text-gray-700 text-[10px] sm:text-xs px-1.5 py-0.5 sm:px-2 sm:py-1 rounded-full">
                                                Donation
                                            </div>
                                        @endif
                                        <div class="relative aspect-square overflow-hidden">
                                            {{-- S3 BUCKET --}}
                                            <img src="{{ $product->first_image }}" alt="{{ $product->name }}"
                                                class="w-full h-full object-cover" />
                                            <div
                                                class="absolute inset-0 bg-gray-800 bg-opacity-20 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                                <span
                                                    class="bg-white text-gray-800 px-2 py-0.5 rounded-full text-[10px] sm:text-xs font-medium">
                                                    Quick view
                                                </span>
                                            </div>
                                        </div>
                                        <div class="p-2 sm:p-3">
                                            <div class="flex justify-between items-start">
                                                <h3
                                                    class="text-xs sm:text-sm font-bold text-gray-900 dark:text-white  transition-colors truncate max-w-[70%]">
                                                    {{ $product->name }}
                                                </h3>
                                                <span
                                                    class="text-[10px] sm:text-xs font-medium px-1 py-0.5 bg-[#D9D9D9] dark:bg-gray-700 rounded text-gray-700 dark:text-gray-300">
                                                    {{ $product->size ?? 'L' }}
                                                </span>
                                            </div>

                                            <p
                                                class="text-gray-500 dark:text-gray-400 text-[10px] sm:text-xs mt-0.5 truncate">
                                                {{ $product->category->name ?? 'No Category' }}
                                            </p>
                                            <p
                                                class="text-gray-500 dark:text-gray-400 text-[10px] sm:text-xs mt-0.5 truncate">
                                                <i> {{ $product->barangay->name ?? 'N/A' }}, Cebu City</i>
                                            </p>

                                            <div class="flex justify-between items-center mt-1">
                                                <p
                                                    class="text-xs sm:text-sm font-bold {{ $product->listingtype === 'for donation' ? 'text-gray-700' : 'text-black-600' }}">
                                                    {{ $product->listingtype === 'for donation' ? 'For Donation' : '₱' . number_format($product->price, 2) }}
                                                </p>

                                                <button
                                                    class="favorite-btn text-gray-400 hover:text-gray-600 focus:outline-none transition-colors"
                                                    data-id="{{ $product->id }}" type="button"
                                                    onclick="event.preventDefault(); event.stopPropagation();">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="h-4 w-4 sm:h-5 sm:w-5" fill="none" viewBox="0 0 24 24"
                                                        stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <x-empty-message message="No active products found." link="{{ route('products.create') }}"
                            buttonText="Add Product" icon="shopping-cart" />
                    @endif
                </div>
            </div>
        </div>
    </div>

    <script>
        document.querySelectorAll('.favorite-btn').forEach(button => {
            button.addEventListener('click', function() {
                const svg = this.querySelector('svg');
                if (svg.getAttribute('fill') === 'none') {
                    svg.setAttribute('fill', 'currentColor');
                    svg.setAttribute('stroke', 'none');
                    this.classList.add('text-gray-600');
                } else {
                    svg.setAttribute('fill', 'none');
                    svg.setAttribute('stroke', 'currentColor');
                    this.classList.remove('text-gray-600');
                }
            });
        });
    </script>
</x-app-layout>
