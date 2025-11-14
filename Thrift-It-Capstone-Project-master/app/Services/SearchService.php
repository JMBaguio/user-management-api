<?php

namespace App\Services;

use App\Repositories\SearchRepository;

class SearchService
{
    protected $searchRepository;

    public function __construct(SearchRepository $searchRepository)
    {
        $this->searchRepository = $searchRepository;
    }

    public function perform_search(string $query)
    {
        return [
            'products' => $this->searchRepository->searchProducts($query),
            'users' => $this->searchRepository->searchUsers($query),
        ];
    }
}