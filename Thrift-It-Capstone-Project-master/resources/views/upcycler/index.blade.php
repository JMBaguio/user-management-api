<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center space-x-3">
            <!-- Calendar Icon -->
            <div class="flex-shrink-0">
                <svg class="w-6 h-6 text-[#B59F84]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
            </div>
            <div>
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Upcycler Dashboard') }}
                </h2>
                <p class="text-sm text-gray-600 dark:text-gray-400">
                    Manage your client appointments and consultations
                </p>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">

                <!-- Modern Header with Icon -->
                <div class="flex items-center space-x-3 mb-6">
                    <div class="p-2 bg-[#F1E9D2] dark:bg-[#9C8770] rounded-lg">
                        <svg class="w-5 h-5 text-[#B59F84] dark:text-[#F1E9D2]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">
                        {{ __("Appointments") }}
                    </h3>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full text-left text-sm text-gray-700 dark:text-gray-200 border border-[#E9DFC7] dark:border-gray-700 rounded-lg">
                        <thead class="bg-[#F8F4EC] dark:bg-gray-700">
                            <tr>
                                <th class="px-4 py-3 border-b border-[#E9DFC7] dark:border-gray-600 font-semibold">
                                    <div class="flex items-center space-x-2">
                                        <svg class="w-4 h-4 text-[#B59F84]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                        </svg>
                                        <span>User</span>
                                    </div>
                                </th>
                                <th class="px-4 py-3 border-b border-[#E9DFC7] dark:border-gray-600 font-semibold">
                                    <div class="flex items-center space-x-2">
                                        <svg class="w-4 h-4 text-[#B59F84]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                                        </svg>
                                        <span>Type</span>
                                    </div>
                                </th>
                                <th class="px-4 py-3 border-b border-[#E9DFC7] dark:border-gray-600 font-semibold">
                                    <div class="flex items-center space-x-2">
                                        <svg class="w-4 h-4 text-[#B59F84]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                        <span>Date</span>
                                    </div>
                                </th>
                                <th class="px-4 py-3 border-b border-[#E9DFC7] dark:border-gray-600 font-semibold">
                                    <div class="flex items-center space-x-2">
                                        <svg class="w-4 h-4 text-[#B59F84]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <span>Status</span>
                                    </div>
                                </th>
                                <th class="px-4 py-3 border-b border-[#E9DFC7] dark:border-gray-600 font-semibold">
                                    <div class="flex items-center space-x-2">
                                        <svg class="w-4 h-4 text-[#B59F84]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                        <span>Actions</span>
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($appointments as $appointment)
                                <tr class="bg-white dark:bg-gray-800 hover:bg-[#F8F4EC] dark:hover:bg-gray-700 transition-colors duration-150">
                                    <td class="px-4 py-3 border-b border-[#E9DFC7] dark:border-gray-600">
                                        <div class="flex items-center space-x-3">
                                            <div class="w-8 h-8 bg-[#F1E9D2] dark:bg-[#9C8770] rounded-full flex items-center justify-center">
                                                <svg class="w-4 h-4 text-[#B59F84] dark:text-[#F1E9D2]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                                </svg>
                                            </div>
                                            <span>{{ $appointment->user->lname }}, {{ $appointment->user->fname }}</span>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 border-b border-[#E9DFC7] dark:border-gray-600">
                                        {{ $appointment->apptype }}
                                    </td>
                                    <td class="px-4 py-3 border-b border-[#E9DFC7] dark:border-gray-600">
                                        <div class="flex items-center space-x-2">
                                            <svg class="w-4 h-4 text-[#B59F84]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            <span>{{ \Carbon\Carbon::parse($appointment->appdate)->format('F j, Y g:i A') }}</span>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 border-b border-[#E9DFC7] dark:border-gray-600">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium capitalize 
                                            @if($appointment->appstatus === 'confirmed') bg-[#F8F4EC] text-[#B59F84] dark:bg-[#9C8770] dark:text-[#F1E9D2]
                                            @elseif($appointment->appstatus === 'pending') bg-[#F1E9D2] text-[#8A7560] dark:bg-[#8A7560] dark:text-[#F1E9D2]
                                            @else bg-[#F4F2ED] text-[#8A7560] dark:bg-gray-700 dark:text-gray-200 @endif">
                                            {{ $appointment->appstatus }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-3 border-b border-[#E9DFC7] dark:border-gray-600">
                                        <div class="flex items-center space-x-3">
                                            <a href="{{ route('upcycler.show', $appointment) }}" 
                                               class="inline-flex items-center text-[#B59F84] hover:text-[#8A7560] dark:text-[#D5C39A] dark:hover:text-[#F1E9D2] transition-colors">
                                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                                </svg>
                                                View
                                            </a>

                                            <form action="{{ route('upcycler.destroy', $appointment) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="inline-flex items-center text-[#8A7560] hover:text-[#6B5B48] dark:text-[#8A7560] dark:hover:text-[#6B5B48] transition-colors"
                                                        onclick="return confirm('Are you sure you want to delete this appointment?')">
                                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                    </svg>
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-4 py-8 text-center text-gray-500 dark:text-gray-400">
                                        <div class="flex flex-col items-center justify-center">
                                            <svg class="w-12 h-12 mb-3 text-[#B59F84]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                            </svg>
                                            <p>No appointments found.</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>