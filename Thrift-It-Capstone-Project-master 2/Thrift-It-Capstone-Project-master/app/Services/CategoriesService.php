<?php

namespace App\Services;

use App\Models\Categories;
use App\Http\Requests\StoreCategoriesRequest;
use App\Http\Requests\UpdateCategoriesRequest;
use App\Repositories\CategoriesRepository;

class CategoriesService
{
    protected $categoriesRepository;

    public function __construct(CategoriesRepository $categoriesRepository)
    {
        $this->categoriesRepository = $categoriesRepository;
    }

    public function getAllCategories()
    {
        return  $this->categoriesRepository->all();
    
    }

    public function createCategories(array $data)
    {
        return $this->categoriesRepository->create($data);
    }

    public function updateCategories($category, array $data)
    {
        return $this->categoriesRepository->update($category, $data);
    }

    public function deleteCategories($categoryId)
    {
        $category = $this->categoriesRepository->find($categoryId);
        return $this->categoriesRepository->delete($category);
    }

 
}