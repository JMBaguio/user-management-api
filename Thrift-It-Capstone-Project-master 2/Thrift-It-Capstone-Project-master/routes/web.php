<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\UpcyclerController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CommentLikeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminReportController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\AdminDonationController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\PrivateChatController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\LeaderboardController;
use App\Http\Controllers\SegmentController;
use App\Http\Controllers\PricingController;
use App\Http\Controllers\EcoPostController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\WorkController;

use App\Models\Notification;
use Illuminate\Support\Facades\Auth;



Route::get('/search', [SearchController::class, 'index'])->name('search');
Route::get('/', [LandingPageController::class, 'index'])->name('landing.index');
Route::get('/products', [LandingPageController::class, 'products'])->name('landing.products');

Route::get('/dashboard', [UserDashboardController::class, 'index'])
    ->middleware(['auth', 'verified', 'rolemiddleware:user'])
    ->name('dashboard');
Route::get('/dashboard/products', [UserDashboardController::class, 'products'])
    ->middleware(['auth', 'verified', 'rolemiddleware:user'])
    ->name('dashboard.products');

Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])
    ->middleware(['auth', 'verified', 'rolemiddleware:admin'])
    ->name('admin.dashboard');
Route::get('/admin/export', [AdminReportController::class, 'exportAllPdf'])
    ->middleware(['auth', 'verified', 'rolemiddleware:admin'])
    ->name('admin.export.pdf');
    
Route::get('upcycler/dashboard', function () {
    return view('upcycler');})
    ->middleware(['auth', 'verified','rolemiddleware:upcycler'])
    ->name('upcycler');


//to make sure only a verified user can access the user routes, 
Route::middleware(['auth', 'verified', 'rolemiddleware:user'])->group(function () {
    Route::get('appointments/myAppointments', [AppointmentController::class, 'myAppointments'])->name('appointments.myAppointments');
    Route::resource('products', ProductController::class);
    Route::resource('categories', CategoriesController::class);
    Route::resource('appointments', AppointmentController::class);
    Route::resource('comments', CommentController::class);
    Route::post('comments/{comment}/like', [CommentLikeController::class, 'toggleLike'])->name('comments.like');
    Route::get('comments/{comment}/reactions', [CommentLikeController::class, 'getReactions'])->name('comments.reactions');
    Route::get('/donation-hub', [DonationController::class, 'getAllDonations'])->name('donations.hub');
    Route::resource('donations',DonationController::class);
    Route::resource('segments', SegmentController::class)->only(['show']);
    Route::get('segments/{segment}/products', [SegmentController::class, 'products'])->name('segments.products');
    Route::resource(('eco-posts'), EcoPostController::class);

    Route::patch('/appointments/{appointment}/cancel', [AppointmentController::class, 'cancel'])->name('appointments.cancel');
    Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
    Route::get('/users/{user}/report', [ReportController::class, 'create'])->name('reports.create');
    Route::post('/users/{user}/report', [ReportController::class, 'store'])->name('reports.store');
    Route::get('/reviews',[ReviewController::class,'index'])->name('reviews.index');
    Route::get('reviews/{review}',[ReviewController::class,'show'])->name('reviews.show');
    Route::get('/users/{user}/review',[ReviewController::class,'create'])->name('reviews.create');
    Route::post('/users/{user}/review',[ReviewController::class,'store'])->name('reviews.store');
    Route::get('/leaderboard', [LeaderboardController::class, 'index'])
    ->name('leaderboard.index');

    Route::post('/notifications/read', function () {
            Notification::where('user_id', Auth::id())
            ->where('is_read', false)
            ->update(['is_read' => true]);

        return response()->json(['status' => 'ok']);
    })->name('notifications.read');


    Route::post('/orders/{product}', [OrderController::class, 'store'])->name('orders.store');
    Route::patch('/orders/{order}/{status}', [OrderController::class, 'updateStatus'])
    ->name('orders.updateStatus');

});

//Upcycler Routes
Route::middleware(['auth', 'verified', 'rolemiddleware:upcycler'])->group(function () {
    Route::resource('upcycler', UpcyclerController::class);
    Route::resource('works', WorkController::class)->except(['show']);

});

// Admin Routes
Route::middleware(['auth', 'verified', 'rolemiddleware:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::resource('reports', AdminReportController::class);
    Route::resource('users', AdminUserController::class);
    Route::resource('products', AdminProductController::class);
    Route::resource('donations', AdminDonationController::class);

    // Sales Report Routes
    Route::get('/sales/monthly-report/{month}', [App\Http\Controllers\Admin\SalesReportController::class, 'generateMonthlyReport'])->name('sales.monthly-report');
    Route::get('/sales/yearly-report', [App\Http\Controllers\Admin\SalesReportController::class, 'generateYearlyReport'])->name('sales.yearly-report');
    Route::get('/sales/monthly-export/{month}', [App\Http\Controllers\Admin\SalesReportController::class, 'exportMonthlyDataPdf'])->name('sales.monthly-export');
   
    //approve and reject product
    Route::put('/products/{product}/approve', [AdminProductController::class, 'approve'])
    ->name('products.approve');
    Route::put('/products/{product}/reject', [AdminProductController::class, 'reject'])
    ->name('products.reject');
 
        //approve and reject donations
    Route::put('/donations/{donation}/approve', [AdminDonationController::class, 'approve'])
    ->name('donations.approve');
    Route::put('/donations/{donation}/reject', [AdminDonationController::class, 'reject'])
    ->name('donations.reject');

    //verify donations and add points to donor/user
    Route::get('/donations/reward-management', [AdminDonationController::class, 'rewardManagement'])->name('donations.rewardManagement');
    Route::put('/donations/{donation}/verify', [AdminDonationController::class, 'verifyProof'])
        ->name('donations.verifyProof');
    Route::put('/donations/{donation}/reject-proof', [AdminDonationController::class, 'rejectProof'])->name('donations.rejectProof');

    //verify -reject user
    Route::put('/users/{user}/verify', [AdminUserController::class, 'verify'])->name('users.verify');
    Route::put('/users/{user}/reject', [AdminUserController::class, 'reject'])->name('users.reject');

    // Route::post('/admin/users/{user}/verify', [\App\Http\Controllers\Admin\AdminUserController::class, 'verify'])
    //     ->name('admin.users.verify');

});

//Global Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/profile/password', [ProfileController::class, 'edit1'])->name('profile.edit1');
    Route::get('/profile/data-privacy', [ProfileController::class, 'edit2'])->name('profile.edit2');
    Route::get('/profile/{user}', [ProfileController::class, 'show'])->name('profile.show');

    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //routes to show

    Route::get('/messages', [PrivateChatController::class, 'index'])->name('messages.index');
    Route::get('/private-chat/{user}', [PrivateChatController::class, 'show'])->name('private.chat');
    Route::post('/private-chat/{user}/send', [PrivateChatController::class, 'send'])->name('private.chat.send');

    //upload verification document user/upcycler 
     Route::post('/profile/verification-document', [ProfileController::class, 'uploadVerificationDocument'])
        ->name('profile.verification.upload');

    //show works globally
    Route::get('/works/{id}/view', [WorkController::class, 'show'])->name('works.show');

    //mark item as sold
    Route::put('/products/{product}/mark-as-sold', [ProductController::class, 'markAsSold'])
    ->name('products.markAsSold');   

        //mark item as sold
    Route::put('/donations/{donation}/mark-as-donated', [DonationController::class, 'markAsDonated'])
    ->name('donations.markAsDonated');   

    //route for pricing page
    Route::get('/pricing', [PricingController::class, 'index'])->name('pricing.index');

    //route for cehckout
    Route::get('/checkout/{name}', [App\Http\Controllers\CheckoutController::class, 'checkout'])->name('checkout');
    Route::get('/checkout-success', [App\Http\Controllers\CheckoutController::class, 'success'])->name('checkout.success');
    
    // // Notification routes
    // Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
    // Route::get('/notifications/count', [NotificationController::class, 'count'])->name('notifications.count');
    // Route::patch('/notifications/{id}/read', [NotificationController::class, 'markAsRead'])->name('notifications.read');
    // Route::patch('/notifications/mark-all-read', [NotificationController::class, 'markAllAsRead'])->name('notifications.mark-all-read');
 
});


Route::get('/sell-item/qr/{product}', [ProductController::class, 'qrStep'])->name('sell-item.qr');
Route::post('/sell-item/qr/{product}', [ProductController::class, 'storeQr'])->name('sell-item.qr.store');
Route::get('/sell-item/qr/{product}/skip', [ProductController::class, 'skipQr'])->name('sell-item.qr.skip');

// Step 3: Final review / finalize product
Route::get('/sell-item/final/{product}', [ProductController::class, 'finalStep'])->name('sell-item.final');
Route::post('/sell-item/final/{product}', [ProductController::class, 'finalize'])->name('sell-item.finalize');


require __DIR__.'/auth.php';
