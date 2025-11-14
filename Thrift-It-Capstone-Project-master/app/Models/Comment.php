<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable =[

        'user_id',
        'product_id',
        'donation_id',
        'parent_id',
        'content'
    ];

    // Disable query caching for this model
    protected $cacheFor = 0;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    
    public function donation()
    {
        return $this->belongsTo(Donation::class);
    }

    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id')->with('user');
    }

    public function likes()
    {
        return $this->hasMany(CommentLike::class);
    }

    public function userLikes()
    {
        return $this->hasMany(CommentLike::class)->where('user_id', auth()->id());
    }

    public function getLikesCountAttribute()
    {
        return $this->likes()->count();
    }

    public function getRepliesCountAttribute()
    {
        return $this->replies()->count();
    }
}