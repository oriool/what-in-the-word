<?php

namespace App\Infrastructure\Controller\Category;

use App\Application\UseCase\Category\CreateCategoryUseCase\CreateCategoryRequest;
use App\Application\UseCase\Category\CreateCategoryUseCase\CreateCategoryUseCase;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class CreateCategoryController extends AbstractController
{
    public function createCategory(Request $request, CreateCategoryUseCase $createCategoryUseCase)
    {
        $categoryId = $request->get('categoryId');
        $title = $request->get('title');

        $createCategoryRequest = new CreateCategoryRequest($categoryId, $title);
        $createCategoryResponse = $createCategoryUseCase->execute($createCategoryRequest);

        return new JsonResponse([
            'error' => $createCategoryResponse->getCode(),
            'message' => $createCategoryResponse->getMessage(),
            'title' => $createCategoryResponse->getTitle(),
            'categoryId' => $createCategoryResponse->getCategoryId(),
        ]);
    }
}
