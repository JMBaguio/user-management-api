<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreQueryRequest;
use Illuminate\Http\Request;
use App\Services\SearchService;


class SearchController extends Controller
{

    protected $searchService;

    public function __construct(SearchService $searchService)
    {
        $this->searchService = $searchService;
    }
    public function index(StoreQueryRequest $request)
    {

        $query = $request->input('query');
    
        $products = collect();
        $users = collect();

        if ($query) {
            $results = $this->searchService->perform_search($query);
            $products = $results['products'];
            $users = $results['users'];
        }        
        return view('search', compact('products', 'users', 'query'));
    }
    
}

