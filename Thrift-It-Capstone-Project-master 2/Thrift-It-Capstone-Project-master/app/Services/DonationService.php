<?php

namespace App\Services;

use App\Repositories\DonationRepository;
use Illuminate\Support\Facades\Storage;
use App\Models\Segment;
use App\Models\Donation;
use Illuminate\Http\UploadedFile;

class DonationService
{
    protected $donationRepository;

    public function __construct(DonationRepository $donationRepository)
    {
        $this->donationRepository = $donationRepository;
    }

    public function getAllDonations()
    {
        return $this->donationRepository->all();
    }

    public function getDonationById($id)
    {
        return $this->donationRepository->find($id);
    }

    public function createDonation(array $data, ?array $images = null)
    {
        // 1️⃣ Create donation record first
        $donation = $this->donationRepository->create($data);

          // 2️⃣ Handle uploaded images (store in S3)
        if ($images && count($images) > 0) {
            foreach ($images as $image) {
                if ($image instanceof UploadedFile) {

                    // Store image in S3 under 'donation_images' folder
                    $path = $image->store('donation_images', [
                        'disk' => 's3',
                        'visibility' => 'public',
                    ]);

                    // Save record in donation_images table
                    $donation->donationImages()->create([
                        'image' => $path, // store the S3 key/path
                    ]);
                }
            }
        }

        return $donation;
    }

    public function updateDonation(Donation $donation, array $data, ?array $images = null, ?array $deleteGalleryIds = null)
    {
        // 1️⃣ Handle main image
        if (!empty($images['main']) && $images['main'] instanceof UploadedFile) {
            // Delete old main image from S3 if exists
            if ($donation->image && Storage::disk('s3')->exists($donation->image)) {
                Storage::disk('s3')->delete($donation->image);
            }

            // Store new main image in S3
            $data['image'] = $images['main']->store('donations_images', [
                'disk' => 's3',
                'visibility' => 'public',
            ]);
        }

        // 2️⃣ Handle deletion of gallery images
        if (!empty($deleteGalleryIds)) {
            $imagesToDelete = $donation->donationImages()->whereIn('id', $deleteGalleryIds)->get();
            foreach ($imagesToDelete as $img) {
                if ($img->image && Storage::disk('s3')->exists($img->image)) {
                    Storage::disk('s3')->delete($img->image);
                }
            }
            $donation->donationImages()->whereIn('id', $deleteGalleryIds)->delete();
        }

        // 3️⃣ Handle new gallery images (limit to 8)
        if (!empty($images['gallery'])) {
            $currentCount = $donation->donationImages()->count();
            $remainingSlots = max(0, 8 - $currentCount);

            foreach (array_slice($images['gallery'], 0, $remainingSlots) as $img) {
                $path = $img->store('donations_images', [
                    'disk' => 's3',
                    'visibility' => 'public',
                ]);
                $donation->donationImages()->create(['image' => $path]);
            }
        }

        // 4️⃣ Update other donation fields
        return $this->donationRepository->update($donation, $data);
    }
    
    public function deleteDonation($donation)
    {
        return $this->donationRepository->delete($donation);
    }

    public function getApprovedDonationsBySegment(Segment $segment, ?int $categoryId = null)
    {
        return $this->donationRepository->getApprovedDonationsBySegement($segment, $categoryId);
    }

    public function getApprovedDonations()
    {
        return $this->donationRepository->all();
    }

    public function getDonationsByStatusPaginated(string $status, int $perPage = 10)
    {
        return $this->donationRepository->getByStatusPaginated($status, $perPage);
    }

        public function getDonationsByUser($userId)
        {
            return $this->donationRepository->getByUser($userId);
        }

        public function getMoreDonationsByUser($userId, $excludeDonationId, $limit = 6)
        {
            return $this->donationRepository->getMoreByUser($userId, $excludeDonationId, $limit);
        }

}
