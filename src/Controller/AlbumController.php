<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\AlbumRepository;

class AlbumController extends AbstractController
{
    /**
     * @Route("/album", name="album")
     */
    public function index(Request $request, AlbumRepository $albumRepository): Response
    {
        $currentPage = $request->getPathInfo();
        $albums = $albumRepository->findBy([],['id'=>'DESC']);
        return $this->render('album/index.html.twig', [
            'currentPage' => $currentPage,
            'albums'=> $albums,
        ]);
    }
    /**
     * @Route("/album/{id}", name="view_album")
     */
    public function viewAlbum($id, Request $request, AlbumRepository $albumRepository): Response
    {
        $album = $albumRepository->find($id);
        return $this->render('album/view.html.twig', [
            'currentPage' => 'FFFF',
            'album'=> $album,
        ]);
    }
}
