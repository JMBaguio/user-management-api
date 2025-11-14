<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Products Management') }}
            </h2>
            <a href="{{ route('admin.dashboard') }}" 
               class="px-4 py-2 bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-100 rounded-md hover:bg-gray-300 dark:hover:bg-gray-600">
                ← Back to Dashboard
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div x-data="{ tab: 'pending' }" class="bg-white/20 dark:bg-gray-900/30 backdrop-blur-xl shadow-lg sm:rounded-lg p-6">
                <!-- Tabs -->
                <div class="flex space-x-4 border-b dark:border-gray-700 mb-6">
                    <button @click="tab = 'pending'"
                            :class="tab === 'pending' ? 'border-b-2 border-yellow-500 text-yellow-600 dark:text-yellow-400' : 'text-gray-600 dark:text-gray-300'"
                            class="pb-2 font-semibold">
                        Pending ({{ $pendingProducts->total() }})
                    </button>
                    <button @click="tab = 'approved'"
                            :class="tab === 'approved' ? 'border-b-2 border-green-500 text-green-600 dark:text-green-400' : 'text-gray-600 dark:text-gray-300'"
                            class="pb-2 font-semibold">
                        Approved ({{ $approvedProducts->total() }})
                    </button>
                    <button @click="tab = 'rejected'"
                            :class="tab === 'rejected' ? 'border-b-2 border-red-500 text-red-600 dark:text-red-400' : 'text-gray-600 dark:text-gray-300'"
                            class="pb-2 font-semibold">
                        Rejected ({{ $rejectedProducts->total() }})
                    </button>
                </div>

                <!-- Tab Content -->
                <div x-show="tab === 'pending'" x-cloak>
                    <div class="overflow-x-auto">
                        @include('admin.products._table', ['products' => $pendingProducts])
                        <div class="mt-4">{{ $pendingProducts->links() }}</div>
                    </div>
                </div>

                <div x-show="tab === 'approved'" x-cloak>
                    <div class="overflow-x-auto">
                        @include('admin.products._table', ['products' => $approvedProducts])
                        <div class="mt-4">{{ $approvedProducts->links() }}</div>
                    </div>
                </div>

                <div x-show="tab === 'rejected'" x-cloak>
                    <div class="overflow-x-auto">
                        @include('admin.products._table', ['products' => $rejectedProducts])
                        <div class="mt-4">{{ $rejectedProducts->links() }}</div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
