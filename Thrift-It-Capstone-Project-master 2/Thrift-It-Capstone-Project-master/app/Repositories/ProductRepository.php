<?php

namespace App\Repositories;

use App\Models\Product;
use App\Models\Segment;

class ProductRepository
{
    public function all()
    {
        return Product::all();
    }

    public function find($id)
    {
        return Product::findOrFail($id);
    }

    public function create(array $data)
    {
        return Product::create($data);
    }

    public function update(Product $product, array $data)
    {
        $product->update($data);
        return $product;
    }

    public function delete(Product $product)
    {
        return $product->delete();
    }

    public function getByUser($userId)
    {
        return Product::where('user_id', $userId)->get();
    }

    public function findWithRelations($id)
    {
        return Product::with(['user','category','comments.user'])->findOrFail($id);
    }

   public function getApproveProducts(Segment $segment, ?int $categoryId = null, ?int $barangayId = null)
    {
        $query = $segment->products()
            ->where('approval_status', 'approved')
            ->where('status', 'available')
            ->with(['category', 'images']);

        if ($categoryId) {
            $query->where('category_id', $categoryId);
        }

        if ($barangayId) {
            $query->where('barangay_id', $barangayId);
        }

        return $query->get();
    }


   public function getByStatusPaginated(string $status, int $perPage = 10)
    {
        return Product::with(['user', 'category'])
            ->where('approval_status', $status)  
            ->latest()
            ->paginate($perPage);
    }

    //get more product of the user excluding the current product
    public function getMoreByUser($userId, $excludeProductId, $limit = 6)
    {
        return Product::where('user_id', $userId)
            ->where('id', '!=', $excludeProductId)
            ->latest()
            ->take($limit)
            ->get();
    }
}
