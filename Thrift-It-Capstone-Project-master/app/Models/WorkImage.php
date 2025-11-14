<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class WorkImage extends Model
{
    use HasFactory;

    protected $fillable = ['work_id', 'image'];

    public function work()
    {
        return $this->belongsTo(Work::class);
    }

    public function getImageUrlAttribute()
    {
        return $this->image ? Storage::url($this->image) : asset('images/default-placeholder.png');
    }
}
