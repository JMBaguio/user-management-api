<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Http\Requests\StoreCategoriesRequest;
use App\Http\Requests\UpdateCategoriesRequest;
use App\Services\CategoriesService;

class CategoriesController extends Controller
{
    protected $categoriesService;
    
    public function __construct(CategoriesService $categoriesService)
    {
        $this->categoriesService = $categoriesService;
    }
   
    public function index()
    {
       $data = $this->categoriesService->getAllCategories();
      
       $categories = $data['categories'];

        return view('categories.index', [
            'categories' => $categories,
        ]);

    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(StoreCategoriesRequest $request)
    {
        $data = $request->validated();
        $this->categoriesService->createCategories($data);
        return redirect()->route('categories.index');
        
    }

    public function show(Categories $category)
    {
        $products = $category->products()->where('status', 'available')->get();

        return view('categories.show', [
            'category' => $category,
            'products' => $products,
        ]);
    }

    public function edit(Categories $category)
    {
        return view('categories.edit', [
            'category' => $category
        ]);
    }

    public function update(UpdateCategoriesRequest $request, Categories $category)
    {
        $data = $request->validated();
        
        $this->categoriesService->updateCategories($category, $data);
        return redirect()->route('categories.index')
                                        ->with('success','Category updated successfully!');
    }

    public function destroy(Categories $category)
    {
       $this->categoriesService->deleteCategories($category->id);
        return redirect()->back();
    }
}