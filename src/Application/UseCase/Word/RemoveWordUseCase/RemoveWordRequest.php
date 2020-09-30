<?php

namespace App\Application\UseCase\Word\RemoveWordUseCase;

class RemoveWordRequest
{
    private $wordId;

    public function __construct(int $wordId)
    {
        $this->wordId = $wordId;
    }

    public function getWordId(): int
    {
        return $this->wordId;
    }
}
