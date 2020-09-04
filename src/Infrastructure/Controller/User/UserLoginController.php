<?php

namespace App\Infrastructure\Controller\User;

use App\Application\UseCase\User\LoginUserUseCase\LoginUserRequest;
use App\Application\UseCase\User\LoginUserUseCase\LoginUserUseCase;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class UserLoginController extends AbstractController
{
    public function userLogin(Request $request, LoginUserUseCase $loginUserUseCase)
    {
        $email = $request->get('email');
        $password = $request->get('password');
        
        $loginUserRequest = new LoginUserRequest($email, $password);
        $loginUserResponse = $loginUserUseCase->execute($loginUserRequest);

        return new JsonResponse([
            'message' => $loginUserResponse->getMessage(),
            'code' => $loginUserResponse->getCode(),
        ]);
    }
}
