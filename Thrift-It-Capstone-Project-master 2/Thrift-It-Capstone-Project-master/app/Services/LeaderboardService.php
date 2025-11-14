<?php

namespace App\Services;

use App\Repositories\LeaderboardRepository;

class LeaderboardService
{
    protected $leaderboardRepository;

    public function __construct(LeaderboardRepository $leaderboardRepository)
    {
        $this->leaderboardRepository = $leaderboardRepository;
    }

    public function getTopDonors($limit = 10)
    {
        return $this->leaderboardRepository->getTopDonors($limit);
    }
    
    public function getTopOverall($limit = 10)
    {
        return $this->leaderboardRepository->getTopUserByPoints($limit);
    }

    
}
