<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Segment;

class SegmentSeeder extends Seeder
{
    public function run()
    {
        Segment::insert([
            ['name' => 'Men'],
            ['name' => 'Women'],
            ['name' => 'Kids'],
            ['name' => 'Unisex'],
        ]);
    }
}
