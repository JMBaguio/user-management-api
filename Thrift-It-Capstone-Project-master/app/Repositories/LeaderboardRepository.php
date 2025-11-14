<?php

namespace App\Repositories;

use App\Models\Leaderboard;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class LeaderboardRepository
{

    public function getTopDonors($limit = 10)
        {
            return User::where('role','user')
            ->withCount(['donations' => function ($query) {
                    $query->where('status', 'donated');
                }])
                ->orderBy('donations_count', 'desc')
                ->take($limit)
                ->get();
        }

   public function getTopUserByPoints($limit = 10)
        {
            return User::where('role', 'user')
                ->orderBy('points', 'desc') 
                ->take($limit)
                ->get();
        }



    
}