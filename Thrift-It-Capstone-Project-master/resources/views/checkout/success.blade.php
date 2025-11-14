<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Payment Success') }}
            </h2>
            <a href="{{ route('dashboard') }}"
               class="px-4 py-2 bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-100 rounded-md hover:bg-gray-300 dark:hover:bg-gray-600">
                ← Back to Dashboard
            </a>
        </div>
    </x-slot>

    <div class="py-16">
        <div class="max-w-md mx-auto">
            <div class="bg-white dark:bg-gray-800 shadow-lg rounded-2xl p-8 text-center">
                <!-- Success Icon -->
                <div class="flex justify-center mb-6">
                    <div class="w-20 h-20 bg-green-100 dark:bg-green-900 rounded-full flex items-center justify-center">
                        <svg class="w-10 h-10 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                </div>

                <!-- Messages -->
                <h1 class="text-3xl font-bold text-green-600 dark:text-green-400 mb-4">Payment Successful!</h1>
                <p class="text-gray-700 dark:text-gray-300 mb-6">
                    Thank you for your purchase. Your transaction has been completed successfully.
                </p>

                <!-- Dashboard Button -->
                <a href="{{ route('dashboard') }}" 
                   class="inline-flex items-center justify-center px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg shadow-md transition duration-200">
                    Go to Dashboard
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
