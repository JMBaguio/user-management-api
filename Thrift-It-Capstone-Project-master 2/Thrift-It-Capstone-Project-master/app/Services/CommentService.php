<?php

namespace App\Services;

use App\Repositories\CommentRepository;
use App\Services\ContentModerationService;


class CommentService{

    protected $commentRepository;
    protected $contentModeration;
    
    public function __construct(CommentRepository $commentRepository, ContentModerationService $contentModeration)
    {
        $this->commentRepository = $commentRepository;
        $this->contentModeration = $contentModeration;
    }

    public function getAllComments()
    {
        return $this->commentRepository->all();
    }
    public function getCommentById($id)
    {
        return $this->commentRepository->find($id);
    }

    public function createComment(array $data)
    {
        // Additional content moderation check as safety layer
        if (isset($data['content'])) {
            $validation = $this->contentModeration->validateContent($data['content']);
            if (!$validation['is_valid']) {
                throw new \Exception($validation['message']);
            }
        }
        
        return $this->commentRepository->create($data);
    }
    
    public function updateComment($commentId, array $data)
    {
        // Content moderation check for updates
        if (isset($data['content'])) {
            $validation = $this->contentModeration->validateContent($data['content']);
            if (!$validation['is_valid']) {
                throw new \Exception($validation['message']);
            }
        }
        
        $comment = $this->commentRepository->find($commentId);
        return $this->commentRepository->update($comment, $data);
    }

    public function deleteComment($commentId)
    {
        $comment = $this->commentRepository->find($commentId);
        return $this->commentRepository->delete($comment);
    }
    
    public function getCommentsByProduct($productId)
    {
        return $this->commentRepository->getByProduct($productId);
    }

}