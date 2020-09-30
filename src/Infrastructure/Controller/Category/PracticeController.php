<?php

namespace App\Infrastructure\Controller\Category;

use App\Application\UseCase\Category\PracticeUseCase\PracticeRequest;
use App\Application\UseCase\Category\PracticeUseCase\PracticeUseCase;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PracticeController extends AbstractController
{
    public function practice(PracticeUseCase $practiceUseCase)
    {
        $practiceRequest = new PracticeRequest();
        $practiceResponse = $practiceUseCase->execute($practiceRequest);

        $error = $practiceResponse->getCode();

        if ($error) {
            $this->addFlash('danger', 'There was an error while trying to start the practice. Please, try again.');
        }

        return $this->redirectToRoute('home');
    }
}
