<button @click="showPostModal = true"
        class="fixed bottom-6 right-6 z-40 group flex items-center gap-3 bg-gradient-to-r from-emerald-500 to-teal-600 text-white font-bold py-4 px-6 rounded-full shadow-2xl hover:shadow-3xl transform hover:scale-105 transition-all duration-300 focus:outline-none focus:ring-4 focus:ring-emerald-500/50"
        aria-label="Create new post">
    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
    </svg>
    <span class="hidden sm:inline">What’s on your mind?</span>
</button>