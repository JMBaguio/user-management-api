<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\User;
use App\Http\Requests\StoreReportsRequest;
use App\Http\Requests\IndexReportsRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Services\ReportService;

class ReportController extends Controller
{
    protected $reportService;

    public function __construct(ReportService $reportService)
    {
        $this->reportService = $reportService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(IndexReportsRequest $request): View
    {
        $search = $request->filled('search') ? $request->validated('search') : null;
        $status = $request->filled('status') ? $request->validated('status') : null;

        $reports = $this->reportService->getReportsByReporter(Auth::id(), $search, $status);

        return view('reports.index', compact('reports'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(User $user): View
    {
        $validation = $this->reportService->canUserReport(Auth::id(), $user->id);
        
        if (isset($validation['error'])) {
            abort(403, $validation['error']);
        }

        return view('reports.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReportsRequest $request, User $user): RedirectResponse
    {
        $result = $this->reportService->createReportWithValidation(Auth::id(), $user->id, $request->validated());

        if (isset($result['error'])) {
            return redirect()->back()->with('error', $result['error']);
        }

        return redirect()
            ->route('profile.show', $user)
            ->with('success', 'Report submitted successfully. Our team will review it shortly.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Report $report): View
    {
        $isAdmin = Auth::user()->role === 2;
        $accessCheck = $this->reportService->canUserAccessReport($report->id, Auth::id(), $isAdmin);

        if (isset($accessCheck['error'])) {
            abort(403, $accessCheck['error']);
        }

        $report = $this->reportService->getReportWithRelations($report->id);

        return view('reports.show', compact('report'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Report $report)
    {
        $isAdmin = Auth::user()->role === 2;
        
        $validated = $request->validate([
            'status' => 'required|in:pending,rejected,resolved',
            'admin_notes' => 'nullable|string',
        ]);

        $result = $this->reportService->updateReportWithUserManagement($report->id, $validated, $isAdmin);

        if (isset($result['error'])) {
            abort(403, $result['error']);
        }

        return redirect()->route('reports.show', $report)
            ->with('success', 'Report updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Report $report): RedirectResponse
    {
        $isAdmin = Auth::user()->role === 2;
        $accessCheck = $this->reportService->canUserAccessReport($report->id, Auth::id(), $isAdmin);

        if (isset($accessCheck['error'])) {
            abort(403, $accessCheck['error']);
        }

        $this->reportService->deleteReport($report->id);

        return redirect()
            ->route('reports.index')
            ->with('success', 'Report deleted successfully.');
    }
} 