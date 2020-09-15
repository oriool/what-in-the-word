<?php

namespace App\Domain\Services\User;

use App\Domain\Credentials;
use App\Domain\Repository\UserRepository;

class UserLogger
{
    const ONE_MONTH = 60 * 60 * 24 * 30;

    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function logIn(string $email, string $password): bool
    {
        $user = $this->userRepository->findOneBy(['email' => $email]);
        if (!$user) {
            return false;
        }

        if (!password_verify($password, $user->getPassword())) {
            return false;
        }

        $token = openssl_encrypt($user->getId(), 'AES-256-CBC', Credentials::USER_TOKEN_KEY, 0, Credentials::GET_IV);
        setcookie('token', $token, time() + $this::ONE_MONTH);

        return true;
    }
}
