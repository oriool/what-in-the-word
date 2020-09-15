<?php

namespace App\Application\UseCase\Word\CheckAnswerUseCase;

class CheckAnswerRequest
{
    private $wordId;
    private $answer;

    public function __construct(?int $wordId, ?string $answer)
    {
        $this->wordId = $wordId;
        $this->answer = $answer;
    }

    public function getWordId(): ?int
    {
        return $this->wordId;
    }

    public function getAnswer(): ?string
    {
        return $this->answer;
    }
}
