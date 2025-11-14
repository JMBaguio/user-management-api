<div class="mb-8">
    <h3 class="text-xl font-bold text-gray-900 dark:text-gray-100 flex items-center gap-3">
        <div class="p-2 bg-gradient-to-r from-amber-100 to-amber-50 dark:from-amber-900/30 dark:to-amber-800/20 rounded-lg">
            <svg class="w-5 h-5 text-amber-600 dark:text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
            </svg>
        </div>
        <x-user-name-badge :user="$user" :show-full-name="true" /> Profile
    </h3>

    <div class="bg-white dark:bg-gray-800 rounded-lg overflow-hidden mt-6">
        <div class="relative h-32 bg-center bg-cover"
             style="background-image: url('{{ asset('images/Rectangle 99.png') }}');">
            <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black/30"></div>
        </div>
    </div>
</div>