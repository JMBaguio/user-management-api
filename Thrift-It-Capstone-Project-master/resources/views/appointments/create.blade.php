<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-2xl font-extrabold tracking-tight text-gray-900 dark:text-gray-100">
                {{ __('Request an Appointment') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-[#F4F2ED] shadow-lg rounded-2xl border border-gray-200 dark:border-gray-600 p-8">
                <form action="{{ route('appointments.store') }}" method="POST" class="space-y-6" enctype="multipart/form-data">
                    @csrf

                    <!-- Display Upcycler Name -->
                    @if ($upcycler)
                        <div class="bg-white dark:bg-gray-800 rounded-xl p-4 border border-gray-200 dark:border-gray-600">
                            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Selected Upcycler</label>
                            <p class="text-lg font-medium text-gray-900 dark:text-gray-100">{{ $upcycler->fname }} {{ $upcycler->lname }}</p>
                            <input type="hidden" name="upcycler_id" value="{{ $upcycler->id }}">
                        </div>
                    @endif

                    <!-- Appointment Details -->
                    <div>
                        <div class="flex items-center justify-between mb-3">
                            <h3 class="text-sm font-bold tracking-wide text-gray-800 dark:text-gray-200">Appointment Details</h3>
                            <div class="h-px flex-1 ml-4 bg-gray-300 dark:bg-gray-700"></div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            <!-- Appointment Type -->
                            <div>
                                <label for="apptype" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Appointment Type</label>
                                <select id="apptype" name="apptype" class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-[#B59F84] focus:border-[#B59F84] bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 transition" required>
                                    <option value="">-- Select Appointment Type --</option>
                                    @foreach (['Resize', 'Customize', 'Patchwork', 'Fabric Dyeing'] as $type)
                                        <option value="{{ $type }}" {{ old('apptype') == $type ? 'selected' : '' }}>{{ $type }}</option>
                                    @endforeach
                                </select>
                                @error('apptype')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Appointment Date -->
                            <div>
                                <label for="appdate" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Appointment Date & Time</label>
                                <input type="datetime-local" id="appdate" name="appdate"
                                    class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-[#B59F84] focus:border-[#B59F84] bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 transition"
                                    value="{{ old('appdate') }}"
                                    min="2025-05-02T08:00"
                                    required>
                                <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Business hours: 8:00 AM - 6:00 PM</p>
                                @error('appdate')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Contact Number -->
                            <div class="md:col-span-2">
                                <label for="contactnumber" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Contact Number</label>
                                <input type="tel" name="contactnumber" pattern="[0-9]{10,11}" placeholder="09123456789" class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-xl placeholder-gray-500 focus:ring-2 focus:ring-[#B59F84] focus:border-[#B59F84] bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 transition" value="{{ old('contactnumber') }}">
                                @error('contactnumber')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Appointment Description -->
                    <div>
                        <label for="appdetails" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Details</label>
                        <textarea id="appdetails" name="appdetails" rows="5" class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-xl placeholder-gray-500 focus:ring-2 focus:ring-[#B59F84] focus:border-[#B59F84] bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 transition resize-none" placeholder="Describe what you'd like to have done...">{{ old('appdetails') }}</textarea>
                        <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Provide measurements, fabric type, preferred style, or references.</p>
                        @error('appdetails')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Drag & Drop Image Upload -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Reference Images</label>
                        <div id="dropzone" class="w-full border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-xl p-4 flex flex-col items-center justify-center cursor-pointer transition hover:border-[#B59F84]">
                            <p class="text-gray-500 dark:text-gray-400">Drag & drop images here or click to upload</p>
                            <input type="file" name="images[]" id="images" multiple class="hidden">
                        </div>
                        <div id="preview" class="mt-4 grid grid-cols-3 gap-4"></div>
                        @error('images')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                        @error('images.*')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-4">
                        <button type="submit" class="w-full bg-[#B59F84] hover:bg-[#a08e77] text-white font-semibold py-3 px-6 rounded-xl transition-all duration-200 active:scale-[.98] shadow-lg hover:shadow-xl">
                            <span class="flex items-center justify-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                Request Appointment
                            </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    // Appointment date restrictions
    window.addEventListener('DOMContentLoaded', () => {
        const input = document.getElementById('appdate');
        const now = new Date();
        now.setMinutes(now.getMinutes() - now.getTimezoneOffset());
        const localDatetime = now.toISOString().slice(0, 16);
        input.min = localDatetime;

        input.addEventListener('change', () => {
            const selected = new Date(input.value);
            const hours = selected.getHours();
            if (hours < 8 || hours >= 18) {
                alert("Please select a time between 8:00 AM and 6:00 PM.");
                input.value = '';
            }
        });
    });

    // Drag & Drop Image Upload with preview and delete
    const dropzone = document.getElementById('dropzone');
    const imagesInput = document.getElementById('images');
    const preview = document.getElementById('preview');

    dropzone.addEventListener('click', () => imagesInput.click());

    dropzone.addEventListener('dragover', e => {
        e.preventDefault();
        dropzone.classList.add('border-[#B59F84]');
    });

    dropzone.addEventListener('dragleave', () => dropzone.classList.remove('border-[#B59F84]'));

    dropzone.addEventListener('drop', e => {
        e.preventDefault();
        dropzone.classList.remove('border-[#B59F84]');
        imagesInput.files = e.dataTransfer.files;
        updatePreview();
    });

    imagesInput.addEventListener('change', updatePreview);

    function updatePreview() {
        preview.innerHTML = '';
        Array.from(imagesInput.files).forEach((file, index) => {
            const reader = new FileReader();
            reader.onload = e => {
                const imgDiv = document.createElement('div');
                imgDiv.classList.add('relative');
                imgDiv.innerHTML = `
                    <img src="${e.target.result}" class="w-full h-32 object-cover rounded-xl">
                    <button type="button" data-index="${index}" class="absolute top-1 right-1 bg-red-500 text-white rounded-full w-6 h-6 flex items-center justify-center">x</button>
                `;
                preview.appendChild(imgDiv);
                imgDiv.querySelector('button').addEventListener('click', removeImage);
            };
            reader.readAsDataURL(file);
        });
    }

    function removeImage(e) {
        const index = e.target.dataset.index;
        let dt = new DataTransfer();
        Array.from(imagesInput.files)
            .forEach((file, i) => { if(i != index) dt.items.add(file) });
        imagesInput.files = dt.files;
        updatePreview();
    }
</script>
