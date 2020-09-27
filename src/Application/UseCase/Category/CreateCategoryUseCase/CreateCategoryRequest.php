<?php

namespace App\Application\UseCase\Category\CreateCategoryUseCase;

class CreateCategoryRequest
{
    private $categoryId;
    private $title;

    public function __construct(?int $categoryId, string $title)
    {
        $this->categoryId = $categoryId;
        $this->title = $title;
    }

    public function getCategoryId(): ?int
    {
        return $this->categoryId;
    }

    public function getTitle(): string
    {
        return $this->title;
    }
}
