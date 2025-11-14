<x-app-layout>
    <div class="pt-0 sm:pt-10 pb-0 ">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Mobile Header -->
            <div class="block md:hidden mb-6">
                <h2 class="text-xl font-bold text-custom-dark text-center">
                    <i>Sell
                        <img src="{{ asset('images/image 147.png') }}" alt="emoji"
                            class="inline-block h-5 w-4 align-middle ml-1">
                    </i>
                </h2>
                <hr class="w-full mt-4 h-px bg-gray-800 border-0 dark:bg-gray-700">
            </div>
            <!-- Desktop Header -->
            <div class="hidden md:block flex flex-col relative left-[-150px] top-[-30px]">
                <h2 class="text-xl sm:text-2xl font-bold text-custom-dark">
                    <div class="flex flex-col relative left-[-90px]">
                        <i>Sell
                            <img src="{{ asset('images/image 147.png') }}" alt="emoji"
                                class="inline-block flex flex-col relative top-[-33px] left-[50px] h-4 w-3 align-middle h-[25px] w-[20px]">
                        </i>
                    </div>
                    <hr
                        class="w-[1270px] mb-9 flex flex-col relative right-[90px] h-px bg-gray-800 border-0 dark:bg-gray-700">
                </h2>
            </div>
            <!-- Main Layout with Form Container -->
            <form id="donationForm" action="{{ route('donations.store') }}" method="POST" enctype="multipart/form-data"
                class="space-y-6">
                @csrf
                <div class="grid grid-cols-1 lg:grid-cols-5 gap-6 lg:gap-10 items-start lg:relative lg:left-[-150px] ">
                    <!-- Left Side - Image Upload Section (multi-select with previews) -->
                    <div class="lg:col-span-2 flex flex-col w-full lg:w-[450px]">
                        <div class="space-y-4">
                            <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Photos</h3>
                            <div class="w-full">
                                <!-- Preview Grid -->
                                <!-- Photo Guidelines -->
                                <div
                                    class="bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800 rounded-xl p-4">
                                    <h4
                                        class="text-sm font-semibold text-blue-800 dark:text-blue-300 mb-2 flex items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24"
                                            fill="currentColor">
                                            <path
                                                d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z" />
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
                                <!-- Add Photos Button (matched to products style) -->
                                <!-- Preview Grid -->
                                <div class="mb-4 mt-[30px]">
                                    <label for="donationImages" id="donationDropZone"
                                        class="upload-tile group cursor-pointer flex flex-col items-center justify-center border-2 border-dashed border-gray-300/80 rounded-3xl transition-all duration-500 hover:border-primary-400 hover:shadow-xl bg-white/80 dark:bg-gray-800/80 hover:bg-white dark:hover:bg-gray-800 backdrop-blur-sm p-8 min-h-[192px] sm:min-h-[208px]">

                                        <!-- Preview Grid INSIDE the drop zone -->
                                        <div id="donationPreviews"
                                            class="grid grid-cols-2 sm:grid-cols-3 gap-3 mb-4 w-full"></div>

                                        <div id="donationAddMoreText" class="text-center mb-4 hidden">
                                            <p class="text-sm text-[#B59F84] font-medium">Tap to add more photos</p>
                                        </div>

                                        <!-- Drop zone content - only show when no images or can add more -->
                                        <div id="donationDropZoneContent"
                                            class="flex flex-col items-center justify-center gap-5 w-full">
                                            <!-- Icon Container with Gradient -->
                                            <div class="flex justify-center w-full">
                                                <div
                                                    class="shrink-0 w-18 h-18 rounded-2xl bg-gradient-to-br from-gray-100 to-gray-200 dark:from-gray-700 dark:to-gray-800 flex items-center justify-center text-gray-600 dark:text-gray-200 transition-all duration-500 group-hover:scale-110 group-hover:from-primary-50 group-hover:to-primary-100 group-hover:text-primary-600 shadow-sm group-hover:shadow-md">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-9 w-9"
                                                        viewBox="0 0 24 24" fill="currentColor">
                                                        <path
                                                            d="M3 5a2 2 0 0 1 2-2h3l2 2h6a2 2 0 0 1 2 2v2H3V5Zm0 6h18v8a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-8Zm9 7a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                                    </svg>
                                                </div>
                                            </div>

                                            <!-- Content Container -->
                                            <div class="flex flex-col items-center justify-center gap-4 text-center">
                                                <!-- Browse Files Button -->
                                                <span
                                                    class="inline-flex items-center gap-2 px-5 py-2.5 text-sm font-semibold rounded-full bg-gradient-to-r from-[#E1D5B6] to-[#d4c6a2] text-[#6f5e49] transition-all duration-500 group-hover:scale-105 group-hover:shadow-lg group-hover:from-[#d4c6a2] group-hover:to-[#c8b994] transform hover:-translate-y-0.5">
                                                    Browse files
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="h-4 w-4 transition-transform duration-300 group-hover:translate-y-0.5"
                                                        viewBox="0 0 24 24" fill="currentColor">
                                                        <path d="M12 16l-6-6h12l-6 6z" />
                                                    </svg>
                                                </span>

                                                <!-- File Info with Hover Text Change -->
                                                <div class="flex flex-col gap-2">
                                                    <p
                                                        class="text-sm font-semibold text-gray-700 dark:text-gray-200 bg-gray-100/50 dark:bg-gray-800/50 px-3 py-1.5 rounded-lg">
                                                        PNG or JPG up to 5MB each</p>
                                                    <span
                                                        class="text-sm text-gray-600 dark:text-gray-300 font-medium">Add
                                                        or Drag & Drop photos</span>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Hover Glow Effect -->
                                        <div
                                            class="absolute inset-0 rounded-3xl bg-gradient-to-r from-primary-100/20 to-blue-100/20 opacity-0 group-hover:opacity-100 transition-opacity duration-500 -z-10">
                                        </div>
                                    </label>
                                </div>
                                <!-- Hidden multiple input -->
                                <input id="donationImages" name="images[]" type="file" accept="image/*" multiple
                                    class="hidden">

                                <!-- Helper and error -->
                                <p class="mt-2 text-xs text-gray-500">Upload 2–8 photos.</p>
                                <p id="donationImageError" class="mt-2 text-sm text-red-600 hidden"></p>
                                <p id="donationReachLimitError" class="mt-2 text-sm text-red-600 hidden">You can only
                                    upload up to 8 photos.</p>
                            </div>
                        </div>
                    </div>




                    <!-- Right Side - Form Container -->
                    <div class="lg:col-span-3 flex justify-end relative lg:left-[250px] w-[640px]">
                        <div class="bg-[#F4F2ED] dark:bg-gray-800 shadow-lg rounded-lg w-full p-6">
                            <!-- Item Description Section -->
                            <div class="space-y-4">
                                <h3 class="text-xl font-bold text-gray-900 dark:text-gray-100">Item Description</h3>
                                <p class="text-sm text-gray-600 dark:text-gray-400">
                                    Tell us about the item you're donating.
                                </p>
                                <div class="h-px w-full bg-gray-200 dark:bg-gray-700"></div>

                                <!-- Item Name -->
                                <div>
                                    <label for="name"
                                        class="block text-sm font-semibold text-gray-700 dark:text-gray-300">
                                        Item Name <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" id="name" name="name"
                                        class="mt-1 block w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-xl bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-[#B59F84] focus:border-[#B59F84]"
                                        placeholder="e.g., Vintage Denim Jacket" value="{{ old('name') }}" required>
                                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Use clear, descriptive
                                        words.</p>
                                </div>

                                <!-- Category -->
                                <div>
                                    <label for="category_id"
                                        class="block text-sm font-semibold text-gray-700 dark:text-gray-300">
                                        Category <span class="text-red-500">*</span>
                                    </label>
                                    <select id="category_id" name="category_id"
                                        class="mt-1 block w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-[#B59F84] focus:border-[#B59F84]"
                                        required>
                                        <option value="" disabled selected>Select a category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                                        Choose the closest match for better organization.
                                    </p>
                                </div>

                                <!-- Barangay -->
                                <div>
                                    <label for="barangay_id"
                                        class="block text-sm font-semibold text-gray-700 dark:text-gray-300">
                                        Barangay <span class="text-red-500">*</span>
                                    </label>
                                    <select id="barangay_id" name="barangay_id"
                                        class="mt-1 block w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-[#B59F84] focus:border-[#B59F84]"
                                        required>
                                        <option value="" disabled selected>Select a barangay</option>
                                        @foreach ($barangays as $barangay)
                                            <option value="{{ $barangay->id }}"
                                                {{ old('barangay_id') == $barangay->id ? 'selected' : '' }}>
                                                {{ $barangay->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('barangay_id')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Condition -->
                                <div>
                                    <label for="condition"
                                        class="block text-sm font-semibold text-gray-700 dark:text-gray-300">
                                        Condition <span class="text-red-500">*</span>
                                    </label>
                                    <select id="condition" name="condition"
                                        class="mt-1 block w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-[#B59F84] focus:border-[#B59F84]"
                                        required>
                                        <option value="new">New</option>
                                        <option value="used">Used</option>
                                    </select>
                                </div>

                                <!-- Size -->
                                <div>
                                    <label for="size"
                                        class="block text-sm font-semibold text-gray-700 dark:text-gray-300">
                                        Size <span class="text-red-500">*</span>
                                    </label>
                                    <select id="size" name="size"
                                        class="mt-1 block w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-[#B59F84] focus:border-[#B59F84]"
                                        required>
                                        <option value="">Select size</option>
                                        <optgroup label="Clothing">
                                            <option value="S">S</option>
                                            <option value="M">M</option>
                                            <option value="L">L</option>
                                            <option value="XL">XL</option>
                                            <option value="XXL">XXL</option>
                                        </optgroup>
                                        <optgroup label="Shoes">
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                        </optgroup>
                                        <optgroup label="Accessories">
                                            <option value="One Size">One Size</option>
                                        </optgroup>
                                    </select>
                                </div>

                                <!-- Description -->
                                <div>
                                    <label for="description"
                                        class="block text-sm font-semibold text-gray-700 dark:text-gray-300">
                                        Description <span class="text-red-500">*</span>
                                    </label>
                                    <textarea id="description" name="description" rows="4"
                                        class="mt-1 block w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-xl bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-[#B59F84] focus:border-[#B59F84] resize-none"
                                        placeholder="Describe the item's condition, any flaws, or special features..." required>{{ old('description') }}</textarea>
                                </div>

                                <!-- Submit Button -->
                                <div class="flex justify-end mt-8">
                                    <button type="submit"
                                        class="inline-flex items-center justify-center bg-[#B59F84] text-white px-10 py-2 rounded-lg text-base font-semibold hover:bg-[#a08e77] transform hover:scale-105 transition-all duration-300 shadow-md">
                                        Donate Item
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </form>
        </div>
    </div>

    <!-- Add spacing at the bottom -->
    <div class="pb-8"></div>


    <script>
        // Multi-image selection with previews, drag & drop, and 2–8 enforcement for donations
        document.addEventListener('DOMContentLoaded', function() {
            const input = document.getElementById('donationImages');
            const previews = document.getElementById('donationPreviews');
            const form = document.getElementById('donationForm');
            const errorEl = document.getElementById('donationImageError');
            const dropZone = document.getElementById('donationDropZone');
            const dropZoneContent = document.getElementById('donationDropZoneContent');
            const addMoreText = document.getElementById('donationAddMoreText');
            const reachLimitEl = document.getElementById('donationReachLimitError');
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
                    badge.className =
                        'preview-number absolute top-1 left-1 bg-black bg-opacity-70 text-white rounded-full w-5 h-5 flex items-center justify-center text-xs';
                    badge.textContent = index + 1;
                    const removeBtn = document.createElement('span');
                    removeBtn.className =
                        'remove-btn absolute top-1 right-1 bg-red-500 text-white rounded-full w-5 h-5 flex items-center justify-center text-xs cursor-pointer';
                    removeBtn.textContent = '×';
                    removeBtn.onclick = (e) => {
                        e.preventDefault();
                        e.stopPropagation();
                        removeAt(index);
                    };
                    wrapper.appendChild(img);
                    wrapper.appendChild(badge);
                    wrapper.appendChild(removeBtn);
                    previews.appendChild(wrapper);
                    const r = new FileReader();
                    r.onload = (ev) => {
                        img.src = ev.target.result;
                    };
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
                    // Show "Tap to add more" text
                    if (canAddMore()) {
                        addMoreText.classList.remove('hidden');
                    } else {
                        addMoreText.classList.add('hidden');
                    }
                    // Auto adjust height based on content
                    dropZone.style.minHeight = 'auto';
                } else {
                    dropZoneContent.classList.remove('hidden');
                    addMoreText.classList.add('hidden');
                    dropZone.style.minHeight = '192px'; // h-48 equivalent
                }

                // Show reach limit message and disable adding more
                if (total >= 8) {
                    showReachLimit();
                    addMoreText.classList.add('hidden'); // Hide "Tap to add more" when limit reached
                } else {
                    hideReachLimit();
                }
            }

            // Clear input before opening via label (ensures first pick registers)
            const label = document.querySelector('label[for="donationImages"]');
            if (label) {
                label.addEventListener('mousedown', () => {
                    if (input) input.value = '';
                });
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

        function updateSizeOptions() {
            const categorySelect = document.getElementById('category_id');
            const sizeSelect = document.getElementById('size');
            const clothingSizes = document.querySelector('.clothing-sizes');
            const shoeSizes = document.querySelector('.shoe-sizes');
            const accessorySizes = document.querySelector('.accessory-sizes');

            clothingSizes.classList.add('hidden');
            shoeSizes.classList.add('hidden');
            accessorySizes.classList.add('hidden');
            sizeSelect.value = '';

            const selectedOption = categorySelect.options[categorySelect.selectedIndex];
            const categoryName = selectedOption.text.toLowerCase();

            if (categoryName.includes('shirt') || categoryName.includes('clothing') || categoryName.includes('dress') ||
                categoryName.includes('pants')) {
                clothingSizes.classList.remove('hidden');
            } else if (categoryName.includes('shoe') || categoryName.includes('footwear')) {
                shoeSizes.classList.remove('hidden');
            } else {
                accessorySizes.classList.remove('hidden');
            }
        }

        function previewImage(input) {
            const preview = document.getElementById('preview');
            const imagePreview = document.getElementById('imagePreview');
            const uploadText = document.getElementById('uploadText');

            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    imagePreview.classList.remove('hidden');
                    uploadText.classList.add('hidden');
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
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

        .upload-tile:hover {
            border-color: rgba(156, 163, 175, 1);
        }

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

        .tile-label {
            pointer-events: none;
        }

        /* Preview grid styling */
        #donationPreviews .preview-item {
            position: relative;
            height: 100px;
            border-radius: 0.5rem;
            overflow: hidden;
        }

        #donationPreviews .preview-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        #donationPreviews .preview-number {
            position: absolute;
            top: 5px;
            left: 5px;
            background: rgba(0, 0, 0, 0.7);
            color: white;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
        }

        #donationPreviews .remove-btn {
            position: absolute;
            top: 5px;
            right: 5px;
            background: rgba(255, 0, 0, 0.7);
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

        /* Mobile-only overrides (no markup changes) */
        @media (max-width: 640px) {
            .w-\[640px\] {
                width: 100% !important;
            }

            .w-\[150px\] {
                width: 100% !important;
            }
        }
    </style>
</x-app-layout>
