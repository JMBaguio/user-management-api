<x-app-layout>
    <div class="pt-8 sm:pt-12 pb-8">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Mobile Header -->
            <div class="block md:hidden mb-8">
                <h2 class="text-xl font-bold text-custom-dark text-center">
                    <i>Sell
                    <img src="{{ asset('images/image 165.png') }}" alt="emoji" class="inline-block h-5 w-4 align-middle ml-1">
                    </i>
                </h2>
                <hr class="w-full mt-4 h-px bg-gray-800 border-0 dark:bg-gray-700">
            </div>
            
        
            <!-- Desktop Header -->
        <x-step-progress :currentStep="$currentStep" />

            <!-- Main Layout with Form Container -->
            <form id="productForm" action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                @csrf
                <div class="grid grid-cols-1 lg:grid-cols-5 gap-6 lg:gap-10 items-start lg:relative lg:left-[-150px]">
                    <!-- Left Side - Image Upload Section (multiple with previews) -->
                    <div class="lg:col-span-2 flex flex-col w-full lg:w-[450px]">
                        <div class="space-y-4">
                            <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Photos</h3>
                            <div class="w-full">

                                <!-- Preview Grid -->
                               <!-- Photo Guidelines -->
            <div class="bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800 rounded-xl p-4">
                <h4 class="text-sm font-semibold text-blue-800 dark:text-blue-300 mb-2 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z"/>
                    </svg>
                    Photo Guidelines
                </h4>
                <ul class="text-xs text-blue-700 dark:text-blue-300 space-y-1">
                    <li class="flex items-start gap-2">
                        <span class="text-blue-500 mt-0.5">•</span>
                        <span><strong>Cover Photo:</strong> Main product shot</span>
                    </li>
                    <li class="flex items-start gap-2">
                        <span class="text-blue-500 mt-0.5">•</span>
                        <span><strong>Front & Back:</strong> Clear views from both sides</span>
                    </li>
                    <li class="flex items-start gap-2">
                        <span class="text-blue-500 mt-0.5">•</span>
                        <span><strong>Side Views:</strong> Left and right side angles</span>
                    </li>
                    <li class="flex items-start gap-2">
                        <span class="text-blue-500 mt-0.5">•</span>
                        <span><strong>Labels/Tags:</strong> Brand, size, and care labels</span>
                    </li>
                    <li class="flex items-start gap-2">
                        <span class="text-blue-500 mt-0.5">•</span>
                        <span><strong>Details:</strong> Close-ups of special features</span>
                    </li>
                    <li class="flex items-start gap-2">
                        <span class="text-blue-500 mt-0.5">•</span>
                        <span><strong>Flaws:</strong> Any imperfections or wear</span>
                    </li>
                </ul>
            </div>
                                <!-- Add Photos Button (matched to donation style) -->
            
    <div class="mb-4 mt-[30px]">
        <label for="productImages"
               id="productDropZone"
               class="upload-tile group cursor-pointer flex flex-col items-center justify-center border-2 border-dashed border-gray-300/80 rounded-3xl transition-all duration-500 hover:border-primary-400 hover:shadow-xl bg-white/80 hover:bg-white backdrop-blur-sm p-8 min-h-[192px] sm:min-h-[208px]">

            <!-- Preview Grid INSIDE the drop zone -->
            <div id="productPreviews" class="grid grid-cols-2 sm:grid-cols-3 gap-3 mb-4 w-full"></div>
            
            <div id="donationAddMoreText" class="text-center mb-4 hidden">
              <p class="text-sm text-[#B59F84] font-medium">Tap to add more photos</p>
           </div>
            <!-- Drop zone content - only show when no images or can add more -->
            <div id="dropZoneContent" class="flex flex-col items-center justify-center gap-5 w-full">
                <!-- Icon Container with Gradient -->
                <div class="flex justify-center w-full">
                    <div class="shrink-0 w-18 h-18 rounded-2xl bg-gradient-to-br from-gray-100 to-gray-200 dark:from-gray-700 dark:to-gray-600 flex items-center justify-center text-gray-600 transition-all duration-500 group-hover:scale-110 group-hover:from-primary-50 group-hover:to-primary-100 group-hover:text-primary-600 shadow-sm group-hover:shadow-md">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-9 w-9" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M3 5a2 2 0 0 1 2-2h3l2 2h6a2 2 0 0 1 2 2v2H3V5Zm0 6h18v8a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-8Zm9 7a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
                        </svg>
                    </div>
                </div>

                <!-- Content Container -->
                <div class="flex flex-col items-center justify-center gap-4 text-center">
                    <!-- Browse Files Button -->
                    <span class="inline-flex items-center gap-2 px-5 py-2.5 text-sm font-semibold rounded-full bg-gradient-to-r from-[#E1D5B6] to-[#d4c6a2] text-[#6f5e49] transition-all duration-500 group-hover:scale-105 group-hover:shadow-lg group-hover:from-[#d4c6a2] group-hover:to-[#c8b994] transform hover:-translate-y-0.5">
                        Browse files
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition-transform duration-300 group-hover:translate-y-0.5" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 16l-6-6h12l-6 6z"/>
                        </svg>
                    </span>

                    <!-- File Info -->
                    <div class="flex flex-col gap-2">
                        <p class="text-sm font-semibold text-gray-700 bg-gray-100/50 px-3 py-1.5 rounded-lg">PNG or JPG up to 5MB each</p>
                        <span class="text-sm text-gray-600 font-medium">Add or Drag & Drop photos</span>
                    </div>
                </div>
            </div>

            <!-- Hover Glow Effect -->
            <div class="absolute inset-0 rounded-3xl bg-gradient-to-r from-primary-100/20 to-blue-100/20 opacity-0 group-hover:opacity-100 transition-opacity duration-500 -z-10"></div>
        </label>
    </div>
    
    <!-- Hidden multiple input -->
    <input id="productImages" name="images[]" type="file" accept="image/*" multiple class="hidden">

    <!-- Helper and error -->
    <p class="mt-2 text-xs text-gray-500">Upload 2–8 photos.</p>
    <p id="productImageError" class="mt-2 text-sm text-red-600 hidden"></p>
    <p id="productReachLimitError" class="mt-2 text-sm text-red-600 hidden">You can only upload up to 8 photos.</p>
</div>



                        </div>
                    </div>

                    <!-- Right Side - Form Container -->
                    <div class="lg:col-span-3 flex lg:justify-end lg:relative lg:left-[250px] w-[640px] ">
                        <div class="bg-[#F4F2ED] dark:bg-gray-800 shadow-lg rounded-lg overflow-visible w-[150px] lg:w-[680px] ml-auto">
                            <div class="p-4 sm:p-6">
                                <!-- Basic Information Section -->
                                <div class="space-y-4">
                                    <h3 class="text-xl font-bold text-gray-900 dark:text-gray-100 tracking-tight">Basic Information</h3>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">Give buyers the essentials about your item.</p>
                                    <div class="h-px w-full bg-gray-200 dark:bg-gray-700"></div>
                                    <div>
                                        <label for="name" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Item Name <span class="ml-1 text-red-500">*</span></label>
                                        <input type="text" id="name" name="name" class="mt-1 block w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-xl bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-[#B59F84] focus:border-[#B59F84] transition" placeholder="e.g., Vintage Denim Jacket" value="{{ old('name') }}" required>
                                        <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Use clear, searchable words (brand, material, color).</p>
                                        @error('name')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
                                        <div>
                                            <label for="category_id" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Category <span class="ml-1 text-red-500">*</span></label>
                                            <select id="category_id" name="category_id" class="mt-1 block w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-[#B59F84] focus:border-[#B59F84] transition" required>
                                                <option value="" disabled selected>Select a category</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                            <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Choose the closest match so buyers can find it easily.</p>
                                            @error('category_id')
                                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div>
                                            <label for="segment_id" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Target Audience <span class="ml-1 text-red-500">*</span></label>
                                            <select id="segment_id" name="segment_id" class="mt-1 block w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-[#B59F84] focus:border-[#B59F84] transition" required>
                                                <option value="" disabled selected>Select a segment</option>
                                                @foreach ($segments as $segment)
                                                    <option value="{{ $segment->id }}" {{ old('segment_id') == $segment->id ? 'selected' : '' }}>
                                                        {{ ucfirst($segment->name) }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Who is this best suited for (e.g., Men, Women, Teens)?</p>
                                            @error('segment_id')
                                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Location Section -->
                                    <div class="space-y-4">
                                        <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Location</h3>
                                        <div class="mb-8">
                                            <label for="barangay_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Barangay</label>
                                            <select id="barangay_id" name="barangay_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-gray-500 focus:ring-gray-500" required>
                                                <option value="" disabled selected>Select a barangay</option>
                                                @foreach ($barangays as $barangay)
                                                    <option value="{{ $barangay->id }}" {{ old('barangay_id') == $barangay->id ? 'selected' : '' }}>
                                                        {{ $barangay->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('barangay_id')
                                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div>
                                        <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Description</label>
                                        <textarea id="description" name="description" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-gray-500 focus:ring-gray-500" placeholder="Enter detailed description" required>{{ old('description') }}</textarea>
                                        @error('description')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Product Details Section -->
                                <div class="space-y-4">
                                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Product Details</h3>
                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6">
                                        <div>
                                            <label for="condition" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Condition</label>
                                            <select id="condition" name="condition" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-gray-500 focus:ring-gray-500" required>
                                                <option value="new" {{ old('condition') == 'new' ? 'selected' : '' }}>New</option>
                                                <option value="used" {{ old('condition') == 'used' ? 'selected' : '' }}>Used</option>
                                            </select>
                                            @error('condition')
                                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        
                                        {{-- MAKE IT AVAILABLE ON DEFAULT --}}
                                        <input type="hidden" name="status" value="available">

                                        <div>
                                            <label for="size" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Size</label>
                                            <select id="size" name="size" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-gray-500 focus:ring-gray-500" required>
                                                <option value="" disabled selected>Select size</option>

                                                <!-- Clothing Sizes -->
                                                <optgroup label="Shirts, Dresses, Outerwear, Pants, Shorts, Skirts">
                                                    <option value="XS" {{ old('size') == 'XS' ? 'selected' : '' }}>XS</option>
                                                    <option value="S" {{ old('size') == 'S' ? 'selected' : '' }}>S</option>
                                                    <option value="M" {{ old('size') == 'M' ? 'selected' : '' }}>M</option>
                                                    <option value="L" {{ old('size') == 'L' ? 'selected' : '' }}>L</option>
                                                    <option value="XL" {{ old('size') == 'XL' ? 'selected' : '' }}>XL</option>
                                                    <option value="XXL" {{ old('size') == 'XXL' ? 'selected' : '' }}>XXL</option>
                                                    <option value="3XL" {{ old('size') == '3XL' ? 'selected' : '' }}>3XL</option>
                                                    <option value="4XL" {{ old('size') == '4XL' ? 'selected' : '' }}>4XL</option>
                                                    <option value="5XL" {{ old('size') == '5XL' ? 'selected' : '' }}>5XL</option>
                                                </optgroup>

                                                <!-- Shoe Sizes (US Unisex) -->
                                                <optgroup label="Shoes">
                                                    <option value="3" {{ old('size') == '3' ? 'selected' : '' }}>3</option>
                                                    <option value="3.5" {{ old('size') == '3.5' ? 'selected' : '' }}>3.5</option>
                                                    <option value="4" {{ old('size') == '4' ? 'selected' : '' }}>4</option>
                                                    <option value="4.5" {{ old('size') == '4.5' ? 'selected' : '' }}>4.5</option>
                                                    <option value="5" {{ old('size') == '5' ? 'selected' : '' }}>5</option>
                                                    <option value="5.5" {{ old('size') == '5.5' ? 'selected' : '' }}>5.5</option>
                                                    <option value="6" {{ old('size') == '6' ? 'selected' : '' }}>6</option>
                                                    <option value="6.5" {{ old('size') == '6.5' ? 'selected' : '' }}>6.5</option>
                                                    <option value="7" {{ old('size') == '7' ? 'selected' : '' }}>7</option>
                                                    <option value="7.5" {{ old('size') == '7.5' ? 'selected' : '' }}>7.5</option>
                                                    <option value="8" {{ old('size') == '8' ? 'selected' : '' }}>8</option>
                                                    <option value="8.5" {{ old('size') == '8.5' ? 'selected' : '' }}>8.5</option>
                                                    <option value="9" {{ old('size') == '9' ? 'selected' : '' }}>9</option>
                                                    <option value="9.5" {{ old('size') == '9.5' ? 'selected' : '' }}>9.5</option>
                                                    <option value="10" {{ old('size') == '10' ? 'selected' : '' }}>10</option>
                                                    <option value="10.5" {{ old('size') == '10.5' ? 'selected' : '' }}>10.5</option>
                                                    <option value="11" {{ old('size') == '11' ? 'selected' : '' }}>11</option>
                                                    <option value="11.5" {{ old('size') == '11.5' ? 'selected' : '' }}>11.5</option>
                                                    <option value="12" {{ old('size') == '12' ? 'selected' : '' }}>12</option>
                                                    <option value="13" {{ old('size') == '13' ? 'selected' : '' }}>13</option>
                                                    <option value="14" {{ old('size') == '14' ? 'selected' : '' }}>14</option>
                                                </optgroup>

                                                <!-- Accessories -->
                                                <optgroup label="Accessories">
                                                    <option value="One Size" {{ old('size') == 'One Size' ? 'selected' : '' }}>One Size</option>
                                                    <option value="Adjustable" {{ old('size') == 'Adjustable' ? 'selected' : '' }}>Adjustable</option>
                                                    <option value="Small" {{ old('size') == 'Small' ? 'selected' : '' }}>Small</option>
                                                    <option value="Medium" {{ old('size') == 'Medium' ? 'selected' : '' }}>Medium</option>
                                                    <option value="Large" {{ old('size') == 'Large' ? 'selected' : '' }}>Large</option>
                                                </optgroup>

                                                <!-- Socks & Hosiery -->
                                                <optgroup label="Socks & Hosiery">
                                                    <option value="Small (S)" {{ old('size') == 'Small (S)' ? 'selected' : '' }}>Small (S)</option>
                                                    <option value="Medium (M)" {{ old('size') == 'Medium (M)' ? 'selected' : '' }}>Medium (M)</option>
                                                    <option value="Large (L)" {{ old('size') == 'Large (L)' ? 'selected' : '' }}>Large (L)</option>
                                                    <option value="Extra Large (XL)" {{ old('size') == 'Extra Large (XL)' ? 'selected' : '' }}>Extra Large (XL)</option>
                                                </optgroup>
                                            </select>

                                            @error('size')
                                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div>
                                        <label for="price" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Price (PHP)</label>
                                        <input type="number" step="0.01" id="price" name="price" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-gray-500 focus:ring-gray-500" placeholder="Enter price" value="{{ old('price') }}" required>
                                        @error('price')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    
                                    <!-- Submit Button -->
                                    <div class="flex justify-center sm:justify-end mt-9 mb-[-40px]">
                                        <button type="submit" class="inline-flex items-center justify-center bg-[#B59F84] text-white px-8 sm:px-10 py-2 rounded-[10px] text-sm sm:text-base font-semibold hover:bg-[#a08e77] transform hover:scale-105 transition-all duration-300 shadow-md w-full sm:w-auto">
                                            Sell Item 
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
    // Multi-image selection with previews, drag & drop, and 2–8 enforcement for products
    document.addEventListener('DOMContentLoaded', function() {
        const input = document.getElementById('productImages');
        const previews = document.getElementById('productPreviews');
        const form = document.getElementById('productForm');
        const errorEl = document.getElementById('productImageError');
        const dropZone = document.getElementById('productDropZone');
        const addMoreText = document.getElementById('donationAddMoreText');
        const dropZoneContent = document.getElementById('dropZoneContent');
        const reachLimitEl = document.getElementById('productReachLimitError');
        let selectedFiles = [];

        function showError(msg) {
            if (!errorEl) return;
            errorEl.textContent = msg;
            errorEl.classList.remove('hidden');
        }
        function hideError() {
            if (!errorEl) return;
            errorEl.classList.add('hidden');
        }

        function showReachLimit() {
            if (!reachLimitEl) return;
            reachLimitEl.classList.remove('hidden');
            setTimeout(() => reachLimitEl.classList.add('hidden'), 2500);
        }
        function hideReachLimit() {
            if (!reachLimitEl) return;
            reachLimitEl.classList.add('hidden');
        }

        function renderPreviews(files) {
            previews.innerHTML = '';
            files.forEach((file, index) => {
                const wrapper = document.createElement('div');
                wrapper.className = 'preview-item relative';
                const img = document.createElement('img');
                img.alt = 'Preview ' + (index + 1);
                img.className = 'w-full h-24 object-cover rounded-lg';
                const badge = document.createElement('span');
                badge.className = 'preview-number absolute top-1 left-1 bg-black bg-opacity-70 text-white rounded-full w-5 h-5 flex items-center justify-center text-xs';
                badge.textContent = index + 1;
                const removeBtn = document.createElement('span');
                removeBtn.className = 'remove-btn absolute top-1 right-1 bg-red-500 text-white rounded-full w-5 h-5 flex items-center justify-center text-xs cursor-pointer';
                removeBtn.textContent = '×';
                removeBtn.onclick = (e) => { e.preventDefault(); e.stopPropagation(); removeAt(index); };
                wrapper.appendChild(img);
                wrapper.appendChild(badge);
                wrapper.appendChild(removeBtn);
                previews.appendChild(wrapper);
                const r = new FileReader();
                r.onload = (ev) => { img.src = ev.target.result; };
                r.readAsDataURL(file);
            });
            
            // Update drop zone content visibility and auto-height
            updateDropZoneVisibility();
        }

        function syncInput() {
            const dt = new DataTransfer();
            selectedFiles.forEach(f => dt.items.add(f));
            input.files = dt.files;
        }

        function removeAt(idx) {
            if (selectedFiles.length <= 2) {
                showError('You must keep at least 2 images.');
                return;
            }
            selectedFiles.splice(idx, 1);
            syncInput();
            renderPreviews(selectedFiles);
            hideError();
        }

        function canAddMore() {
            return selectedFiles.length < 8;
        }

        function updateDropZoneVisibility() {
            const total = selectedFiles.length;
            
            // Show/hide drop zone content based on whether we have images
            if (total > 0) {
                dropZoneContent.classList.add('hidden');
                // Auto adjust height based on content
                if (canAddMore()) {
                    addMoreText.classList.remove('hidden');
                } else {
                    addMoreText.classList.add('hidden');
                }
                dropZone.style.minHeight = 'auto';
            } else {
                dropZoneContent.classList.remove('hidden');
                addMoreText.classList.add('hidden');
                dropZone.style.minHeight = '192px'; // h-48 equivalent
            }
            
            // Show reach limit message and disable adding more
            if (total >= 8) {
                showReachLimit();
                addMoreText.classList.add('hidden');
            } else {
                hideReachLimit();
            }
        }

        // Clear input before opening via label (ensures first pick registers)
        const label = document.querySelector('label[for="productImages"]');
        if (label) {
            label.addEventListener('mousedown', () => { if (input) input.value = ''; });
        }

        input.addEventListener('change', () => {
            hideError();
            const newly = Array.from(input.files || []);
            const makeKey = (f) => `${f.name}|${f.size}|${f.lastModified}`;
            const keys = new Set(selectedFiles.map(makeKey));
            for (const f of newly) {
                if (selectedFiles.length >= 8) break;
                const k = makeKey(f);
                if (keys.has(k)) continue;
                selectedFiles.push(f);
                keys.add(k);
            }
            if (selectedFiles.length >= 8 && newly.length > 0) {
                showReachLimit();
            }
            syncInput();
            renderPreviews(selectedFiles);
        });

        form.addEventListener('submit', (e) => {
            const count = input.files?.length || selectedFiles.length;
            if (count < 2) {
                e.preventDefault();
                showError('Please upload at least 2 photos.');
            } else if (count > 8) {
                e.preventDefault();
                showError('Please upload up to 8 photos only.');
            }
        });

        // Drag & Drop support
        if (dropZone) {
            dropZone.addEventListener('dragover', (e) => {
                e.preventDefault();
                if (canAddMore()) {
                    dropZone.classList.add('ring-2', 'ring-blue-400');
                } else {
                    dropZone.classList.add('ring-2', 'ring-red-400');
                }
            });
            dropZone.addEventListener('dragleave', () => {
                dropZone.classList.remove('ring-2', 'ring-blue-400', 'ring-red-400');
            });
            dropZone.addEventListener('drop', (e) => {
                e.preventDefault();
                dropZone.classList.remove('ring-2', 'ring-blue-400', 'ring-red-400');
                if (!canAddMore()) {
                    showReachLimit();
                    return;
                }
                const files = Array.from(e.dataTransfer.files || []);
                const makeKey = (f) => `${f.name}|${f.size}|${f.lastModified}`;
                const keys = new Set(selectedFiles.map(makeKey));
                let added = false;
                for (const f of files) {
                    if (selectedFiles.length >= 8) break;
                    const k = makeKey(f);
                    if (keys.has(k)) continue;
                    selectedFiles.push(f);
                    keys.add(k);
                    added = true;
                }
                if (added) {
                    syncInput();
                    renderPreviews(selectedFiles);
                }
            });
            dropZone.addEventListener('click', (e) => {
                if (!canAddMore()) {
                    e.preventDefault();
                    showReachLimit();
                }
            });
        }

        // Initialize
        renderPreviews(selectedFiles);
    });

    // Size options update based on category (if needed)
    function updateSizeOptions() {
        const categorySelect = document.getElementById('category_id');
        const sizeSelect = document.getElementById('size');
        
        // You can implement category-based size filtering here if needed
        // Similar to the donation form implementation
    }

    document.addEventListener('DOMContentLoaded', function() {
        // Initialize size options if category-based filtering is needed
        updateSizeOptions();
        document.getElementById('category_id').addEventListener('change', updateSizeOptions);
    });
</script>

    <style>
        /* Simple tiles for the photo grid */
        .upload-tile {
            border: 2px dashed rgba(209, 213, 219, 1);
            border-radius: 0.5rem;
            background-color: #ffffff;
            position: relative;
            overflow: hidden;
            cursor: pointer;
            display: block;
        }
        .upload-tile:hover { border-color: rgba(156, 163, 175, 1); }
        .tile-body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
            width: 100%;
            text-align: center;
            color: #6B7280;
            font-size: 0.85rem;
        }
        .tile-preview {
            max-height: 100%;
            max-width: 100%;
            object-fit: contain;
        }
        .tile-label { pointer-events: none; }
        
        /* Preview grid styling */
        #productPreviews .preview-item {
            position: relative;
            height: 100px;
            border-radius: 0.5rem;
            overflow: hidden;
        }
        #productPreviews .preview-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        #productPreviews .preview-number {
            position: absolute;
            top: 5px;
            left: 5px;
            background: rgba(0,0,0,0.7);
            color: white;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
        }
        #productPreviews .remove-btn {
            position: absolute;
            top: 5px;
            right: 5px;
            background: rgba(255,0,0,0.7);
            color: white;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            cursor: pointer;
        }

        /* Mobile-only overrides */
        @media (max-width: 640px) {
            .w-\[640px\] { width: 100% !important; }
            .w-\[150px\] { width: 100% !important; }
        }

        /* Ensure select dropdowns work properly */
        select {
            position: relative;
            z-index: 10;
        }
        
        .space-y-4 select,
        .space-y-8 select {
            position: relative;
            z-index: 10;
        }
        
        .bg-\[#F4F2ED\] {
            overflow: visible;
        }
        
        select:focus {
            z-index: 20;
        }
        
        #barangay_id {
            position: relative;
            z-index: 15;
            transform: translateZ(0);
        }
        
        #barangay_id:focus {
            z-index: 25;
            transform: translateZ(0);
        }
        
        .space-y-4:has(#barangay_id) {
            overflow: visible;
        }
        
        #barangay_id {
            direction: ltr;
        }
        
        select#barangay_id {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6,9 12,15 18,9'%3e%3c/polyline%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right 12px center;
            background-size: 16px;
            padding-right: 40px;
        }
        
        #barangay_id {
            position: relative !important;
            z-index: 9999 !important;
            transform: translateY(0) !important;
        }
        
        #barangay_id:focus,
        #barangay_id:active,
        #barangay_id:hover {
            position: relative !important;
            z-index: 9999 !important;
            transform: translateY(0) !important;
        }
        
        .space-y-4,
        .space-y-8,
        .bg-\[#F4F2ED\],
        .dark\\:bg-gray-800 {
            overflow: visible !important;
            position: relative !important;
        }
    </style>
</x-app-layout>