<?php

namespace App\Infrastructure\Controller\User;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UserLogoutController extends AbstractController
{
    public function userLogout()
    {
        if (isset($_COOKIE['token'])) {
            unset($_COOKIE['token']);
            setcookie('token', null, -1, '/');
        }

        return $this->redirectToRoute('home');
    }
}