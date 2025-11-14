<?php

namespace App\Repositories;

use App\Models\Categories;

class CategoriesRepository
{

    public function all()
    {
        return Categories::all();
    }

    public function find($id)
    {
        return Categories::findOrFail($id);
    }

    public function create(array $data)
    {
        return Categories::create($data);
    }


    public function update(Categories $categories, array $data)
    {
        $categories->update($data);
        return $categories;
    }

    public function delete(Categories $categories)
    {
        return $categories->delete();
    }
}