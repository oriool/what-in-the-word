<?php

namespace App\Application\UseCase\User\LoginUserUseCase;

use App\Application\UseCase\GenericResponse;

class LoginUserResponse extends GenericResponse
{
    public function __construct(string $message, int $code)
    {
        parent::__construct($message, $code);
    }
}
