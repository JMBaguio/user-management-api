<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-white leading-tight">
                Messages
            </h2>
            <a href="{{ route('dashboard') }}"
                class="px-4 py-2 bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-100 rounded-md hover:bg-gray-300 dark:hover:bg-gray-600">
                ← Back to Dashboard
            </a>
        </div>
    </x-slot>
    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div
                class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl overflow-hidden h-[600px] flex flex-col md:flex-row">
                <!-- Conversations Sidebar -->
                <div
                    class="w-full md:w-80 bg-[#F4F2ED] dark:bg-gray-900 border-b md:border-b-0 md:border-r border-[#B59F84] dark:border-gray-700 flex flex-col">
                    <!-- Sidebar Header -->
                    <div class="p-4 border-b border-[#B59F84] dark:border-gray-700 flex items-center justify-between">
                        <h2 class="text-lg font-semibold text-[#634600] dark:text-white">Messages</h2>
                        <button
                            class="md:hidden p-2 text-[#786126] dark:text-white hover:text-[#634600] hover:bg-[#B59F84] hover:bg-opacity-20 rounded-full transition-colors"
                            onclick="document.getElementById('sidebar').classList.toggle('hidden')">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                        </button>
                    </div>

                    <!-- Search -->
                    <div class="p-4">
                        <div class="relative">
                            <input type="text" placeholder="Search conversations..."
                                class="w-full pl-10 pr-4 py-2 border border-[#B59F84] dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#634600] focus:border-transparent bg-white dark:bg-gray-800 text-sm dark:text-white placeholder-gray-500 dark:placeholder-text-white">
                            <svg class="absolute left-3 top-2.5 w-4 h-4 text-[#786126] dark:text-white"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                    </div>

                    <!-- Conversations List -->
                    <div class="flex-1 overflow-y-auto" id="sidebar">
                        @if ($conversations->count() > 0)
                            @foreach ($conversations as $conversation)
                                <a href="{{ route('private.chat', $conversation['user']->id) }}"
                                    class="flex items-center p-4 hover:bg-[#B59F84] hover:bg-opacity-20 dark:hover:bg-yellow-800 transition-colors">
                                    <!-- Avatar -->
                                    <div class="relative">
                                    <img src="{{ $conversation['user']->profileImageUrl() }}" 
                                        alt="{{ $conversation['user']->fname }} {{ $conversation['user']->lname }}"
                                        class="w-12 h-12 rounded-full object-cover">
                                    </div>

                                    <!-- Conversation Info -->
                                    <div class="ml-3 flex-1 min-w-0">
                                        <div class="flex items-center justify-between">
                                            <p class="text-sm font-medium text-[#634600] dark:text-white truncate">
                                                {{ $conversation['user']->fname }} {{ $conversation['user']->lname }}
                                            </p>
                                            <p class="text-xs text-[#786126] dark:text-white">
                                                {{ $conversation['latest_message']->created_at->diffForHumans() }}
                                            </p>
                                        </div>
                                        <p class="text-sm text-[#786126] dark:text-white truncate">
                                            {{ $conversation['latest_message']->message }}
                                        </p>
                                    </div>
                                </a>
                            @endforeach
                        @else
                            <div class="flex items-center justify-center h-full p-4">
                                <div class="text-center">
                                    <div
                                        class="w-16 h-16 bg-[#B59F84] bg-opacity-30 dark:bg-[#f5d68b] rounded-full flex items-center justify-center mx-auto mb-4">
                                        <svg class="w-8 h-8 text-[#786126] dark:text-[#634600]" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8-1.325 0-2.58-.26-3.68-.725L3 20l1.32-3.96C3.474 15.003 3 13.55 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                                            </path>
                                        </svg>
                                    </div>
                                    <p class="text-[#634600] dark:text-white text-sm">No conversations yet</p>
                                    <p class="text-[#786126] dark:text-white text-xs">Start chatting with someone!
                                    </p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Welcome / Chat Area -->
                <div class="flex-1 flex items-center justify-center bg-[#F4F2ED] dark:bg-gray-800 p-4">
                    <div class="text-center">
                        <div
                            class="w-24 h-24 bg-gradient-to-r from-[#634600] to-[#B59F84] rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8-1.325 0-2.58-.26-3.68-.725L3 20l1.32-3.96C3.474 15.003 3 13.55 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-[#634600] dark:text-white mb-2">Welcome to Messages
                        </h3>
                        <p class="text-[#786126] dark:text-white mb-6">Select a conversation from the sidebar to
                            start chatting</p>
                        <div class="flex flex-col sm:flex-row justify-center gap-3">
                            <a href="{{ route('dashboard') }}"
                                class="px-4 py-2 bg-[#634600] dark:bg-yellow-600 text-white rounded-lg hover:bg-[#56432C] dark:hover:bg-yellow-500 transition-colors">
                                Browse Products
                            </a>
                            <a href="{{ route('products.index') }}"
                                class="px-4 py-2 border border-[#B59F84] dark:border-yellow-400 text-[#634600] dark:text-white rounded-lg hover:bg-[#B59F84] hover:bg-opacity-20 dark:hover:bg-yellow-700 transition-colors">
                                My Products
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
