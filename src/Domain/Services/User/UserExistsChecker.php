<?php

namespace App\Domain\Services\User;

use App\Domain\Repository\UserRepository;

class UserExistsChecker
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function check(string $username, string $email): bool
    {
        $user = $this->userRepository->findBy(['username' => $username]);
        if ($user) {
            return true;
        }

        $user = $this->userRepository->findBy(['email' => $email]);
        if ($user) {
            return true;
        }

        return false;
    }
}