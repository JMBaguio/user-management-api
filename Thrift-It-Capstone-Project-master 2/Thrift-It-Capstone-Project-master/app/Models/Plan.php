<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    

    protected $fillable = [
        'name',
        'stripe_plan_id',
        'stripe_priced_id',
    ];
}
