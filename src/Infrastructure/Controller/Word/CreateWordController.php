<?php

namespace App\Infrastructure\Controller\Word;

use App\Application\UseCase\Word\CreateWordUseCase\CreateWordRequest;
use App\Application\UseCase\Word\CreateWordUseCase\CreateWordUseCase;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class CreateWordController extends AbstractController
{
    public function createWord(Request $request, CreateWordUseCase $createWordUseCase)
    {
        $main = $request->get('main');
        $translation = $request->get('translation');
        $categoryId = $request->get('categoryId');

        $createWordRequest = new CreateWordRequest($main, $translation, $categoryId);
        $createWordResponse = $createWordUseCase->execute($createWordRequest);

        return new JsonResponse(['error' => $createWordResponse->getCode()]);
    }
}
