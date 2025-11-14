<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center space-x-3">
            <!-- Calendar Icon -->
            <div class="flex-shrink-0">
                <svg class="w-6 h-6 text-[#B59F84]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                    </path>
                </svg>
            </div>
            <div>
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Appointment Details') }}
                </h2>
                <p class="text-sm text-gray-600 dark:text-gray-400">
                    View and manage appointment information
                </p>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
                @if (session('status'))
                    <div
                        class="mb-6 p-4 bg-[#F8F4EC] dark:bg-[#8A7560] border border-[#E9DFC7] dark:border-[#9C8770] text-gray-700 dark:text-gray-300 rounded-lg flex items-center space-x-3">
                        <svg class="w-5 h-5 text-[#B59F84]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span>{{ session('status') }}</span>
                    </div>
                @endif

                <!-- Appointment Information Card -->
                <div class="bg-[#F8F4EC] dark:bg-gray-700 rounded-lg p-6 mb-6">
                    <div class="flex items-center space-x-3 mb-4">
                        <div class="p-2 bg-[#F1E9D2] dark:bg-[#9C8770] rounded-lg">
                            <svg class="w-5 h-5 text-[#B59F84] dark:text-[#F1E9D2]" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Appointment Information</h3>
                    </div>
                    <!-- Appointment Images -->
                    <!-- Appointment Images -->
                    @if ($appointment->apptImages->count() > 0)
                        <div class="bg-[#F8F4EC] dark:bg-gray-700 rounded-lg p-6 mb-6">
                            <div class="flex items-center space-x-3 mb-4">
                                <div class="p-2 bg-[#F1E9D2] dark:bg-[#9C8770] rounded-lg">
                                    <svg class="w-5 h-5 text-[#B59F84] dark:text-[#F1E9D2]" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-8h6a2 2 0 012 2v12a2 2 0 01-2 2H6a2 2 0 01-2-2V6a2 2 0 012-2h6z" />
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="text-md font-semibold text-gray-900 dark:text-gray-100">Uploaded Images
                                    </h4>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">Preview of uploaded appointment
                                        images</p>
                                </div>
                            </div>
                            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
                                @foreach ($appointment->apptImages as $image)
                                    <div class="relative group">
                                        <img src="{{ Storage::disk('s3')->url($image->image_path) }}"
                                            alt="Appointment Image"
                                            class="rounded-lg shadow-md object-cover w-full h-40 transition-transform duration-300 group-hover:scale-105">
                                        <div
                                            class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-30 rounded-lg transition duration-300">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- User Information -->
                        <div class="space-y-4">
                            <div class="flex items-center space-x-3">
                                <div
                                    class="w-10 h-10 bg-[#F1E9D2] dark:bg-[#9C8770] rounded-full flex items-center justify-center">
                                    <svg class="w-5 h-5 text-[#B59F84] dark:text-[#F1E9D2]" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                        </path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Client Name</p>
                                    <p class="font-medium text-gray-900 dark:text-gray-100">
                                        {{ $appointment->user->lname }}, {{ $appointment->user->fname }}</p>
                                </div>
                            </div>

                            <div class="flex items-center space-x-3">
                                <svg class="w-5 h-5 text-[#B59F84]" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                    </path>
                                </svg>
                                <div>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Email</p>
                                    <p class="font-medium text-gray-900 dark:text-gray-100">
                                        {{ $appointment->user->email }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Appointment Details -->
                        <div class="space-y-4">
                            <div class="flex items-center space-x-3">
                                <svg class="w-5 h-5 text-[#B59F84]" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                                    </path>
                                </svg>
                                <div>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Appointment Type</p>
                                    <p class="font-medium text-gray-900 dark:text-gray-100">{{ $appointment->apptype }}
                                    </p>
                                </div>
                            </div>

                            <div class="flex items-center space-x-3">
                                <svg class="w-5 h-5 text-[#B59F84]" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                    </path>
                                </svg>
                                <div>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Scheduled Date & Time</p>
                                    <p class="font-medium text-gray-900 dark:text-gray-100">
                                        {{ \Carbon\Carbon::parse($appointment->appdate)->format('F j, Y g:i A') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Status and Created At -->
                    <div
                        class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-6 pt-6 border-t border-[#E9DFC7] dark:border-gray-600">
                        <div class="flex items-center space-x-3">
                            <svg class="w-5 h-5 text-[#B59F84]" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <div>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Current Status</p>
                                <span
                                    class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium capitalize 
                                    @if ($appointment->appstatus === 'pending') bg-[#F1E9D2] text-[#8A7560] dark:bg-[#8A7560] dark:text-[#F1E9D2]
                                    @elseif($appointment->appstatus === 'approved') bg-[#F8F4EC] text-[#B59F84] dark:bg-[#9C8770] dark:text-[#F1E9D2]
                                    @elseif($appointment->appstatus === 'completed') bg-[#E1D5B6] text-[#6B5B48] dark:bg-[#6B5B48] dark:text-[#E1D5B6]
                                    @else bg-[#F4F2ED] text-[#8A7560] dark:bg-[#8A7560] dark:text-[#F4F2ED] @endif">
                                    {{ $appointment->appstatus }}
                                </span>
                            </div>
                        </div>

                        <div class="flex items-center space-x-3">
                            <svg class="w-5 h-5 text-[#B59F84]" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <div>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Created At</p>
                                <p class="font-medium text-gray-900 dark:text-gray-100">
                                    {{ $appointment->created_at->format('F j, Y g:i A') }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Status Update Form -->
                <div class="bg-[#F8F4EC] dark:bg-gray-700 rounded-lg p-6 mb-6">
                    <div class="flex items-center space-x-3 mb-4">
                        <div class="p-2 bg-[#F1E9D2] dark:bg-[#9C8770] rounded-lg">
                            <svg class="w-5 h-5 text-[#B59F84] dark:text-[#F1E9D2]" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-md font-semibold text-gray-900 dark:text-gray-100">Update Appointment
                                Status</h4>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Change the current status of this
                                appointment</p>
                        </div>
                    </div>

                    <form method="POST" action="{{ route('upcycler.update', $appointment) }}">
                        @csrf
                        @method('PATCH')
                        <div
                            class="flex flex-col sm:flex-row items-start sm:items-center space-y-4 sm:space-y-0 sm:space-x-4">
                            <select name="appstatus"
                                class="border-[#E9DFC7] dark:border-gray-600 dark:bg-gray-700 text-gray-900 dark:text-gray-100 rounded-md shadow-sm focus:ring-[#B59F84] focus:border-[#B59F84] flex-1">
                                <option value="pending" {{ $appointment->appstatus === 'pending' ? 'selected' : '' }}>
                                    ⏳ Pending</option>
                                <option value="approved"
                                    {{ $appointment->appstatus === 'approved' ? 'selected' : '' }}>✅ Approved</option>
                                <option value="declined"
                                    {{ $appointment->appstatus === 'declined' ? 'selected' : '' }}>❌ Declined</option>
                                <option value="completed"
                                    {{ $appointment->appstatus === 'completed' ? 'selected' : '' }}>🎉 Completed
                                </option>
                            </select>
                            <button type="submit"
                                class="inline-flex items-center bg-[#B59F84] hover:bg-[#9C8770] text-white px-4 py-2 rounded-md transition-colors duration-200">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                Update Status
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Navigation and Actions -->
                <div
                    class="flex flex-col sm:flex-row justify-between items-start sm:items-center space-y-4 sm:space-y-0">
                    <div class="flex space-x-3">
                        <a href="{{ route('upcycler.index') }}"
                            class="inline-flex items-center bg-[#8A7560] hover:bg-[#6B5B48] text-white px-4 py-2 rounded-md transition-colors duration-200">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                            Back to Appointments
                        </a>
                    </div>

                    <form action="{{ route('upcycler.destroy', $appointment) }}" method="POST"
                        onsubmit="return confirm('Are you sure you want to delete this appointment? This action cannot be undone.')"
                        class="flex">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="inline-flex items-center bg-[#8A7560] hover:bg-[#6B5B48] text-white px-4 py-2 rounded-md transition-colors duration-200">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                </path>
                            </svg>
                            Delete Appointment
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
