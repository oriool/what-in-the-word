<?php

namespace App\Application\UseCase\User\RegisterUserUseCase;

use App\Application\UseCase\GenericResponse;

class RegisterUserResponse extends GenericResponse
{
    const USER_ALREADY_EXISTS = 2;

    public function __construct(string $message, int $code)
    {
        parent::__construct($message, $code);
    }
}
