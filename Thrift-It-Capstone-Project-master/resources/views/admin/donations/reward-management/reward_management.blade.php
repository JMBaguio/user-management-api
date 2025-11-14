@extends('layouts.admin')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-6 text-gray-800 dark:text-gray-100">🏆 Reward Management</h1>

    {{-- Pending Verifications --}}
    <div class="mb-10">
        <h2 class="text-xl font-semibold mb-4 text-yellow-600">Pending Verifications</h2>
        @include('admin.donations.partials._reward_table', ['donations' => $pendingVerifications, 'type' => 'pending'])
    </div>

    {{-- Verified Donations --}}
    <div class="mb-10">
        <h2 class="text-xl font-semibold mb-4 text-green-600">Verified (Rewarded)</h2>
        @include('admin.donations.partials._reward_table', ['donations' => $verifiedDonations, 'type' => 'approved'])
    </div>

    {{-- Rejected Proofs --}}
    <div>
        <h2 class="text-xl font-semibold mb-4 text-red-600">Rejected Proofs</h2>
        @include('admin.donations.partials._reward_table', ['donations' => $rejectedProofs, 'type' => 'rejected'])
    </div>
</div>
@endsection
