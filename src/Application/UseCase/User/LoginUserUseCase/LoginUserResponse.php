<?php

namespace App\Application\UseCase\User\LoginUserUseCase;

use App\Application\UseCase\User\GenericResponse;

class LoginUserResponse extends GenericResponse
{
    const GENERIC_ERROR = 1;

    public function __construct(string $message, int $code)
    {
        parent::__construct($message, $code);
    }
}
