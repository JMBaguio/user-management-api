<span class="flex items-center space-x-2">
    <span class="font-medium text-gray-900 dark:text-gray-100">{{ $user->fname }} {{ $user->lname }}</span>

    @if($user->verification_status === 'approved')
        <span class="inline-flex items-center justify-center w-5 h-5 bg-[#B59F84] text-white rounded-full relative">
            <!-- Scalloped shape using SVG -->
            <svg viewBox="0 0 24 24" class="absolute w-full h-full">
                <path fill="#B59F84" d="M12 0l2.9 4.4 5 1.1-3.6 3.8.9 5-4.2-2.2-4.2 2.2.9-5-3.6-3.8 5-1.1L12 0z"/>
            </svg>
            <!-- White checkmark -->
            <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 z-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
            </svg>
        </span>
    @endif
</span>
