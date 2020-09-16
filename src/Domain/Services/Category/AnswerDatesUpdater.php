<?php

namespace App\Domain\Services\Category;

use App\Domain\Repository\CategoryRepository;
use App\Domain\Services\User\UserGetter;
use Doctrine\ORM\EntityManagerInterface;

class AnswerDatesUpdater
{
    private $categoryRepository;
    private $userGetter;
    private $entityManager;

    public function __construct(
        CategoryRepository $categoryRepository,
        UserGetter $userGetter,
        EntityManagerInterface $entityManager)
    {
        $this->categoryRepository = $categoryRepository;
        $this->userGetter = $userGetter;
        $this->entityManager = $entityManager;
    }

    public function update(?int $categoryId): bool
    {
        $user = $this->userGetter->getUser();
        $category = $this->categoryRepository->findOneBy(['id' => $categoryId, 'user' => $user]);

        if (!$category) {
            return false;
        }

        foreach ($category->getWords() as $word) {
            $word->setAnswerDate(new \DateTime('yesterday'));
        }

        try {
            $this->entityManager->persist($category);
            $this->entityManager->flush();
        } catch (\Exception $e) {
            return false;
        }

        return true;
    }
}
