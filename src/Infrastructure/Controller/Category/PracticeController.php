<?php

namespace App\Infrastructure\Controller\Category;

use App\Application\UseCase\Category\PracticeUseCase\PracticeRequest;
use App\Application\UseCase\Category\PracticeUseCase\PracticeUseCase;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class PracticeController extends AbstractController
{
    public function practice(Request $request, PracticeUseCase $practiceUseCase)
    {
        $categoryId = $request->get('categoryId');

        $practiceRequest = new PracticeRequest($categoryId);
        $practiceResponse = $practiceUseCase->execute($practiceRequest);

        $error = $practiceResponse->getCode();

        if ($error) {
            $this->addFlash('danger', 'There was an error while trying to start the practice. Please, try again.');
        }

        return $this->redirectToRoute('home');
    }
}
