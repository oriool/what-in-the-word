<?php

namespace App\Domain\Services\User;

use App\Domain\Credentials;
use App\Domain\Entity\User;
use App\Domain\Repository\UserRepository;

class UserGetter
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getUser(): ?User
    {
        $token = key_exists('token', $_COOKIE) ? $_COOKIE['token'] : null;
        if (!$token) {
            return null;
        }

        $userId = openssl_decrypt($token, 'AES-256-CBC', Credentials::USER_TOKEN_KEY, 0, Credentials::GET_IV);
        $user = $this->userRepository->find($userId);

        return $user;
    }
}