<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div
                class="bg-[#F4F2ED] dark:bg-gray-800/90 backdrop-blur overflow-hidden shadow-xl sm:rounded-2xl p-6 border border-gray-100 dark:border-gray-700">
                <form id="productEditForm" method="POST" action="{{ route('products.update', $product) }}"
                    enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @method('PATCH')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Product Name -->
                        <div class="col-span-1 md:col-span-2">
                            <x-input-label for="name" :value="__('Product Name')" />
                            <x-text-input id="name" name="name" type="text"
                                class="mt-2 block w-full rounded-xl" :value="old('name', $product->name)" required autofocus />
                        </div>

                        <!-- Category -->
                        <div>
                            <x-input-label for="category_id" :value="__('Category')" />
                            <select name="category_id" id="category_id"
                                class="block w-full mt-2 px-3 py-2 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-[#E1D5B6] focus:outline-none">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Segment -->
                        <div>
                            <x-input-label for="segment_id" :value="__('Segment')" />
                            <select name="segment_id" id="segment_id"
                                class="block w-full mt-2 px-3 py-2 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-[#E1D5B6] focus:outline-none"
                                required>
                                <option value="" disabled
                                    {{ old('segment_id', $product->segment_id ?? '') === '' ? 'selected' : '' }}>Select
                                    a segment</option>
                                @foreach ($segments as $segment)
                                    <option value="{{ $segment->id }}"
                                        {{ old('segment_id', $product->segment_id ?? '') == $segment->id ? 'selected' : '' }}>
                                        {{ ucfirst($segment->name) }}
                                    </option>
                                @endforeach
                            </select>
                            @error('segment_id')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Barangay -->
                        <div>
                            <x-input-label for="barangay_id" :value="__('Barangay')" />
                            <select name="barangay_id" id="barangay_id"
                                class="block w-full mt-2 px-3 py-2 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-[#E1D5B6] focus:outline-none"
                                required>
                                <option value="" disabled
                                    {{ old('barangay_id', $product->barangay_id ?? '') === '' ? 'selected' : '' }}>
                                    Select a barangay</option>
                                @foreach ($barangays as $barangay)
                                    <option value="{{ $barangay->id }}"
                                        {{ old('barangay_id', $product->barangay_id ?? '') == $barangay->id ? 'selected' : '' }}>
                                        {{ ucfirst($barangay->name) }}
                                    </option>
                                @endforeach
                            </select>
                            @error('barangay_id')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Price -->
                        <div>
                            <x-input-label for="price" :value="__('Price')" />
                            <x-text-input id="price" name="price" type="number" step="0.01"
                                class="mt-2 block w-full rounded-xl" :value="old('price', $product->price)" required />
                        </div>

                        <!-- Status -->
                        <div>
                            <x-input-label for="status" :value="__('Status')" />
                            <select id="status" name="status"
                                class="w-full mt-2 px-3 py-2 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-[#E1D5B6] focus:outline-none"
                                required>
                                <option value="available" @if ($product->status === 'sold') disabled @endif
                                    {{ old('status', $product->status) === 'available' ? 'selected' : '' }}>
                                    Available
                                </option>
                                <option value="sold"
                                    {{ old('status', $product->status) === 'sold' ? 'selected' : '' }}>
                                    Sold
                                </option>
                            </select>
                            @if ($product->status === 'sold')
                                <p class="text-sm text-red-600 mt-1">Product is sold and cannot be marked as available
                                    again.</p>
                            @endif
                        </div>
                    </div>

                    <!-- Image Upload -->
                    <div>
                        <x-input-label for="images" :value="__('Product Images')" />

                        <!-- Photo Guidelines -->
                        <div
                            class="bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800 rounded-xl p-4 mb-4">
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

                        <!-- Add Photos Button (matched to create style) -->
                        <div class="mb-4">
                            <label for="productImages" id="productDropZone"
                                class="upload-tile group cursor-pointer flex flex-col items-center justify-center border-2 border-dashed border-gray-300/80 rounded-3xl transition-all duration-500 hover:border-primary-400 hover:shadow-xl bg-white/80 hover:bg-white backdrop-blur-sm p-8 min-h-[192px] sm:min-h-[208px]">

                                <!-- Preview Grid INSIDE the drop zone -->
                                <div id="productPreviews" class="grid grid-cols-2 sm:grid-cols-3 gap-3 mb-4 w-full">
                                </div>
                                <!-- Existing images -->
                                <div id="existingImagesContainer" class="flex flex-wrap gap-3 mb-4 w-full">
                                    @foreach ($product->images as $img)
                                        <div class="relative group existing-img-item">
                                            <img src="{{ Storage::disk('s3')->url($img->image) }}" alt="Product Image"
                                                class="w-24 h-24 object-cover rounded-xl border">

                                            <button type="button" data-id="{{ $img->id }}"
                                                class="absolute top-0 right-0 -translate-x-1/4 -translate-y-1/4 bg-red-500 text-white rounded-full w-6 h-6 flex items-center justify-center opacity-70 hover:opacity-100 delete-image-btn">
                                                &times;
                                            </button>
                                        </div>
                                    @endforeach
                                </div>

                        </div>

                        <div id="donationAddMoreText" class="text-center mb-4 hidden">
                            <p class="text-sm text-[#B59F84] font-medium">Tap to add more photos</p>
                        </div>

                        <!-- Drop zone content - only show when no images or can add more -->
                        <div id="dropZoneContent" class="flex flex-col items-center justify-center gap-5 w-full">
                            <!-- Icon Container with Gradient -->
                            <div class="flex justify-center w-full">
                                <div
                                    class="shrink-0 w-18 h-18 rounded-2xl bg-gradient-to-br from-gray-100 to-gray-200 dark:from-gray-700 dark:to-gray-600 flex items-center justify-center text-gray-600 transition-all duration-500 group-hover:scale-110 group-hover:from-primary-50 group-hover:to-primary-100 group-hover:text-primary-600 shadow-sm group-hover:shadow-md">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-9 w-9" viewBox="0 0 24 24"
                                        fill="currentColor">
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

                                <!-- File Info -->
                                <div class="flex flex-col gap-2">
                                    <p
                                        class="text-sm font-semibold text-gray-700 bg-gray-100/50 px-3 py-1.5 rounded-lg">
                                        PNG or JPG up to 5MB each</p>
                                    <span class="text-sm text-gray-600 font-medium">Add or Drag & Drop photos</span>
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
                    <input id="productImages" name="images[]" type="file" accept="image/*" multiple
                        class="hidden">

                    <!-- Helper and error -->
                    <p class="mt-2 text-xs text-gray-500">Upload 2–8 photos. You currently have <span
                            id="currentImageCount">{{ count($product->images) }}</span> images.</p>
                    <p id="productImageError" class="mt-2 text-sm text-red-600 hidden"></p>
                    <p id="productReachLimitError" class="mt-2 text-sm text-red-600 hidden">You can only upload up to
                        8 photos.</p>
            </div>

            <!-- Submit Button -->
            <div class="flex items-center justify-between gap-4 pt-2">
                <button type="submit"
                    class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl text-white bg-[#B59F84] hover:bg-[#a08e77] shadow-sm transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    Update Product
                </button>
                <a href="{{ route('products.index') }}"
                    class="text-gray-600 hover:text-gray-800 underline-offset-2 hover:underline">Cancel</a>
            </div>
            </form>
        </div>
    </div>
    </div>

    <script>
        // Multi-image selection with previews, drag & drop, and 2–8 enforcement for products
        document.addEventListener('DOMContentLoaded', function() {
            const input = document.getElementById('productImages');
            const previews = document.getElementById('productPreviews');
            const form = document.getElementById('productEditForm');
            const errorEl = document.getElementById('productImageError');
            const dropZone = document.getElementById('productDropZone');
            const addMoreText = document.getElementById('donationAddMoreText');
            const dropZoneContent = document.getElementById('dropZoneContent');
            const reachLimitEl = document.getElementById('productReachLimitError');
            const existingImagesContainer = document.getElementById('existingImagesContainer');
            const currentImageCountEl = document.getElementById('currentImageCount');
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

            function getExistingCount() {
                if (!existingImagesContainer) return 0;
                return existingImagesContainer.querySelectorAll('.existing-img-item:not([data-deleted="true"])')
                    .length;
            }

            function getNewCount() {
                return selectedFiles.length;
            }

            function getTotalCount() {
                return getExistingCount() + getNewCount();
            }

            function updateImageCount() {
                if (currentImageCountEl) {
                    currentImageCountEl.textContent = getTotalCount();
                }
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
                updateImageCount();
            }

            function syncInput() {
                const dt = new DataTransfer();
                selectedFiles.forEach(f => dt.items.add(f));
                input.files = dt.files;
            }

            function removeAt(idx) {
                if (getTotalCount() <= 2) {
                    showError('You must keep at least 2 images.');
                    return;
                }
                selectedFiles.splice(idx, 1);
                syncInput();
                renderPreviews(selectedFiles);
                hideError();
            }

            function canAddMore() {
                return getTotalCount() < 8;
            }

            function updateDropZoneVisibility() {
                const totalNew = selectedFiles.length;
                const totalExisting = getExistingCount();

                if (totalNew > 0 || totalExisting > 0) {
                    dropZoneContent.classList.add('hidden');
                    if (canAddMore()) {
                        addMoreText.classList.remove('hidden');
                    } else {
                        addMoreText.classList.add('hidden');
                    }
                    dropZone.style.minHeight = 'auto';
                } else {
                    dropZoneContent.classList.remove('hidden');
                    addMoreText.classList.add('hidden');
                    dropZone.style.minHeight = '192px';
                }

                if (!canAddMore()) {
                    showReachLimit();
                    addMoreText.classList.add('hidden');
                } else {
                    hideReachLimit();
                }
            }

            // Clear input before opening via label (ensures first pick registers)
            const label = document.querySelector('label[for="productImages"]');
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
                    if (getTotalCount() >= 8) break;
                    const k = makeKey(f);
                    if (keys.has(k)) continue;
                    selectedFiles.push(f);
                    keys.add(k);
                }
                if (getTotalCount() >= 8 && newly.length > 0) {
                    showReachLimit();
                }
                syncInput();
                renderPreviews(selectedFiles);
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
                        if (getTotalCount() >= 8) break;
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

            // Delete existing images
            document.querySelectorAll('.delete-image-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    const imageId = this.getAttribute('data-id');
                    const wrapper = this.closest('div');
                    if (wrapper) wrapper.remove();

                    // Mark for deletion (append to the form and avoid duplicates)
                    if (form && !form.querySelector(
                            `input[type="hidden"][name="deleted_images[]"][value="${imageId}"]`)) {
                        const deletedInput = document.createElement('input');
                        deletedInput.type = 'hidden';
                        deletedInput.name = 'deleted_images[]';
                        deletedInput.value = imageId;
                        form.appendChild(deletedInput);
                    }

                    updateDropZoneVisibility();
                    updateImageCount();
                });
            });

            form.addEventListener('submit', (e) => {
                const count = getTotalCount();
                if (count < 2) {
                    e.preventDefault();
                    showError('Please upload at least 2 photos.');
                } else if (count > 8) {
                    e.preventDefault();
                    showError('Please upload up to 8 photos only.');
                }
            });

            // Initialize
            renderPreviews(selectedFiles);
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

        #productPreviews .remove-btn {
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
    </style>
</x-app-layout>
