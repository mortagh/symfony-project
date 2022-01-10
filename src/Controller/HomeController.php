<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class HomeController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function index(Request $request): Response
    {
        return $this->redirectToRoute('home');
    }
    /**
     * @Route("/home", name="home")
     */
    public function home(Request $request): Response
    {
        $currentPage = $request->getPathInfo();
        return $this->render('home/index.html.twig', [
            'currentPage' => $currentPage,
        ]);
    }
}

