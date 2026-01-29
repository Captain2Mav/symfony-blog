<?php

namespace App\Controller\User\Home;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HomeController extends AbstractController
{
    #[Route('/user/home/home', name: 'app_user_home')]
    public function index(): Response
    {
        return $this->render('pages/user/home/index.html.twig', [
        ]);
    }
}
