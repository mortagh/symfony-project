<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AlbumController extends AbstractController
{
    /**
     * @Route("/album", name="album")
     */
    public function index(): Response
    {
        return $this->render('album/index.html.twig', [
            'controller_name' => 'AlbumController',
        ]);
    }
    /**
     * @Route("/album/{id}", name="view_album")
     */
    public function viewAlbum($id): Response
    {
        return $this->render('album/view.html.twig', [
            'controller_name' => 'albumController',
        ]);
    }
}
