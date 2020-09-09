<?php

namespace App\Infrastructure\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Profiler\Profiler;

class HomeController extends AbstractController
{
    public function home(?Profiler $profiler, Request $request)
    {
        if ($request->cookies->has('token')) {
            return $this->render('mainApp.html.twig');
        }

        return $this->render('login.html.twig');
    }
}