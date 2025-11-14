{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Product Approval') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form method="POST" action="{{ route('admin.products.update', $product) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="approval_status" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                Approval Status
                            </label>
                            <select name="approval_status" id="approval_status"
                                    class="w-full border-gray-300 dark:bg-gray-700 dark:text-white rounded-md shadow-sm">
                                <option value="approved" {{ $product->approval_status === 'approved' ? 'selected' : '' }}>Approved</option>
                                <option value="rejected" {{ $product->approval_status === 'rejected' ? 'selected' : '' }}>Rejected</option>
                            </select>
                            @error('approval_status')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex justify-end">
                            <a href="{{ route('admin.products.index') }}"
                               class="inline-flex items-center px-4 py-2 bg-gray-500 hover:bg-gray-600 text-white text-sm font-medium rounded-md mr-2">
                                Cancel
                            </a>
                            <button type="submit"
                                    class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-md">
                                Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}
