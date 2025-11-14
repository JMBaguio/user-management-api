<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Response;
use Barryvdh\DomPDF\Facade\Pdf;

class SalesReportController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
        $this->middleware('rolemiddleware:admin');
    }

    public function generateMonthlyReport($month)
    {
        $monthName = Carbon::create()->month((int)$month)->format('F');
        $year = Carbon::now()->year;

        $products = Product::with(['user', 'category'])
            ->where('status', 'sold')
            ->whereMonth('created_at', (int)$month)
            ->whereYear('created_at', $year)
            ->get();

        $totalSales = $products->sum('price');
        $totalProducts = $products->count();

        $html = View::make('admin.reports.monthly-sales', [
            'products' => $products,
            'monthName' => $monthName,
            'year' => $year,
            'totalSales' => $totalSales,
            'totalProducts' => $totalProducts
        ])->render();

        return Response::make($html, 200, [
            'Content-Type' => 'text/html',
            'Content-Disposition' => "inline; filename=sales-report-{$monthName}-{$year}.html"
        ]);
    }

    public function generateYearlyReport()
    {
        $year = Carbon::now()->year;
        $monthlyData = [];

        for ($month = 1; $month <= 12; $month++) {
            $products = Product::with(['user', 'category'])
                ->where('status', 'sold')
                ->whereMonth('created_at', $month)
                ->whereYear('created_at', $year)
                ->get();

            $monthlyData[$month] = [
                'month' => Carbon::create()->month($month)->format('F'),
                'products' => $products,
                'totalSales' => $products->sum('price'),
                'totalProducts' => $products->count()
            ];
        }

        $html = View::make('admin.reports.yearly-sales', [
            'monthlyData' => $monthlyData,
            'year' => $year
        ])->render();

        return Response::make($html, 200, [
            'Content-Type' => 'text/html',
            'Content-Disposition' => "inline; filename=sales-report-{$year}.html"
        ]);
    }

    /**
     * Export combined monthly data (users, upcyclers, sold products) as PDF
     */
    public function exportMonthlyDataPdf(int $month)
    {
        $year = Carbon::now()->year;
        $month = (int) $month;
        $monthName = Carbon::create()->month($month)->format('F');

        // Users registered in the month
        $users = User::select('id','fname','lname','email','role','created_at')
            ->whereYear('created_at', $year)
            ->whereMonth('created_at', $month)
            ->orderBy('created_at','desc')
            ->get();

        // Upcyclers are users with role = 1
        $upcyclers = User::select('id','fname','lname','email','created_at')
            ->where('role', 1)
            ->whereYear('created_at', $year)
            ->whereMonth('created_at', $month)
            ->orderBy('created_at','desc')
            ->get();

        // Sold products in the month
        $products = Product::with(['user','category'])
            ->select('id','user_id','name','price','status','created_at','category_id')
            ->where('status','sold')
            ->whereYear('created_at', $year)
            ->whereMonth('created_at', $month)
            ->orderBy('created_at','desc')
            ->get();

        $data = compact('users','upcyclers','products','monthName','year');

        $pdf = Pdf::loadView('admin.reports.monthly-export', $data)->setPaper('a4','portrait');
        return $pdf->download("monthly-export-{$monthName}-{$year}.pdf");
    }
} 