<?php

namespace App\Repositories;

use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class ReviewRepository
{
    public function all()
    {
        return Review::all();
    }

    public function find($id)
    {
        return Review::findOrFail($id);
    }

    public function create(array $data)
    {
        return Review::create($data);
    }

    public function update(Review $review, array $data)
    {
        $review->update($data);
        return $review;
    }

    // public function delete(Review $review)
    // {
    //     return $review->delete();
    // }

    public function getSubmittedReviews($userId)
    {
        return Review::with('user')->where('user_id', $userId)->get();
    }
 
    public function updateById($reviewid, array $data)
    {
        $review = Review::findOrFail($reviewid);
        $review->update($data);
        return $review;
    }
}
