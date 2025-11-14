<div x-show="showPostModal"
     x-transition:enter="transition ease-out duration-300"
     x-transition:enter-start="opacity-0 scale-95"
     x-transition:enter-end="opacity-100 scale-100"
     x-transition:leave="transition ease-in duration-200"
     x-transition:leave-start="opacity-100 scale-100"
     x-transition:leave-end="opacity-0 scale-95"
     class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/40 backdrop-blur-sm"
     @keydown.escape.window="showPostModal = false"
     role="dialog" aria-modal="true" aria-labelledby="post-modal-title">

    <div @click.away="showPostModal = false"
         class="w-full max-w-2xl bg-white/90 dark:bg-gray-800/90 backdrop-blur-xl rounded-3xl shadow-2xl border border-gray-200/50 dark:border-gray-700/50 overflow-hidden">

        <!-- Modal Header -->
        <div class="bg-gradient-to-r from-emerald-500 to-teal-600 px-6 py-5 flex items-center justify-between">
            <h3 id="post-modal-title" class="text-xl font-bold text-white flex items-center gap-3">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                </svg>
                Share Your Insight
            </h3>
            <button @click="showPostModal = false" class="text-white/80 hover:text-white" aria-label="Close">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        <!-- Modal Form -->
        <form action="{{ route('eco-posts.store') }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-5">
            @csrf

            <div class="relative">
                <input type="text" name="title" id="modal-title" placeholder=" " required
                       class="peer w-full px-4 py-4 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-2xl focus:ring-4 focus:ring-emerald-500/30 focus:border-emerald-500 text-gray-900 dark:text-white placeholder-transparent transition-all duration-300"
                       x-ref="titleInput" x-init="$nextTick(() => $refs.titleInput.focus())">
                <label for="modal-title" class="absolute left-4 -top-3 bg-white dark:bg-gray-800 px-2 text-sm font-medium text-emerald-600 dark:text-emerald-400 transition-all duration-300 peer-placeholder-shown:top-4 peer-placeholder-shown:text-gray-500 peer-focus:-top-3 peer-focus:text-emerald-600">
                    Post Title
                </label>
            </div>

            <div class="relative">
                <textarea name="content" id="modal-content" rows="5" placeholder=" " required
                          class="peer w-full px-4 py-4 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-2xl focus:ring-4 focus:ring-emerald-500/30 focus:border-emerald-500 text-gray-900 dark:text-white placeholder-transparent transition-all duration-300 resize-none"></textarea>
                <label for="modal-content" class="absolute left-4 -top-3 bg-white dark:bg-gray-800 px-2 text-sm font-medium text-emerald-600 dark:text-emerald-400 transition-all duration-300 peer-placeholder-shown:top-4 peer-placeholder-shown:text-gray-500 peer-focus:-top-3 peer-focus:text-emerald-600">
                    Your Content
                </label>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Add Image</label>
                    <input type="file" name="image" accept="image/*"
                           class="w-full file:mr-4 file:py-3 file:px-5 file:rounded-xl file:border-0 file:text-sm file:font-bold file:bg-emerald-500 file:text-white hover:file:bg-emerald-600 cursor-pointer rounded-xl bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Video Link (Optional)</label>
                    <input type="url" name="video_link" placeholder="https://youtube.com/..."
                           class="w-full px-4 py-4 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-2xl focus:ring-4 focus:ring-emerald-500/30 focus:border-emerald-500 text-gray-900 dark:text-white transition-all duration-300">
                </div>
            </div>

            <div class="flex gap-3 justify-end pt-4">
                <button type="button" @click="showPostModal = false"
                        class="px-6 py-3 bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-200 font-semibold rounded-xl hover:bg-gray-300 dark:hover:bg-gray-600 transition">
                    Cancel
                </button>
                <button type="submit"
                        class="px-6 py-3 bg-gradient-to-r from-emerald-500 to-teal-600 hover:from-emerald-600 hover:to-teal-700 text-white font-bold rounded-xl shadow-lg hover:shadow-xl transform hover:scale-[1.02] transition flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7"/>
                    </svg>
                    Publish
                </button>
            </div>
        </form>
    </div>
</div>