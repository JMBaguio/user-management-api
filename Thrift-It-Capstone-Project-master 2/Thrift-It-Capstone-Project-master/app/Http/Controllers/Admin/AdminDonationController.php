<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ApprovalStatusDonationUpdateRequest;
use App\Models\Donation;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Services\DonationService;

class AdminDonationController extends Controller
{

    protected $donationService;
    public function __construct(DonationService $donationService)
    {
        $this->donationService = $donationService;
    }
    public function index(): View
    {
        $approvedDonations = $this->donationService->getDonationsByStatusPaginated('approved');
        $pendingDonations = $this->donationService->getDonationsByStatusPaginated('pending');
        $rejectedDonations = $this->donationService->getDonationsByStatusPaginated('rejected');
        //reward donate management
        $pendingVerifications = Donation::where('verification_status', 'pending')->get();
        $verifiedDonations = Donation::where('verification_status', 'approved')->get();
        $rejectedProofs = Donation::where('verification_status', 'rejected')->get();

        return view('admin.donations.index', compact('approvedDonations', 'pendingDonations','rejectedDonations','pendingVerifications',
            'verifiedDonations',
            'rejectedProofs'));
    }

    public function show(Donation $donation): View
    {
        $donation->load(['user', 'category', 'comments.user']);
        return view('admin.donations.show', compact('donation'));
    }


    public function update(ApprovalStatusDonationUpdateRequest $request, Donation $donation): RedirectResponse
    {
        $validated = $request->validated();
        $donation->update($validated);

        return redirect()->route('admin.donations.index')
            ->with('success', 'Donation approval status updated successfully.');
    }

    public function edit(Donation $donation): View
    {
        $donation->load(['user', 'category']);
        return view('admin.donation.edit', compact('donation'));
    }


    public function destroy(Donation $donation): RedirectResponse
    {
        $donation->delete();

        return redirect()->route('admin.donations.index')
            ->with('success', 'Donation deleted successfully.');
    }

    public function approve(Donation $donation): RedirectResponse
    {
        $this->donationService->updateDonation($donation, ['approval_status' => 'approved']);

        return redirect()->route('admin.donations.index')
            ->with('success', 'Donation approved successfully.');
    }

    public function reject(Donation $donation): RedirectResponse
    {
        $this->donationService->updateDonation($donation, ['approval_status' => 'rejected']);

        return redirect()->route('admin.donations.index')
            ->with('success', 'Donation rejected successfully.');
    }

    public function verifyDonation(Donation $donation): RedirectResponse
    {
        $this->donationService->updateDonation($donation, ['verification_status' => 'approved']);

        return redirect()->route('admin.donations.index')
            ->with('success', 'Donation verified successfully. Points added.');
    }
    public function rejectDonationProof(Donation $donation): RedirectResponse
    {
        $this->donationService->updateDonation($donation, ['verification_status' => 'rejected']);

        return redirect()->route('admin.donations.index')
            ->with('success', 'Donation rejected successfully.');
    }

    public function verifyProof(Donation $donation)
    {
        // Make sure the donation has a proof and is pending verification
        if ($donation->verification_status !== 'pending') {
            return back()->with('error', 'This donation is not pending verification.');
        }

        // Update verification status and award points
        $donation->update([
            'verification_status' => 'approved',
            'status' => 'donated',
        ]);

        // Add 20 points to the donor’s account
        $donation->user->increment('points', 20);

        return back()->with('success', 'Donation verified and 20 points awarded successfully!');
    }
}
