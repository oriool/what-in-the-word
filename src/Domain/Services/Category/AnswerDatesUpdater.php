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

    public function update(): bool
    {
        $user = $this->userGetter->getUser();
        $categories = $this->categoryRepository->findBy(['user' => $user]);

        if (!$categories) {
            return false;
        }

        foreach ($categories as $category) {
            foreach ($category->getWords() as $word) {
                $word->setAnswerDate(new \DateTime('yesterday'));
            }
            $this->entityManager->persist($category);
        }

        try {
            $this->entityManager->flush();
        } catch (\Exception $e) {
            return false;
        }

        return true;
    }
}
