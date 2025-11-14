{{-- <!-- Success Message -->
@if(session('success'))
    <div class="max-w-2xl mx-auto mb-8 animate-slide-down">
        <div class="bg-white/90 dark:bg-gray-800/90 backdrop-blur-lg border border-emerald-200 dark:border-emerald-700/50 rounded-2xl p-5 flex items-center gap-4 shadow-xl">
            <div class="w-10 h-10 bg-emerald-100 dark:bg-emerald-900/50 rounded-full flex items-center justify-center flex-shrink-0">
                <svg class="w-5 h-5 text-emerald-600 dark:text-emerald-400" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
            </div>
            <span class="text-gray-800 dark:text-gray-100 font-semibold text-lg">{{ session('success') }}</span>
        </div>
    </div>
@endif

<!-- Validation Errors -->
@if ($errors->any())
    <div class="max-w-2xl mx-auto mb-8 animate-slide-down">
        <div class="bg-red-50/80 dark:bg-red-900/30 backdrop-blur-lg border border-red-200 dark:border-red-800 rounded-2xl p-5 shadow-xl">
            <div class="flex items-center gap-3 mb-3">
                <div class="w-10 h-10 bg-red-100 dark:bg-red-900/50 rounded-full flex items-center justify-center">
                    <svg class="w-5 h-5 text-red-600 dark:text-red-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <span class="text-red-800 dark:text-red-300 font-bold">Please fix the following errors</span>
            </div>
            <ul class="text-red-700 dark:text-red-300 text-sm space-y-1 ml-13">
                @foreach ($errors->all() as $error)
                    <li class="flex items-center gap-2">
                        <div class="w-1 h-1 bg-red-500 rounded-full"></div>
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endif --}}