<?php

namespace App\Domain\Services\Category;

use App\Domain\Repository\CategoryRepository;
use Doctrine\ORM\EntityManagerInterface;

class CategoryRemover
{
    private $categoryRepository;
    private $entityManager;

    public function __construct(CategoryRepository $categoryRepository, EntityManagerInterface $entityManager)
    {
        $this->categoryRepository = $categoryRepository;
        $this->entityManager = $entityManager;
    }

    public function remove(int $categoryId)
    {
        try {
            $category = $this->categoryRepository->find($categoryId);
            $this->entityManager->remove($category);
            $this->entityManager->flush();
        } catch (\Exception $e) {
            return false;
        }

        return true;
    }
}