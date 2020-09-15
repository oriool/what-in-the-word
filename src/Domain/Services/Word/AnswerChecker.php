<?php

namespace App\Domain\Services\Word;

use App\Domain\Repository\WordRepository;

class AnswerChecker
{
    private $wordRepository;

    public function __construct(WordRepository $wordRepository)
    {
        $this->wordRepository = $wordRepository;
    }

    public function check(int $wordId, string $answer): bool
    {
        $word = $this->wordRepository->find($wordId);

        return strtolower($word->getTranslation()) == strtolower($answer);
    }
}
