<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Subscribed
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        if (! $user) {
            return redirect()->route('login')
                ->with('error', 'You need to log in first.');
        }

        // Count current listings
        $listingCount = $user->products()->count();

        // Default: free users get 5
        $limit = 5;

        // Adjust limit based on subscription product
        if ($user->subscribedToProduct('prod_T4nVT7WiXSJe56')) {
            // Starter Rack
            $limit = 10;
        } elseif ($user->subscribedToProduct('prod_T4nWTcrGuqLsx7')) {
            // Bargain Shelf
            $limit = 20;
        } elseif ($user->subscribedToProduct('prod_T4nWhIZz4Y2Aja')) {
            // Vintage Vault
            $limit = null; // Unlimited
        }

        // Enforce limit if not unlimited
        if ($limit !== null && $listingCount >= $limit) {
            return redirect()->route('pricing.index')
                ->with('error', 'You have reached your listing limit. Please upgrade your plan.');
        }

        return $next($request);
    }

}
