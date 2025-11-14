<x-app-layout>
    <div class="pt-8 sm:pt-12 pb-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Mobile Header --}}
            <div class="block md:hidden mb-8">
                <h2 class="text-xl font-bold text-center text-custom-dark">Showcase Your Work</h2>
                <hr class="mt-4 h-px bg-gray-800 border-0 dark:bg-gray-700">
            </div>

            {{-- Upload Form --}}
            <form id="workForm" action="{{ route('works.store') }}" method="POST" enctype="multipart/form-data"
                class="space-y-8">

                @csrf

                <div class="grid grid-cols-1 lg:grid-cols-5 gap-6 lg:gap-10 items-start">

                    {{-- LEFT – Image Upload --}}
                    <div class="lg:col-span-2 flex flex-col space-y-6">
                        <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            Photos (Before & After)
                        </h3>

                        {{-- Photo Guidelines --}}
                        <div
                            class="bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800 rounded-xl p-4 text-sm text-blue-700 dark:text-blue-300">
                            <p class="font-semibold flex items-center gap-2 mb-1">
                                <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z" />
                                </svg>
                                Photo Guidelines
                            </p>
                            <ul class="list-disc pl-5 space-y-1">
                                <li>Show transformation clearly (Before & After)</li>
                                <li>Multiple angles: Front, back, sides</li>
                                <li>Close-ups of stitches, material, or features</li>
                                <li>Any imperfections or flaws</li>
                            </ul>
                        </div>

                        {{-- Drop Zone --}}
                        <div class="relative">
                            <label for="workImages" id="workDropZone"
                                class="flex flex-col items-center justify-center w-full p-8 border-2 border-dashed rounded-3xl bg-white/80 dark:bg-gray-800 cursor-pointer transition hover:border-primary-400 hover:shadow-xl">
                                <div id="workPreviews" class="grid grid-cols-2 sm:grid-cols-3 gap-3 mb-4 w-full"></div>

                                <div class="text-center flex flex-col items-center gap-2">
                                    <span
                                        class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-gradient-to-r from-[#E1D5B6] to-[#d4c6a2] text-[#6f5e49] font-semibold">
                                        Browse files
                                        <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M12 16l-6-6h12l-6 6z" />
                                        </svg>
                                    </span>
                                    <p class="text-xs text-gray-600 dark:text-gray-400">Drag & Drop (2–8 images)</p>
                                </div>
                            </label>

                            <input id="workImages" name="images[]" type="file" accept="image/*" multiple
                                class="hidden">

                            <p id="workImageError" class="mt-2 text-sm text-red-600 hidden"></p>
                            <p id="workReachLimitError" class="mt-2 text-sm text-red-600 hidden">
                                You can only upload up to 8 photos.
                            </p>
                        </div>
                    </div>

                    {{-- RIGHT – Form Details --}}
                    <div class="lg:col-span-3 flex justify-center lg:justify-end">
                        <div
                            class="bg-[#F4F2ED] dark:bg-gray-800 shadow-lg rounded-lg w-full max-w-lg lg:max-w-none p-4 sm:p-6 space-y-5">
                            <div>
                                <h3 class="text-xl font-bold text-gray-900 dark:text-gray-100">Work Details</h3>
                                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                    Provide details about your upcycled work.
                                </p>
                            </div>

                            <hr class="h-px bg-gray-200 dark:bg-gray-700">

                            {{-- Title --}}
                            <div>
                                <label for="title"
                                    class="block text-sm font-semibold text-gray-700 dark:text-gray-300">
                                    Title <span class="text-red-500">*</span>
                                </label>
                                <input type="text" id="title" name="title" required value="{{ old('title') }}"
                                    placeholder="e.g., Denim Jacket Upcycle"
                                    class="mt-1 block w-full rounded-xl border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 px-4 py-3 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-[#B59F84] focus:border-[#B59F84] transition">
                                @error('title')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Upcycle Type --}}
                            <div>
                                <label for="upcycle_type"
                                    class="block text-sm font-semibold text-gray-700 dark:text-gray-300">
                                    Upcycle Type <span class="text-red-500">*</span>
                                </label>

                                <select id="upcycle_type_select"
                                    class="mt-1 block w-full rounded-xl border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 px-4 py-3 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-[#B59F84] focus:border-[#B59F84] transition">
                                    <option value="">Select type</option>
                                    @foreach ([
                                                'resized' => 'Resized',
                                                'patched' => 'Patched',
                                                'redesigned' => 'Redesigned',
                                                're-dyed' => 'Re-dyed',
                                                'other' => 'Other',
                                            ] as $value => $label)
                                        <option value="{{ $value }}"
                                            {{ old('upcycle_type') == $value ? 'selected' : '' }}>
                                            {{ $label }}
                                        </option>
                                    @endforeach
                                </select>
                                {{-- Hidden input to hold final value --}}
                                <input type="hidden" name="upcycle_type" id="upcycle_type"
                                    value="{{ old('upcycle_type') }}">

                                {{-- Custom input (shown only for "Other") --}}
                                <div id="otherTypeWrapper"
                                    class="mt-3 {{ old('upcycle_type') && !in_array(old('upcycle_type'), ['resized', 'patched', 'redesigned', 're-dyed']) ? '' : 'hidden' }}">
                                    <label for="upcycle_type_custom"
                                        class="block text-sm font-medium text-gray-600 dark:text-gray-400">
                                        Specify type <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" id="upcycle_type_custom"
                                        value="{{ old('upcycle_type') && !in_array(old('upcycle_type'), ['resized', 'patched', 'redesigned', 're-dyed']) ? old('upcycle_type') : '' }}"
                                        placeholder="e.g., Embroidered, Painted, etc."
                                        class="mt-1 block w-full rounded-xl border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 px-4 py-3 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-[#B59F84] focus:border-[#B59F84] transition">
                                </div>
                                @error('upcycle_type')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Description --}}
                            <div>
                                <label for="description"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Description
                                </label>
                                <textarea id="description" name="description" rows="4" required
                                    placeholder="Describe your upcycle process or transformation"
                                    class="mt-1 block w-full rounded-xl border-gray-300 shadow-sm focus:border-gray-500 focus:ring-gray-500">{{ old('description') }}</textarea>
                                @error('description')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Submit --}}
                            <div class="flex justify-center sm:justify-end pt-2">
                                <button type="submit"
                                    class="w-full sm:w-auto bg-[#B59F84] hover:bg-[#a08e77] text-white font-semibold px-8 py-2 rounded-xl transition transform hover:scale-105 shadow-md">
                                    Upload Work
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- Image Preview JS (unchanged) --}}
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const input = document.getElementById('workImages');
            const previews = document.getElementById('workPreviews');
            const form = document.getElementById('workForm');
            const dropZone = document.getElementById('workDropZone');
            const limitMsg = document.getElementById('workReachLimitError');
            const errMsg = document.getElementById('workImageError');

            let selectedFiles = [];

            const showError = msg => {
                errMsg.textContent = msg;
                errMsg.classList.remove('hidden');
            };
            const hideError = () => {
                errMsg.textContent = '';
                errMsg.classList.add('hidden');
            };
            const showLimit = () => {
                limitMsg.classList.remove('hidden');
                setTimeout(() => limitMsg.classList.add('hidden'), 2500);
            };

            const syncInput = () => {
                const dt = new DataTransfer();
                selectedFiles.forEach(f => dt.items.add(f));
                input.files = dt.files;
            };

            const render = files => {
                previews.innerHTML = '';
                files.forEach((file, i) => {
                    const div = document.createElement('div');
                    div.className = 'relative h-24 rounded-lg overflow-hidden';

                    const img = document.createElement('img');
                    img.className = 'w-full h-full object-cover';
                    const reader = new FileReader();
                    reader.onload = e => img.src = e.target.result;
                    reader.readAsDataURL(file);

                    const badge = document.createElement('span');
                    badge.className =
                        'absolute top-1 left-1 bg-black/70 text-white rounded-full w-5 h-5 flex items-center justify-center text-xs';
                    badge.textContent = i + 1;

                    const remove = document.createElement('span');
                    remove.className =
                        'absolute top-1 right-1 bg-red-500 text-white rounded-full w-5 h-5 flex items-center justify-center text-xs cursor-pointer';
                    remove.textContent = '×';
                    remove.onclick = e => {
                        e.stopPropagation();
                        removeAt(i);
                    };

                    div.append(img, badge, remove);
                    previews.appendChild(div);
                });
            };

            const removeAt = idx => {
                if (selectedFiles.length <= 2) {
                    showError('You must keep at least 2 images.');
                    return;
                }
                selectedFiles.splice(idx, 1);
                syncInput();
                hideError();
                render(selectedFiles);
            };

            const canAdd = () => selectedFiles.length < 8;

            input.addEventListener('change', () => {
                hideError();
                const newFiles = Array.from(input.files).filter(f => f.type.startsWith('image/'));
                const keys = new Set(selectedFiles.map(f => `${f.name}|${f.size}|${f.lastModified}`));
                newFiles.forEach(f => {
                    if (!canAdd()) return;
                    const key = `${f.name}|${f.size}|${f.lastModified}`;
                    if (!keys.has(key)) selectedFiles.push(f);
                });
                syncInput();
                render(selectedFiles);
            });

            form.addEventListener('submit', e => {
                hideError();
                if (selectedFiles.length < 2) {
                    e.preventDefault();
                    showError('Please upload at least 2 photos.');
                } else if (selectedFiles.length > 8) {
                    e.preventDefault();
                    showError('You can upload up to 8 photos only.');
                }
            });

            // Drag & Drop
            dropZone.addEventListener('dragover', e => {
                e.preventDefault();
                dropZone.classList.add('ring-2', canAdd() ? 'ring-blue-400' : 'ring-red-400');
            });
            dropZone.addEventListener('dragleave', () => dropZone.classList.remove('ring-2', 'ring-blue-400',
                'ring-red-400'));
            dropZone.addEventListener('drop', e => {
                e.preventDefault();
                dropZone.classList.remove('ring-2', 'ring-blue-400', 'ring-red-400');
                if (!canAdd()) {
                    showLimit();
                    return;
                }
                const files = Array.from(e.dataTransfer.files).filter(f => f.type.startsWith('image/'));
                const keys = new Set(selectedFiles.map(f => `${f.name}|${f.size}|${f.lastModified}`));
                files.forEach(f => {
                    if (selectedFiles.length < 8) {
                        const key = `${f.name}|${f.size}|${f.lastModified}`;
                        if (!keys.has(key)) selectedFiles.push(f);
                    }
                });
                syncInput();
                render(selectedFiles);
            });

            dropZone.addEventListener('click', () => {
                if (!canAdd()) showLimit();
            });

            render(selectedFiles);
        });

        //other 
        document.addEventListener('DOMContentLoaded', () => {
        const select     = document.getElementById('upcycle_type_select');
        const hidden     = document.getElementById('upcycle_type');
        const wrapper    = document.getElementById('otherTypeWrapper');
        const custom     = document.getElementById('upcycle_type_custom');

        function syncValue() {
            if (select.value === 'other') {
                wrapper.classList.remove('hidden');
                hidden.value = custom.value.trim() || '';
                custom.setAttribute('required', 'required');
            } else {
                wrapper.classList.add('hidden');
                hidden.value = select.value;
                custom.removeAttribute('required');
            }
        }

        select.addEventListener('change', syncValue);
        custom.addEventListener('input', syncValue);

        // Initialize on load
        syncValue();
    });
    </script>

    {{-- Tailwind overrides (optional) --}}
    <style>
        .upload-tile {
            @apply border-2 border-dashed rounded-3xl bg-white/80 dark:bg-gray-800 cursor-pointer transition hover:border-primary-400 hover:shadow-xl;
        }
    </style>
</x-app-layout>
