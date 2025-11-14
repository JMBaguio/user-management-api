<x-app-layout>
    <!-- Particle Background Canvas -->
    <div class="fixed inset-0 pointer-events-none z-0" id="particle-background"></div>

    <!-- Hero Section -->
    <div class="w-full bg-[#F4F2ED] dark:bg-gray-800  shadow-sm overflow-hidden relative z-10">
        <!-- Hero Section Particle Background -->
        <div class="absolute inset-0 pointer-events-none z-0" id="hero-particles"></div>
        <!-- Floating Particles Background (inside Hero) -->
        <div class="absolute inset-0 pointer-events-none z-0 opacity-30">
            <div class="absolute top-1/4 left-1/4 w-2 h-2 bg-[#B59F84] rounded-full animate-float-1"></div>
            <div class="absolute top-1/3 right-1/3 w-3 h-3 bg-[#8A7B66] rounded-full animate-float-2"></div>
            <div class="absolute bottom-1/4 left-1/3 w-2 h-2 bg-[#634600] rounded-full animate-float-3"></div>
            <div class="absolute top-2/3 right-1/4 w-4 h-4 bg-[#B59F84] rounded-full animate-float-4"></div>
            <div class="absolute bottom-1/3 left-1/5 w-3 h-3 bg-[#8A7B66] rounded-full animate-float-5"></div>
            <div class="absolute top-1/5 right-1/5 w-2 h-2 bg-[#634600] rounded-full animate-float-6"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 md:py-28 relative z-10">
            <!-- Mobile Layout -->
            <div class="flex flex-col md:hidden text-center">
                <div class="p-4 font-poppins">
                    <h1
                        class="text-3xl font-bold text-[#634600] dark:text-[#f5d68b] leading-tight mb-4 animate-fade-in-up">
                        Refresh Your Wardrobe Sustainably With Thrift-IT's Unique Finds
                    </h1>

                    <p
                        class="text-[#786126] dark:text-[#e9c87b] text-base leading-relaxed mb-6 animate-fade-in-up animation-delay-200">
                        Fashion with a Purpose—Shop, Upcycle, and Donate to Create a Sustainable Tomorrow.
                    </p>

                    <div class="relative mb-6 animate-float">
                        <img src="{{ asset('images/image152.png') }}" alt="Thrift-IT Sustainable Fashion"
                            class="mx-auto w-full max-w-[280px] h-auto object-contain transform transition-transform duration-700 hover:scale-105">
                        <span
                            class="absolute bottom-2 right-2 bg-white px-3 py-1 rounded-full text-xs text-[#7C6A46] font-medium shadow-sm animate-pulse">
                            Sustainable Fashion
                        </span>
                    </div>

                    <a href="{{ route('products.create') }}"
                        class="inline-flex items-center justify-center bg-[#B59F84] text-white px-8 py-3 rounded-full text-base font-semibold hover:bg-[#a08e77] transform hover:scale-105 transition-all duration-300 shadow-md animate-bounce-in animation-delay-500 relative z-10">
                        Get Started
                    </a>
                </div>
            </div>

            <!-- Desktop layout (side by side) -->
            <div class="hidden md:flex md:flex-row md:items-center ">
                <!-- Text Content for Desktop with Background Image -->
                <div class="p-3 md:w-1/2 font-poppins relative">
                    <!-- Background Image - Adjustable positioning -->
                    <div class="absolute top-[-100px] left-[-150px] z-0 w-[145px] h-[600px]">
                        <img src="{{ asset('images/Rectangle123.png') }}" alt="Background" class="w-full h-full">
                    </div>
                    <!-- Text Content (with higher z-index) -->
                    <div class="relative z-10">
                        <h1
                            class="text-5xl lg:text-4xl font-bold text-custom-brown leading-tight dark:text-[#f5d68b] animate-text-reveal">
                            Refresh Your Wardrobe
                            <span class="block h-[20px] " aria-hidden="true"></span>
                            Sustainably With Thrift-IT's
                            <span class="block h-[20px]" aria-hidden="true"></span>
                            Unique Finds
                            <span class="block h-[20px]" aria-hidden="true"></span>
                        </h1>
                        <p
                            class="mt-2 text-[#603E14] dark:text-[#f5d68b] text-sm leading-relaxed animate-fade-in animation-delay-800">
                            Fashion meets purpose — shop, sell, and donate
                            <span class="block h-[0px]" aria-hidden="true"></span>
                            thrifted clothing to embrace a greener future.
                            <span class="block h-[20px]" aria-hidden="true"></span>
                        </p>
                        <div class="mt-4">
                            <div
                                class="flex flex-col relative left-[500px] animate-slide-in-right animation-delay-1000">
                                <a href="{{ route('products.create') }}"
                                    class="inline-flex items-center justify-center bg-[#B59F84] text-white px-3 py-3 rounded-full text-base
                    font-semibold hover:bg-[#a08e77] transform hover:scale-105 transition-all duration-300 shadow-md w-[140px] hover:shadow-lg hover:glow relative z-10">
                                    Get Started
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Image for Desktop -->
                <div class="md:w-1/2 flex felx-col relative left-[70px] top-[45px] overflow-hidden">
                    <div class="relative overflow-hidden animate-zoom-in animation-delay-600">
                        <img src="{{ asset('images/image152.png') }}" alt="Thrift-IT Sustainable Fashion"
                            class="w-full max-h-[500px] object-contain transform transition-all duration-1000 hover:scale-110 hover:rotate-1 relative z-10">
                        <div
                            class="absolute inset-0 bg-gradient-to-r from-transparent via-white/10 to-transparent animate-shimmer">
                        </div>
                    </div>
                </div>
            </div>
            <!-- Scroll Indicator -->
            <div class="absolute bottom-8 left-[600px] transform -translate-x-1/2 animate-bounce z-10">
                <div class="w-6 h-10 border-2 border-[#634600] rounded-full flex justify-center">
                    <div class="w-1 h-3 bg-[#634600] rounded-full mt-2 animate-scroll"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- First Segment -->
    <div class="py-6 bg-white dark:bg-gray-900 dark:text-gray-200 overflow-hidden relative z-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-4 lg:px-8 font-poppins">

            <!-- Segment Showcase -->
            <div class="mb-6 text-center sm:text-left animate-fade-in-up">
                <h2 class="text-xl sm:text-2xl font-bold text-custom-dark-brown">
                    <i>THRIFT BY FASHION</i>
                </h2>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                <!-- Women Segment -->
                <div class="group overflow-hidden rounded-md shadow-md h-auto w-full animate-stagger-1 relative z-10">
                    <a href="{{ route('segments.show', ['segment' => '2']) }}" class="block relative overflow-hidden">
                        <div class="relative overflow-hidden">
                            <img src="{{ asset('images/women.png') }}" alt="Shop by Women"
                                class="w-full h-[400px] object-cover transition-all duration-700 group-hover:scale-110">
                            <div
                                class="absolute inset-0 bg-black/0 group-hover:bg-black/20 transition-all duration-500">
                            </div>
                            <div
                                class="absolute bottom-4 left-4 transform translate-y-8 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-500 delay-200">
                                <span
                                    class="bg-white/90 text-[#634600] px-3 py-1 rounded-full text-sm font-semibold backdrop-blur-sm">
                                    Explore Collection
                                </span>
                            </div>
                        </div>
                    </a>
                    <div
                        class="p-4 bg-white dark:bg-gray-800 transform transition-transform duration-300 group-hover:-translate-y-1">
                        <h3 class="text-lg font-semibold text-[#634600] dark:text-white mb-2">Women's Fashion</h3>
                        <p class="text-sm text-[#603E14] dark:text-gray-300">
                            Explore our selection of quality men's apparel. From casual wear to
                            professional attire, find timeless pieces that combine style, comfort,
                            and sustainability in every thread.

                        </p>
                    </div>
                </div>

                <!-- Men Segment -->
                <div class="group overflow-hidden rounded-md shadow-md h-auto w-full animate-stagger-2 relative z-10">
                    <a href="{{ route('segments.show', ['segment' => '1']) }}" class="block relative overflow-hidden">
                        <div class="relative overflow-hidden">
                            <img src="{{ asset('images/men.png') }}" alt="Shop by Men"
                                class="w-full h-[400px] object-cover transition-all duration-700 group-hover:scale-110">
                            <div
                                class="absolute inset-0 bg-black/0 group-hover:bg-black/20 transition-all duration-500">
                            </div>
                            <div
                                class="absolute bottom-4 left-4 transform translate-y-8 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-500 delay-200">
                                <span
                                    class="bg-white/90 text-[#634600] px-3 py-1 rounded-full text-sm font-semibold backdrop-blur-sm">
                                    Explore Collection
                                </span>
                            </div>
                        </div>
                    </a>
                    <div
                        class="p-4 bg-white dark:bg-gray-800 transform transition-transform duration-300 group-hover:-translate-y-1">
                        <h3 class="text-lg font-semibold text-[#634600] dark:text-white mb-2">Men's Collection</h3>
                        <p class="text-sm text-[#603E14] dark:text-gray-300">

                            Discover a curated collection of stylish, pre-loved women's clothing.
                            From everyday essentials to statement pieces, find unique items that
                            express your personal style while supporting sustainable fashion.
                        </p>
                    </div>
                </div>

                <!-- Kids Segment -->
                <div class="group overflow-hidden rounded-md shadow-md h-auto w-full animate-stagger-3 relative z-10">
                    <a href="{{ route('segments.show', ['segment' => '3']) }}" class="block relative overflow-hidden">
                        <div class="relative overflow-hidden">
                            <img src="{{ asset('images/kids.png') }}" alt="Shop by Kids"
                                class="w-full h-[400px] object-cover transition-all duration-700 group-hover:scale-110">
                            <div
                                class="absolute inset-0 bg-black/0 group-hover:bg-black/20 transition-all duration-500">
                            </div>
                            <div
                                class="absolute bottom-4 left-4 transform translate-y-8 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-500 delay-200">
                                <span
                                    class="bg-white/90 text-[#634600] px-3 py-1 rounded-full text-sm font-semibold backdrop-blur-sm">
                                    Explore Collection
                                </span>
                            </div>
                        </div>
                    </a>
                    <div
                        class="p-4 bg-white dark:bg-gray-800 transform transition-transform duration-300 group-hover:-translate-y-1">
                        <h3 class="text-lg font-semibold text-[#634600] dark:text-white mb-2">Kids' Corner</h3>
                        <p class="text-sm text-[#603E14] dark:text-gray-300">
                            Adorable and practical clothing for the little ones. Our kids' collection
                            features gently-used items that are perfect for play, school, and special
                            occasions while teaching the value of sustainability early.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Show products in dashboard --}}
    <div
        class="shadow-sm overflow-hidden dark:bg-gray-800 bg-white my-0 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="p-4 sm:p-6" id="productsContainer">
            <!-- Filters Section with Higher z-index -->
            <div class="flex gap-2 relative z-50">
                <!-- Category Dropdown -->
                <div x-data="{ open: false }" class="relative z-50">
                    <button @click="open = !open"
                        class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-100 text-sm shadow-sm z-50">
                        <span
                            id="categoryButtonText">{{ isset($selectedCategoryId) && $categories->where('id', $selectedCategoryId)->first() ? $categories->where('id', $selectedCategoryId)->first()->name : 'Category' }}</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-700 dark:text-gray-300"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    </button>
                    <!-- Dropdown Menu -->
                    <div x-cloak x-show="open" @click.outside="open = false"
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 transform scale-95"
                        x-transition:enter-end="opacity-100 transform scale-100"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100 transform scale-100"
                        x-transition:leave-end="opacity-0 transform scale-95"
                        class="absolute left-0 mt-2 w-48 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl shadow-lg z-[60] py-1 max-h-64 overflow-y-auto">
                        <a data-category-link data-category-name="All" href="{{ route('dashboard') }}"
                            class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 rounded-lg">
                            All Categories
                        </a>
                        @foreach ($categories as $cat)
                            <a data-category-link data-category-name="{{ $cat->name }}"
                                href="{{ route('dashboard', ['category' => $cat->id]) }}"
                                class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 rounded-lg {{ isset($selectedCategoryId) && (int) $selectedCategoryId === $cat->id ? 'font-semibold bg-gray-100 dark:bg-gray-700' : '' }}">
                                {{ $cat->name }}
                            </a>
                        @endforeach
                    </div>
                </div>

                <!-- Location Dropdown -->
                <div x-data="{ open: false }" class="relative z-50">
                    <button @click="open = !open"
                        class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-100 text-sm shadow-sm z-50">
                        <span
                            id="locationButtonText">{{ isset($selectedBarangayId) && $barangays->where('id', $selectedBarangayId)->first() ? $barangays->where('id', $selectedBarangayId)->first()->name : 'Location' }}</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-700 dark:text-gray-300"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    </button>
                    <!-- Dropdown Menu -->
                    <div x-cloak x-show="open" @click.outside="open = false"
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 transform scale-95"
                        x-transition:enter-end="opacity-100 transform scale-100"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100 transform scale-100"
                        x-transition:leave-end="opacity-0 transform scale-95"
                        class="absolute left-0 mt-2 w-48 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl shadow-lg z-[60] py-1 max-h-64 overflow-y-auto">
                        <a data-location-link data-location-name="All" href="{{ route('dashboard') }}"
                            class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 rounded-lg">
                            All Locations
                        </a>
                        @foreach ($barangays as $barangay)
                            <a data-location-link data-location-name="{{ $barangay->name }}"
                                href="{{ route('dashboard', ['barangay' => $barangay->id]) }}"
                                class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 rounded-lg {{ isset($selectedBarangayId) && (int) $selectedBarangayId === $barangay->id ? 'font-semibold bg-gray-100 dark:bg-gray-700' : '' }}">
                                {{ $barangay->name }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Loading Indicator -->
            <div id="loadingIndicator" class="hidden flex items-center justify-center py-4">
                <div class="animate-spin rounded-full h-8 w-8 border-b-2 border-[#634600]"></div>
                <span class="ml-2 text-gray-600 dark:text-gray-300">Loading products...</span>
            </div>

            <!-- Products Grid -->
            <div id="productsGrid" class="mt-4 relative z-10">
                @if ($products->count() > 0)
                    <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-2 sm:gap-4 md:gap-6">
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
                                        {{-- S3 BUCKET  fetch image --}}
                                        <img src="{{ $product->first_image }}" class="w-full h-full object-cover"
                                            alt="Product Image">
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
                                                class="text-xs sm:text-sm font-bold text-gray-900 dark:text-white transition-colors truncate max-w-[70%]">
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
                                                class="text-xs sm:text-sm font-bold dark:text-red-600 {{ $product->listingtype === 'for donation' ? 'text-gray-700' : 'text-black-600' }}">
                                                {{ $product->listingtype === 'for donation' ? 'For Donation' : '₱' . number_format($product->price, 2) }}
                                            </p>

                                            <button
                                                class="favorite-btn text-gray-400 hover:text-gray-600 focus:outline-none transition-colors"
                                                data-id="{{ $product->id }}" type="button"
                                                onclick="event.preventDefault(); event.stopPropagation();">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 sm:h-5 sm:w-5"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
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
                    <x-empty-message message="No active listing found." link="{{ route('products.create') }}"
                        buttonText="Add Items" icon="shopping-cart" />
                @endif
            </div>
        </div>
    </div>


    {{-- <!-- NEW: Why Choose Thrift-IT Section -->
    <div class="py-16 bg-gradient-to-br from-[#F8EED6] to-[#F4F2ED] dark:from-gray-800 dark:to-gray-900 overflow-hidden relative z-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="text-center mb-16 animate-fade-in-up">
                <h2 class="text-3xl md:text-4xl font-bold text-[#634600] dark:text-white mb-4 font-poppins animate-text-glow">
                    Why Choose Thrift-IT?
                </h2>
                <p class="text-lg text-[#603E14] dark:text-gray-300 max-w-3xl mx-auto animate-fade-in-up animation-delay-200">
                    We're revolutionizing sustainable fashion by making it accessible, affordable, and impactful for everyone
                </p>
            </div>

            <!-- Features Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="group bg-white dark:bg-gray-800 rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 animate-stagger-1 relative z-10">
                    <div class="w-16 h-16 bg-[#F8EED6] dark:bg-[#634600] rounded-full flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300 animate-pulse-slow">
                        <svg class="w-8 h-8 text-[#634600] dark:text-white transform group-hover:rotate-12 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-[#634600] dark:text-white mb-4 group-hover:text-[#816849] transition-colors duration-300">Quality Assured</h3>
                    <p class="text-[#603E14] dark:text-gray-300 mb-4">
                        Every item is carefully inspected and authenticated to ensure you receive only the best pre-loved fashion pieces.
                    </p>
                    <ul class="space-y-2 text-sm text-[#603E14] dark:text-gray-300">
                        <li class="flex items-center transform transition-transform duration-300 hover:translate-x-2">
                            <svg class="w-4 h-4 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            Professional quality checks
                        </li>
                        <li class="flex items-center transform transition-transform duration-300 hover:translate-x-2">
                            <svg class="w-4 h-4 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            Authenticity verification
                        </li>
                        <li class="flex items-center transform transition-transform duration-300 hover:translate-x-2">
                            <svg class="w-4 h-4 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            Condition grading system
                        </li>
                    </ul>
                </div>

                <!-- Feature 2 -->
                <div class="group bg-white dark:bg-gray-800 rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 animate-stagger-2 relative z-10">
                    <div class="w-16 h-16 bg-[#F8EED6] dark:bg-[#634600] rounded-full flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300 animate-pulse-slow">
                        <svg class="w-8 h-8 text-[#634600] dark:text-white transform group-hover:rotate-12 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-[#634600] dark:text-white mb-4 group-hover:text-[#816849] transition-colors duration-300">Eco-Impact Tracking</h3>
                    <p class="text-[#603E14] dark:text-gray-300 mb-4">
                        See the real environmental impact of your sustainable choices with our carbon footprint calculator.
                    </p>
                    
                </div>

                <!-- Feature 3 -->
                <div class="group bg-white dark:bg-gray-800 rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 animate-stagger-3 relative z-10">
                    <div class="w-16 h-16 bg-[#F8EED6] dark:bg-[#634600] rounded-full flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300 animate-pulse-slow">
                        <svg class="w-8 h-8 text-[#634600] dark:text-white transform group-hover:rotate-12 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-[#634600] dark:text-white mb-4 group-hover:text-[#816849] transition-colors duration-300">Community Driven</h3>
                    <p class="text-[#603E14] dark:text-gray-300 mb-4">
                        Join thousands of fashion enthusiasts who believe in sustainable style and circular fashion economy.
                    </p>
                   
                </div>
            </div>

            <!-- Additional Features Row -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-12">
                <!-- Feature 4 -->
                <div class="bg-white dark:bg-gray-800 rounded-2xl p-8 shadow-lg transform transition-all duration-500 hover:scale-105 animate-fade-in-up animation-delay-400 relative z-10">
                    <div class="flex items-start">
                        <div class="w-12 h-12 bg-[#F8EED6] dark:bg-[#634600] rounded-full flex items-center justify-center mr-4 flex-shrink-0 animate-bounce-gentle">
                            <svg class="w-6 h-6 text-[#634600] dark:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-[#634600] dark:text-white mb-2">Easy Selling Process</h3>
                            <p class="text-[#603E14] dark:text-gray-300 text-sm">
                                List your pre-loved items in minutes with our streamlined selling process. We handle the logistics while you earn from your sustainable choices.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Feature 5 -->
                <div class="bg-white dark:bg-gray-800 rounded-2xl p-8 shadow-lg transform transition-all duration-500 hover:scale-105 animate-fade-in-up animation-delay-600 relative z-10">
                    <div class="flex items-start">
                        <div class="w-12 h-12 bg-[#F8EED6] dark:bg-[#634600] rounded-full flex items-center justify-center mr-4 flex-shrink-0 animate-bounce-gentle animation-delay-200">
                            <svg class="w-6 h-6 text-[#634600] dark:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-[#634600] dark:text-white mb-2">Circular Fashion Impact</h3>
                            <p class="text-[#603E14] dark:text-gray-300 text-sm">
                                Every purchase extends the life of clothing items, reducing textile waste and promoting a true circular fashion economy.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CTA Section -->
            <div class="text-center mt-16 bg-white dark:bg-gray-800 rounded-2xl p-8 shadow-lg transform transition-all duration-700 hover:shadow-2xl animate-pulse-soft relative z-10">
                <h3 class="text-2xl font-bold text-[#634600] dark:text-white mb-4">Ready to Make a Difference?</h3>
                <p class="text-[#603E14] dark:text-gray-300 mb-6 max-w-2xl mx-auto">
                    Join our community of conscious shoppers and start your sustainable fashion journey today. Every purchase makes an impact.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('products.index') }}" 
                       class="inline-flex items-center justify-center bg-[#816849] text-white px-8 py-4 rounded-full text-lg font-semibold hover:bg-[#634600] transform hover:scale-105 transition-all duration-300 shadow-lg hover:shadow-xl hover:glow animate-bounce-in relative z-10">
                        Start Shopping
                        <svg class="w-5 h-5 ml-2 transform transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                        </svg>
                    </a>
                    <a href="{{ route('products.create') }}" 
                       class="inline-flex items-center justify-center bg-white text-[#816849] border-2 border-[#816849] px-8 py-4 rounded-full text-lg font-semibold hover:bg-[#F8EED6] transform hover:scale-105 transition-all duration-300 shadow-lg hover:shadow-xl animate-bounce-in animation-delay-200 relative z-10">
                        Sell Your Items
                        <svg class="w-5 h-5 ml-2 transform transition-transform duration-300 group-hover:rotate-90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div> --}}

    <!-- Rest of the content remains the same -->
    <div class="py-16 bg-[#F8EED6] dark:bg-gray-800 dark:text-gray-200 overflow-hidden relative z-10">
        <div class="hidden md:block dark:bg-gray-800 dark:text-gray-200">
            <div class="mx-auto px-4 sm:px-6 lg:px-8 dark:bg-gray-800 dark:text-gray-200">
                <!-- Upcycling Section -->
                <div
                    class="flex flex-col md:flex-row relative p-8 items-center scroll-animate left-[50px] animate-slide-in-left">
                    <!-- Text Content -->
                    <div class="absolute top-[1710px] left-[-30px] z-0 animate-float-slow">
                        <img src="{{ asset('images/Ellipse 23.png') }}" alt="Background decoration"
                            class="w-[196px] h-[221px]">
                    </div>
                    <div class="md:w-[800px] md:pr-4 mb-3 md:mb-0 ">
                        <h2 class="text-3xl font-bold text-[#634600] mb-2 leading-tight animate-text-reveal dark:text-[#f5d68b]"
                            style="font-family: Poppins; font-weight: 800; font-size: 40px; line-height: 100%; letter-spacing: 5%;">
                            Revamp Your Wardrobe With
                            <span class="block h-[20px] dark:text-[#f5d68b]" aria-hidden="true"></span>
                            Upcycling: Discover Sustainable
                            <span class="block h-[20px] dark:text-[#f5d68b]" aria-hidden="true"></span>
                            Style
                            <img src="{{ asset('images/image 157.png') }}" alt="emoji"
                                class="inline-block h-6 w-6 align-middle h-[40px] w-[40px] animate-spin-slow">
                            <span class="block h-[20px]" aria-hidden="true"></span>
                        </h2>
                        <p
                            class="font-poppins text-[#603E14] mb-6 text-lg leading-[30px] tracking-[0.1em] dark:text-[#f5d68b] animate-fade-in animation-delay-400">
                            Fashion with a Purpose—Shop, Upcycle, and Donate to Create a Sustainable Tomorrow.
                        </p>
                        <a href="#"
                            class="inline-flex items-center justify-center bg-[#816849] dark:text-[#f5d68b] text-white px-4 py-3 rounded-[30px] text-lg font-semibold hover:bg-[#a08e77] hover:scale-105 transition-all duration-200 w-[200px] animate-pulse-soft hover:animate-none relative z-10">
                            Upcycle Now
                        </a>
                    </div>

                    <!-- Image -->
                    <div class="md:w-1/3 flex flex-col relative left-[30px] animate-zoom-in animation-delay-600">
                        <img src="{{ asset('images/upcycling-image.jpg') }}" alt="Upcycling"
                            class="rounded-lg shadow-md w-full h-80 object-cover transform transition-all duration-700 hover:scale-105 hover:shadow-xl relative z-10">
                    </div>
                </div>

                <!-- Donate Section -->
                <div class="flex flex-col md:flex-row items-center scroll-animate animate-slide-in-right">
                    <!-- Image -->
                    <div class="md:w-1/3 flex flex-col relative right-[-80px] animate-zoom-in animation-delay-400">
                        <img src="{{ asset('images/donate-image.jpg') }}" alt="Donate"
                            class="rounded-lg shadow-md w-full h-80 object-cover transform transition-all duration-700 hover:scale-105 hover:shadow-xl relative z-10">
                    </div>

                    <!-- Text Content -->
                    <div class="md:w-[800px] flex flex-col relative md:pr-4 mb-3 md:mb-0 left-[200px] ">
                        <h2 class="text-3xl font-bold text-[#634600] mb-2 leading-tight animate-text-reveal dark:text-[#f5d68b]"
                            style="font-family: Poppins; font-weight: 800; font-size: 40px; line-height: 100%; letter-spacing: %;">
                            Style with a Purpose: Donate Your
                            <span class="block h-[20px]" aria-hidden="true"></span>
                            Pre-Loved Clothes and Create a
                            <span class="block h-[20px]" aria-hidden="true"></span>
                            Sustainable Future
                            <img src="{{ asset('images/Rectangle 142.png') }}" alt="emoji"
                                class="inline-block h-6 w-6 align-middle h-[40px] w-[40px] animate-bounce-gentle">
                            <span class="block h-[20px]" aria-hidden="true"></span>
                        </h2>
                        <p
                            class="font-poppins text-[#603E14] mb-6 text-lg leading-[30px] tracking-[0.1em] animate-fade-in animation-delay-600 dark:text-[#f5d68b]">
                            Fashion with a Purpose—Shop, Upcycle, and Donate to Create a Sustainable Tomorrow.
                        </p>
                        <a href="{{ route('donations.hub') }}"
                            class="inline-flex items-center justify-center bg-[#816849] text-white px-4 py-3 rounded-[30px] text-lg font-semibold hover:bg-[#a08e77] hover:scale-105 transition-all duration-200 w-[200px] animate-pulse-soft hover:animate-none relative z-10">
                            Donate Now
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="absolute top-[2220px] right-[0px] hidden md:block z-0 animate-float-slow">
            <img src="{{ asset('images/Ellipse 21.png') }}" alt="Background decoration" class="w-[90px] h-[330px]">
        </div>
    </div>

    <!-- Mobile Version -->
    <div class="md:hidden bg-[#F8EED6] dark:bg-gray-800  py-10 relative z-10">
        <div class="mx-auto px-5">
            <!-- Mobile Upcycling Section -->
            <div class="mb-14 animate-fade-in-up">
                <div class="text-center mb-8">
                    <div class="flex justify-center items-center mb-4">
                        <div
                            class="w-10 h-10 bg-[#634600] rounded-full flex items-center justify-center mr-2 animate-pulse-slow">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                            </svg>
                        </div>
                        <h2 class="text-2xl font-bold text-[#634600] leading-tight font-poppins dark:text-[#f5d68b]">
                            Revamp With Upcycling
                        </h2>
                    </div>
                    <p class="text-[#603E14] text-base leading-relaxed px-2 font-poppins dark:text-[#f5d68b]">
                        Fashion with a Purpose—Shop, Upcycle, and Donate to Create a Sustainable Tomorrow.
                    </p>
                </div>

                <div class="mb-7 relative animate-zoom-in">
                    <div
                        class="rounded-2xl overflow-hidden shadow-lg transform transition-all duration-500 hover:scale-105">
                        <img src="{{ asset('images/upcycling-image.jpg') }}" alt="Upcycling"
                            class="w-full h-64 object-cover relative z-10">
                    </div>
                    <div class="absolute -bottom-3 -right-3 bg-white rounded-full p-2 shadow-md animate-bounce-gentle">
                        <img src="{{ asset('images/image 157.png') }}" alt="Recycle emoji" class="h-8 w-8">
                    </div>
                </div>

                <div class="text-center mt-6">
                    <a href="#"
                        class="inline-flex items-center justify-center bg-[#816849] dark:text-[#f5d68b] text-white px-8 py-4 rounded-full text-base font-semibold hover:bg-[#a08e77] transition-all duration-300 shadow-md transform hover:scale-105 animate-bounce-in relative z-10">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                        </svg>
                        Upcycle Now
                    </a>
                </div>
            </div>

            <!-- Mobile Donate Section -->
            <div class="mb-12 animate-fade-in-up animation-delay-200">
                <div class="text-center mb-8">
                    <div class="flex justify-center items-center mb-4">
                        <div
                            class="w-10 h-10 bg-[#634600] rounded-full flex items-center justify-center mr-2 animate-pulse-slow">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 14v6m-3-3h6M6 10h2a2 2 0 012 2v6a2 2 0 01-2 2H6a2 2 0 01-2-2v-6a2 2 0 012-2zm10-4a2 2 0 11-4 0 2 2 0 014 0zM4 10a2 2 0 100-4 2 2 0 000 4zm16-2a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                        <h2 class="text-2xl font-bold text-[#634600] leading-tight font-poppins dark:text-[#f5d68b]">
                            Donate With Purpose
                        </h2>
                    </div>
                    <p class="text-[#603E14] text-base leading-relaxed px-2 font-poppins dark:text-[#f5d68b]">
                        Fashion with a Purpose—Shop, Upcycle, and Donate to Create a Sustainable Tomorrow.
                    </p>
                </div>

                <div class="mb-7 relative animate-zoom-in animation-delay-400">
                    <div
                        class="rounded-2xl overflow-hidden shadow-lg transform transition-all duration-500 hover:scale-105">
                        <img src="{{ asset('images/donate-image.jpg') }}" alt="Donate"
                            class="w-full h-64 object-cover relative z-10">
                    </div>
                    <div
                        class="absolute -bottom-3 -right-3 bg-white rounded-full p-2 shadow-md animate-bounce-gentle animation-delay-200">
                        <img src="{{ asset('images/Rectangle 142.png') }}" alt="Donation emoji" class="h-8 w-8">
                    </div>
                </div>

                <div class="text-center mt-6">
                    <a href="{{ route('donations.hub') }}"
                        class="inline-flex items-center justify-center bg-[#816849] text-white  dark:text-[#f5d68b] px-8 py-4 rounded-full text-base font-semibold hover:bg-[#a08e77] transition-all duration-300 shadow-md transform hover:scale-105 animate-bounce-in animation-delay-400 relative z-10">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 14v6m-3-3h6M6 10h2a2 2 0 012 2v6a2 2 0 01-2 2H6a2 2 0 01-2-2v-6a2 2 0 012-2zm10-4a2 2 0 11-4 0 2 2 0 014 0zM4 10a2 2 0 100-4 2 2 0 000 4zm16-2a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        Donate Now
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Add CSS Animations -->
    <style>
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-50px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(50px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes zoomIn {
            from {
                opacity: 0;
                transform: scale(0.9);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        /* Floating dots background (like Upcycler) */
        @keyframes float-1 {

            0%,
            100% {
                transform: translate(0, 0) rotate(0deg);
            }

            33% {
                transform: translate(30px, -50px) rotate(120deg);
            }

            66% {
                transform: translate(-20px, 20px) rotate(240deg);
            }
        }

        @keyframes float-2 {

            0%,
            100% {
                transform: translate(0, 0) rotate(0deg);
            }

            33% {
                transform: translate(-40px, -30px) rotate(-120deg);
            }

            66% {
                transform: translate(20px, 40px) rotate(-240deg);
            }
        }

        @keyframes float-3 {

            0%,
            100% {
                transform: translate(0, 0) rotate(0deg);
            }

            33% {
                transform: translate(50px, 20px) rotate(180deg);
            }

            66% {
                transform: translate(-30px, -40px) rotate(360deg);
            }
        }

        @keyframes float-4 {

            0%,
            100% {
                transform: translate(0, 0) rotate(0deg);
            }

            33% {
                transform: translate(-30px, 50px) rotate(-180deg);
            }

            66% {
                transform: translate(40px, -20px) rotate(-360deg);
            }
        }

        @keyframes float-5 {

            0%,
            100% {
                transform: translate(0, 0) rotate(0deg);
            }

            33% {
                transform: translate(20px, -30px) rotate(90deg);
            }

            66% {
                transform: translate(-50px, 30px) rotate(270deg);
            }
        }

        @keyframes float-6 {

            0%,
            100% {
                transform: translate(0, 0) rotate(0deg);
            }

            33% {
                transform: translate(-20px, 40px) rotate(-90deg);
            }

            66% {
                transform: translate(30px, -50px) rotate(-270deg);
            }
        }

        @keyframes floatSlow {

            0%,
            100% {
                transform: translateY(0px) rotate(0deg);
            }

            50% {
                transform: translateY(-15px) rotate(1deg);
            }
        }

        @keyframes bounceIn {
            0% {
                opacity: 0;
                transform: scale(0.3);
            }

            50% {
                opacity: 1;
                transform: scale(1.05);
            }

            70% {
                transform: scale(0.9);
            }

            100% {
                opacity: 1;
                transform: scale(1);
            }
        }

        @keyframes textReveal {
            from {
                clip-path: polygon(0 0, 0 0, 0 100%, 0% 100%);
            }

            to {
                clip-path: polygon(0 0, 100% 0, 100% 100%, 0 100%);
            }
        }

        @keyframes spinSlow {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }

        @keyframes bounceGentle {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-5px);
            }
        }

        @keyframes pulseSlow {

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: 0.8;
            }
        }

        @keyframes pulseSoft {

            0%,
            100% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.02);
            }
        }

        @keyframes shimmer {
            0% {
                transform: translateX(-100%);
            }

            100% {
                transform: translateX(100%);
            }
        }

        @keyframes textGlow {

            0%,
            100% {
                text-shadow: 0 0 20px rgba(99, 70, 0, 0.3);
            }

            50% {
                text-shadow: 0 0 30px rgba(99, 70, 0, 0.6), 0 0 40px rgba(99, 70, 0, 0.4);
            }
        }

        /* Animation Classes */
        .animate-fade-in-up {
            animation: fadeInUp 0.8s ease-out;
        }

        .animate-fade-in {
            animation: fadeIn 1s ease-out;
        }

        .animate-slide-in-left {
            animation: slideInLeft 0.8s ease-out;
        }

        .animate-slide-in-right {
            animation: slideInRight 0.8s ease-out;
        }

        .animate-zoom-in {
            animation: zoomIn 0.8s ease-out;
        }

        .animate-float {
            animation: float 3s ease-in-out infinite;
        }

        .animate-float-1 {
            animation: float-1 20s ease-in-out infinite;
        }

        .animate-float-2 {
            animation: float-2 25s ease-in-out infinite;
        }

        .animate-float-3 {
            animation: float-3 30s ease-in-out infinite;
        }

        .animate-float-4 {
            animation: float-4 35s ease-in-out infinite;
        }

        .animate-float-5 {
            animation: float-5 40s ease-in-out infinite;
        }

        .animate-float-6 {
            animation: float-6 45s ease-in-out infinite;
        }

        .animate-float-slow {
            animation: floatSlow 6s ease-in-out infinite;
        }

        .animate-bounce-in {
            animation: bounceIn 0.8s ease-out;
        }

        .animate-text-reveal {
            animation: textReveal 1.2s ease-out;
        }

        .animate-spin-slow {
            animation: spinSlow 8s linear infinite;
        }

        .animate-bounce-gentle {
            animation: bounceGentle 2s ease-in-out infinite;
        }

        .animate-pulse-slow {
            animation: pulseSlow 3s ease-in-out infinite;
        }

        .animate-pulse-soft {
            animation: pulseSoft 2s ease-in-out infinite;
        }

        .animate-shimmer {
            animation: shimmer 2s ease-in-out infinite;
        }

        .animate-text-glow {
            animation: textGlow 3s ease-in-out infinite;
        }

        /* Stagger animations */
        .animate-stagger-1 {
            animation-delay: 0.1s;
        }

        .animate-stagger-2 {
            animation-delay: 0.2s;
        }

        .animate-stagger-3 {
            animation-delay: 0.3s;
        }

        .animation-delay-200 {
            animation-delay: 0.2s;
        }

        .animation-delay-400 {
            animation-delay: 0.4s;
        }

        .animation-delay-600 {
            animation-delay: 0.6s;
        }

        .animation-delay-800 {
            animation-delay: 0.8s;
        }

        .animation-delay-1000 {
            animation-delay: 1s;
        }

        /* Hover effects */
        .hover\:glow:hover {
            box-shadow: 0 0 20px rgba(129, 104, 73, 0.4);
        }

        /* Ensure animations only run once when scrolled into view */
        @media (prefers-reduced-motion: reduce) {
            * {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
            }
        }

        /* Hero Particle Container */
        #hero-particles {
            background: transparent;
            overflow: hidden;
        }
    </style>

    <!-- Hero Section Particle System JavaScript -->
    <script>
        class HeroParticleSystem {
            constructor() {
                this.canvas = document.getElementById('hero-particles');
                this.ctx = this.canvas.getContext('2d');
                this.particles = [];
                this.mouse = {
                    x: 0,
                    y: 0,
                    radius: 120
                };
                this.heroSection = this.canvas.parentElement;

                this.init();
                this.animate();
                this.bindEvents();
            }

            init() {
                this.resize();
                this.createParticles();
            }

            resize() {
                const heroRect = this.heroSection.getBoundingClientRect();
                this.canvas.width = heroRect.width;
                this.canvas.height = heroRect.height;
            }

            createParticles() {
                const particleCount = Math.min(80, Math.floor(this.canvas.width / 20));
                this.particles = [];

                for (let i = 0; i < particleCount; i++) {
                    this.particles.push({
                        x: Math.random() * this.canvas.width,
                        y: Math.random() * this.canvas.height,
                        size: Math.random() * 2 + 1,
                        speedX: (Math.random() - 0.5) * 0.3,
                        speedY: (Math.random() - 0.5) * 0.3,
                        color: this.getRandomParticleColor(),
                        opacity: Math.random() * 0.4 + 0.1,
                        sway: Math.random() * 2 - 1,
                        wave: Math.random() * Math.PI * 2
                    });
                }
            }

            getRandomParticleColor() {
                const colors = [
                    'rgba(181, 159, 132, 0.5)', // Beige
                    'rgba(129, 104, 73, 0.4)', // Brown
                    'rgba(99, 70, 0, 0.3)', // Dark Brown
                    'rgba(248, 238, 214, 0.2)', // Light Beige
                    'rgba(96, 62, 20, 0.3)', // Medium Brown
                    'rgba(120, 97, 38, 0.4)', // Golden Brown
                    'rgba(124, 106, 70, 0.3)' // Light Brown
                ];
                return colors[Math.floor(Math.random() * colors.length)];
            }

            animate() {
                this.ctx.clearRect(0, 0, this.canvas.width, this.canvas.height);

                this.updateParticles();
                this.drawParticles();
                this.drawConnections();

                requestAnimationFrame(() => this.animate());
            }

            updateParticles() {
                this.particles.forEach(particle => {
                    // Gentle wave movement
                    particle.wave += 0.02;
                    const waveEffect = Math.sin(particle.wave) * 0.2;

                    // Move particles with wave effect
                    particle.x += particle.speedX + waveEffect;
                    particle.y += particle.speedY + Math.cos(particle.wave) * 0.1;

                    // Mouse interaction
                    const dx = particle.x - this.mouse.x;
                    const dy = particle.y - this.mouse.y;
                    const distance = Math.sqrt(dx * dx + dy * dy);

                    if (distance < this.mouse.radius) {
                        const angle = Math.atan2(dy, dx);
                        const force = (this.mouse.radius - distance) / this.mouse.radius;
                        particle.x += Math.cos(angle) * force * 1.5;
                        particle.y += Math.sin(angle) * force * 1.5;
                    }

                    // Boundary wrap-around
                    if (particle.x < -10) particle.x = this.canvas.width + 10;
                    if (particle.x > this.canvas.width + 10) particle.x = -10;
                    if (particle.y < -10) particle.y = this.canvas.height + 10;
                    if (particle.y > this.canvas.height + 10) particle.y = -10;

                    // Pulsing opacity
                    particle.opacity = 0.1 + Math.abs(Math.sin(particle.wave * 0.5)) * 0.3;
                });
            }

            drawParticles() {
                this.particles.forEach(particle => {
                    // Draw main particle
                    this.ctx.beginPath();
                    this.ctx.arc(particle.x, particle.y, particle.size, 0, Math.PI * 2);
                    this.ctx.fillStyle = particle.color.replace(/[\d\.]+\)$/, particle.opacity + ')');
                    this.ctx.fill();

                    // Add subtle glow
                    this.ctx.shadowBlur = 8;
                    this.ctx.shadowColor = particle.color;

                    // Draw inner highlight for some particles
                    if (particle.size > 1.5) {
                        this.ctx.beginPath();
                        this.ctx.arc(particle.x - particle.size * 0.3, particle.y - particle.size * 0.3,
                            particle.size * 0.4, 0, Math.PI * 2);
                        this.ctx.fillStyle = `rgba(255, 255, 255, ${particle.opacity * 0.3})`;
                        this.ctx.fill();
                    }
                });
                this.ctx.shadowBlur = 0;
            }

            drawConnections() {
                const maxDistance = 120;

                for (let i = 0; i < this.particles.length; i++) {
                    for (let j = i + 1; j < this.particles.length; j++) {
                        const dx = this.particles[i].x - this.particles[j].x;
                        const dy = this.particles[i].y - this.particles[j].y;
                        const distance = Math.sqrt(dx * dx + dy * dy);

                        if (distance < maxDistance) {
                            const opacity = (1 - (distance / maxDistance)) * 0.15;
                            this.ctx.beginPath();
                            this.ctx.strokeStyle = `rgba(181, 159, 132, ${opacity})`;
                            this.ctx.lineWidth = 0.3;
                            this.ctx.moveTo(this.particles[i].x, this.particles[i].y);
                            this.ctx.lineTo(this.particles[j].x, this.particles[j].y);
                            this.ctx.stroke();
                        }
                    }
                }
            }

            bindEvents() {
                // Throttled resize handler
                let resizeTimeout;
                window.addEventListener('resize', () => {
                    clearTimeout(resizeTimeout);
                    resizeTimeout = setTimeout(() => {
                        this.resize();
                        this.createParticles();
                    }, 250);
                });

                // Mouse move with throttling
                let mouseMoveTimeout;
                window.addEventListener('mousemove', (e) => {
                    const heroRect = this.heroSection.getBoundingClientRect();
                    this.mouse.x = e.clientX - heroRect.left;
                    this.mouse.y = e.clientY - heroRect.top;

                    clearTimeout(mouseMoveTimeout);
                    mouseMoveTimeout = setTimeout(() => {
                        // Reset mouse position when not moving
                        this.mouse.x = -100;
                        this.mouse.y = -100;
                    }, 100);
                });

                window.addEventListener('mouseleave', () => {
                    this.mouse.x = -100;
                    this.mouse.y = -100;
                });

                // Touch events for mobile
                window.addEventListener('touchmove', (e) => {
                    e.preventDefault();
                    const touch = e.touches[0];
                    const heroRect = this.heroSection.getBoundingClientRect();
                    this.mouse.x = touch.clientX - heroRect.left;
                    this.mouse.y = touch.clientY - heroRect.top;
                });

                window.addEventListener('touchend', () => {
                    this.mouse.x = -100;
                    this.mouse.y = -100;
                });
            }
        }

        // Initialize hero particle system when page loads
        document.addEventListener('DOMContentLoaded', () => {
            new HeroParticleSystem();
        });

        // Dashboard filtering without page refresh
        document.addEventListener('DOMContentLoaded', function() {
            const productsGrid = document.getElementById('productsGrid');
            const loadingIndicator = document.getElementById('loadingIndicator');
            if (!productsGrid) return;

            // Helper function to show loading
            function showLoading() {
                if (loadingIndicator) {
                    loadingIndicator.classList.remove('hidden');
                }
                productsGrid.style.opacity = '0.5';
            }

            // Helper function to hide loading
            function hideLoading() {
                if (loadingIndicator) {
                    loadingIndicator.classList.add('hidden');
                }
                productsGrid.style.opacity = '1';
            }

            // Helper function to initialize favorite buttons
            function initFavoriteButtons() {
                document.querySelectorAll('.favorite-btn').forEach(button => {
                    // Remove existing event listeners
                    const newButton = button.cloneNode(true);
                    button.parentNode.replaceChild(newButton, button);

                    // Add new event listener
                    newButton.addEventListener('click', function(e) {
                        e.preventDefault();
                        e.stopPropagation();
                        const svg = this.querySelector('svg');
                        if (svg.getAttribute('fill') === 'none') {
                            svg.setAttribute('fill', 'currentColor');
                            svg.setAttribute('stroke', 'none');
                            this.classList.add('text-red-500');
                        } else {
                            svg.setAttribute('fill', 'none');
                            svg.setAttribute('stroke', 'currentColor');
                            this.classList.remove('text-red-500');
                        }
                    });
                });
            }

            // Handle category links
            document.querySelectorAll('[data-category-link]').forEach(link => {
                link.addEventListener('click', async (e) => {
                    e.preventDefault();

                    // Close dropdown
                    const dropdown = link.closest('[x-data]');
                    if (dropdown && dropdown.__x) {
                        dropdown.__x.$data.open = false;
                    }

                    const currentUrl = new URL(window.location);
                    const linkUrl = new URL(link.href, window.location.origin);
                    const categoryButtonText = document.getElementById('categoryButtonText');

                    // Update button text
                    const categoryName = link.getAttribute('data-category-name') || 'Category';
                    if (categoryButtonText) {
                        categoryButtonText.textContent = categoryName;
                    }

                    // Build query params preserving location
                    const params = new URLSearchParams();
                    if (linkUrl.searchParams.get('category')) {
                        params.set('category', linkUrl.searchParams.get('category'));
                    }
                    if (currentUrl.searchParams.get('barangay')) {
                        params.set('barangay', currentUrl.searchParams.get('barangay'));
                    }

                    showLoading();

                    try {
                        const dashboardUrl = '{{ route('dashboard') }}' + (params.toString() ?
                            '?' + params.toString() : '');
                        const response = await fetch(dashboardUrl, {
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                                'Accept': 'text/html'
                            }
                        });

                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }

                        const html = await response.text();
                        const parser = new DOMParser();
                        const doc = parser.parseFromString(html, 'text/html');
                        const newProductsGrid = doc.getElementById('productsGrid');

                        if (newProductsGrid) {
                            productsGrid.innerHTML = newProductsGrid.innerHTML;
                            initFavoriteButtons();
                        }
                    } catch (error) {
                        console.error('Error filtering products:', error);
                    } finally {
                        hideLoading();
                    }

                    // Update URL without reloading
                    const newUrl = new URL(window.location);
                    if (linkUrl.searchParams.get('category')) {
                        newUrl.searchParams.set('category', linkUrl.searchParams.get(
                            'category'));
                    } else {
                        newUrl.searchParams.delete('category');
                    }
                    if (currentUrl.searchParams.get('barangay')) {
                        newUrl.searchParams.set('barangay', currentUrl.searchParams.get(
                            'barangay'));
                    }
                    window.history.pushState({}, '', newUrl);
                });
            });

            // Handle location links
            document.querySelectorAll('[data-location-link]').forEach(link => {
                link.addEventListener('click', async (e) => {
                    e.preventDefault();

                    // Close dropdown
                    const dropdown = link.closest('[x-data]');
                    if (dropdown && dropdown.__x) {
                        dropdown.__x.$data.open = false;
                    }

                    const currentUrl = new URL(window.location);
                    const linkUrl = new URL(link.href, window.location.origin);
                    const locationButtonText = document.getElementById('locationButtonText');

                    // Update button text
                    const locationName = link.getAttribute('data-location-name') || 'Location';
                    if (locationButtonText) {
                        locationButtonText.textContent = locationName;
                    }

                    // Build query params preserving category
                    const params = new URLSearchParams();
                    if (currentUrl.searchParams.get('category')) {
                        params.set('category', currentUrl.searchParams.get('category'));
                    }
                    if (linkUrl.searchParams.get('barangay')) {
                        params.set('barangay', linkUrl.searchParams.get('barangay'));
                    }

                    showLoading();

                    try {
                        const dashboardUrl = '{{ route('dashboard') }}' + (params.toString() ?
                            '?' + params.toString() : '');
                        const response = await fetch(dashboardUrl, {
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                                'Accept': 'text/html'
                            }
                        });

                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }

                        const html = await response.text();
                        const parser = new DOMParser();
                        const doc = parser.parseFromString(html, 'text/html');
                        const newProductsGrid = doc.getElementById('productsGrid');

                        if (newProductsGrid) {
                            productsGrid.innerHTML = newProductsGrid.innerHTML;
                            initFavoriteButtons();
                        }
                    } catch (error) {
                        console.error('Error filtering products:', error);
                    } finally {
                        hideLoading();
                    }

                    // Update URL without reloading
                    const newUrl = new URL(window.location);
                    if (currentUrl.searchParams.get('category')) {
                        newUrl.searchParams.set('category', currentUrl.searchParams.get(
                            'category'));
                    }
                    if (linkUrl.searchParams.get('barangay')) {
                        newUrl.searchParams.set('barangay', linkUrl.searchParams.get(
                            'barangay'));
                    } else {
                        newUrl.searchParams.delete('barangay');
                    }
                    window.history.pushState({}, '', newUrl);
                });
            });

            // Initialize favorite buttons on page load
            initFavoriteButtons();

            // Existing JavaScript for other interactions
            document.querySelectorAll('.favorite-btn').forEach(button => {
                button.addEventListener('click', function() {
                    const svg = this.querySelector('svg');
                    if (svg.getAttribute('fill') === 'none') {
                        svg.setAttribute('fill', 'currentColor');
                        svg.setAttribute('stroke', 'none');
                        this.classList.add('text-red-500');
                    } else {
                        svg.setAttribute('fill', 'none');
                        svg.setAttribute('stroke', 'currentColor');
                        this.classList.remove('text-red-500');
                    }
                });
            });

            // Intersection Observer for scroll animations
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.animationPlayState = 'running';
                    }
                });
            }, observerOptions);

            // Observe all animated elements
            document.querySelectorAll('[class*="animate-"]').forEach(el => {
                observer.observe(el);
            });
        });
    </script>
</x-app-layout>
