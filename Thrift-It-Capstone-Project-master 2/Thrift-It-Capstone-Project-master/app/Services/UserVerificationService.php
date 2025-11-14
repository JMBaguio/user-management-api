<?php
namespace App\Services;

use App\Models\User;
use App\Repositories\UserVerificationRepository;

class UserVerificationService
{
    protected $repo;

    public function __construct(UserVerificationRepository $repo)
    {
        $this->repo = $repo;
    }

    public function all()
    {
        return $this->repo->all();
    }

    public function submit(User $user, $document)
    {
        $path = $document->store('verification_docs', 'public');
        return $this->repo->submitDocument($user, $path);
    }

    public function getPendingVerifications()
    {
        return $this->repo->getPendingVerifications();
    }

    public function getVerifiedUsers()
    {
        return $this->repo->getVerifiedUsers();
    }

    public function getUnverifiedUsers()
    {
          return $this->repo->getUnverifiedUsers();
    }
    public function getRejectedUsers()
    {
          return $this->repo->getRejectedUsers();
    }

    public function update(User $user, $status)
    {
        return $this->repo->verify($user, $status);
    }

    
}