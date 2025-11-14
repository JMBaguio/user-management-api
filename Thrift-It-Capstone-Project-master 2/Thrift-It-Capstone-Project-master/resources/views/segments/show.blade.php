<x-app-layout>
    <!-- Hero Section -->
    <div class="w-full bg-[#F4F2ED] dark:bg-gray-800 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 md:py-12">
            <!-- Mobile Layout -->
            <div class="flex flex-col md:hidden text-center relative">
                <div class="p-2 font-poppins">
                    <!-- Title -->
                    <h1 class="text-3xl font-bold text-custom-brown leading-tight dark:text-white">
                        Men's
                    </h1>
                    <p class="font-poppins text-xl text-custom-brown dark:text-white mb-4">
                        Clothing
                    </p>

                    <!-- Description Section -->
                    <div class=" p-4  mb-4">
                        <h2 class="text-lg font-semibold flex relative text-right text-custom-brown dark:text-white mb-2">
                            Sustainable Men's Fashion
                        </h2>
                        <p class="text-sm text-gray-700 dark:text-gray-300 text-left">
                            Discover our curated collection of men's clothing that combines style with sustainability. 
                            Each piece is carefully selected to reduce fashion's environmental impact while keeping you 
                            looking sharp and contemporary.
                        </p>
                    </div>

                    <!-- Features List -->
                    <div class="  p-4 ">
                        <h3 class="text-md font-medium flex relative text-right text-custom-brown dark:text-white mb-2">
                            Why Choose Our Men's Collection?
                        </h3>
                        <ul class="text-sm text-gray-700 dark:text-gray-300 text-left space-y-1">
                            <li class="flex items-start">
                                <span class="text-green-600 mr-2">✓</span>
                                <span>Eco-friendly materials and production</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-green-600 mr-2">✓</span>
                                <span>Timeless styles that last beyond seasons</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-green-600 mr-2">✓</span>
                                <span>Fair trade and ethical manufacturing</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-green-600 mr-2">✓</span>
                                <span>Quality pieces at accessible prices</span>
                            </li>
                        </ul>
                    </div>

                    <!-- Tag -->
                    <span class="absolute bottom-1 right-1 bg-white px-2 py-0.5 rounded-full text-xs text-[#7C6A46] font-medium shadow-sm">
                        Sustainable Fashion
                    </span>
                </div>
            </div>
            
            <!-- Desktop layout (side by side) -->
            <div class="hidden md:flex md:flex-row md:items-center">
                <!-- Text Content for Desktop with Background Image -->
                <div class="p-3 md:w-1/2 font-poppins relative">
                    <!-- Background Image - Adjustable positioning -->
                    <div class="absolute top-[-200px] left-[-150px] z-0 w-[145px] h-[510px]">
                        <img src="{{ asset('images/Rectangle123.png') }}" 
                            alt="Background" 
                            class="w-full h-full">
                    </div>  
                    <!-- Text Content (with higher z-index) -->
                    <div class="relative z-10">
                        <h1 class="text-6xl lg:text-7xl font-bold text-custom-brown leading-tight dark:text-white">
                            Men's 
                        </h1>
                        <p class="flex relative left-[130px] font-poppins text-6xl lg:text-3xl">
                            <span class="block h-[10px]" aria-hidden="true"></span>
                            Clothing
                        </p>
                    </div>
                </div>
                
                <!-- Image for Desktop -->
                <div class="md:w-[1900px] h-[400px] flex flex-row gap-[-30] relative p-5 left-[70px] top-[55px] overflow-hidden">
                    <img src="{{ asset('images/image 124.png') }}" alt="Thrift-IT Sustainable Fashion" class="w-full flex relative left-[180px] max-h-[200px] object-contain">
                    <img src="{{ asset('images/image 122.png') }}" alt="Thrift-IT Sustainable Fashion" class="w-full  flex relative left-[90px] top-[50px] max-h-[240px] object-contain">
                    <img src="{{ asset('images/image 121.png') }}" alt="Thrift-IT Sustainable Fashion" class="w-full flex relative top-[70px] max-h-[260px] object-contain">
                    <img src="{{ asset('images/image 125.png') }}" alt="Thrift-IT Sustainable Fashion" class="w-full flex relative top-[60px] right-[60px] max-h-[200px] object-contain">
                    <img src="{{ asset('images/image 126.png') }}" alt="Thrift-IT Sustainable Fashion" class="w-full flex relative right-[80px] bottom-[0px] max-h-[200px] object-contain">
                </div>
            </div>
        </div>
    </div>
            
    <div class="py-4 bg-white dark:bg-gray-900">
        <div class="max-w-7xl mx-auto px-3 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-4 relative">
                <h2 class="text-lg font-bold text-gray-800 dark:text-gray-200">{{ $segment->name }} Products</h2>
                <div class="flex gap-2">
                <div x-data="{ open: false }" class="relative">
                    <button @click="open = !open" class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-100 text-sm shadow-sm">
                        <span id="categoryButtonText">{{ isset($selectedCategoryId) && $categories->where('id', $selectedCategoryId)->first() ? $categories->where('id', $selectedCategoryId)->first()->name : 'Category' }}</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-700 dark:text-gray-300" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    </button>
                    <div x-cloak x-show="open" @click.outside="open = false" class="absolute right-0 mt-2 w-44 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl shadow-lg z-20 py-1">
                        <a data-category-link data-category-name="All" href="{{ route('segments.show', ['segment' => $segment->id]) }}" class="block px-3 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 rounded-lg">All</a>
                        @foreach($categories as $cat)
                            <a data-category-link data-category-name="{{ $cat->name }}" href="{{ route('segments.show', ['segment' => $segment->id, 'category' => $cat->id]) }}" class="block px-3 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 rounded-lg {{ (isset($selectedCategoryId) && (int)$selectedCategoryId === $cat->id) ? 'font-semibold' : '' }}">
                                {{ $cat->name }}
                            </a>
                        @endforeach
                        </div>
                    </div>
                    <div x-data="{ open: false }" class="relative">
                        <button @click="open = !open" class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-100 text-sm shadow-sm">
                            <span id="locationButtonText">{{ isset($selectedBarangayId) && $barangays->where('id', $selectedBarangayId)->first() ? $barangays->where('id', $selectedBarangayId)->first()->name : 'Location' }}</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-700 dark:text-gray-300" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="6 9 12 15 18 9"></polyline>
                            </svg>
                        </button>
                        <div x-cloak x-show="open" @click.outside="open = false" class="absolute right-0 mt-2 w-44 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl shadow-lg z-20 py-1 max-h-96 overflow-y-auto">
                            <a data-location-link data-location-name="All" href="{{ route('segments.show', ['segment' => $segment->id]) }}" class="block px-3 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 rounded-lg">All</a>
                            @foreach($barangays as $barangay)
                                <a data-location-link data-location-name="{{ $barangay->name }}" href="{{ route('segments.show', ['segment' => $segment->id, 'barangay' => $barangay->id]) }}" class="block px-3 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 rounded-lg {{ (isset($selectedBarangayId) && (int)$selectedBarangayId === $barangay->id) ? 'font-semibold' : '' }}">
                                    {{ $barangay->name }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="rounded-xl shadow-sm overflow-hidden">
                <div id="loadingIndicator" class="hidden flex items-center justify-center py-4">
                    <div class="animate-spin rounded-full h-8 w-8 border-b-2 border-[#634600]"></div>
                    <span class="ml-2 text-gray-600 dark:text-gray-300">Loading products...</span>
                </div>
                <div id="productsGrid" class="p-3 sm:p-6">
                    @include('segments.partials.products-grid', ['products' => $products])
                </div>
            </div>
            <script>
            document.addEventListener('DOMContentLoaded', function() {
                const container = document.getElementById('productsGrid');
                const loadingIndicator = document.getElementById('loadingIndicator');
                
                // Helper function to show loading
                function showLoading() {
                    if (loadingIndicator) {
                        loadingIndicator.classList.remove('hidden');
                    }
                    if (container) {
                        container.style.opacity = '0.5';
                    }
                }

                // Helper function to hide loading
                function hideLoading() {
                    if (loadingIndicator) {
                        loadingIndicator.classList.add('hidden');
                    }
                    if (container) {
                        container.style.opacity = '1';
                    }
                }
                
                // Handle category links
                document.querySelectorAll('[data-category-link]').forEach(link => {
                    link.addEventListener('click', async (e) => {
                        e.preventDefault();
                        const currentUrl = new URL(window.location);
                        const linkUrl = new URL(e.currentTarget.href, window.location.origin);
                        const categoryButtonText = document.getElementById('categoryButtonText');
                        
                        // Update button text
                        const categoryName = e.currentTarget.getAttribute('data-category-name') || 'Category';
                        if (categoryButtonText) {
                            categoryButtonText.textContent = categoryName;
                        }
                        
                        // Build query params for API call preserving location
                        const params = new URLSearchParams();
                        if (linkUrl.searchParams.get('category')) {
                            params.set('category', linkUrl.searchParams.get('category'));
                        }
                        if (currentUrl.searchParams.get('barangay')) {
                            params.set('barangay', currentUrl.searchParams.get('barangay'));
                        }
                        
                        showLoading();
                        
                        try {
                            const apiUrl = `{{ url('segments/'.$segment->id.'/products') }}` + (params.toString() ? '?' + params.toString() : '');
                            const res = await fetch(apiUrl, { headers: { 'X-Requested-With': 'XMLHttpRequest' }});
                            const json = await res.json();
                            container.innerHTML = json.html;
                        } catch (error) {
                            console.error('Error filtering products:', error);
                        } finally {
                            hideLoading();
                        }
                        
                        // update query string without reloading - keep barangay if present
                        const newUrl = new URL(window.location);
                        if (linkUrl.searchParams.get('category')) {
                            newUrl.searchParams.set('category', linkUrl.searchParams.get('category'));
                        } else {
                            newUrl.searchParams.delete('category');
                        }
                        // Keep barangay param if it exists
                        if (currentUrl.searchParams.get('barangay')) {
                            newUrl.searchParams.set('barangay', currentUrl.searchParams.get('barangay'));
                        }
                        window.history.replaceState({}, '', newUrl);
                    });
                });
                
                // Handle location links
                document.querySelectorAll('[data-location-link]').forEach(link => {
                    link.addEventListener('click', async (e) => {
                        e.preventDefault();
                        const currentUrl = new URL(window.location);
                        const linkUrl = new URL(e.currentTarget.href, window.location.origin);
                        const locationButtonText = document.getElementById('locationButtonText');
                        
                        // Update button text
                        const locationName = e.currentTarget.getAttribute('data-location-name') || 'Location';
                        if (locationButtonText) {
                            locationButtonText.textContent = locationName;
                        }
                        
                        // Build query params for API call preserving category
                        const params = new URLSearchParams();
                        if (currentUrl.searchParams.get('category')) {
                            params.set('category', currentUrl.searchParams.get('category'));
                        }
                        if (linkUrl.searchParams.get('barangay')) {
                            params.set('barangay', linkUrl.searchParams.get('barangay'));
                        }
                        
                        showLoading();
                        
                        try {
                            const apiUrl = `{{ url('segments/'.$segment->id.'/products') }}` + (params.toString() ? '?' + params.toString() : '');
                            const res = await fetch(apiUrl, { headers: { 'X-Requested-With': 'XMLHttpRequest' }});
                            const json = await res.json();
                            container.innerHTML = json.html;
                        } catch (error) {
                            console.error('Error filtering products:', error);
                        } finally {
                            hideLoading();
                        }
                        
                        // update query string without reloading - keep category if present
                        const newUrl = new URL(window.location);
                        if (linkUrl.searchParams.get('barangay')) {
                            newUrl.searchParams.set('barangay', linkUrl.searchParams.get('barangay'));
                        } else {
                            newUrl.searchParams.delete('barangay');
                        }
                        // Keep category param if it exists
                        if (currentUrl.searchParams.get('category')) {
                            newUrl.searchParams.set('category', currentUrl.searchParams.get('category'));
                        }
                        window.history.replaceState({}, '', newUrl);
                    });
                });
            });
            </script>
        </div>
    </div>
</x-app-layout>