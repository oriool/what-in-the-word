<?php

namespace App\Application\UseCase\Word\RemoveWordUseCase;

use App\Application\UseCase\GenericResponse;

class RemoveWordResponse extends GenericResponse
{
    public function __construct(string $message, int $code)
    {
        parent::__construct($message, $code);
    }
}
