<?php

namespace App\Http\Controllers;

use App\Services\LeaderboardService;

class LeaderboardController extends Controller
{
    protected $leaderboardService;

    public function __construct(LeaderboardService $leaderboardService)
    {
        $this->leaderboardService = $leaderboardService;
    }

    public function index()
    {
        $leaders = $this->leaderboardService->getTopDonors(10);
        $pointLeaders = $this->leaderboardService->getTopOverall(10);
    
        return view('leaderboard.index', compact('leaders','pointLeaders'));
    }
}
