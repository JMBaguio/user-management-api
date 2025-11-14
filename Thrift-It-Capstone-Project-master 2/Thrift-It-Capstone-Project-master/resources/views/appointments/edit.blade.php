<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Appointment') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-[#F4F2ED] shadow-lg rounded-2xl border border-gray-200 dark:border-gray-600 p-8">
                <form method="POST" action="{{ route('appointments.update', $appointment) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    <!-- Scheduled With (Read-only) -->
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Scheduled with Upcycler <span class="ml-1 text-red-500">*</span></label>
                        <x-text-input
                            id="upcycler"
                            type="text"
                            class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-xl bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-[#B59F84] focus:border-[#B59F84] transition"
                            :value="$appointment->upcycler->fname . ' ' . $appointment->upcycler->lname"
                            disabled
                        />
                    </div>

                    <!-- Appointment Time (Read-only) -->
                    <div class="mb-4">
                        <x-input-label for="time" :value="__('Appointment Time')" />
                        <x-text-input
                            id="time"
                            type="text"
                            class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-xl bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-[#B59F84] focus:border-[#B59F84] transition"
                            :value="$appointment->created_at->format('M d, Y h:i A')"
                            disabled
                        />
                    </div>

                    <!-- Editable Appointment Details -->
                    <div class="mb-4">
                        <x-input-label for="appdetails" :value="__('Appointment Details')" />
                        <x-text-input
                            id="appdetails"
                            name="appdetails"
                            type="text"
                            class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-xl bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-[#B59F84] focus:border-[#B59F84] transition"
                            :value="old('appdetails', $appointment->appdetails)"
                            required
                        />
                        @error('appdetails')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Editable Contact Number -->
                    <div class="mb-4">
                        <x-input-label for="contactnumber" :value="__('Contact Number')" />
                        <x-text-input
                            id="contactnumber"
                            name="contactnumber"
                            type="text"
                            class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-xl bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-[#B59F84] focus:border-[#B59F84] transition"
                            :value="old('contactnumber', $appointment->contactnumber)"
                            required
                        />
                        @error('contactnumber')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Submit and Cancel -->
                     <div class="pt-4">
                        <div class="flex items-center justify-end gap-3">
                            <a href="{{ route('appointments.index') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-xl text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#B59F84] transition">
                                Cancel
                            </a>
                            <button type="submit" class="inline-flex items-center px-6 py-3 border border-transparent rounded-xl text-sm font-semibold text-white bg-[#B59F84] hover:bg-[#a08e77] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#B59F84] transition">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Update Donation
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
