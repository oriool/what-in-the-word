<?php

namespace App\Application\UseCase\Word\CheckAnswerUseCase;

use App\Application\UseCase\GenericResponse;

class CheckAnswerResponse extends GenericResponse
{
    const CORRECT_ANSWER = 0;
    const WORD_MISSING = 2;
    const ANSWER_NOT_PROVIDED = 3;
    const WRONG_ANSWER = 4;

    public function __construct(string $message, int $code)
    {
        parent::__construct($message, $code);
    }
}