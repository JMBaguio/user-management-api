<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Review extends Model
{
    
    use HasFactory;

    protected $fillable = [

        'reviewer_id',
        'reviewed_user_id',
        'rating',
        'comment'

    ];

    public function reviewer()
    {
        return $this->belongsTo(User::class,'reviewer_id');
    }
    public function reviewedUser()
    {
        return $this->belongsTo(User::class,'reviewed_user_id');
    }
}
