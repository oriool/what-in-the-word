<?php

namespace App\Infrastructure\Controller;

use App\Domain\Repository\CategoryRepository;
use App\Domain\Services\User\UserGetter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class HomeController extends AbstractController
{
    public function home(
        Request $request,
        UserGetter $userGetter,
        CategoryRepository $categoryRepository)
    {
        if ($request->cookies->has('token')) {
            $user = $userGetter->getUser();
            $categories = $categoryRepository->findBy(['user' => $user]);

            return $this->render('main_app.html.twig', ['categories' => $categories]);
        }

        return $this->render('login.html.twig');
    }
}