<?php

namespace App\Application\UseCase\User\LoginUserUseCase;

use App\Domain\Services\User\UserLogger;

class LoginUserUseCase
{
    private $userLogger;

    public function __construct(UserLogger $userLogger)
    {
        $this->userLogger = $userLogger;
    }

    public function execute(LoginUserRequest $loginUserRequest)
    {
        $email = $loginUserRequest->getEmail();
        $password = $loginUserRequest->getPassword();

        $successful = $this->userLogger->logIn($email, $password);
        if (!$successful) {
            return new LoginUserResponse(
                'There was an error in the login process. Please retry.',
                LoginUserResponse::GENERIC_ERROR
                );
        }

        return new LoginUserResponse('User logged successfully', LoginUserResponse::SUCCESSFUL_REQUEST);
    }
}
