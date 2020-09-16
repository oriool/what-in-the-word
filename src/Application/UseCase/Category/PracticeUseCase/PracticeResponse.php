<?php

namespace App\Application\UseCase\Category\PracticeUseCase;

use App\Application\UseCase\GenericResponse;

class PracticeResponse extends GenericResponse
{
    public function __construct(string $message, int $code)
    {
        parent::__construct($message, $code);
    }
}