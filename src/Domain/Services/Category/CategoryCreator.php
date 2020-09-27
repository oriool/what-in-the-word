<?php

namespace App\Domain\Services\Category;

use App\Domain\Entity\Category;
use App\Domain\Repository\CategoryRepository;
use App\Domain\Services\User\UserGetter;
use Doctrine\ORM\EntityManagerInterface;

class CategoryCreator
{
    private $userGetter;
    private $entityManager;
    private $categoryRepository;

    public function __construct(
        UserGetter $userGetter,
        CategoryRepository $categoryRepository,
        EntityManagerInterface $entityManager)
    {
        $this->userGetter = $userGetter;
        $this->categoryRepository = $categoryRepository;
        $this->entityManager = $entityManager;
    }

    public function create(?int $categoryId, string $title): ?Category
    {
        $user = $this->userGetter->getUser();

        if ($categoryId) {
            $category = $this->categoryRepository->findOneBy(['id' => $categoryId, 'user' => $user]);
        } else {
            $category = new Category();
            $category->setUser($user);
        }
        $category->setTitle($title);

        try {
            $this->entityManager->persist($category);
            $this->entityManager->flush();
        } catch (\Exception $e) {
            return null;
        }

        return $category;
    }
}
