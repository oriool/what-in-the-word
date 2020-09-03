<?php

namespace App\Domain\Services\User;

use App\Domain\Entity\User;

class UserRegisterer
{
    private $entityManager;

    public function __construct($entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function registerUser(string $username, string $email, string $password): ?User
    {
        $user = new User();
        $user->setUsername($username)
            ->setEmail($email)
            ->setPassword(password_hash($password, PASSWORD_DEFAULT))
            ->setCreationDate(new \DateTime());

        try {
            $this->entityManager->persist($user);
            $this->entityManager->flush();
        } catch (\Exception $e) {
            return null;
        }

        return $user;
    }
}