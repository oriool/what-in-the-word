<?php

namespace App\Application\UseCase\Category\CreateCategoryUseCase;

use App\Application\UseCase\GenericResponse;

class CreateCategoryResponse extends GenericResponse
{
    public function __construct(string $message, int $code)
    {
        parent::__construct($message, $code);
    }
}
