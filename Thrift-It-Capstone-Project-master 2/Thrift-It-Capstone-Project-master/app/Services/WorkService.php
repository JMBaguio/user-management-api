<?php

namespace App\Services;

use App\Repositories\WorkRepository;
use App\Models\Work;
use Illuminate\Support\Facades\Storage;

class WorkService
{
    protected $workRepository;

    public function __construct(WorkRepository $workRepository)
    {
        $this->workRepository = $workRepository;
    }

    // Get all works
    public function getAllWorks()
    {
        return $this->workRepository->all();
    }

    // Get works by a specific user
    public function getWorksByUser($userId)
    {
        return $this->workRepository->getByUser($userId);
    }

    // Find work with relations
    public function getWorkWithRelations($id)
    {
        return $this->workRepository->findWithRelations($id);
    }

    // Find work by ID
    public function getWorkById($id)
    {
        return $this->workRepository->find($id);
    }

    // Create a new work with images
    public function createWork(array $data, ?array $images = null)
    {
        // 1️⃣ Create work record first
        $work = $this->workRepository->create($data);

        // 2️⃣ Handle uploaded images (S3)
        if ($images && count($images) > 0) {
            foreach ($images as $image) {
                if ($image instanceof \Illuminate\Http\UploadedFile) {
                    $path = $image->store('works_images', [
                        'disk' => 's3',
                        'visibility' => 'public',
                    ]);

                    $work->images()->create([
                        'image' => $path,
                    ]);
                }
            }
        }

        return $work;
    }

    // Update an existing work
    public function updateWork(Work $work, array $data, ?array $images = null, ?array $deleteGalleryIds = null)
    {
        // 1️⃣ Handle deletion of gallery images
        if (!empty($deleteGalleryIds)) {
            $imagesToDelete = $work->images()->whereIn('id', $deleteGalleryIds)->get();
            foreach ($imagesToDelete as $img) {
                if ($img->image && Storage::disk('s3')->exists($img->image)) {
                    Storage::disk('s3')->delete($img->image);
                }
            }
            $work->images()->whereIn('id', $deleteGalleryIds)->delete();
        }

        // 2️⃣ Handle new gallery images (limit to 8)
        if (!empty($images)) {
            $currentCount = $work->images()->count();
            $remainingSlots = max(0, 8 - $currentCount);

            foreach (array_slice($images, 0, $remainingSlots) as $img) {
                $path = $img->store('works_images', [
                    'disk' => 's3',
                    'visibility' => 'public',
                ]);
                $work->images()->create(['image' => $path]);
            }
        }

        // 3️⃣ Update other work fields
        return $this->workRepository->update($work, $data);
    }

    // Delete a work
    public function deleteWork(Work $work)
    {
        // Delete images from S3
        foreach ($work->images as $img) {
            if ($img->image && Storage::disk('s3')->exists($img->image)) {
                Storage::disk('s3')->delete($img->image);
            }
        }

        return $this->workRepository->delete($work);
    }

    // Get approved works
    public function getApprovedWorks(?string $type = null)
    {
        return $this->workRepository->getApprovedWorks($type);
    }

    // Paginated works by status
    public function getWorksByStatusPaginated(string $status, int $perPage = 10)
    {
        return $this->workRepository->getByStatusPaginated($status, $perPage);
    }

    // Get more works of a user excluding a specific work
    public function getMoreWorksByUser($userId, $excludeWorkId, $limit = 6)
    {
        return $this->workRepository->getMoreByUser($userId, $excludeWorkId, $limit);
    }
}
