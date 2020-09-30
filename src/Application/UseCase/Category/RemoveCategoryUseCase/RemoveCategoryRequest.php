<?php

namespace App\Application\UseCase\Category\RemoveCategoryUseCase;

class RemoveCategoryRequest
{
    private $categoryId;

    public function __construct(int $categoryId)
    {
        $this->categoryId = $categoryId;
    }

    public function getCategoryId(): int
    {
        return $this->categoryId;
    }
}