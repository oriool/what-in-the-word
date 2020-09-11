<?php

namespace App\Application\UseCase;

abstract class GenericResponse
{
    const SUCCESSFUL_REQUEST = 0;
    const GENERIC_ERROR = 1;

    protected $message;
    protected $code;

    public function __construct(string $message, int $code)
    {
        $this->message = $message;
        $this->code = $code;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function getCode(): int
    {
        return $this->code;
    }
}
