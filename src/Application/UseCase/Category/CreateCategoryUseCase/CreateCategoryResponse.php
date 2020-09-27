<?php

namespace App\Application\UseCase\Category\CreateCategoryUseCase;

use App\Application\UseCase\GenericResponse;

class CreateCategoryResponse extends GenericResponse
{
    private $categoryId;
    private $title;

    public function __construct(string $message, int $code, string $title, ?int $categoryId = null)
    {
        parent::__construct($message, $code);
        $this->title = $title;
        $this->categoryId = $categoryId;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getCategoryId(): ?int
    {
        return $this->categoryId;
    }
}
