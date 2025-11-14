<!-- filepath: resources/views/user/verify.blade.php -->
<x-app-layout>
    <div class="max-w-xl mx-auto mt-8">
        <h2 class="text-lg font-bold mb-4">Account Verification</h2>
        <form method="POST" action="{{ route('user.verify') }}" enctype="multipart/form-data" class="space-y-4">
            @csrf
            <div>
                <label for="verification_document" class="block font-medium">Upload Verification Document:</label>
                <input type="file" name="verification_document" id="verification_document" required class="mt-2 block w-full">
                @error('verification_document')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Submit for Verification</button>
        </form>
        @if(session('success'))
            <div class="mt-4 text-green-600">{{ session('success') }}</div>
        @endif
    </div>
</x-app