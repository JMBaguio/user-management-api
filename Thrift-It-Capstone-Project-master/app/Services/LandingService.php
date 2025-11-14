<?php

namespace App\Services;

use App\Repositories\LandingRepository;


class LandingService{
    protected $landingRepository;
    
    public function __construct(LandingRepository $landingRepository)
    {
        $this->landingRepository = $landingRepository;
    }

    public function getLandingData()
    {
        $data = $this->landingRepository->index();
        return $data;
    }
}

