<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\ArtisteRepository;

class ArtistesController extends AbstractController
{
    /**
     * @Route("/artistes", name="artistes")
     */
    public function index(Request $request, ArtisteRepository $artisteRepository): Response
    {
        $currentPage = $request->getPathInfo();
        $artistes = $artisteRepository->findBy([],['id'=>'DESC']);
        return $this->render('artistes/index.html.twig', [
            'currentPage' => $currentPage,
            'artistes' => $artistes,
        ]);
    }
    /**
     * @Route("/artiste/{id}", name="view_artiste")
     */
    public function viewArtiste($id): Response
    {
        return $this->render('artistes/view.html.twig', [
            'currentPage' => '',
        ]);
    }
}
