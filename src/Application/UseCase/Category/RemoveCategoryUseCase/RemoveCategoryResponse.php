<?php

namespace App\Application\UseCase\Category\RemoveCategoryUseCase;

use App\Application\UseCase\GenericResponse;

class RemoveCategoryResponse extends GenericResponse
{
    public function __construct(string $message, int $code)
    {
        parent::__construct($message, $code);
    }
}
