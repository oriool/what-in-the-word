<?php

namespace App\Application\UseCase\Category\CreateCategoryUseCase;

class CreateCategoryRequest
{
    private $title;

    public function __construct(string $title)
    {
        $this->title = $title;
    }

    public function getTitle(): string
    {
        return $this->title;
    }
}
