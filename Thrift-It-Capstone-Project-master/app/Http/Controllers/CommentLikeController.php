<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\CommentLike;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentLikeController extends Controller
{
    public function toggleLike(Request $request, $commentId)
    {
        $comment = Comment::findOrFail($commentId);
        $userId = Auth::id();

        // Check if user already liked this comment
        $existingLike = CommentLike::where('user_id', $userId)
            ->where('comment_id', $commentId)
            ->first();

        if ($existingLike) {
            // Unlike the comment
            $existingLike->delete();
            $isLiked = false;
        } else {
            // Like the comment
            CommentLike::create([
                'user_id' => $userId,
                'comment_id' => $commentId,
                'reaction_type' => $request->input('reaction_type', 'like')
            ]);
            $isLiked = true;
        }

        $likesCount = $comment->likes()->count();

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'is_liked' => $isLiked,
                'likes_count' => $likesCount
            ]);
        }

        return redirect()->back();
    }

    public function getReactions($commentId)
    {
        $comment = Comment::findOrFail($commentId);
        $reactions = $comment->likes()
            ->selectRaw('reaction_type, COUNT(*) as count')
            ->groupBy('reaction_type')
            ->get()
            ->pluck('count', 'reaction_type');

        return response()->json([
            'success' => true,
            'reactions' => $reactions
        ]);
    }
}
