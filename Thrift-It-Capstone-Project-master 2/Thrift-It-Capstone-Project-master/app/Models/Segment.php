<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Segment extends Model
{
      use HasFactory;

  protected $fillable = [
    'name'];

    public function products()
    {
        return $this->hasMany(Product::class,'segment_id');
    }
}
