<?php

namespace App\Services;

use App\Repositories\EcoPostRepository;
use Illuminate\Support\Facades\Storage;
use App\Models\EcoEducationalPost;

class EcoPostService
{
    protected $repo;

    public function __construct(EcoPostRepository $repo)
    {
        $this->repo = $repo;
    }

    public function listPosts()
    {
        return $this->repo->all();
    }

    public function getPost($id)
    {
        return $this->repo->find($id);
    }

     public function createPost(array $data)
    {
        // Handle image upload if provided
        if (isset($data['image'])) {
            $data['image'] = $data['image']->store('eco_posts', 'public');
        }

        return EcoEducationalPost::create($data);
    }


    public function updatePost($id, array $data)
    {
        if (isset($data['image'])) {
            $data['image'] = $data['image']->store('eco_posts', 'public');
        }

        return $this->repo->update($id, $data);
    }

    public function deletePost($id)
    {
        return $this->repo->delete($id);
    }
}
