<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barangay extends Model
{
    protected $table = 'barangays';
    protected $fillable = ['name'];

    public function products()
    {
        return $this->hasMany(Product::class, 'barangay_id');
    }

    public function users()
    {
        return $this->hasMany(User::class, 'barangay_id');
    }

    public function donations()
    {
        return $this->hasMany(Donation::class, 'barangay_id');
    }
}
