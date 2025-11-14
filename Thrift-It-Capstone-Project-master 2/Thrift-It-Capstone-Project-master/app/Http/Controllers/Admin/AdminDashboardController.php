<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Report;
use App\Models\User;
use App\Models\Categories;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class AdminDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
        $this->middleware('rolemiddleware:admin');
    }

    public function index(): View
    {
        // ======== Basic Stats ========
        $stats = [
            'total_users' => User::count(),
            'total_products' => Product::count(),
            'total_products_sold' => Product::where('status', 'sold')->count(),
            'pending_reports' => Report::where('status', 'pending')->count(),
            'active_listings' => Product::where('status', 'active')->count(),
            'new_users_today' => User::whereDate('created_at', today())->count(),
            'new_products_today' => Product::whereDate('created_at', today())->count(),
        ];

        // ======== Recent Records ========
        $recentReports = Report::with(['reporter', 'reportedUser'])
            ->latest()->take(5)->get();

        $recentProducts = Product::with(['user', 'category'])
            ->latest()->take(5)->get();

        // ======== Monthly & Yearly Sales ========
        $salesMonths = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
        $salesData = [];
        $monthlySalesDetails = [];

        foreach(range(1,12) as $month) {
            $monthlyProducts = Product::with(['user','category'])
                ->where('status','sold')
                ->whereMonth('created_at',$month)
                ->get();

            $monthlyTotal = $monthlyProducts->sum('price');
            $salesData[] = $monthlyTotal;

            $monthlySalesDetails[$month] = [
                'total_sales' => $monthlyTotal,
                'total_products' => $monthlyProducts->count(),
                'products' => $monthlyProducts,
                'month_name' => $salesMonths[$month-1]
            ];
        }

        $yearlySalesSummary = Product::where('status','sold')
            ->select(
                DB::raw('MONTH(created_at) as month'),
                DB::raw('COUNT(*) as total_products'),
                DB::raw('SUM(price) as total_sales')
            )
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        // ======== Revenue Growth ========
        $currentMonthRevenue = Product::where('status','sold')
            ->whereYear('created_at', now()->year)
            ->whereMonth('created_at', now()->month)
            ->sum('price');

        $lastMonthDate = now()->subMonth();
        $lastMonthRevenue = Product::where('status','sold')
            ->whereYear('created_at', $lastMonthDate->year)
            ->whereMonth('created_at', $lastMonthDate->month)
            ->sum('price');

        $revenueGrowth = $lastMonthRevenue > 0
            ? (($currentMonthRevenue - $lastMonthRevenue)/$lastMonthRevenue)*100
            : ($currentMonthRevenue > 0 ? 100 : 0);

        // ======== Report Analytics ========
        $reportCategories = ['Spam','Inappropriate Content','Scam','Harassment','Other'];
        $reportCounts = [
            Report::where('reason','Spam')->count(),
            Report::where('reason','Inappropriate Content')->count(),
            Report::where('reason','Scam')->count(),
            Report::where('reason','Harassment')->count(),
            Report::where('reason','Other')->count(),
        ];

        $statusCounts = [
            'pending' => Report::where('status','pending')->count(),
            'resolved' => Report::where('status','resolved')->count(),
            'rejected' => Report::where('status','rejected')->count(),
        ];

        // ======== Top Categories ========
        $topCategories = Categories::withCount('products')
            ->orderBy('products_count','desc')
            ->take(5)
            ->get();

        // ======== New Additions: Seller Analytics ========
        $topSellers = User::withCount(['products as sold_products_count' => function($query){
                $query->where('status','sold');
            }])
            ->withSum(['products as total_revenue' => function($query){
                $query->where('status','sold');
            }], 'price')
            ->orderByDesc('total_revenue')
            ->take(5)
            ->get();

        // ======== New Additions: Category Sales Analytics ========
        $categorySales = Categories::withCount(['products as sold_count' => function($q){
                $q->where('status','sold');
            }])
            ->withSum(['products as revenue' => function($q){
                $q->where('status','sold');
            }], 'price')
            ->orderByDesc('revenue')
            ->get();

        return view('admin.dashboard', compact(
            'stats',
            'recentReports',
            'recentProducts',
            'salesMonths',
            'salesData',
            'reportCategories',
            'reportCounts',
            'statusCounts',
            'topCategories',
            'monthlySalesDetails',
            'yearlySalesSummary',
            'currentMonthRevenue',
            'lastMonthRevenue',
            'revenueGrowth',
            'topSellers',
            'categorySales'
        ));
    }
}
