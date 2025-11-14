<?php

namespace App\Repositories;

use App\Models\Comment;

class CommentRepository
{
    public function all()
    {
        return Comment::all();
    }

    public function find($id)
    {
        return Comment::findOrFail($id);
    }

    public function create(array $data)
    {
        return Comment::create($data);
    }
    

    public function update(Comment $comment, array $data)
    {
        $comment->update($data);
        return $comment;
    }

    public function delete(Comment $comment)
    {
        return $comment->delete();
    }

    public function getByUser($userId)
    {
        return Comment::with('upcycler')->where('user_id', $userId)->get();
    }

    public function getByProduct($productId)
    {
        return Comment::where('product_id', $productId)->get();
    }

    public function findWithRelations($id)
    {
        return Comment::with(['user', 'product'])->findOrFail($id);
    }
}
