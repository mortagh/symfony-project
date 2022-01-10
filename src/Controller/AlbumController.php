<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class AlbumController extends AbstractController
{
    /**
     * @Route("/album", name="album")
     */
    public function index(Request $request): Response
    {
        $currentPage = $request->getPathInfo();
        return $this->render('album/index.html.twig', [
            'currentPage' => $currentPage,
        ]);
    }
    /**
     * @Route("/album/{id}", name="view_album")
     */
    public function viewAlbum($id): Response
    {
        return $this->render('album/view.html.twig', [
            'currentPage' => 'FFFF',
        ]);
    }
}
