<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use Barryvdh\DomPDF\Facade\Pdf;

class AdminReportController extends Controller
{
    public function index(): View
    {
        $reports = Report::with(['reporter', 'reportedUser'])
            ->latest()
            ->paginate(10);

        return view('admin.reports.index', compact('reports'));
    }

    public function show(Report $report): View
    {
        $report->load(['reporter', 'reportedUser']);
        return view('admin.reports.show', compact('report'));
    }

    public function update(Request $request, Report $report): RedirectResponse
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,resolved,rejected',
            'admin_notes' => 'nullable|string|max:1000'
        ]);

        $report->update($validated);

        return redirect()->route('admin.reports.index', $report)
            ->with('success', 'Report status updated successfully.');
    }

    public function destroy(Report $report): RedirectResponse
    {
        $report->delete();

        return redirect()->route('admin.reports.index')
            ->with('success', 'Report deleted successfully.');
    }

    public function exportAllPdf()
    {
        // Gather key dashboard data
        $users = User::select('id','fname','lname','email','created_at')->latest()->get();
        $products = Product::with(['user','category'])
            ->select('id','user_id','name','price','status','created_at','category_id')
            ->latest()->get();
        $reports = Report::with(['reporter','reportedUser'])
            ->latest()->get();

        // Monthly sales (current year)
        $year = now()->year;
        $monthlySales = Product::where('status', 'sold')
            ->whereYear('created_at', $year)
            ->selectRaw('MONTH(created_at) as month, COUNT(*) as total_products, SUM(price) as total_sales')
            ->groupBy('month')
            ->orderBy('month')
            ->get()
            ->keyBy('month');

        $data = compact('users','products','reports','monthlySales','year');

        $pdf = Pdf::loadView('admin.reports.all-export', $data)->setPaper('a4', 'portrait');
        return $pdf->download('admin-export.pdf');
    }
} 