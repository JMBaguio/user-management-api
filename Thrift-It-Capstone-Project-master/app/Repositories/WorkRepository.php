<?php

namespace App\Repositories;

use App\Models\Work;

class WorkRepository
{
    protected $model;

    public function __construct(Work $work)
    {
        $this->model = $work;
    }

    // Get all works
    public function all()
    {
        return $this->model->all();
    }

    // Find work by ID
    public function find($id)
    {
        return $this->model->findOrFail($id);
    }

    // Find work with relations
    public function findWithRelations($id)
    {
        return $this->model->with(['user', 'images'])->findOrFail($id);
    }

    // Create a new work
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    // Update an existing work
    public function update(Work $work, array $data)
    {
        $work->update($data);
        return $work;
    }

    // Delete a work
    public function delete(Work $work)
    {
        return $work->delete();
    }

    // Get works of a specific user
    public function getByUser($userId)
    {
        return $this->model->where('user_id', $userId)
            ->with('images')
            ->latest()
            ->get();
    }

    // Get approved works optionally filtered by type or other criteria
    public function getApprovedWorks(?string $type = null)
    {
        $query = $this->model->where('approval_status', 'approved')->with('images', 'user')->latest();

        if ($type) {
            $query->where('type', $type);
        }

        return $query->get();
    }

    // Paginated works by status
    public function getByStatusPaginated(string $status, int $perPage = 10)
    {
        return $this->model->with(['user', 'images'])
            ->where('approval_status', $status)
            ->latest()
            ->paginate($perPage);
    }

    // Get more works of the same user excluding current work
    public function getMoreByUser($userId, $excludeWorkId, $limit = 6)
    {
        return $this->model->where('user_id', $userId)
            ->where('id', '!=', $excludeWorkId)
            ->with('images')
            ->latest()
            ->take($limit)
            ->get();
    }
}
