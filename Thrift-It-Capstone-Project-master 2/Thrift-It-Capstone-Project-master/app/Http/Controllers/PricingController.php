<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PricingController extends Controller
{
    
    public function index(Request $request)
    {
        return view('pricing.index');
    }
}
