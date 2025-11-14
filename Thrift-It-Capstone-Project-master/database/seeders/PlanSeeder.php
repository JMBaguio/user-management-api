<?php

namespace Database\Seeders;
use App\Models\Plan;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $plans = [
            [
                'name' => 'Starter Rack',
                'stripe_plan_id' => 'prod_T4nVT7WiXSJe56',
                'stripe_price_id' => 'price_1S8du4L7IAkQRknTmXfVczWh',
            ],
            [
                'name' => 'Bargain Shelf',
                'stripe_plan_id' => 'prod_T4nWTcrGuqLsx7',
                'stripe_price_id' => 'price_1S8dveL7IAkQRknTkZXNOCQD',
            ],
            [
                'name' => 'Vintage Vault',
                'stripe_plan_id' => 'prod_T4nWhIZz4Y2Aja',
                'stripe_price_id' => 'price_1S8dvtL7IAkQRknToeFKnu9c',
            ],
        ];

        foreach ($plans as $plan) {
          Plan::create($plan);
        }
    }
}
