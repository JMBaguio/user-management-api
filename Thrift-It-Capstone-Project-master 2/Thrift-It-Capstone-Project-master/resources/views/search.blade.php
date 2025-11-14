<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h1 class="text-xl font-semibold text-gray-800 dark:text-gray-200">
                {{ __('Search results for') }}
                <q class="font-mono text-indigo-600 dark:text-indigo-400">
                    {{ request('query') ?: '...' }}
                </q>
            </h1>
        </div>
    </x-slot>

    <div class="py-12 dark:bg-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <section class="bg-white dark:bg-gray-900 rounded-2xl border border-gray-200 dark:border-gray-800 shadow-sm">
                
                {{-- No query entered --}}
                @if (!request('query'))
                    <x-empty-state icon="magnifying-glass" title="Start your search"
                        message="Enter a keyword above to discover products and people." />
                @else

                    {{-- Products Section --}}
                    @if ($products->isNotEmpty())
                        <div class="p-6 border-b border-gray-200 dark:border-gray-800">
                            <div class="flex items-baseline justify-between mb-4">
                                <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100">
                                    Products ({{ $products->total() }})
                                </h2>
                                <p class="text-sm text-gray-500 dark:text-gray-400">
                                    Showing {{ $products->firstItem() }}–{{ $products->lastItem() }}
                                </p>
                            </div>

                            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4">
                                @foreach ($products as $product)
                                    <article class="group relative bg-white dark:bg-gray-800 rounded-xl overflow-hidden border border-gray-200 dark:border-gray-700 shadow hover:shadow-lg transition">
                                        <a href="{{ route('products.show', $product) }}" class="block">
                                            @if ($product->listingtype === 'for donation')
                                                <span class="absolute top-2 left-2 z-10 bg-amber-100 text-amber-800 text-xs px-2 py-0.5 rounded-full font-medium">
                                                    Donation
                                                </span>
                                            @endif

                                            <div class="aspect-square overflow-hidden bg-gray-100">
                                                <img src="{{ $product->images->isNotEmpty() && Storage::disk('s3')->exists($product->images->first()->image) ? Storage::disk('s3')->url($product->images->first()->image) : asset('images/default-placeholder.png') }}"
                                                    alt="{{ $product->name }}"
                                                    class="w-full h-full object-cover group-hover:scale-105 transition"
                                                    loading="lazy">
                                                <div class="quick-view">
                                                    <span>Quick view</span>
                                                </div>
                                            </div>

                                            <div class="p-3 space-y-1">
                                                <div class="flex justify-between items-start">
                                                    <h3 class="text-sm font-semibold text-gray-900 dark:text-white truncate pr-2">
                                                        {{ $product->name }}
                                                    </h3>
                                                    <span class="text-xs px-1.5 py-0.5 bg-gray-200 dark:bg-gray-700 rounded">
                                                        {{ $product->size ?? 'L' }}
                                                    </span>
                                                </div>

                                                <p class="text-xs text-gray-500 dark:text-gray-400 truncate">
                                                    {{ $product->category?->name ?? 'Uncategorized' }}
                                                </p>
                                                <p class="text-xs italic text-gray-500 dark:text-gray-400">
                                                    {{ $product->barangay?->name ?? 'Cebu City' }}
                                                </p>

                                                <div class="flex justify-between items-center mt-2">
                                                    <span class="font-bold text-sm {{ $product->listingtype === 'for donation' ? 'text-amber-700' : 'text-gray-900 dark:text-white' }}">
                                                        {{ $product->listingtype === 'for donation' ? 'Free' : '₱' . number_format($product->price, 2) }}
                                                    </span>
                                                </div>
                                            </div>
                                        </a>
                                    </article>
                                @endforeach
                            </div>

                            <div class="mt-6">
                                {{ $products->onEachSide(1)->links('pagination::tailwind') }}
                            </div>
                        </div>
                    @else
                        <x-empty-state icon="box" title="No products found"
                            message="No products match your search query." />
                    @endif

                    {{-- Users Section --}}
                    @if ($users->isNotEmpty())
                        <div class="p-6">
                            <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-4">
                                People ({{ $users->total() }})
                            </h2>

                            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6 gap-4">
                                @foreach ($users as $user)
                                    <a href="{{ route('profile.show', $user) }}"
                                        class="flex items-center space-x-3 p-4 bg-gray-50 dark:bg-gray-800 rounded-xl hover:bg-gray-100 dark:hover:bg-gray-700 transition">
                                      <img  src="{{ $user->profileImageUrl() }}"
                                            alt="{{ $user->name }}"
                                            class="w-12 h-12 rounded-full object-cover border-2 border-gray-300 dark:border-gray-600"
                                            loading="lazy">
                                        <div class="flex-1 min-w-0">
                                            <p class="text-sm font-medium text-gray-900 dark:text-white truncate">
                                                {{ $user->fname }} {{ $user->lname }}
                                            </p>
                                            <p class="text-xs text-gray-500 dark:text-gray-400 truncate">
                                                @ {{ $user->username ?? Str::before($user->email, '@') }}
                                            </p>
                                        </div>
                                    </a>
                                @endforeach
                            </div>

                            <div class="mt-6">
                                {{ $users->onEachSide(1)->links('pagination::tailwind') }}
                            </div>
                        </div>
                    @else
                        <x-empty-state icon="users" title="No people found"
                            message="No users match your search query." />
                    @endif

                @endif

            </section>
        </div>
    </div>

    @push('styles')
        <style>
            .quick-view {
                @apply absolute inset-0 bg-black/30 flex items-center justify-center opacity-0 group-hover:opacity-100 transition;
            }

            .quick-view span {
                @apply bg-white text-gray-800 px-3 py-1.5 rounded-full text-xs font-semibold;
            }
        </style>
    @endpush
</x-app-layout>
