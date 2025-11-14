<div class="flex flex-col p-4">
    <div class="inline-flex rounded-full bg-gray-100 dark:bg-gray-800 p-1 mb-6 space-x-2">
        @if ($user->isRegularUser())
            <button id="tab-products" type="button"
                class="px-4 py-2 rounded-full bg-[#E1D5B6] text-gray-800 font-semibold shadow-md transition-all whitespace-nowrap">
                Products
            </button>
        @endif
        @if ($user->isUpcycler())
            <button id="tab-works" type="button"
                class="px-4 py-2 rounded-full text-gray-800 dark:text-gray-100 transition-all hover:bg-gray-200 dark:hover:bg-gray-700 whitespace-nowrap">
                Works
            </button>
        @endif
        <button id="tab-reviews" type="button"
            class="px-4 py-2 rounded-full text-gray-800 dark:text-gray-100 transition-all hover:bg-gray-200 dark:hover:bg-gray-700 whitespace-nowrap">
            Reviews
        </button>
        @if (Auth::id() === $user->id)
            <button id="tab-orders" type="button"
                class="px-4 py-2 rounded-full text-gray-800 dark:text-gray-100 transition-all hover:bg-gray-200 dark:hover:bg-gray-700 whitespace-nowrap">
                Orders
            </button>
        @endif

    </div>
</div>
