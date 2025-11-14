<x-app-layout>
    <!-- Full-width Jumbotron outside of the main content container -->
    <div class="w-full bg-[#F4F2ED] dark:bg-gray-800 shadow-sm ">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Mobile/Small screens layout (stacked) -->
            <div class="flex flex-col md:hidden">
                <!-- Text Content for Mobile -->
                <div class="p-2 font-poppins">
                    <h1 class="text-xl sm:text-2xl font-bold text-red-600 dark:text-red-400 leading-tight">
                        Refresh Your Wardrobe Sustainably With Thrift-IT's Unique Finds
                    </h1>
                    <p class="mt-2 text-gray-700 dark:text-gray-300 text-xs sm:text-sm leading-relaxed">
                        Fashion meets purpose — shop, sell, and donate thrifted clothing to embrace a greener future.
                    </p>
                    <div class="mt-3 flex flex-wrap gap-2">
                        <a href="#"
                            class="inline-flex items-center px-3 py-1.5 border border-transparent rounded-md text-xs font-medium text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 shadow-sm transition-colors">
                            Explore Collection
                            <svg xmlns="http://www.w3.org/2000/svg" class="ml-1 h-3 w-3" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </a>
                        <a href="{{ route('products.create') }}"
                            class="inline-flex items-center px-3 py-1.5 border border-gray-300 dark:border-gray-600 rounded-md text-xs font-medium text-gray-700 dark:text-gray-200 bg-white dark:bg-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 shadow-sm transition-colors">
                            Start Selling
                        </a>
                    </div>
                </div>

                <!-- Image for Mobile -->
                <div class="mt-2 relative rounded-lg overflow-hidden">
                    <img src="{{ asset('storage/bgimages/jumbotron.png') }}" alt="Thrift-IT Sustainable Fashion"
                        class="w-full max-h-[180px] object-contain">
                    <div
                        class="absolute bottom-2 right-2 bg-white px-2 py-0.5 rounded-full text-xs text-red-600 font-medium shadow-md">
                        Sustainable fashion
                    </div>
                </div>
            </div>

            <!-- Desktop layout (side by side) -->
            <div class="hidden md:flex md:flex-row md:items-center">
                <!-- Text Content for Desktop with Background Image -->
                <div class="p-3 md:w-1/2 font-poppins relative">
                    <!-- Background Image -->
                    <div class="absolute inset-0 z-0">
                        <img src="{{ asset('images/Rectangle123.png') }}" alt="Background"
                            class="w-full h-full object-cover opacity-20">
                    </div>
                    <!-- Text Content (with higher z-index) -->
                    <div class="relative z-10">
                        <h1 class="text-5xl lg:text-4xl font-bold text-custom-brown leading-tight dark:text-white">
                            Refresh Your Wardrobe Sustainably With Thrift-IT's Unique Finds
                        </h1>
                        <p class="mt-2 text-gray-700 dark:text-gray-300 text-sm leading-relaxed">
                            Fashion meets purpose — shop, sell, and donate thrifted clothing to embrace a greener
                            future.
                        </p>
                        <div class="mt-4">
                            <a href="#"
                                class="inline-flex items-center px-4 py-2 border border-transparent rounded-md text-sm font-medium text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 shadow-sm transition-colors">
                                Explore Collection
                                <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 h-4 w-4" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                </svg>
                            </a>
                            <a href="{{ route('products.create') }}"
                                class="ml-3 inline-flex items-center px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md text-sm font-medium text-gray-700 dark:text-gray-200 bg-white dark:bg-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 shadow-sm transition-colors">
                                Start Selling
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Image for Desktop -->
                <div class="md:w-1/2 relative overflow-hidden">
                    <div class="relative overflow-hidden">
                        <img src="{{ asset('storage/bgimages/jumbotron.png') }}" alt="Thrift-IT Sustainable Fashion"
                            class="w-full max-h-[500px] object-contain">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="py-6 bg-white dark:bg-gray-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-4 lg:px-8 font-poppins">

            <!-- Segment Showcase -->
            <div class="mb-6 text-center sm:text-left">
                <h2 class="text-xl sm:text-2xl font-bold text-custom-dark-brown">
                    <i>THRIFT BY FASHION</i>
                </h2>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                <!-- Women Segment -->
                <a href="{{ route('segments.show', ['segment' => '2']) }}"
                    class="relative group overflow-hidden rounded-md shadow-md h-[500px] w-full block">
                    <img src="{{ asset('images/women.png') }}" alt="Shop by Women"
                        class="absolute inset-0 w-full h-full object-cover transition-transform duration-300 group-hover:scale-105">
                </a>

                <!-- Men Segment -->
                <a href="{{ route('segments.show', ['segment' => '1']) }}"
                    class="relative group overflow-hidden rounded-md shadow-md h-[500px] w-full block">
                    <img src="{{ asset('images/men.png') }}" alt="Shop by Men"
                        class="absolute inset-0 w-full h-full object-cover transition-transform duration-300 group-hover:scale-105">
                </a>

                <!-- Kids Segment -->
                <a href="{{ route('segments.show', ['segment' => '3']) }}"
                    class="relative group overflow-hidden rounded-md shadow-md h-[500px] w-full block">
                    <img src="{{ asset('images/kids.png') }}" alt="Shop by Kids"
                        class="absolute inset-0 w-full h-full object-cover transition-transform duration-300 group-hover:scale-105">
                </a>
            </div>

            <!-- Section Title -->
            <div class="mb-6 text-center sm:text-left mt-12">
                <h2 class="text-xl sm:text-2xl font-bold text-red-600 dark:text-red-400">
                    Featured Donations
                </h2>
                <p class="text-gray-600 dark:text-gray-400 text-sm sm:text-base mt-1">
                    Discover great finds from our community
                </p>
            </div>

            <!-- Donations Section (Secondary) -->
            <div class="rounded-xl shadow-sm overflow-hidden mt-8">
                <div class="p-4 sm:p-6">

                    @if ($donations->count() > 0)
                        <div
                            class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-2 sm:gap-4 md:gap-6">
                            @foreach ($donations as $donation)
                                <div
                                    class="group relative bg-white dark:bg-gray-800 rounded-xl overflow-hidden shadow-sm hover:shadow-md transition duration-200 border border-[#D9D9D9] dark:border-gray-700">
                                    <a href="{{ route('donations.show', $donation->id) }}" class="block h-full">
                                        @if ($donation->listingtype === 'for donation')
                                            <div
                                                class="absolute top-1 left-1 z-10 bg-[#D9D9D9] text-gray-700 text-[10px] sm:text-xs px-1.5 py-0.5 sm:px-2 sm:py-1 rounded-full">
                                                Donation
                                            </div>
                                        @endif

                                        <div class="relative aspect-square overflow-hidden">
                                            <img src="{{ $donation->image ? asset('storage/' . $donation->image) : asset('images/default-placeholder.png') }}"
                                                alt="{{ $donation->name }}"
                                                class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105">
                                            <div
                                                class="absolute inset-0 bg-gray-800 bg-opacity-20 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                                <span
                                                    class="bg-white text-gray-800 px-2 py-0.5 rounded-full text-[10px] sm:text-xs font-medium">Quick
                                                    view</span>
                                            </div>
                                        </div>

                                        <div class="p-2 sm:p-3 font-poppins">
                                            <div class="flex justify-between items-start">
                                                <h3
                                                    class="text-xs sm:text-sm font-bold text-gray-900 dark:text-white group-hover:text-red-600 transition-colors truncate max-w-[70%]">
                                                    {{ $donation->name }}
                                                </h3>
                                                <span
                                                    class="text-[10px] sm:text-xs font-medium px-1 py-0.5 bg-[#D9D9D9] dark:bg-gray-700 rounded text-gray-700 dark:text-gray-300">
                                                    {{ $donation->size ?? 'L' }}
                                                </span>
                                            </div>

                                            <p
                                                class="text-gray-500 dark:text-gray-400 text-[10px] sm:text-xs mt-0.5 truncate">
                                                {{ $donation->category->name ?? 'No Category' }}
                                            </p>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <x-empty-message message="No active donations found." link="{{ route('donations.create') }}"
                            buttonText="Add Donation" icon="shopping-cart" />
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="py-16 bg-[#F4F2ED]">
        <div class="mx-auto px-4 sm:px-6 lg:px-8">
            {{-- Upcycling Section --}}
            <div class="flex flex-col md:flex-row bg-white p-8 shadow-md items-center scroll-animate">
                {{-- Text Content --}}
                <div class="md:w-1/2 md:pr-8 mb-6 md:mb-0">
                    <h2 class="text-3xl font-bold text-[#634600] mb-4 leading-tight">
                        Revamp Your Wardrobe with Upcycling: Discover Sustainable Style <span
                            class="text-yellow-500">✨</span>
                    </h2>
                    <p class="text-[#786126] mb-6 text-lg">
                        Fashion with a Purpose—Shop, Upcycle, and Donate to Create a Sustainable Tomorrow.
                    </p>
                    <a href="#"
                        class="inline-block bg-[#B59F84] text-white px-8 py-3 rounded-md text-lg font-semibold hover:bg-[#a08e77] hover:scale-105 transition-all duration-200">
                        Upcycle Now
                    </a>
                </div>
                {{-- Image --}}
                <div class="md:w-1/2">
                    <img src="{{ asset('images/upcycling-image.jpg') }}" alt="Upcycling"
                        class="rounded-lg shadow-md w-full h-80 object-cover">
                </div>
            </div>

            {{-- Donate Section --}}
            <div class="flex flex-col md:flex-row bg-white p-8 shadow-md items-center scroll-animate mt-8">
                {{-- Image --}}
                <div class="md:w-1/2 mb-6 md:mb-0">
                    <img src="{{ asset('images/donate-image.jpg') }}" alt="Donate"
                        class="rounded-lg shadow-md w-full h-80 object-cover">
                </div>
                {{-- Text Content --}}
                <div class="md:w-1/2 md:pl-8">
                    <h2 class="text-3xl font-bold text-[#634600] mb-4 leading-tight">
                        Style with a Purpose: Donate Your Pre-Loved Clothes and Create a Sustainable Future <span
                            class="text-yellow-500">😊</span>
                    </h2>
                    <p class="text-[#786126] mb-6 text-lg">
                        Fashion with a Purpose—Shop, Upcycle, and Donate to Create a Sustainable Tomorrow.
                    </p>
                    <a href="#"
                        class="inline-block bg-[#B59F84] text-white px-8 py-3 rounded-md text-lg font-semibold hover:bg-[#a08e77] hover:scale-105 transition-all duration-200">
                        Donate Now
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.querySelectorAll('.favorite-btn').forEach(button => {
            button.addEventListener('click', function() {
                // Toggle the favorite icon
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
    </script>
</x-app-layout>
