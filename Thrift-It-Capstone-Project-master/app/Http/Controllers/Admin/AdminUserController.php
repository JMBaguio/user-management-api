<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Services\UserVerificationService; 
use App\Models\Report;

class AdminUserController extends Controller

{

     protected $service;

    public function __construct(UserVerificationService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $users = $this->service->getVerifiedUsers();    
        $pendingUsers = $this->service->getPendingVerifications();
        $unverifiedUsers = $this->service->getUnverifiedUsers();
        $rejectedUsers = $this->service->getRejectedUsers();

        return view('admin.users.index', compact('users', 'pendingUsers','unverifiedUsers','rejectedUsers'));
    }

    
    public function show(User $user): View
    {
        $user->load(['products', 'reportsReceived']);
        return view('admin.users.show', compact('user'));
    }

     public function update(Request $request, User $user): RedirectResponse
        {
            $validated = $request->validate([
                'is_active' => 'boolean',
                'verification_status' => 'in:pending,approved,rejected',
            ]);

            //set is_verified based on verification_status
            $validated['is_verified'] = ($validated['verification_status'] ?? $user->verification_status) === 'approved';

            $user->update($validated);

            return redirect()
                ->route('admin.users.show', $user)
                ->with('success', 'User updated successfully.');
        }      

    public function destroy(User $user): RedirectResponse
    {
        $user->delete();

        return redirect()->route('admin.users.index')
            ->with('success', 'User deleted successfully.');
    }

   public function verify(Request $request, User $user)
    {
        $user->update([
            'verification_status' => 'approved',
            'is_verified' => true,
        ]);

        return redirect()->back()->with('success', 'User verified successfully.');
    }
    public function reject(Request $request, User $user)
    {
        $user->update([
            'verification_status' => 'rejected',
            'is_verified' => false,
        ]);

        return redirect()->back()->with('success', 'User rejected successfully.');
    }





    

  
} 