<?php

namespace App\Infrastructure\Controller\Demo;

use App\Application\UseCase\Demo\StartDemoRequest;
use App\Application\UseCase\Demo\StartDemoUseCase;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DemoController extends AbstractController
{
    public function startDemo(StartDemoUseCase $startDemoUseCase)
    {
        $username = rand(1000, 999999);
        $email = rand(1000, 9999) . '@' . rand(1000, 9999) . '.com';
        $password = rand(1000, 999999);

        $startDemoRequest = new StartDemoRequest($username, $email, $password);
        $startDemoResponse = $startDemoUseCase->execute($startDemoRequest);

        if ($startDemoResponse->getCode()) {
            $this->addFlash('danger', $startDemoResponse->getMessage());
        }

        return $this->redirectToRoute('home');
    }
}
