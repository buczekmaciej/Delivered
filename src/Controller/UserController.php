<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class UserController extends AbstractController
{
    /**
     * @Route("/u/login", name="login", methods={"GET", "POST"})
     */
    public function login(AuthenticationUtils $au): Response
    {
        return $this->render('user/login.html.twig', [
            'error' => $au->getLastAuthenticationError(),
            'username' => $au->getLastUsername(),
        ]);
    }

    /**
     * @Route("/u/logout", name="logout", methods={"GET"})
     */
    public function logout(): RedirectResponse
    {
        return $this->redirectToRoute('login', []);
    }

    /**
     * @Route("/u/profile", name="profile", methods={"GET"})
     */
    public function profile(): Response
    {
        return $this->render('user/profile.html.twig', []);
    }
}
