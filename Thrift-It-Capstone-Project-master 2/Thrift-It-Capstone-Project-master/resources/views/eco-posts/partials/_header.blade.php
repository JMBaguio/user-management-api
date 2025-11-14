<div class="py-12 bg-gradient-to-br from-emerald-50 via-teal-50 to-cyan-50 dark:from-gray-900 dark:via-gray-800 dark:to-black min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Header -->
        <div class="text-center mb-10 animate-fade-in">
            <div class="flex flex-col items-center justify-center gap-5 mb-6">
                <div class="relative">
                    <div class="absolute inset-0 bg-gradient-to-br from-emerald-400 to-teal-500 blur-3xl opacity-30 rounded-full w-32 h-32"></div>
                    <div class="relative w-20 h-20 bg-gradient-to-br from-emerald-500 to-teal-600 rounded-3xl flex items-center justify-center shadow-2xl ring-8 ring-white/30">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/>
                        </svg>
                    </div>
                </div>
                <div>
                    <h2 class="text-5xl font-extrabold bg-clip-text text-transparent bg-gradient-to-r from-emerald-600 to-teal-700 dark:from-emerald-400 dark:to-teal-300 mb-3">
                        Eco Educational Portal
                    </h2>
                    <p class="text-lg text-gray-600 dark:text-gray-300 max-w-2xl mx-auto leading-relaxed">
                        Share knowledge, inspire change, and build a sustainable future together
                    </p>
                </div>
            </div>

            <!-- Stats -->
            <div class="flex justify-center gap-8 mt-8">
                <div class="group text-center transform transition-all duration-300 hover:scale-110">
                    <div class="text-3xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-emerald-600 to-teal-600">
                        {{ $posts->count() }}
                    </div>
                    <div class="text-sm text-gray-600 dark:text-gray-400 font-medium">Community Posts</div>
                </div>
                <div class="group text-center transform transition-all duration-300 hover:scale-110">
                    <div class="text-3xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-teal-600 to-cyan-600">
                        {{ $posts->unique('user_id')->count() }}
                    </div>
                    <div class="text-sm text-gray-600 dark:text-gray-400 font-medium">Active Contributors</div>
                </div>
            </div>
        </div>