<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Appointment Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <!-- Display the Appointment Details -->
                    <div class="space-y-6">
                        <p class="text-sm text-gray-600 dark:text-gray-400"><strong>Appointment Details:</strong> {{ $appointment->appdetails }}</p>
                        <p class="text-sm text-gray-600 dark:text-gray-400"><strong>Contact Number:</strong> {{ $appointment->contactnumber }}</p>
                        
                        <p class="text-sm text-gray-600 dark:text-gray-400"><strong>Scheduled with Upcycler:</strong> {{ $appointment->upcycler->fname ?? 'N/A' }}  {{ $appointment->upcycler->lname ?? 'N/A' }}</p>
                        <p class="text-sm text-gray-600 dark:text-gray-400"><strong>Time:</strong> {{ $appointment->created_at->format('M d, Y h:i A') }}</p>
                        <!-- Actions: Edit/Delete Appointment -->
                        <div class="flex space-x-4">
                            <a href="{{ route('appointments.edit', $appointment->appointmentid) }}" class="text-indigo-600 hover:text-indigo-900 dark:text-indigo-400 dark:hover:text-indigo-300">
                                Edit Appointment
                            </a>
                       
                        <form method="POST" action="{{ route('appointments.cancel', $appointment) }}" onsubmit="return confirm('Are you sure you want to cancel this appointment?');" class="inline-block">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300">
                                Cancel Appointment
                            </button>
                        </form>
                    </div>
                        
                        
                    </div>

                    <!-- Display Error if No Upcycler Available -->
                    @if(!$appointment->upcycler)
                        <p class="mt-4 text-red-500">The upcycler information is not available.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
