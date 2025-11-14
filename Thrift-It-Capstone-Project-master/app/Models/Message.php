<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Message extends Model
{
    use HasFactory;
    //insert the line below
    protected $fillable = [
        'user_id',
        'receiver_id',
        'message',
        'image_path',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }
}



