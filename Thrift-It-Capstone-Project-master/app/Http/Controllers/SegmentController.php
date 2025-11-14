<?php

namespace App\Http\Controllers;

use App\Models\Segment;
use App\Models\Categories;
use App\Models\Barangay;
use Illuminate\Http\Request;
use App\Services\ProductService;

class SegmentController extends Controller
{


    protected $productService;
    
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function show(Request $request, Segment $segment)
    {
        $selectedCategoryId = $request->query('category');
        $selectedBarangayId = $request->query('barangay');
        $products = $this->productService->getApprovedProductsBySegment($segment, $selectedCategoryId ? (int)$selectedCategoryId : null, $selectedBarangayId ? (int)$selectedBarangayId : null);
        $categories = Categories::all();
        $barangays = Barangay::all();

        // Use different views based on segment name (more flexible)
        $viewName = match(strtolower($segment->name)) {
            'women' => 'segments.show1',
            'men' => 'segments.show',
            'kids' => 'segments.show2',
            default => 'segments.show'
        };

        return view($viewName, compact('segment', 'products', 'categories', 'barangays', 'selectedCategoryId', 'selectedBarangayId'));
    }

    public function products(Request $request, Segment $segment)
    {
        $selectedCategoryId = $request->query('category');
        $selectedBarangayId = $request->query('barangay');
        $products = $this->productService->getApprovedProductsBySegment($segment, $selectedCategoryId ? (int)$selectedCategoryId : null, $selectedBarangayId ? (int)$selectedBarangayId : null);
        $html = view('segments.partials.products-grid', compact('products'))->render();
        return response()->json(['html' => $html]);
    }
}
