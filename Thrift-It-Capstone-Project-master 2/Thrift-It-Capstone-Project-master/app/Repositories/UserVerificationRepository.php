<?php
namespace App\Repositories;

use App\Models\User;

class UserVerificationRepository
{
    public function submitDocument(User $user, $documentPath)
    {
        return $user->update([
            'verification_document' => $documentPath
            // 'verification_status' => 'pending',
            // 'is_verified' => false,
        ]);
    }

    public function findById($id)
    {
        return User::find($id);
    }

    public function all()
    {
        return User::orderBy('lname', 'asc')->get();
    }

    public function getVerifiedUsers()
    {
        return User::where(function ($query) {
                $query->where('verification_status', 'approved');
            })
            ->orderBy('lname', 'asc')
            ->paginate(10);
    }


    public function getPendingVerifications()
    {
        return User::where(function ($query) {
                $query->where('verification_status', 'pending');
            })
            ->orderBy('lname', 'asc')
            ->paginate(10);
    }
    
    public function getUnverifiedUsers()
    {
        return User::where(function ($query){
               $query->where('verification_status', 'unverified');
        })
        ->orderBy('lname', 'asc')
            ->paginate(10);
    }
    public function getRejectedUsers()
    {
        return User::where(function ($query){
               $query->where('verification_status', 'rejected');
        })
        ->orderBy('lname', 'asc')
            ->paginate(10);
    }

   public function verify(User $user)
    {
        $user->update([
            'is_verified' => true,
            'verification_status' => 'approved',
        ]);

        return redirect()->back()->with('success', 'User verified successfully.');
    }
    public function reject(User $user)
    {
        $user->update([
            'is_verified' => false,
            'verification_status' => 'rejected',
        ]);

        return redirect()->back()->with('success', 'User rejected successfully.');
    }

    

}