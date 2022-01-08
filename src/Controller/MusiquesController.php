<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MusiquesController extends AbstractController
{
    /**
     * @Route("/musiques", name="musiques")
     */
    public function index(): Response
    {
        return $this->render('musiques/index.html.twig', [
            'controller_name' => 'MusiquesController',
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
