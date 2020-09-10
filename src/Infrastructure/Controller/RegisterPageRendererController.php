<?php

namespace App\Infrastructure\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class RegisterPageRendererController extends AbstractController
{
    public function renderPage()
    {
        return $this->render('register.html.twig');
    }
}
