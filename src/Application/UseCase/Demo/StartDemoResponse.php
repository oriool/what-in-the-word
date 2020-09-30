<?php

namespace App\Application\UseCase\Demo;

use App\Application\UseCase\GenericResponse;

class StartDemoResponse extends GenericResponse
{
    public function __construct(string $message, int $code)
    {
        parent::__construct($message, $code);
    }
}
