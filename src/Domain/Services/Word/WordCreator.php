<?php

namespace App\Domain\Services\Word;

use App\Domain\Entity\Word;
use App\Domain\Repository\CategoryRepository;
use App\Domain\Services\User\UserGetter;
use Doctrine\ORM\EntityManagerInterface;

class WordCreator
{
    private $userGetter;
    private $categoryRepository;
    private $entityManager;

    public function __construct(
        UserGetter $userGetter,
        CategoryRepository $categoryRepository,
        EntityManagerInterface $entityManager)
    {
        $this->userGetter = $userGetter;
        $this->categoryRepository = $categoryRepository;
        $this->entityManager = $entityManager;
    }

    public function create(string $main, string $translation, int $categoryId): ?Word
    {
        $user = $this->userGetter->getUser();
        $category = $this->categoryRepository->findBy(['id' => $categoryId, 'user' => $user]);
        if (!$category) {
            return null;
        }

        $word = new Word();
        $word->setMain($main)
            ->setTranslation($translation)
            ->setAnswerDate(new \DateTime())
            ->setCategory($category);

        try {
            $this->entityManager->persist($word);
            $this->entityManager->flush();
        } catch (\Exception $e) {
            return null;
        }

        return $word;
    }
}
