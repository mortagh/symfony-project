<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArtistesController extends AbstractController
{
    /**
     * @Route("/artistes", name="artistes")
     */
    public function index(): Response
    {
        return $this->render('artistes/index.html.twig', [
            'controller_name' => 'ArtistesController',
        ]);
    }
    /**
     * @Route("/artistes/{id}", name="view_artiste")
     */
    public function viewArtiste($id): Response
    {
        return $this->render('artistes/view.html.twig', [
            'controller_name' => 'ArtistesController',
        ]);
    }
}
