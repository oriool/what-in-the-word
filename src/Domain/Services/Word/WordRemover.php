<?php

namespace App\Domain\Services\Word;

use App\Domain\Repository\WordRepository;
use Doctrine\ORM\EntityManagerInterface;

class WordRemover
{
    private $wordRepository;
    private $entityManager;

    public function __construct(WordRepository $wordRepository, EntityManagerInterface $entityManager)
    {
        $this->wordRepository = $wordRepository;
        $this->entityManager = $entityManager;
    }

    public function remove(int $wordId): bool
    {
        try {
            $word = $this->wordRepository->find($wordId);
            $this->entityManager->remove($word);
            $this->entityManager->flush();
        } catch (\Exception $e) {
            return false;
        }

        return true;
    }
}