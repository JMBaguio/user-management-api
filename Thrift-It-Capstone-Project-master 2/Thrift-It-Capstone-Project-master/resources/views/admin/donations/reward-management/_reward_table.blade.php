<table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
    <thead>
        <tr>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Donation</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Donor</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Category</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Proof</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Verification Status</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Date</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Actions</th>
        </tr>
    </thead>

    <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
        @forelse($donations as $donation)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">{{ $donation->name }}</td>

                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">
                    {{ $donation->user->fname }} {{ $donation->user->lname }}
                </td>

                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">
                    {{ $donation->category->name ?? '—' }}
                </td>

                <td class="px-6 py-4 whitespace-nowrap text-sm">
                    @if($donation->proof)
                        <a href="{{ asset('storage/' . $donation->proof) }}" target="_blank"
                            class="text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300 underline">
                            View Proof
                        </a>
                    @else
                        <span class="text-gray-400">No proof</span>
                    @endif
                </td>

                <td class="px-6 py-4 whitespace-nowrap">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                        {{ $donation->verification_status === 'approved' ? 'bg-green-100 text-green-800' :
                           ($donation->verification_status === 'pending' ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800') }}">
                        {{ ucfirst($donation->verification_status) }}
                    </span>
                </td>

                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                    {{ $donation->created_at->format('M d, Y') }}
                </td>

                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                    @if($type === 'pending')
                        {{-- Verify --}}
                        <form action="{{ route('admin.donations.verifyProof', $donation) }}" method="POST" class="inline">
                            @csrf
                            @method('PUT')
                            <button type="submit"
                                class="text-green-600 hover:text-green-900 dark:text-green-400 dark:hover:text-green-300 mr-3"
                                onclick="return confirm('Verify this donation and reward points?')">
                                Verify
                            </button>
                        </form>

                        {{-- Reject --}}
                        <form action="{{ route('admin.donations.rejectProof', $donation) }}" method="POST" class="inline">
                            @csrf
                            @method('PUT')
                            <button type="submit"
                                class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300"
                                onclick="return confirm('Reject this proof submission?')">
                                Reject
                            </button>
                        </form>
                    @else
                        <span class="text-gray-400">—</span>
                    @endif
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7" class="text-center text-gray-500 py-4">No donations found.</td>
            </tr>
        @endforelse
    </tbody>
</table>
