<?php

namespace App\Infrastructure\Controller\Word;

use App\Application\UseCase\Word\CheckAnswerUseCase\CheckAnswerRequest;
use App\Application\UseCase\Word\CheckAnswerUseCase\CheckAnswerUseCase;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class CheckAnswerController extends AbstractController
{
    public function checkAnswer(Request $request, CheckAnswerUseCase $checkAnswerUseCase)
    {
        $wordId = $request->get('wordId');
        $answer = $request->get('answer');

        $checkAnswerRequest = new CheckAnswerRequest($wordId, $answer);
        $checkAnswerResponse = $checkAnswerUseCase->execute($checkAnswerRequest);

        return new JsonResponse([
            'message' => $checkAnswerResponse->getMessage(),
            'error' => $checkAnswerResponse->getCode(),
        ]);
    }
}
