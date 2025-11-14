<?php

namespace App\Repositories;

use App\Models\Report;

class ReportRepository
{
    public function all()
    {
        return Report::all();
    }

    public function find($id)
    {
        return Report::findOrFail($id);
    }

    public function create(array $data)
    {
        return Report::create($data);
    }

    public function update(Report $report, array $data)
    {
        $report->update($data);
        return $report;
    }

    public function delete(Report $report)
    {
        return $report->delete();
    }

    public function getByReporter($reporterId)
    {
        return Report::with(['reporter', 'reportedUser'])
            ->where('reporter_id', $reporterId)
            ->latest()
            ->paginate(10);
    }

    public function getByReporterWithFilters($reporterId, $search = null, $status = null)
    {
        $query = Report::with(['reporter', 'reportedUser'])
            ->where('reporter_id', $reporterId);

        if ($search) {
            $query->whereHas('reportedUser', function ($q) use ($search) {
                $q->where('fname', 'like', "%{$search}%")
                  ->orWhere('lname', 'like', "%{$search}%");
            });
        }

        if ($status) {
            $query->where('status', $status);
        }

        return $query->latest()->paginate(10);
    }

    public function findExistingPendingReport($reporterId, $reportedUserId)
    {
        return Report::where('reporter_id', $reporterId)
            ->where('reported_user_id', $reportedUserId)
            ->where('status', 'pending')
            ->first();
    }

    public function findWithRelations($id)
    {
        return Report::with(['reporter', 'reportedUser'])->findOrFail($id);
    }
} 