<?php

namespace App\Infrastructure\Controller;

use App\Domain\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class HomeController extends AbstractController
{
    public function index(Request $request, UserRepository $userRepository)
    {
        $users = $userRepository->findAll();

        return $this->render('index.html.twig', ['users' => $users]);
    }
}