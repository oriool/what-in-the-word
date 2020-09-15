<?php

namespace App\Application\UseCase\Word\CreateWordUseCase;

class CreateWordRequest
{
    private $main;
    private $translation;
    private $categoryId;

    public function __construct(?string $main, ?string $translation, ?int $categoryId)
    {
        $this->main = $main;
        $this->translation = $translation;
        $this->categoryId = $categoryId;
    }

    public function getMain(): ?string
    {
        return $this->main;
    }

    public function getTranslation(): ?string
    {
        return $this->translation;
    }

    public function getCategoryId(): ?int
    {
        return $this->categoryId;
    }
}
