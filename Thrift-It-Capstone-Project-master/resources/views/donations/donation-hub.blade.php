<x-app-layout>
    <!-- Hero Section -->
    <section class="w-full bg-[#F4F2ED] dark:bg-gray-800 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 md:py-16">

            <!-- Mobile Layout -->
            <div class="flex flex-col md:hidden text-center relative font-poppins">
                <!-- Title -->
                <h1 class="text-3xl font-extrabold text-green-700 leading-tight dark:text-green-400">
                    Donate Your Items!
                </h1>
                <p class="mt-2 text-lg text-custom-brown dark:text-gray-200 mb-6">
                    Give your pre-loved clothes a new life 🌍
                </p>

                <!-- Buttons -->
                <div class="flex flex-col gap-3 mb-8">
                    <a href="{{ route('donations.index') }}"
                        class="inline-block bg-green-600 hover:bg-green-700 text-white font-semibold px-6 py-3 rounded-full shadow-lg transition">
                        Donate Now!
                    </a>
                    <a href="{{ route('eco-posts.index') }}"
                        class="inline-block border border-green-600 text-green-700 hover:bg-green-50 dark:border-green-400 dark:text-green-400 dark:hover:bg-gray-700 font-semibold px-6 py-3 rounded-full shadow-md transition">
                        Join Our Community
                    </a>
                </div>

                <!-- Impact Box -->
                <div class="bg-white/70 dark:bg-gray-700/60 rounded-lg p-4 shadow-sm mb-6 text-left">
                    <h2 class="text-lg font-semibold text-custom-brown dark:text-white mb-2">
                        Make an Impact
                    </h2>
                    <p class="text-sm text-gray-700 dark:text-gray-300">
                        Every donation counts. By donating your items, you’re helping communities,
                        reducing waste, and promoting sustainable living. Together, we can create a greener future. 🌱
                    </p>
                </div>

                <!-- Why Donate -->
                <div class="bg-white/70 dark:bg-gray-700/60 rounded-lg p-4 shadow-sm text-left">
                    <h3 class="text-md font-medium text-custom-brown dark:text-white mb-2">
                        Why Donate With Us?
                    </h3>
                    <ul class="text-sm text-gray-700 dark:text-gray-300 space-y-2">
                        <li class="flex items-start"><span class="text-green-600 mr-2">✓</span> Support local
                            communities in need</li>
                        <li class="flex items-start"><span class="text-green-600 mr-2">✓</span> Reduce clothing waste
                            and pollution</li>
                        <li class="flex items-start"><span class="text-green-600 mr-2">✓</span> Encourage a cycle of
                            reuse and sustainability</li>
                    </ul>
                </div>

                <!-- Quote -->
                <p class="mt-6 italic text-gray-600 dark:text-gray-400 text-sm">
                    "The greatest threat to our planet is the belief that someone else will save it." 🌎
                </p>

                <!-- Tag -->
                <span
                    class="absolute bottom-1 right-1 bg-green-100 px-2 py-0.5 rounded-full text-xs text-green-700 font-medium shadow">
                    Eco-Friendly Giving
                </span>
            </div>

            <!-- Desktop Layout -->
            <div class="hidden md:flex md:flex-row md:items-center gap-8">
                <!-- Text Content -->
                <div class="md:w-1/2 font-poppins">
                    <h1 class="text-5xl lg:text-6xl font-extrabold text-green-700 dark:text-green-400 leading-tight">
                        Donate Your Items!
                    </h1>
                    <p class="mt-4 text-xl text-custom-brown dark:text-gray-200">
                        Turn clutter into kindness 🌱
                    </p>

                    <!-- Buttons -->
                    <div class="mt-8 flex flex-wrap gap-4">
                        <a href="{{ route('donations.index') }}"
                            class="inline-block border border-green-600 text-green-700 hover:bg-green-50 
                            dark:border-green-400 dark:text-green-400 dark:hover:bg-gray-700 
                            font-semibold px-6 py-3 rounded-full shadow-md transition">
                            Donate Now!
                        </a>
                        <a href="{{ route('eco-posts.index') }}"
                            class="inline-block bg-green-600 hover:bg-green-700 text-white font-semibold 
                            px-6 py-3 rounded-full shadow-md transition">
                            Eco Educational Community
                        </a>
                    </div>
                </div>

                <!-- Images -->
                <div class="md:w-1/2 h-[420px] flex gap-4 relative">
                    <img src="{{ asset('images/donate-clothes.png') }}" alt="Donate Clothes"
                        class="w-1/2 h-full object-cover rounded-xl shadow-lg hover:scale-[1.02] transition-transform duration-300">
                    <img src="{{ asset('images/helping-community.png') }}" alt="Helping Community"
                        class="w-1/2 h-full object-cover rounded-xl shadow-lg hover:scale-[1.02] transition-transform duration-300">
                </div>
            </div>
        </div>
    </section>

    <!-- Donation Hub -->
    <section class="py-16 bg-white dark:bg-gray-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="flex items-center justify-between mb-10">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-white">
                    Donation Hub
                </h2>
                <a href="{{ route('donations.index') }}"
                    class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-[#B59F84] text-white shadow-md hover:bg-[#a08e77] transition">
                    <span class="font-semibold">Donate an Item</span>
                </a>
            </div>

            <!-- Grid -->
            <div class="rounded-2xl shadow-sm overflow-hidden">
                <div class="p-6">
                    @if ($donations->count() > 0)
                        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-8">
                            @foreach ($donations as $donation)
                                <div
                                    class="group relative bg-[#F4F2ED] dark:bg-gray-800/90 rounded-2xl overflow-hidden border border-gray-200 dark:border-gray-700 shadow hover:shadow-2xl transition-all duration-300">
                                    <a href="{{ route('donations.show', $donation->id) }}" class="block h-full">

                                        <!-- Badge -->
                                        @if ($donation->listingtype === 'for donation')
                                            <div
                                                class="absolute top-2 left-2 z-10 bg-green-100 text-green-800 text-xs px-3 py-1 rounded-full shadow">
                                                Donation
                                            </div>
                                        @endif

                                        <!-- Image -->
                                        <div class="relative aspect-square overflow-hidden">
                                            <img src="{{ $donation->donationImages->isNotEmpty() ? Storage::disk('s3')->url($donation->donationImages->first()->image) : asset('images/default-placeholder.png') }}"
                                                alt="{{ $donation->name }}" class="w-full h-full object-cover" />
                                            class="w-full h-full object-cover transition-transform duration-500 ease-out group-hover:scale-105">
                                        </div>

                                        <!-- Info -->
                                        <div class="p-4">
                                            <div class="flex justify-between items-start">
                                                <h3
                                                    class="text-sm font-semibold text-gray-900 dark:text-white truncate">
                                                    {{ $donation->name }}
                                                </h3>
                                                <span
                                                    class="text-xs font-medium px-2 py-0.5 bg-gray-100 dark:bg-gray-700 rounded text-gray-700 dark:text-gray-300">
                                                    {{ $donation->size ?? 'L' }}
                                                </span>
                                            </div>
                                            <p class="text-gray-500 dark:text-gray-400 text-xs mt-1 truncate">
                                                {{ $donation->category->name ?? 'No Category' }}
                                            </p>
                                            <div
                                                class="absolute top-2 left-2 z-10 dark:bg-green-300 bg-green-100 text-green-800 text-xs px-3 py-1 rounded-full shadow">
                                                Free
                                            </div>

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
    </section>
</x-app-layout>
