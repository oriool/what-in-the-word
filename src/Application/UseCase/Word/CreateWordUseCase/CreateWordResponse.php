<?php

namespace App\Application\UseCase\Word\CreateWordUseCase;

use App\Application\UseCase\GenericResponse;

class CreateWordResponse extends GenericResponse
{
    const MAIN_NOT_PROVIDED = 2;
    const TRANSLATION_NOT_PROVIDED = 3;
    const CATEGORY_MISSING = 4;

    public function __construct(string $message, int $code)
    {
        parent::__construct($message, $code);
    }
}
