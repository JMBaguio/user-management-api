<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plan;

class CheckoutController extends Controller
{
    //

    public function checkout($name,Request $request)
    {
       $plan = Plan::whereName($name)->first();
       $planPrice = $plan->stripe_price_id;

       return $request->user()
        ->newSubscription('default', $planPrice)
        ->trialDays(5)
        ->allowPromotionCodes()
        ->checkout([
            'success_url' => route('checkout.success'),
            'cancel_url' => route('dashboard'),
        ]);
    }

    public function success(Request $request)
    {
        return view('checkout.success');
    }
}
