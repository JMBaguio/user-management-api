<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-100 leading-tight">
                {{ __('User Details') }}
            </h2>
            <a href="{{ route('admin.users.index') }}"
                class="inline-flex items-center gap-2 text-sm font-medium px-4 py-2 rounded-lg 
                       bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200 
                       hover:bg-gray-200 dark:hover:bg-gray-600 transition-all">
                ← Back
            </a>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10">

            {{-- User Overview --}}
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                {{-- Left Column: Basic Info --}}
                <div
                    class="col-span-1 bg-white/10 dark:bg-gray-800/40 backdrop-blur-lg border border-white/20 
                           rounded-2xl shadow-xl p-8">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-4">Basic Information</h3>
                    <div class="space-y-3 text-gray-700 dark:text-gray-300">
                        <p><span class="font-medium text-gray-900 dark:text-gray-100">First Name:</span> {{ $user->fname }}</p>
                        <p><span class="font-medium text-gray-900 dark:text-gray-100">Last Name:</span> {{ $user->lname }}</p>
                        <p><span class="font-medium text-gray-900 dark:text-gray-100">Email:</span> {{ $user->email }}</p>
                        <p><span class="font-medium text-gray-900 dark:text-gray-100">Joined:</span> {{ $user->created_at->format('F j, Y') }}</p>
                        <p>
                            <span class="font-medium text-gray-900 dark:text-gray-100">Status:</span>
                            <span class="ml-2 px-2 py-0.5 text-sm font-semibold rounded-full 
                                {{ $user->is_active ? 'bg-green-200 text-green-800 dark:bg-green-700 dark:text-green-100' : 'bg-red-200 text-red-800 dark:bg-red-700 dark:text-red-100' }}">
                                {{ $user->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </p>
                    </div>
                </div>

                {{-- Right Column: Products + Reports --}}
                <div class="col-span-2 flex flex-col gap-8">

                    {{-- Products --}}
                    <div
                        class="bg-white/10 dark:bg-gray-800/40 backdrop-blur-lg border border-white/20 
                               rounded-2xl shadow-xl p-8">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-4">Products</h3>
                        <div class="space-y-3 max-h-60 overflow-y-auto pr-2">
                            @forelse($user->products as $product)
                                <div class="flex justify-between items-center text-gray-700 dark:text-gray-300">
                                    <span>{{ $product->name }}</span>
                                    <span class="px-2 py-0.5 text-xs font-semibold rounded-full
                                        {{ $product->status === 'active' ? 'bg-green-200 text-green-800 dark:bg-green-700 dark:text-green-100' :
                                           ($product->status === 'pending' ? 'bg-yellow-200 text-yellow-800 dark:bg-yellow-700 dark:text-yellow-100' : 'bg-red-200 text-red-800 dark:bg-red-700 dark:text-red-100') }}">
                                        {{ ucfirst($product->status) }}
                                    </span>
                                </div>
                            @empty
                                <p class="text-gray-500 dark:text-gray-400">No products found.</p>
                            @endforelse
                        </div>
                    </div>

                    {{-- Reports --}}
                    <div
                        class="bg-white/10 dark:bg-gray-800/40 backdrop-blur-lg border border-white/20 
                               rounded-2xl shadow-xl p-8">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-4">Reports Received</h3>
                        <div class="space-y-3 max-h-60 overflow-y-auto pr-2">
                            @forelse($user->reportsReceived as $report)
                                <div class="flex justify-between items-center text-gray-700 dark:text-gray-300">
                                    <span>Report from {{ $report->reporter->fname }}</span>
                                    <span class="px-2 py-0.5 text-xs font-semibold rounded-full
                                        {{ $report->status === 'pending' ? 'bg-yellow-200 text-yellow-800 dark:bg-yellow-700 dark:text-yellow-100' :
                                           ($report->status === 'resolved' ? 'bg-green-200 text-green-800 dark:bg-green-700 dark:text-green-100' : 'bg-red-200 text-red-800 dark:bg-red-700 dark:text-red-100') }}">
                                        {{ ucfirst($report->status) }}
                                    </span>
                                </div>
                            @empty
                                <p class="text-gray-500 dark:text-gray-400">No reports found.</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>

            {{-- Update Form --}}
            <div
                class="bg-white/10 dark:bg-gray-800/40 backdrop-blur-lg border border-white/20 
                       rounded-2xl shadow-xl p-8">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-4">Update User Status</h3>

                <form action="{{ route('admin.users.update', $user) }}" method="POST" class="space-y-4">
                    @csrf
                    @method('PUT')

                    <div>
                        <label for="is_active" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                            Account Status
                        </label>
                        <select id="is_active" name="is_active"
                            class="block w-full rounded-lg border-gray-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200">
                            <option value="1" {{ $user->is_active ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ !$user->is_active ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit"
                            class="px-5 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg shadow-md transition">
                            Update User
                        </button>
                    </div>
                </form>
            </div>

            {{-- Reviews --}}
            <div
                class="bg-white/10 dark:bg-gray-800/40 backdrop-blur-lg border border-white/20 
                       rounded-2xl shadow-xl p-8">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-4">Reviews Received</h3>

                <div class="space-y-4 max-h-72 overflow-y-auto pr-2">
                    @forelse($user->reviewsReceived as $review)
                        <div class="p-4 rounded-lg bg-white/5 dark:bg-gray-700/40 border border-white/10">
                            <div class="flex justify-between items-center mb-2">
                                <p class="font-semibold text-gray-900 dark:text-gray-100">
                                    {{ $review->reviewer->fname ?? 'Anonymous' }}
                                </p>
                                <div class="flex space-x-1">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <svg class="w-4 h-4 {{ $i <= $review->rating ? 'text-yellow-400' : 'text-gray-400' }}"
                                            fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.362 4.197a1 1 0 00.95.69h4.417c.969 0 1.371 1.24.588 1.81l-3.58 2.601a1 1 0 00-.364 1.118l1.362 4.197c.3.921-.755 1.688-1.54 1.118L10 14.347l-3.58 2.601c-.784.57-1.838-.197-1.539-1.118l1.362-4.197a1 1 0 00-.364-1.118L2.3 9.624c-.782-.57-.38-1.81.588-1.81h4.418a1 1 0 00.949-.69l1.362-4.197z" />
                                        </svg>
                                    @endfor
                                </div>
                            </div>
                            @if ($review->comment)
                                <p class="text-sm text-gray-700 dark:text-gray-300 mb-1">
                                    {{ $review->comment }}
                                </p>
                            @endif
                            <p class="text-xs text-gray-500 dark:text-gray-400">
                                Reviewed on {{ $review->created_at->format('F j, Y') }}
                            </p>
                        </div>
                    @empty
                        <p class="text-gray-500 dark:text-gray-400">No reviews yet.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
