<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class ArtistesController extends AbstractController
{
    /**
     * @Route("/artistes", name="artistes")
     */
    public function index(Request $request): Response
    {
        $currentPage = $request->getPathInfo();
        return $this->render('artistes/index.html.twig', [
            'currentPage' => $currentPage,
        ]);
    }
    /**
     * @Route("/artiste/{id}", name="view_artiste")
     */
    public function viewArtiste($id): Response
    {
        return $this->render('artistes/view.html.twig', [
            'controller_name' => 'ArtistesController',
        ]);
    }
}
