<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Donation;
use App\Models\Categories;
use App\Models\Barangay;
use App\Models\Segment;

class UserDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $selectedCategoryId = $request->query('category');
        $selectedBarangayId = $request->query('barangay');

        $query = Product::with(['category', 'user', 'barangay'])
            ->where('status', 'available')
            ->where('approval_status', 'approved')
            ->leftJoin('users', 'products.user_id', '=', 'users.id')
            ->leftJoin('subscriptions', function ($join) {
                $join->on('users.id', '=', 'subscriptions.user_id')
                     ->whereNull('subscriptions.ends_at'); // Active subscription
            })
            ->select('products.*')
            ->orderByRaw('CASE WHEN subscriptions.id IS NOT NULL THEN 0 ELSE 1 END');

        if ($selectedCategoryId) {
            $query->where('category_id', $selectedCategoryId);
        }

        if ($selectedBarangayId) {
            $query->where('barangay_id', $selectedBarangayId);
        }

        $products = $query->paginate(10);

        $donations = Donation::with(['user', 'category'])
            ->where('status', 'available')
            ->get();

        $segments = Segment::all();
        $categories = Categories::all();
        $barangays = Barangay::all();

        return view('dashboard', compact(
            'products',
            'donations',
            'segments',
            'categories',
            'barangays',
            'selectedCategoryId',
            'selectedBarangayId'
        ));
    }

    /**
     * Get filtered products for AJAX requests
     */
    public function products(Request $request)
    {
        $selectedCategoryId = $request->query('category');
        $selectedBarangayId = $request->query('barangay');

        $query = Product::with(['category', 'user', 'barangay', 'images'])
            ->where('status', 'available')
            ->where('approval_status', 'approved')
            ->leftJoin('users', 'products.user_id', '=', 'users.id')
            ->leftJoin('subscriptions', function ($join) {
                $join->on('users.id', '=', 'subscriptions.user_id')
                     ->whereNull('subscriptions.ends_at');
            })
            ->select('products.*')
            ->orderByRaw('CASE WHEN subscriptions.id IS NOT NULL THEN 0 ELSE 1 END');

        if ($selectedCategoryId) {
            $query->where('category_id', $selectedCategoryId);
        }

        if ($selectedBarangayId) {
            $query->where('barangay_id', $selectedBarangayId);
        }

        $products = $query->paginate(10);

        $html = view('dashboard.partials.products-grid', compact('products'))->render();
        return response()->json(['html' => $html]);
    }
}
