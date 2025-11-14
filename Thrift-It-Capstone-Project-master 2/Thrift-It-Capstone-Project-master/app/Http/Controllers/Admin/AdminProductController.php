<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ApprovalStatusProductUpdateRequest;
use App\Models\Product;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Services\ProductService;
use Illuminate\Support\Facades\Mail;
use App\Mail\ProductApprovedMail;
use App\Mail\ProductRejectedMail;
use App\Events\ProductStatusNotification;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;

class AdminProductController extends Controller
{

    protected $productService;
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }
    public function index(): View
    {
        $approvedProducts = $this->productService->getProductsByStatusPaginated('approved');
        $pendingProducts = $this->productService->getProductsByStatusPaginated('pending');
        $rejectedProducts = $this->productService->getProductsByStatusPaginated('rejected');

        return view('admin.products.index', compact('approvedProducts', 'pendingProducts','rejectedProducts'));
    }

    public function show(Product $product): View
    {
        $product->load(['user', 'category', 'comments.user','images']);
        return view('admin.products.show', compact('product'));
    }
    

    public function update(ApprovalStatusProductUpdateRequest $request, Product $product): RedirectResponse
    {
        $validated = $request->validated();
        $product->update($validated);

        return redirect()->route('admin.products.index')
            ->with('success', 'Product approval status updated successfully.');
    }
    
    public function edit(Product $product): View
    {
        $product->load(['user', 'category']);
        return view('admin.products.edit', compact('product'));
    }


    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();

        return redirect()->route('admin.products.index')
            ->with('success', 'Product deleted successfully.');
    }

    public function approve(Product $product): RedirectResponse
    {
        $this->productService->updateProduct($product, ['approval_status' => 'approved']);
        //email user once product is approved
         Mail::to($product->user->email)->send(new ProductApprovedMail($product));

             // Save notification in DB
        Notification::create([
            'user_id' => $product->user_id,
            'type' => 'product_status',
            'data' => [
                'status' => 'approved',
                'product_id' => $product->id,
                'message' => 'Your product has been approved!'
            ],
        ]);

        // Broadcast real-time notification
        broadcast(new ProductStatusNotification($product, $product->user_id, 'approved'))->toOthers();

        return redirect()->route('admin.products.index')
            ->with('success', 'Product approved successfully.');
    }

    public function reject(Product $product): RedirectResponse
    {
        $this->productService->updateProduct($product, ['approval_status' => 'rejected']);
        Mail::to($product->user->email)->send(new ProductRejectedMail($product));

             // Save notification in DB
        Notification::create([
            'user_id' => $product->user_id,
            'type' => 'product_status',
            'data' => [
                'status' => 'rejected',
                'product_id' => $product->id,
                'message' => 'Your product has been rejected!'
            ],
        ]);

        // Broadcast real-time notification
    broadcast(new ProductStatusNotification($product, $product->user_id, 'rejected'))->toOthers();

        return redirect()->route('admin.products.index')
            ->with('error', 'Product rejected!.');
    }


    
} 