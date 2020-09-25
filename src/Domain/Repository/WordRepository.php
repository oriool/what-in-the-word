<?php

namespace App\Domain\Repository;

use App\Domain\Entity\Word;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Word|null find($id, $lockMode = null, $lockVersion = null)
 * @method Word|null findOneBy(array $criteria, array $orderBy = null)
 * @method Word[]    findAll()
 * @method Word[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WordRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Word::class);
    }

    public function findNextWord(Word $word)
    {
        return $this->createQueryBuilder('w')
            ->where('w.category = :category')
            ->andWhere('w.id > :word')
            ->setParameters(['category' => $word->getCategory(), 'word' => $word])
            ->setMaxResults(1)
            ->getQuery()
            ->getSingleResult();
    }
}
