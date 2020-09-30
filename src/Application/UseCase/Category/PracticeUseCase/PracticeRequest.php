<?php

namespace App\Application\UseCase\Category\PracticeUseCase;

class PracticeRequest
{
    private $categoryId;

    public function __construct(?int $categoryId = null)
    {
        $this->categoryId = $categoryId;
    }

    public function getCategoryId(): ?int
    {
        return $this->categoryId;
    }
}
