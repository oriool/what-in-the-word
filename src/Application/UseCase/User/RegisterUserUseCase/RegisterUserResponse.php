<?php

namespace App\Application\UseCase\User\RegisterUserUseCase;

class RegisterUserResponse
{
    const USER_ALREADY_EXISTS = 1;
    const GENERIC_ERROR = 2;

    private $message;
    private $errorCode;

    public function __construct(string $message, int $errorCode)
    {
        $this->message = $message;
        $this->errorCode = $errorCode;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function getErrorCode(): int
    {
        return $this->errorCode;
    }
}