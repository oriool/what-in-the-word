<?php

namespace App\Domain\Services\Word;

use App\Domain\Repository\WordRepository;
use Doctrine\ORM\EntityManagerInterface;

class AnswerChecker
{
    private $wordRepository;
    private $entityManager;

    public function __construct(WordRepository $wordRepository, EntityManagerInterface $entityManager)
    {
        $this->wordRepository = $wordRepository;
        $this->entityManager = $entityManager;
    }

    public function check(int $wordId, string $answer): bool
    {
        $word = $this->wordRepository->find($wordId);
        if (strtolower($word->getTranslation()) != strtolower($answer)) {
            return false;
        }

        $word->setAnswerDate(new \DateTime('now'));

        $this->entityManager->persist($word);
        $this->entityManager->flush();

        return true;
    }
}
