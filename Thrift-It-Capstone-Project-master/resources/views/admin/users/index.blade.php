<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Users Management') }}
            </h2>
            <a href="{{ route('admin.dashboard') }}"
                class="px-4 py-2 bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-100 rounded-md hover:bg-gray-300 dark:hover:bg-gray-600">
                ← Back to Dashboard
            </a>
        </div>
    </x-slot>

    @php
        $activeTab = request()->query('tab', 'pending');
    @endphp

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div x-data="{ tab: '{{ $activeTab }}' }" class="bg-white dark:bg-gray-800 shadow-lg sm:rounded-lg p-6">
                
                <!-- Tabs -->
                <div class="flex space-x-4 border-b dark:border-gray-700 mb-6">
                    <button @click="tab = 'pending'; history.pushState(null, '', '?tab=pending')"
                        :class="tab === 'pending' ? 'border-b-2 border-yellow-500 text-yellow-600 dark:text-yellow-400' : 'text-gray-600 dark:text-gray-300'"
                        class="pb-2 font-semibold">
                        Pending ({{ $pendingUsers->total() }})
                    </button>
                    <button @click="tab = 'verified'; history.pushState(null, '', '?tab=verified')"
                        :class="tab === 'verified' ? 'border-b-2 border-green-500 text-green-600 dark:text-green-400' : 'text-gray-600 dark:text-gray-300'"
                        class="pb-2 font-semibold">
                        Verified ({{ $users->total() }})
                    </button>
                    <button @click="tab = 'unverified'; history.pushState(null, '', '?tab=unverified')"
                        :class="tab === 'unverified' ? 'border-b-2 border-red-500 text-red-600 dark:text-red-400' : 'text-gray-600 dark:text-gray-300'"
                        class="pb-2 font-semibold">
                        Unverified ({{ $unverifiedUsers->total() }})
                    </button>
                    <button @click="tab = 'rejected'; history.pushState(null, '', '?tab=rejected')"
                        :class="tab === 'rejected' ? 'border-b-2 border-red-500 text-red-600 dark:text-red-400' : 'text-gray-600 dark:text-gray-300'"
                        class="pb-2 font-semibold">
                        Rejected ({{ $rejectedUsers->total() }})
                    </button>
                </div>

                <!-- Tab Content -->
                <div x-show="tab === 'pending'" x-cloak>
                    @include('admin.users._table', [
                        'users' => $pendingUsers,
                        'showDocument' => true,
                        'statusColors' => [
                            'pending' => 'bg-yellow-100 text-yellow-800',
                            'verified' => 'bg-green-100 text-green-800',
                            'unverified' => 'bg-red-100 text-red-800',
                        ],
                    ])
                    <div class="mt-4">
                        {{ $pendingUsers->appends(['tab' => 'pending'])->links() }}
                    </div>
                </div>

                <div x-show="tab === 'verified'" x-cloak>
                    @include('admin.users._table', ['users' => $users, 'showDocument' => false])
                    <div class="mt-4">
                        {{ $users->appends(['tab' => 'verified'])->links() }}
                    </div>
                </div>

                <div x-show="tab === 'unverified'" x-cloak>
                    @include('admin.users._table', ['users' => $unverifiedUsers, 'showDocument' => false])
                    <div class="mt-4">
                        {{ $unverifiedUsers->appends(['tab' => 'unverified'])->links() }}
                    </div>
                </div>

                <div x-show="tab === 'rejected'" x-cloak>
                    @include('admin.users._table', ['users' => $rejectedUsers, 'showDocument' => false])
                    <div class="mt-4">
                        {{ $rejectedUsers->appends(['tab' => 'rejected'])->links() }}
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
