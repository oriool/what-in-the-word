<?php

namespace App\Infrastructure\Controller\User;

use App\Application\UseCase\User\RegisterUserUseCase\RegisterUserRequest;
use App\Application\UseCase\User\RegisterUserUseCase\RegisterUserResponse;
use App\Application\UseCase\User\RegisterUserUseCase\RegisterUserUseCase;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class UserRegisterController extends AbstractController
{
    public function userRegister(Request $request, RegisterUserUseCase $registerUserUseCase)
    {
        $username = $request->get('username');
        $email = $request->get('email');
        $password = $request->get('password');

        $registerUserRequest = new RegisterUserRequest($username, $email, $password);
        $registerUserResponse = $registerUserUseCase->execute($registerUserRequest);

        if ($registerUserResponse->getErrorCode() == RegisterUserResponse::GENERIC_ERROR) {
            return new JsonResponse([
                'message' => $registerUserResponse->getMessage(),
                'code' => $registerUserResponse->getCode(),
            ]);
        }

        $this->addFlash('success', $registerUserResponse->getMessage());

        return $this->redirectToRoute('home');
    }
}
