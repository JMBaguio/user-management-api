<?php

namespace App\Repositories;

use App\Models\User;

class UpcyclerRepository
{
    public function all()
    {
        // Assuming upcyclers are users with role=1
        return User::where('role', 1)->get();
    }

    public function find($id)
    {
        return User::where('role', 1)->findOrFail($id);
    }

    public function create(array $data)
    {
        $data['role'] = 1; // Ensure role is upcycler
        return User::create($data);
    }

    public function update(User $user, array $data)
    {
        $user->update($data);
        return $user;
    }

    public function delete(User $user)
    {
        return $user->delete();
    }
} 