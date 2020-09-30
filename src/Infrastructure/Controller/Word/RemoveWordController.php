<?php

namespace App\Infrastructure\Controller\Word;

use App\Application\UseCase\Word\RemoveWordUseCase\RemoveWordRequest;
use App\Application\UseCase\Word\RemoveWordUseCase\RemoveWordUseCase;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class RemoveWordController extends AbstractController
{
    public function removeWord(Request $request, RemoveWordUseCase $removeWordUseCase)
    {
        $wordId = $request->get('wordId');

        $removeWordRequest = new RemoveWordRequest($wordId);
        $removeWordResponse = $removeWordUseCase->execute($removeWordRequest);

        return new JsonResponse([
           'error' => $removeWordResponse->getCode(),
           'message' => $removeWordResponse->getMessage(),
        ]);
    }
}