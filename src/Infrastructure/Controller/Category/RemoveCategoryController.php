<?php

namespace App\Infrastructure\Controller\Category;

use App\Application\UseCase\Category\RemoveCategoryUseCase\RemoveCategoryRequest;
use App\Application\UseCase\Category\RemoveCategoryUseCase\RemoveCategoryUseCase;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class RemoveCategoryController extends AbstractController
{
    public function remove(Request $request, RemoveCategoryUseCase $removeCategoryUseCase)
    {
        $categoryId = $request->get('categoryId');

        $removeCategoryRequest = new RemoveCategoryRequest($categoryId);
        $removeCategoryResponse = $removeCategoryUseCase->execute($removeCategoryRequest);

        return new JsonResponse([
            'error' => $removeCategoryResponse->getCode(),
            'message' => $removeCategoryResponse->getMessage(),
        ]);
    }
}