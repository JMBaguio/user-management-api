<x-app-layout>
    <!-- Hero Section for My Works -->
    <section class="w-full bg-[#F4F2ED] dark:bg-gray-800 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 md:py-16">

            <!-- Mobile Layout -->
            <div class="flex flex-col md:hidden text-center relative font-poppins">
                <h1 class="text-3xl font-extrabold text-[#634600] leading-tight dark:text-[#B59F84]">
                    My Works
                </h1>
                <p class="mt-2 text-lg text-[#603E14] dark:text-gray-200 mb-6">
                    Manage your upcycled creations 🌿
                </p>
                <div class="bg-white/70 dark:bg-gray-700/60 rounded-lg p-4 shadow-sm mb-6 text-left">
                    <h2 class="text-lg font-semibold text-[#634600] dark:text-white mb-2">
                        Your Sustainable Impact
                    </h2>
                    <p class="text-sm text-gray-700 dark:text-gray-300">
                        By sharing your upcycled works, you're promoting circular fashion and sustainability.
                    </p>
                </div>
                <p class="mt-6 italic text-gray-600 dark:text-gray-400 text-sm">
                    "Every piece you upcycle makes a difference." ♻️
                </p>
            </div>

            <!-- Desktop Layout -->
            <div class="hidden md:flex md:flex-row md:items-center gap-8">
                <div class="md:w-1/2 font-poppins">
                    <h1 class="text-5xl lg:text-6xl font-extrabold text-[#634600] dark:text-[#B59F84] leading-tight">
                        My Works
                    </h1>
                    <p class="mt-4 text-xl text-[#603E14] dark:text-gray-200">
                        Manage your upcycling portfolio 🌟
                    </p>
                    <div class="mt-8 flex flex-wrap gap-4">
                        <a href="{{ route('works.create') }}"
                           class="inline-block border border-[#B59F84] text-[#634600] hover:bg-[#F8EED6] 
                                  dark:border-[#B59F84] dark:text-[#B59F84] dark:hover:bg-gray-700 
                                  font-semibold px-6 py-3 rounded-full shadow-md transition">
                            Add New Work
                        </a>
                    </div>
                </div>
                <div class="md:w-1/2 h-[420px] flex gap-4 relative">
                    <img src="{{ asset('images/upcycle-hero1.png') }}" alt="Upcycle Work"
                         class="w-1/2 h-full object-cover rounded-xl shadow-lg hover:scale-[1.02] transition-transform duration-300">
                    <img src="{{ asset('images/upcycle-hero2.png') }}" alt="Sustainable Style"
                         class="w-1/2 h-full object-cover rounded-xl shadow-lg hover:scale-[1.02] transition-transform duration-300">
                </div>
            </div>
        </div>
    </section>

    <!-- My Works Listing -->
    <div class="py-6 bg-white dark:bg-gray-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-2xl font-extrabold tracking-tight text-gray-900 dark:text-gray-100">My Works</h2>
                <a href="{{ route('works.create') }}"
                   class="inline-flex items-center gap-2 px-4 sm:px-5 py-2.5 rounded-full bg-[#B59F84] text-white shadow-sm hover:bg-[#a08e77] active:scale-[.98] transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    <span class="font-semibold">Add Work</span>
                </a>
            </div>

            <div class="rounded-xl shadow-sm overflow-hidden">
                <div class="p-4 sm:p-6">
                    @if ($works->count() > 0)
                        <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                            @foreach ($works as $work)
                                <div class="group relative bg-white dark:bg-gray-800 rounded-xl overflow-hidden shadow-sm hover:shadow-md transition duration-200 border border-[#D9D9D9] dark:border-gray-700">
                                    <a href="{{ route('works.show', $work->id) }}" class="block h-full">
                                        <div class="relative aspect-square overflow-hidden">
                                            <img src="{{ $work->first_image }}" alt="{{ $work->title }}" class="w-full h-full object-cover" />
                                            <div class="absolute top-2 right-2 px-2 py-0.5 rounded-full text-xs font-medium
                                                {{ $work->approval_status == 'pending' ? 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200' : ($work->approval_status == 'approved' ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200' : 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200') }}">
                                                {{ ucfirst($work->approval_status) }}
                                            </div>
                                        </div>
                                        <div class="p-2 sm:p-3">
                                            <h3 class="text-sm font-bold text-gray-900 dark:text-white truncate">
                                                {{ $work->title }}
                                            </h3>
                                            <p class="text-xs sm:text-sm text-gray-500 dark:text-gray-400 mt-1 truncate">
                                                Type: {{ ucfirst($work->type) }}
                                            </p>
                                            <p class="text-xs sm:text-sm text-gray-500 dark:text-gray-400 mt-1 truncate">
                                                {{ Str::limit($work->description, 50) }}
                                            </p>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    @else
                    <x-empty-message 
                        message="You haven't added any works yet." 
                        link="{{ route('works.create') }}" 
                        buttonText="Add Work" 
                        icon="shopping-cart" 
                    />                    
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
