<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Work extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'upcycle_type',
        'approval_status',
    ];

    // Each Work belongs to an Upcycler (User with role=1)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Automatically handle image uploads
    public function setImageAttribute($value)
    {
        if (is_file($value)) {
            $this->attributes['image'] = $value->store('works_images', 'public');
        } else {
            $this->attributes['image'] = $value;
        }
    }

    public function getImageUrlAttribute()
    {
        return $this->image ? Storage::url($this->image) : 'images/default-placeholder.png';
    }

    public function images()
    {
        return $this->hasMany(WorkImage::class);
    }

    public function getFirstImageAttribute()
    {
             /** @var \Illuminate\Filesystem\FilesystemAdapter $s3 */
        $s3 = Storage::disk('s3');

        $firstImage = $this->images->first()?->image;

        if ($firstImage) {
            return $s3->url($firstImage);
        }

        // Default placeholder image (hosted locally)
        return asset('images/default-placeholder.png');
    }
}
