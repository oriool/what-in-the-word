<?php

namespace App\Application\UseCase\Demo;

use App\Domain\Services\User\UserLogger;
use App\Domain\Services\User\UserRegisterer;

class StartDemoUseCase
{
    private $userRegisterer;
    private $userLogger;

    public function __construct(UserRegisterer $userRegisterer, UserLogger $userLogger)
    {
        $this->userRegisterer = $userRegisterer;
        $this->userLogger = $userLogger;
    }

    public function execute(StartDemoRequest $startDemoRequest): StartDemoResponse
    {
        $username = $startDemoRequest->getUsername();
        $email = $startDemoRequest->getEmail();
        $password = $startDemoRequest->getPassword();

        try {
            $userRegistered = $this->userRegisterer->registerUser($username, $email, $password);
            $loginSuccessful = $this->userLogger->logIn($email, $password);
        } catch (\Exception $e) {
            return new StartDemoResponse(
                'Exception: Something went wrong while starting the demo'.$e->getMessage(),
                StartDemoResponse::GENERIC_ERROR
            );
        }

        if (!$userRegistered || !$loginSuccessful) {
            return new StartDemoResponse(
                'No login: Something went wrong while starting the demo',
                StartDemoResponse::GENERIC_ERROR
            );
        }

        return new StartDemoResponse(
            'Demo started successfully',
            StartDemoResponse::SUCCESSFUL_REQUEST
        );
    }
}
