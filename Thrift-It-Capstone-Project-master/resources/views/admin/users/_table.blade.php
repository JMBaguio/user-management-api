{{-- resources/views/admin/users/_table.blade.php --}}
@php
    $statusColors = [
        'pending' => 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200',
        'approved' => 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200',
        'unverified' => 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200',
        'rejected' => 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200',
    ];
@endphp

<table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
    <thead>
        <tr>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Last Name</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">First Name</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Email</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Role</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Status</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Joined</th>
            @if($showDocument ?? false)
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Document</th>
            @endif
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Actions</th>
        </tr>
    </thead>

    <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:text-gray-200 dark:divide-gray-700">
        @forelse($users as $user)
            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                <td class="px-6 py-4">{{ $user->lname }}</td>
                <td class="px-6 py-4">{{ $user->fname }}</td>
                <td class="px-6 py-4">{{ $user->email }}</td>
                <td class="px-6 py-4">
                    <span class="px-3 py-1 text-xs font-medium rounded-full bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200">
                        {{ $user->role_name }}
                    </span>
                </td>
                <td class="px-6 py-4">
                    <span class="px-3 py-1 text-xs font-medium rounded-full {{ $statusColors[$user->verification_status] ?? 'bg-gray-100 text-gray-800' }}">
                        {{ ucfirst($user->verification_status) }}
                    </span>
                </td>
                <td class="px-6 py-4">{{ $user->created_at->format('M d, Y') }}</td>

                @if($showDocument ?? false)
                    <td class="px-6 py-4">
                        @if ($user->verification_document)
                            <a href="{{ Storage::disk('s3')->url($user->verification_document) }}" target="_blank"
                               class="text-blue-600 underline hover:text-blue-800">
                                View Document
                            </a>
                        @else
                            <span class="text-gray-400 italic">No document</span>
                        @endif
                    </td>
                @endif

                <td class="px-6 py-4 flex space-x-3">

                    {{-- Pending Users: Show Verify / Reject --}}
                    @if($user->verification_status === 'pending')
                        <form action="{{ route('admin.users.verify', $user) }}" method="POST" onsubmit="return confirm('Verify this user?')">
                            @csrf
                            @method('PUT')
                            <button type="submit"
                                class="text-green-600 hover:text-green-900 dark:text-green-400 dark:hover:text-green-300">
                                Verify
                            </button>
                        </form>

                        <form action="{{ route('admin.users.reject', $user) }}" method="POST" onsubmit="return confirm('Reject this user?')">
                            @csrf
                            @method('PUT')
                            <button type="submit"
                                class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300">
                                Reject
                            </button>
                        </form>
                    @endif

                    {{-- View User --}}
                    <a href="{{ route('admin.users.show', $user) }}" class="text-indigo-600 hover:text-indigo-900 dark:text-indigo-400 dark:hover:text-indigo-300">
                        View
                    </a>

                    {{-- Delete User --}}
                    <form action="{{ route('admin.users.destroy', $user) }}" method="POST" onsubmit="return confirm('Delete this user?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-gray-300">
                            Delete
                        </button>
                    </form>

                </td>
            </tr>
        @empty
            <tr>
                <td colspan="{{ ($showDocument ?? false) ? 8 : 7 }}" class="text-center py-6 text-gray-500 dark:text-gray-400">
                    No users found.
                </td>
            </tr>
        @endforelse
    </tbody>
</table>
