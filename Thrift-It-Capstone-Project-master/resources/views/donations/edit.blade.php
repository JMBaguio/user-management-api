<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Donation') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div
                class="bg-[#F4F2ED] dark:bg-gray-800/90 backdrop-blur overflow-hidden shadow-xl sm:rounded-2xl p-6 border border-gray-100 dark:border-gray-700">
                <form id="donationEditForm" method="POST" action="{{ route('donations.update', $donation) }}"
                    enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @method('PATCH')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Donation Name -->
                        <div class="col-span-1 md:col-span-2">
                            <x-input-label for="name" :value="__('Donation Name')" />
                            <x-text-input id="name" name="name" type="text"
                                class="mt-2 block w-full rounded-xl" :value="old('name', $donation->name)" required autofocus />
                            @error('name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Category -->
                        <div>
                            <x-input-label for="category_id" :value="__('Category')" />
                            <select name="category_id" id="category_id"
                                class="block w-full mt-2 px-3 py-2 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-[#E1D5B6] focus:outline-none">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ $donation->category_id == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Status -->
                        <div>
                            <x-input-label for="status" :value="__('Status')" />
                            <select id="status" name="status"
                                class="w-full mt-2 px-3 py-2 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-[#E1D5B6] focus:outline-none"
                                required>
                                <option value="available" @if ($donation->status === 'donated') disabled @endif
                                    {{ old('status', $donation->status) === 'available' ? 'selected' : '' }}>
                                    Available
                                </option>
                                <option value="donated"
                                    {{ old('status', $donation->status) === 'donated' ? 'selected' : '' }}>
                                    Donated
                                </option>
                            </select>
                            @if ($donation->status === 'donated')
                                <p class="text-sm text-red-600 mt-1">This donation has already been marked as donated
                                    and cannot be marked as available again.</p>
                            @endif
                            @error('status')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <!-- Image Upload (MULTIPLE) -->
                    <div>
                        <x-input-label for="images" :value="__('Donation Images (up to 5)')" />

                        <!-- Photo Guidelines (unchanged) -->
                        <div
                            class="bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800 rounded-xl p-4 mb-4">
                            {{-- … your guidelines … --}}
                        </div>

                        <!-- Drop zone -->
                        <div class="mb-4">
                            <label for="donationImages" id="donationDropZone"
                                class="upload-tile group cursor-pointer flex flex-col items-center justify-center border-2 border-dashed border-gray-300/80 rounded-3xl transition-all duration-500 hover:border-primary-400 hover:shadow-xl bg-white/80 hover:bg-white backdrop-blur-sm p-8 min-h-[192px] sm:min-h-[208px]">

                                <!-- Preview Grid -->
                                <div id="donationPreview"
                                    class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4 mb-4 w-full"></div>

                                <!-- Existing images (from DB) -->
                                <div id="existingImageContainer"
                                    class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4 mb-4 w-full">
                                    @foreach ($donation->donationImages as $img)
                                        <div class="relative group existing-img-item" data-id="{{ $img->id }}">
                                            <img src="{{ Storage::disk('s3')->url($img->image) }}"
                                                alt="{{ $donation->name }}"
                                                class="w-full aspect-square object-cover rounded-xl border shadow-sm">
                                            <button type="button"
                                                class="delete-existing absolute top-0 right-0 -translate-x-1/4 -translate-y-1/4 bg-red-500 text-white rounded-full w-7 h-7 flex items-center justify-center opacity-80 hover:opacity-100 text-xs">
                                                ×
                                            </button>
                                        </div>
                                    @endforeach
                                </div>

                                <div id="donationAddMoreText"
                                    class="text-center mb-4 {{ $donation->donationImages->count() + 0 >= 8 ? 'hidden' : '' }}">
                                    <p class="text-sm text-[#B59F84] font-medium">Tap to add up to
                                        {{ 8 - $donation->donationImages->count() }} more photos</p>
                                </div>

                                <!-- Drop-zone content (shown when < 5 images) -->
                                <div id="dropZoneContent"
                                    class="flex flex-col items-center justify-center gap-5 w-full {{ $donation->donationImages->count() >= 5 ? 'hidden' : '' }}">
                                    {{-- … same icon / browse button you already have … --}}
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

                                    <div class="flex flex-col items-center justify-center gap-4 text-center">
                                        <span
                                            class="inline-flex items-center gap-2 px-5 py-2.5 text-sm font-semibold rounded-full bg-gradient-to-r from-[#E1D5B6] to-[#d4c6a2] text-[#6f5e49] transition-all duration-500 group-hover:scale-105 group-hover:shadow-lg group-hover:from-[#d4c6a2] group-hover:to-[#c8b994] transform hover:-translate-y-0.5">
                                            Browse files
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="h-4 w-4 transition-transform duration-300 group-hover:translate-y-0.5"
                                                viewBox="0 0 24 24" fill="currentColor">
                                                <path d="M12 16l-6-6h12l-6 6z" />
                                            </svg>
                                        </span>

                                        <div class="flex flex-col gap-2">
                                            <p
                                                class="text-sm font-semibold text-gray-700 bg-gray-100/50 px-3 py-1.5 rounded-lg">
                                                PNG or JPG up to 5MB each</p>
                                            <span class="text-sm text-gray-600 font-medium">Add or Drag & Drop
                                                photos</span>
                                        </div>
                                    </div>
                                </div>

                                <div
                                    class="absolute inset-0 rounded-3xl bg-gradient-to-r from-primary-100/20 to-blue-100/20 opacity-0 group-hover:opacity-100 transition-opacity duration-500 -z-10">
                                </div>
                            </label>
                        </div>

                        <!-- Hidden multiple file input -->
                        <input id="donationImages" name="images[]" type="file" accept="image/*" multiple
                            class="hidden">

                        <!-- Hidden inputs for deletions -->
                        <div id="deletedImages"></div>

                        <p class="mt-2 text-xs text-gray-500">You can upload up to 5 clear photos of the donation item.
                        </p>
                        <p id="donationImageError" class="mt-2 text-sm text-red-600 hidden"></p>
                    </div>

                    <!-- Submit Button -->
                    <div class="flex items-center justify-between gap-4 pt-2">
                        <button type="submit"
                            class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl text-white bg-[#B59F84] hover:bg-[#a08e77] shadow-sm transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            Update Donation
                        </button>
                        <a href="{{ route('donations.index') }}"
                            class="text-gray-600 hover:text-gray-800 underline-offset-2 hover:underline">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const MAX_IMAGES = 5;
            const MAX_SIZE_MB = 5;

            const input = document.getElementById('donationImages');
            const preview = document.getElementById('donationPreview');
            const existingContainer = document.getElementById('existingImageContainer');
            const dropZone = document.getElementById('donationDropZone');
            const dropZoneContent = document.getElementById('dropZoneContent');
            const addMoreText = document.getElementById('donationAddMoreText');
            const errorEl = document.getElementById('donationImageError');
            const deletedContainer = document.getElementById('deletedImages');

            let newFiles = []; // newly selected files
            let deletedIds = []; // existing images marked for deletion

            // ------------------------------------------------------------------ utils
            function showError(msg) {
                errorEl.textContent = msg;
                errorEl.classList.remove('hidden');
            }

            function hideError() {
                errorEl.classList.add('hidden');
            }

            function totalImages() {
                return existingContainer.querySelectorAll('.existing-img-item:not(.deleting)').length + preview
                    .children.length;
            }

            function updateUI() {
                const canAddMore = totalImages() < MAX_IMAGES;
                dropZoneContent.classList.toggle('hidden', !canAddMore);
                addMoreText.classList.toggle('hidden', !canAddMore);
                addMoreText.querySelector('p').textContent =
                    `Tap to add up to ${MAX_IMAGES - totalImages()} more photos`;
            }

            function createPreviewItem(file) {
                const wrapper = document.createElement('div');
                wrapper.className = 'relative group preview-item';

                const img = document.createElement('img');
                img.className = 'w-full aspect-square object-cover rounded-xl border shadow-sm';
                img.alt = file.name;

                const removeBtn = document.createElement('button');
                removeBtn.type = 'button';
                removeBtn.className =
                    'absolute top-0 right-0 -translate-x-1/4 -translate-y-1/4 bg-red-500 text-white rounded-full w-7 h-7 flex items-center justify-center opacity-80 hover:opacity-100 text-xs';
                removeBtn.innerHTML = '×';
                removeBtn.onclick = (e) => {
                    e.preventDefault();
                    e.stopPropagation();
                    newFiles = newFiles.filter(f => f !== file);
                    wrapper.remove();
                    syncInput();
                    updateUI();
                };

                wrapper.appendChild(img);
                wrapper.appendChild(removeBtn);
                preview.appendChild(wrapper);

                const reader = new FileReader();
                reader.onload = e => img.src = e.target.result;
                reader.readAsDataURL(file);
            }

            function syncInput() {
                const dt = new DataTransfer();
                newFiles.forEach(f => dt.items.add(f));
                input.files = dt.files;
            }

            // ------------------------------------------------------------------ file validation
            function validateFiles(files) {
                hideError();
                const valid = [];
                for (let file of files) {
                    if (!file.type.match(/^image\/(jpeg|png)$/i)) {
                        showError('Only JPG/PNG images are allowed.');
                        continue;
                    }
                    if (file.size > MAX_SIZE_MB * 1024 * 1024) {
                        showError(`"${file.name}" exceeds ${MAX_SIZE_MB} MB limit.`);
                        continue;
                    }
                    valid.push(file);
                }
                return valid;
            }

            // ------------------------------------------------------------------ input change
            input.addEventListener('change', () => {
                const incoming = validateFiles(input.files);
                if (incoming.length === 0) return;

                const slotsLeft = MAX_IMAGES - totalImages();
                const toAdd = incoming.slice(0, slotsLeft);

                if (incoming.length > slotsLeft) {
                    showError(`You can only add ${slotsLeft} more image(s).`);
                }

                newFiles.push(...toAdd);
                toAdd.forEach(f => createPreviewItem(f));
                syncInput();
                updateUI();
            });

            // ------------------------------------------------------------------ drag & drop
            dropZone.addEventListener('dragover', e => {
                e.preventDefault();
                dropZone.classList.add('ring-2', 'ring-blue-400');
            });
            dropZone.addEventListener('dragleave', () => {
                dropZone.classList.remove('ring-2', 'ring-blue-400');
            });
            dropZone.addEventListener('drop', e => {
                e.preventDefault();
                dropZone.classList.remove('ring-2', 'ring-blue-400');

                if (totalImages() >= MAX_IMAGES) {
                    showError('Maximum 5 images allowed.');
                    return;
                }

                const files = validateFiles(e.dataTransfer.files);
                const slotsLeft = MAX_IMAGES - totalImages();
                const toAdd = files.slice(0, slotsLeft);

                newFiles.push(...toAdd);
                toAdd.forEach(f => createPreviewItem(f));
                syncInput();
                updateUI();
            });

            // ------------------------------------------------------------------ delete existing image
            existingContainer.addEventListener('click', e => {
                if (!e.target.matches('button.delete-existing')) return;
                e.preventDefault();
                e.stopPropagation();

                const item = e.target.closest('.existing-img-item');
                const id = item.dataset.id;

                item.classList.add('deleting', 'opacity-30');
                deletedIds.push(id);

                // hidden input for Laravel to know what to delete
                const hidden = document.createElement('input');
                hidden.type = 'hidden';
                hidden.name = 'delete_images[]';
                hidden.value = id;
                deletedContainer.appendChild(hidden);

                setTimeout(() => {
                    item.remove();
                    updateUI();
                }, 300);
            });

            // ------------------------------------------------------------------ init
            updateUI();
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

        /* Preview styling */
        #donationPreview .preview-item {
            position: relative;
            height: 128px;
            width: 128px;
            border-radius: 0.5rem;
            overflow: hidden;
        }

        #donationPreview .preview-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        #donationPreview .remove-btn {
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
