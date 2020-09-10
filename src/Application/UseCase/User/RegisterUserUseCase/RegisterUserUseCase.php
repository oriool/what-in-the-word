<?php

namespace App\Application\UseCase\User\RegisterUserUseCase;

use App\Domain\Services\User\UserExistsChecker;
use App\Domain\Services\User\UserRegisterer;

class RegisterUserUseCase
{
    private $userRegisterer;
    private $userExistsChecker;

    public function __construct(UserRegisterer $userRegisterer, UserExistsChecker $userExistsChecker)
    {
        $this->userRegisterer = $userRegisterer;
        $this->userExistsChecker = $userExistsChecker;
    }

    public function execute(RegisterUserRequest $registerUserRequest)
    {
        $username = $registerUserRequest->getUsername();
        $email = $registerUserRequest->getEmail();
        $password = $registerUserRequest->getPassword();

        $userExists = $this->userExistsChecker->check($username, $email);
        if ($userExists) {
            return new RegisterUserResponse(
                'The user provided already exists',
                RegisterUserResponse::USER_ALREADY_EXISTS
            );
        }

        $user = $this->userRegisterer->registerUser($username, $email, $password);
        if (!$user) {
            return new RegisterUserResponse(
                'There was a problem while registering the user',
                RegisterUserResponse::GENERIC_ERROR
            );
        }

        return new RegisterUserResponse(
            'Registration completed successfully. You can now log in.',
            0
        );
    }
}