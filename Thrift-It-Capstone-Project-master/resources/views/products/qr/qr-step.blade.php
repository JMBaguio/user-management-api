<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Optional QR Code Upload') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <!-- Progress Steps -->
            <x-step-progress :currentStep="$currentStep" />

            <!-- Main Card -->
            <div class="bg-white dark:bg-gray-800 shadow-2xl sm:rounded-3xl overflow-hidden border-0">
                <!-- Header Section -->
                <div class="bg-gradient-to-r from-[#F8F4EC] via-[#F1E9D2] to-[#E9DFC7] dark:from-gray-800 dark:via-gray-700 dark:to-gray-600 px-8 py-8">
                    <div class="flex items-center gap-5">
                        <div class="w-14 h-14 bg-gradient-to-br from-[#E1D5B6] to-[#D5C39A] rounded-2xl flex items-center justify-center shadow-lg ring-4 ring-white/20 dark:ring-gray-800/20">
                            <svg class="w-7 h-7 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z"/>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-3xl font-bold text-gray-900 dark:text-white mb-2">
                                QR Code Setup
                            </h3>
                            <p class="text-gray-700 dark:text-gray-300 text-lg">
                                Make payments easier and faster for your buyers
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Content Section -->
                <div class="p-8">
                    <!-- Information Card -->
                    <div class="bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-blue-900/20 dark:to-indigo-900/20 border border-blue-100 dark:border-blue-800 rounded-2xl p-6 mb-8 shadow-sm">
                        <div class="flex items-start gap-4">
                            <div class="w-8 h-8 bg-blue-100 dark:bg-blue-800 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5 shadow-sm">
                                <svg class="w-4 h-4 text-blue-600 dark:text-blue-300" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h4 class="font-bold text-blue-800 dark:text-blue-300 text-lg mb-3">
                                    Why add a QR code?
                                </h4>
                                <div class="grid md:grid-cols-3 gap-4">
                                    <div class="bg-white/60 dark:bg-gray-800/60 rounded-xl p-4 border border-blue-200 dark:border-blue-700">
                                        <div class="w-10 h-10 bg-blue-100 dark:bg-blue-800 rounded-lg flex items-center justify-center mb-3">
                                            <svg class="w-5 h-5 text-blue-600 dark:text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                            </svg>
                                        </div>
                                        <h5 class="font-semibold text-blue-900 dark:text-blue-200 text-sm mb-2">Lightning Fast</h5>
                                        <p class="text-blue-700 dark:text-blue-400 text-xs">Instant payments with one scan</p>
                                    </div>
                                    <div class="bg-white/60 dark:bg-gray-800/60 rounded-xl p-4 border border-blue-200 dark:border-blue-700">
                                        <div class="w-10 h-10 bg-blue-100 dark:bg-blue-800 rounded-lg flex items-center justify-center mb-3">
                                            <svg class="w-5 h-5 text-blue-600 dark:text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                            </svg>
                                        </div>
                                        <h5 class="font-semibold text-blue-900 dark:text-blue-200 text-sm mb-2">Fewer Questions</h5>
                                        <p class="text-blue-700 dark:text-blue-400 text-xs">Reduce payment confusion</p>
                                    </div>
                                    <div class="bg-white/60 dark:bg-gray-800/60 rounded-xl p-4 border border-blue-200 dark:border-blue-700">
                                        <div class="w-10 h-10 bg-blue-100 dark:bg-blue-800 rounded-lg flex items-center justify-center mb-3">
                                            <svg class="w-5 h-5 text-blue-600 dark:text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                        </div>
                                        <h5 class="font-semibold text-blue-900 dark:text-blue-200 text-sm mb-2">Professional Look</h5>
                                        <p class="text-blue-700 dark:text-blue-400 text-xs">Build trust with buyers</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Upload Form -->
                    <form action="{{ route('sell-item.qr.store', $product->id) }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                        @csrf

                        <!-- File Upload Area -->
                        <div class="space-y-4">
                            <div class="flex items-center justify-between">
                                <label class="block text-lg font-bold text-gray-800 dark:text-gray-200">
                                    Upload QR Code Image
                                </label>
                                <span class="text-sm bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-400 px-3 py-1 rounded-full font-medium">
                                    Optional
                                </span>
                            </div>
                            
                            <!-- Drag & Drop Zone - SIMPLIFIED -->
                            <div class="relative group">
                                <input type="file" name="qr_code" id="qr_code" 
                                       accept="image/*"
                                       class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-20"
                                       onchange="previewImage(event)">
                                
                                <div id="dropZone" 
                                     class="border-3 border-dashed border-gray-200 dark:border-gray-600 rounded-2xl p-12 text-center transition-all duration-500 group-hover:border-[#E1D5B6] group-hover:bg-gradient-to-br group-hover:from-gray-50 group-hover:to-gray-100 dark:group-hover:from-gray-700/50 dark:group-hover:to-gray-800/50">
                                    
                                    <!-- Default State -->
                                    <div id="uploadDefault" class="space-y-6">
                                        <div class="w-20 h-20 bg-gradient-to-br from-[#F8F4EC] to-[#F1E9D2] dark:from-gray-700 dark:to-gray-600 rounded-2xl flex items-center justify-center mx-auto shadow-inner">
                                            <svg class="w-10 h-10 text-gray-400 group-hover:text-[#B59F84] transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" 
                                                      d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                                            </svg>
                                        </div>
                                        <div class="space-y-3">
                                            <p class="text-gray-600 dark:text-gray-400 font-semibold text-lg">
                                                Drop your QR code here
                                            </p>
                                            <p class="text-gray-500 dark:text-gray-500">
                                                or <span class="text-[#B59F84] hover:text-[#a08e77] cursor-pointer font-semibold" onclick="document.getElementById('qr_code').click()">browse files</span>
                                            </p>
                                            <p class="text-gray-400 dark:text-gray-500 text-sm">
                                                Supports: PNG, JPG, JPEG • Max: 5MB
                                            </p>
                                        </div>
                                    </div>

                                    <!-- Preview State - SIMPLIFIED (just the image) -->
                                    <div id="uploadPreview" class="hidden space-y-6">
                                        <div class="relative w-32 h-32 mx-auto">
                                            <div class="w-full h-full border-4 border-white dark:border-gray-800 rounded-2xl shadow-2xl overflow-hidden">
                                                <img id="imagePreview" class="w-full h-full object-cover" src="" alt="QR Code Preview">
                                            </div>
                                            <div class="absolute -top-2 -right-2 w-6 h-6 bg-green-500 rounded-full flex items-center justify-center shadow-lg">
                                                <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="space-y-3">
                                            <p class="text-gray-700 dark:text-gray-300 font-semibold text-lg" id="fileName"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- REMOVE BUTTON - NOW OUTSIDE THE DROP ZONE -->
                            <div id="removeButtonContainer" class="hidden">
                                <button type="button" onclick="removeImage()" 
                                        class="w-full inline-flex items-center justify-center gap-2 px-6 py-3 bg-red-50 hover:bg-red-100 dark:bg-red-900/20 dark:hover:bg-red-900/30 text-red-600 dark:text-red-400 font-semibold rounded-xl transition-all duration-200 border border-red-200 dark:border-red-800 hover:border-red-300 dark:hover:border-red-700 hover:scale-[1.02]">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                    Remove QR Code
                                </button>
                            </div>

                            @error('qr_code')
                                <div class="bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800 rounded-xl p-4 flex items-start gap-3">
                                    <svg class="w-5 h-5 text-red-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                    </svg>
                                    <p class="text-red-700 dark:text-red-300 text-sm">{{ $message }}</p>
                                </div>
                            @enderror
                        </div>

                        <!-- Action Buttons - COMPACT VERSION -->
                        <div class="flex flex-col sm:flex-row gap-4 pt-8 border-t border-gray-100 dark:border-gray-700">
                            <!-- Skip Button - Compact -->
                            <a href="{{ route('sell-item.qr.skip', $product->id) }}"
                               class="group flex-1 px-6 py-4 bg-gradient-to-r from-gray-50 to-gray-100 hover:from-gray-100 hover:to-gray-200 dark:from-gray-700 dark:to-gray-600 dark:hover:from-gray-600 dark:hover:to-gray-500 text-gray-700 dark:text-gray-200 rounded-xl font-semibold transition-all duration-300 flex items-center justify-center gap-3 shadow-md hover:shadow-lg border border-gray-200 dark:border-gray-600 hover:border-gray-300 dark:hover:border-gray-500 hover:scale-[1.02]">
                                <div class="w-10 h-10 bg-gray-200 dark:bg-gray-600 rounded-lg flex items-center justify-center group-hover:bg-gray-300 dark:group-hover:bg-gray-500 transition-colors duration-300">
                                    <svg class="w-5 h-5 text-gray-600 dark:text-gray-400 group-hover:scale-110 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                    </svg>
                                </div>
                                <div class="text-left flex-1">
                                    <div class="text-sm font-semibold text-gray-500 dark:text-gray-400">Skip for Now</div>
                                    <div class="text-xs text-gray-500 dark:text-gray-400">Add QR code later</div>
                                </div>
                                <svg class="w-4 h-4 text-gray-400 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </a>

                            <!-- Submit Button - Compact -->
                            <button type="submit"
                                    id="submitBtn"
                                    class="group flex-1 px-6 py-4 bg-gradient-to-r from-[#E1D5B6] via-[#D5C39A] to-[#C9B284] hover:from-[#D5C39A] hover:via-[#C9B284] hover:to-[#BDA776] text-gray-900 font-semibold rounded-xl transition-all duration-300 transform hover:scale-[1.02] shadow-lg hover:shadow-xl flex items-center justify-center gap-3 relative overflow-hidden">
                                <!-- Animated background effect -->
                                <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/20 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>
                                
                                <div class="w-10 h-10 bg-white/20 rounded-lg flex items-center justify-center backdrop-blur-sm ring-2 ring-white/30 z-10">
                                    <svg class="w-5 h-5 text-gray-800 group-hover:scale-110 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"/>
                                    </svg>
                                </div>
                                <div class="text-left flex-1 z-10">
                                    <div class="text-sm font-semibold text-gray-700">Save QR Code</div>
                                    <div class="text-xs text-gray-700/80">Proceed to next step</div>
                                </div>
                                <svg class="w-4 h-4 text-gray-700 group-hover:translate-x-1 transition-transform duration-300 z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                                </svg>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Help Text -->
            <div class="mt-8 text-center">
                <div class="inline-flex items-center gap-3 bg-gray-50 dark:bg-gray-800 rounded-2xl px-6 py-4 border border-gray-200 dark:border-gray-700">
                    <svg class="w-5 h-5 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <p class="text-gray-600 dark:text-gray-400 text-sm">
                        <span class="font-semibold">Tip:</span> You can always add or update your QR code later from your product management page.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <script>
        function previewImage(event) {
            const input = event.target;
            const dropZone = document.getElementById('dropZone');
            const uploadDefault = document.getElementById('uploadDefault');
            const uploadPreview = document.getElementById('uploadPreview');
            const imagePreview = document.getElementById('imagePreview');
            const fileName = document.getElementById('fileName');
            const submitBtn = document.getElementById('submitBtn');
            const removeButtonContainer = document.getElementById('removeButtonContainer');

            if (input.files && input.files[0]) {
                const file = input.files[0];
                
                // Validate file type and size
                const validTypes = ['image/png', 'image/jpeg', 'image/jpg'];
                const maxSize = 5 * 1024 * 1024; // 5MB
                
                if (!validTypes.includes(file.type)) {
                    alert('Please upload a valid image file (PNG, JPG, JPEG)');
                    removeImage();
                    return;
                }
                
                if (file.size > maxSize) {
                    alert('File size must be less than 5MB');
                    removeImage();
                    return;
                }

                const reader = new FileReader();

                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                    fileName.textContent = file.name.length > 20 ? file.name.substring(0, 20) + '...' : file.name;
                    uploadDefault.classList.add('hidden');
                    uploadPreview.classList.remove('hidden');
                    removeButtonContainer.classList.remove('hidden');
                    
                    dropZone.classList.remove('border-gray-200', 'dark:border-gray-600', 'group-hover:border-[#E1D5B6]');
                    dropZone.classList.add('border-green-400', 'bg-gradient-to-br', 'from-green-50', 'to-emerald-50', 'dark:from-green-900/20', 'dark:to-emerald-900/20');
                    
                    // Update submit button with success state
                    submitBtn.innerHTML = `
                        <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/20 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>
                        <div class="w-10 h-10 bg-white/20 rounded-lg flex items-center justify-center backdrop-blur-sm ring-2 ring-white/30 z-10">
                            <svg class="w-5 h-5 text-gray-800 group-hover:scale-110 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                        <div class="text-left flex-1 z-10">
                            <div class="text-sm font-semibold text-gray-700">Save & Continue</div>
                            <div class="text-xs text-gray-700/80">Almost done with setup</div>
                        </div>
                        <svg class="w-4 h-4 text-gray-700 group-hover:translate-x-1 transition-transform duration-300 z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                        </svg>
                    `;
                };

                reader.readAsDataURL(file);
            }
        }

        function removeImage() {
            const input = document.getElementById('qr_code');
            const dropZone = document.getElementById('dropZone');
            const uploadDefault = document.getElementById('uploadDefault');
            const uploadPreview = document.getElementById('uploadPreview');
            const imagePreview = document.getElementById('imagePreview');
            const fileName = document.getElementById('fileName');
            const submitBtn = document.getElementById('submitBtn');
            const removeButtonContainer = document.getElementById('removeButtonContainer');

            // Reset file input
            input.value = '';
            
            // Reset preview elements
            imagePreview.src = '';
            fileName.textContent = '';
            
            // Show default state, hide preview and remove button
            uploadPreview.classList.add('hidden');
            uploadDefault.classList.remove('hidden');
            removeButtonContainer.classList.add('hidden');
            
            // Reset dropzone styling
            dropZone.classList.remove('border-green-400', 'bg-gradient-to-br', 'from-green-50', 'to-emerald-50', 'dark:from-green-900/20', 'dark:to-emerald-900/20');
            dropZone.classList.add('border-gray-200', 'dark:border-gray-600');
            
            // Reset submit button
            submitBtn.innerHTML = `
                <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/20 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>
                <div class="w-10 h-10 bg-white/20 rounded-lg flex items-center justify-center backdrop-blur-sm ring-2 ring-white/30 z-10">
                    <svg class="w-5 h-5 text-gray-800 group-hover:scale-110 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"/>
                    </svg>
                </div>
                <div class="text-left flex-1 z-10">
                    <div class="text-sm font-semibold text-gray-700">Save QR Code</div>
                    <div class="text-xs text-gray-700/80">Proceed to next step</div>
                </div>
                <svg class="w-4 h-4 text-gray-700 group-hover:translate-x-1 transition-transform duration-300 z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                </svg>
            `;
        }

        // Simple drag and drop functionality
        document.addEventListener('DOMContentLoaded', function() {
            const dropZone = document.getElementById('dropZone');
            const fileInput = document.getElementById('qr_code');

            // Prevent default drag behaviors
            ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
                dropZone.addEventListener(eventName, preventDefaults, false);
            });

            function preventDefaults(e) {
                e.preventDefault();
                e.stopPropagation();
            }

            // Highlight drop zone when item is dragged over it
            ['dragenter', 'dragover'].forEach(eventName => {
                dropZone.addEventListener(eventName, highlight, false);
            });

            ['dragleave', 'drop'].forEach(eventName => {
                dropZone.addEventListener(eventName, unhighlight, false);
            });

            function highlight() {
                dropZone.classList.add('border-[#E1D5B6]', 'bg-gradient-to-br', 'from-gray-50', 'to-gray-100', 'dark:from-gray-700/50', 'dark:to-gray-800/50');
            }

            function unhighlight() {
                dropZone.classList.remove('border-[#E1D5B6]', 'bg-gradient-to-br', 'from-gray-50', 'to-gray-100', 'dark:from-gray-700/50', 'dark:to-gray-800/50');
            }

            // Handle dropped files
            dropZone.addEventListener('drop', handleDrop, false);

            function handleDrop(e) {
                const dt = e.dataTransfer;
                const files = dt.files;
                
                if (files.length > 0) {
                    fileInput.files = files;
                    previewImage({ target: fileInput });
                }
            }

            // Make drop zone clickable
            dropZone.addEventListener('click', function() {
                fileInput.click();
            });
        });
    </script>

    <style>
        #dropZone {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .shadow-2xl {
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }
        
        .hover\\:shadow-xl:hover {
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
    </style>
</x-app-layout>