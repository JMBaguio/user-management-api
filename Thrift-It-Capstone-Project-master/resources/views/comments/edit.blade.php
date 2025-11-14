<x-app-layout>
    <x-slot name="header">
        <h2>Edit Comment</h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-xl mx-auto bg-white p-6 rounded shadow">
            <form action="{{ route('comments.update', $comment->id) }}" method="POST">
                @csrf
                @method('PUT')
                <textarea name="content" rows="4" class="w-full border rounded p-2" required>{{ old('content', $comment->content) }}</textarea>
                <button type="submit" class="mt-2 px-4 py-2 bg-blue-500 text-white rounded">Update Comment</button>
                <a href="{{ url()->previous() }}" class="mt-2 ml-2 px-4 py-2 bg-gray-300 text-gray-800 rounded hover:bg-gray-400 inline-block">Cancel</a>
            </form>
        </div>
    </div>
</x-app-layout>
