<x-app-layout>
    <div class="py-8 bg-gradient-to-br  dark:from-gray-900 dark:to-gray-800 min-h-screen">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Header Section --}}
            <div class="text-center mb-8">
                <div class="flex items-center justify-center gap-4 mb-4">
                    <div class="w-16 h-16 bg-gradient-to-br from-[#E1D5B6] to-[#D5C39A] rounded-2xl flex items-center justify-center shadow-lg ring-4 ring-white/20">
                        <svg class="w-8 h-8 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-4xl font-bold text-gray-800 dark:text-white mb-2">
                            Edit Your Post
                        </h2>
                        <p class="text-gray-600 dark:text-gray-400 text-lg">
                            Refine your environmental insights and share updated knowledge
                        </p>
                    </div>
                </div>
            </div>

            {{-- Success Message --}}
            @if(session('success'))
                <div class="bg-white/80 dark:bg-gray-800/80 border border-[#E9DFC7] dark:border-gray-600 rounded-2xl p-4 mb-6 flex items-center gap-3 shadow-sm backdrop-blur-sm">
                    <div class="w-8 h-8 bg-green-100 dark:bg-green-900/30 rounded-full flex items-center justify-center">
                        <svg class="w-4 h-4 text-green-600 dark:text-green-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <span class="text-gray-800 dark:text-gray-200 font-medium">{{ session('success') }}</span>
                </div>
            @endif

            {{-- Validation Errors --}}
            @if ($errors->any())
                <div class="bg-white/80 dark:bg-gray-800/80 border border-red-200 dark:border-red-800 rounded-2xl p-4 mb-6 shadow-sm backdrop-blur-sm">
                    <div class="flex items-center gap-3 mb-3">
                        <div class="w-8 h-8 bg-red-100 dark:bg-red-900/30 rounded-full flex items-center justify-center">
                            <svg class="w-4 h-4 text-red-600 dark:text-red-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <span class="text-red-800 dark:text-red-200 font-semibold">Please check your input</span>
                    </div>
                    <ul class="text-red-700 dark:text-red-300 text-sm space-y-1 ml-11">
                        @foreach ($errors->all() as $error)
                            <li class="flex items-center gap-2">
                                <svg class="w-3 h-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                                </svg>
                                {{ $error }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Edit Form --}}
            <div class="bg-white dark:bg-gray-800 rounded-3xl shadow-2xl border border-[#E9DFC7] dark:border-gray-700 overflow-hidden">
                {{-- Form Header --}}
                <div class="bg-gradient-to-r from-[#F8F4EC] to-[#F1E9D2] dark:from-gray-700 dark:to-gray-600 px-6 py-4 border-b border-[#E9DFC7] dark:border-gray-600">
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white flex items-center gap-3">
                        <svg class="w-6 h-6 text-[#B59F84]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                        Update Your Environmental Insight
                    </h3>
                </div>

                <form action="{{ route('eco-posts.update', $post->id) }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-6">
                    @csrf
                    @method('PUT')

                    {{-- Title Field --}}
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3 flex items-center gap-2">
                            <svg class="w-4 h-4 text-[#B59F84]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                            Post Title
                        </label>
                        <input type="text" 
                               name="title" 
                               placeholder="What environmental topic are you sharing?" 
                               class="w-full px-4 py-3 bg-[#F8F4EC] dark:bg-gray-700 border border-[#E9DFC7] dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-[#B59F84] focus:border-transparent dark:text-white transition-all duration-200 placeholder-gray-500 dark:placeholder-gray-400"
                               value="{{ old('title', $post->title) }}" 
                               required>
                    </div>

                    {{-- Content Field --}}
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3 flex items-center gap-2">
                            <svg class="w-4 h-4 text-[#B59F84]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z"/>
                            </svg>
                            Your Content
                        </label>
                        <textarea name="content" 
                                  placeholder="Share your updated environmental insights, sustainable practices, or eco-friendly discoveries..."
                                  rows="6"
                                  class="w-full px-4 py-3 bg-[#F8F4EC] dark:bg-gray-700 border border-[#E9DFC7] dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-[#B59F84] focus:border-transparent dark:text-white transition-all duration-200 resize-none placeholder-gray-500 dark:placeholder-gray-400 leading-relaxed"
                                  required>{{ old('content', $post->content) }}</textarea>
                    </div>

                    {{-- Image Upload Section --}}
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3 flex items-center gap-2">
                                <svg class="w-4 h-4 text-[#B59F84]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                Update Image (Optional)
                            </label>
                            <input type="file" 
                                   name="image" 
                                   accept="image/*" 
                                   class="w-full px-4 py-2 bg-[#F8F4EC] dark:bg-gray-700 border border-[#E9DFC7] dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-[#B59F84] file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-[#E1D5B6] file:text-gray-800 hover:file:bg-[#D5C39A] transition-all duration-200">
                        </div>

                        {{-- Current Image Preview --}}
                        @if($post->image)
                            <div class="bg-[#F8F4EC] dark:bg-gray-700 rounded-2xl p-4 border border-[#E9DFC7] dark:border-gray-600">
                                <p class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-2 flex items-center gap-2">
                                    <svg class="w-4 h-4 text-[#B59F84]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    Current Image
                                </p>
                                <img src="{{ asset('storage/'.$post->image) }}" 
                                     class="w-full max-h-80 object-contain rounded-xl border border-[#E9DFC7] dark:border-gray-600 bg-white dark:bg-gray-600 p-2">
                            </div>
                        @endif
                    </div>

                    {{-- Video Link Field --}}
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3 flex items-center gap-2">
                            <svg class="w-4 h-4 text-[#B59F84]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                            </svg>
                            Video Link (Optional)
                        </label>
                        <input type="url" 
                               name="video_link" 
                               placeholder="https://youtube.com/..." 
                               class="w-full px-4 py-3 bg-[#F8F4EC] dark:bg-gray-700 border border-[#E9DFC7] dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-[#B59F84] focus:border-transparent dark:text-white transition-all duration-200 placeholder-gray-500 dark:placeholder-gray-400"
                               value="{{ old('video_link', $post->video_link) }}">
                    </div>

                    {{-- Action Buttons --}}
                    <div class="flex flex-col sm:flex-row gap-4 pt-4">
                        <button type="submit" 
                                class="flex-1 bg-gradient-to-r from-[#E1D5B6] to-[#D5C39A] hover:from-[#D5C39A] hover:to-[#C9B284] text-gray-800 font-bold py-3 px-6 rounded-xl transition-all duration-300 transform hover:scale-[1.02] shadow-lg hover:shadow-xl flex items-center justify-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Update Post
                        </button>
                        
                        <a href="{{ route('eco-posts.index') }}" 
                           class="flex-1 bg-white dark:bg-gray-700 border border-[#E9DFC7] dark:border-gray-600 text-gray-700 dark:text-gray-300 font-bold py-3 px-6 rounded-xl transition-all duration-300 transform hover:scale-[1.02] shadow-lg hover:shadow-xl flex items-center justify-center gap-2 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                            Cancel
                        </a>
                    </div>
                </form>
            </div>

            {{-- Quick Tips --}}
            <div class="mt-8 bg-white dark:bg-gray-800 rounded-3xl shadow-lg border border-[#E9DFC7] dark:border-gray-700 p-6">
                <h4 class="text-lg font-bold text-gray-800 dark:text-white mb-4 flex items-center gap-2">
                    <svg class="w-5 h-5 text-[#B59F84]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    Editing Tips
                </h4>
                <ul class="space-y-2 text-sm text-gray-600 dark:text-gray-400">
                    <li class="flex items-start gap-2">
                        <svg class="w-4 h-4 text-[#B59F84] mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Ensure your content is factual and evidence-based
                    </li>
                    <li class="flex items-start gap-2">
                        <svg class="w-4 h-4 text-[#B59F84] mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Add recent developments or new findings
                    </li>
                    <li class="flex items-start gap-2">
                        <svg class="w-4 h-4 text-[#B59F84] mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Include updated references and sources
                    </li>
                </ul>
            </div>

        </div>
    </div>
</x-app-layout>