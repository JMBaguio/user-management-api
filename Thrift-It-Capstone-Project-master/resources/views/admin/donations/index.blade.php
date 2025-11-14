<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Donations Management') }}
            </h2>
            <a href="{{ route('admin.dashboard') }}"
                class="px-4 py-2 bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-100 rounded-md hover:bg-gray-300 dark:hover:bg-gray-600">
                ← Back to Dashboard
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Glassmorphism Container --}}
            <div class="bg-white/20 dark:bg-gray-900/30 backdrop-blur-xl shadow-xl sm:rounded-xl p-6">

                {{-- Tabs --}}
                <div class="flex space-x-6 border-b border-gray-300 dark:border-gray-700 mb-6">
                    <button id="tab-approval"
                        class="pb-2 font-semibold text-gray-700 dark:text-gray-300 border-b-2 border-[#B59F84]"
                        onclick="switchTab('approval')">
                        Approval Management
                    </button>
                    <button id="tab-reward"
                        class="pb-2 font-semibold text-gray-500 dark:text-gray-400 border-b-2 border-transparent hover:text-gray-700 dark:hover:text-gray-300"
                        onclick="switchTab('reward')">
                        Reward Management
                    </button>
                </div>

                {{-- Approval Management --}}
                <div id="approval-section">
                    @foreach (['Pending' => $pendingDonations, 'Approved' => $approvedDonations, 'Rejected' => $rejectedDonations] as $status => $donations)
                        <h3
                            class="text-lg font-semibold
                            {{ $status === 'Pending' ? 'text-yellow-700 dark:text-yellow-300' : '' }}
                            {{ $status === 'Approved' ? 'text-green-700 dark:text-green-300' : '' }}
                            {{ $status === 'Rejected' ? 'text-red-700 dark:text-red-300' : '' }}
                            mb-4 mt-6">
                            {{ $status }} Donations
                        </h3>
                        <div class="overflow-x-auto bg-white/30 dark:bg-gray-800/50 rounded-xl p-3 shadow-inner mb-6">
                            @include('admin.donations._table', ['donations' => $donations])
                            <div class="mt-4">{{ $donations->links() }}</div>
                        </div>
                    @endforeach
                </div>

                {{-- Reward Management --}}
                <div id="reward-section" class="hidden">
                    @foreach (['Pending' => $pendingVerifications, 'Verified' => $verifiedDonations, 'Rejected' => $rejectedProofs] as $status => $donations)
                        <h3
                            class="text-lg font-semibold
                            {{ $status === 'Pending' ? 'text-yellow-700 dark:text-yellow-300' : '' }}
                            {{ $status === 'Verified' ? 'text-green-700 dark:text-green-300' : '' }}
                            {{ $status === 'Rejected' ? 'text-red-700 dark:text-red-300' : '' }}
                            mb-4 mt-6">
                            {{ $status }} Donations
                        </h3>
                        <div class="overflow-x-auto bg-white/30 dark:bg-gray-800/50 rounded-xl p-3 shadow-inner mb-6">
                            @include('admin.donations.reward-management._reward_table', [
                                'donations' => $donations,
                                'type' => strtolower($status),
                            ])
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>

    {{-- Tab Switch Script --}}
    <script>
        function switchTab(tab) {
            const approvalSection = document.getElementById('approval-section');
            const rewardSection = document.getElementById('reward-section');

            const tabApproval = document.getElementById('tab-approval');
            const tabReward = document.getElementById('tab-reward');

            if (tab === 'approval') {
                // Show Approval, hide Reward
                approvalSection.classList.remove('hidden');
                rewardSection.classList.add('hidden');

                // Update tab styles
                tabApproval.classList.add('border-[#B59F84]', 'text-gray-700', 'dark:text-gray-300');
                tabApproval.classList.remove('text-gray-500', 'dark:text-gray-400');

                tabReward.classList.remove('border-[#B59F84]', 'text-gray-700', 'dark:text-gray-300');
                tabReward.classList.add('text-gray-500', 'dark:text-gray-400');

            } else {
                // Show Reward, hide Approval
                approvalSection.classList.add('hidden');
                rewardSection.classList.remove('hidden');

                // Update tab styles
                tabReward.classList.add('border-[#B59F84]', 'text-gray-700', 'dark:text-gray-300');
                tabReward.classList.remove('text-gray-500', 'dark:text-gray-400');

                tabApproval.classList.remove('border-[#B59F84]', 'text-gray-700', 'dark:text-gray-300');
                tabApproval.classList.add('text-gray-500', 'dark:text-gray-400');
            }
        }
    </script>

</x-app-layout>
