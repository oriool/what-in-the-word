<?php

namespace App\Domain\Services\Category\CategoryCreator;

use App\Domain\Entity\Category;
use App\Domain\Services\User\UserGetter;
use Doctrine\ORM\EntityManagerInterface;

class CategoryCreator
{
    private $userGetter;
    private $entityManager;

    public function __construct(UserGetter $userGetter, EntityManagerInterface $entityManager)
    {
        $this->userGetter = $userGetter;
        $this->entityManager = $entityManager;
    }

    public function create(string $title): ?Category
    {
        $user = $this->userGetter->getUser();

        $category = new Category();
        $category->setTitle($title)
                 ->setUser($user);

        try {
            $this->entityManager->persist($category);
            $this->entityManager->flush();
        } catch (\Exception $e) {
            return null;
        }

        return $category;
    }
}
