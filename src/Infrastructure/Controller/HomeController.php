<?php

namespace App\Infrastructure\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpKernel\Profiler\Profiler;

class HomeController extends AbstractController
{
    public function index(?Profiler $profiler)
    {
        if (null !== $profiler) {
            $profiler->disable();
        }

        return $this->render('index.html.twig');
    }
}