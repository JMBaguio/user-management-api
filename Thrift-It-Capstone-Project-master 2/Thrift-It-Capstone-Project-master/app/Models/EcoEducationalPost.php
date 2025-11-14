<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EcoEducationalPost extends Model
{
    protected $fillable = [
        'title',
        'content',
        'image',
        'video_link',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
