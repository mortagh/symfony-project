<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class MusiquesController extends AbstractController
{
    /**
     * @Route("/musiques", name="musiques")
     */
    public function index(Request $request): Response
    {
        $currentPage = $request->getPathInfo();
        return $this->render('musiques/index.html.twig', [
            'currentPage' => $currentPage,
        ]);
    }
    /**
     * @Route("/musiques/{id}", name="view_musique")
     */
    public function viewMusiques($id): Response
    {
        return $this->render('musiques/view.html.twig', [
            'controller_name' => 'MusiqueController',
        ]);
    }
}
