<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Category') }}
            </h2>
            <a href="{{ route('categories.create') }}" 
               class="ml-auto text-black border p-2 rounded hover:bg-slate-400">
                Add Category
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-800 dark:text-gray-100">
                    <table class="table-auto w-full border-collapse border border-gray-200 dark:border-gray-700">
                        <thead>
                          <tr class="bg-gray-200 dark:bg-gray-700">
                            <th class="w-1/2 px-4 py-2 text-left border border-gray-300 dark:border-gray-600">Category</th>
                            <th class="w-1/4 px-4 py-2 text-left border border-gray-300 dark:border-gray-600">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                        @forelse ($categories as $category)
                            <tr class="hover:bg-gray-100 dark:hover:bg-gray-800">
                                <td class="border px-4 py-2 border-gray-300 dark:border-gray-600">{{ $category->name }}</td>
                                <td class="border px-4 py-2 border-gray-300 dark:border-gray-600">
                                    <div class="flex items-center gap-x-2">
                                        <a href="{{ route('categories.edit', $category->id) }}" 
                                           class="text-white border p-2 bg-green-700 rounded hover:bg-green-900">
                                            Edit
                                        </a>
                                        <form action="{{ route('categories.destroy', $category->id) }}" 
                                              method="POST" 
                                              onsubmit="return confirm('Are you sure?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="text-white border p-2 bg-red-700 rounded hover:bg-red-800">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2" class="text-center px-4 py-2 border border-gray-300 dark:border-gray-600">
                                    No Category found
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