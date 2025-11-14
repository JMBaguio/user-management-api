<?php

namespace App\Services;

use App\Repositories\ReportRepository;
use App\Models\Report;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ReportService
{
    protected $reportRepository;

    public function __construct(ReportRepository $reportRepository)
    {
        $this->reportRepository = $reportRepository;
    }

    public function getReportsByReporter($reporterId, $search = null, $status = null)
    {
        return $this->reportRepository->getByReporterWithFilters($reporterId, $search, $status);
    }

    public function createReport(array $data)
    {
        return $this->reportRepository->create($data);
    }

    public function findReport($id)
    {
        return $this->reportRepository->find($id);
    }

    public function updateReport($reportId, array $data)
    {
        $report = $this->reportRepository->find($reportId);
        return $this->reportRepository->update($report, $data);
    }

    public function deleteReport($reportId)
    {
        $report = $this->reportRepository->find($reportId);
        return $this->reportRepository->delete($report);
    }

    public function canUserReport($reporterId, $reportedUserId)
    {
        if ($reporterId === $reportedUserId) {
            return ['error' => 'You cannot report yourself.'];
        }

        $existingReport = $this->reportRepository->findExistingPendingReport($reporterId, $reportedUserId);
        if ($existingReport) {
            return ['error' => 'You have already submitted a pending report for this user.'];
        }

        return ['success' => true];
    }

    public function createReportWithValidation($reporterId, $reportedUserId, array $data)
    {
        $validation = $this->canUserReport($reporterId, $reportedUserId);
        if (isset($validation['error'])) {
            return $validation;
        }

        $data['reporter_id'] = $reporterId;
        $data['reported_user_id'] = $reportedUserId;
        $data['status'] = 'pending';

        return $this->createReport($data);
    }

    public function updateReportWithUserManagement($reportId, array $data, $isAdmin = false)
    {
        if (!$isAdmin) {
            return ['error' => 'Unauthorized action.'];
        }

        return DB::transaction(function () use ($reportId, $data) {
            $report = $this->reportRepository->find($reportId);
            $updatedReport = $this->reportRepository->update($report, $data);

            // If report is resolved, disable the reported user's account
            if ($data['status'] === 'resolved') {
                $reportedUser = User::find($report->reported_user_id);
                if ($reportedUser) {
                    Log::info('Disabling user account', [
                        'user_id' => $reportedUser->id,
                        'report_id' => $report->id
                    ]);
                    
                    $result = $reportedUser->update(['is_active' => false]);
                    
                    Log::info('User account disabled result', [
                        'success' => $result,
                        'user_id' => $reportedUser->id
                    ]);
                }
            }

            return $updatedReport;
        });
    }

    public function canUserAccessReport($reportId, $userId, $isAdmin = false)
    {
        $report = $this->reportRepository->find($reportId);
        
        if ($report->reporter_id === $userId || $isAdmin) {
            return ['success' => true, 'report' => $report];
        }

        return ['error' => 'Unauthorized access to report.'];
    }

    public function getReportWithRelations($reportId)
    {
        return $this->reportRepository->findWithRelations($reportId);
    }
} 