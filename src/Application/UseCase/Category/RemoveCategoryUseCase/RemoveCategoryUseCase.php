<?php

namespace App\Application\UseCase\Category\RemoveCategoryUseCase;

use App\Domain\Services\Category\CategoryRemover;

class RemoveCategoryUseCase
{
    private $categoryRemover;

    public function __construct(CategoryRemover $categoryRemover)
    {
        $this->categoryRemover = $categoryRemover;
    }

    public function execute(RemoveCategoryRequest $removeCategoryRequest)
    {
        $successful = $this->categoryRemover->remove($removeCategoryRequest->getCategoryId());
        if (!$successful) {
            return new RemoveCategoryResponse(
                'There was an error while removing the category',
                RemoveCategoryResponse::GENERIC_ERROR
            );
        }

        return new RemoveCategoryResponse(
            'Category removed successfully',
            RemoveCategoryResponse::SUCCESSFUL_REQUEST
        );
    }
}