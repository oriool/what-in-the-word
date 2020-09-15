<?php

namespace App\Infrastructure\Controller;

use App\Domain\Repository\CategoryRepository;
use App\Domain\Services\User\UserGetter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Profiler\Profiler;

class HomeController extends AbstractController
{
    public function home(
        Request $request,
        ?Profiler $profiler,
        UserGetter $userGetter,
        CategoryRepository $categoryRepository)
    {
        if ($request->cookies->has('token')) {
            $user = $userGetter->getUser();
            $categories = $categoryRepository->findBy(['user' => $user]);

            return $this->render('mainApp.html.twig', ['categories' => $categories]);
        }

        return $this->render('login.html.twig');
    }
}