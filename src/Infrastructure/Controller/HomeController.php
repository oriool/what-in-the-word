<?php

namespace App\Infrastructure\Controller;

use App\Domain\Entity\Test;
use App\Domain\Repository\TestRepository;
use App\Domain\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class HomeController extends AbstractController
{
    public function index(Request $request, UserRepository $userRepository, TestRepository $testRepository)
    {
        $users = $userRepository->findAll();
        $test = new Test();
        $test->setTest('test');

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($test);
        $entityManager->flush();

        $tests = $testRepository->findAll();

        return $this->render('index.html.twig', ['users' => $users, 'tests' => $tests]);
    }
}